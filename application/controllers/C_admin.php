<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

  public function index()  {
    //$data
    $this->load->view('admin/login');
  }
  public function register()  {
    //$data
    $this->load->view('admin/register');
  }
	public function addkeyword(){
      if ($this->session->userdata('level')!=1)
      {
          redirect('C_admin');
      }
      $data = array(
            'template' => 'admin/tambahkeyword'
            );
  		$this->load->view('template/layout',$data);
  	}

  // public function delete_keyword(){
  //     $id = $this->uri->segment(3);
  //     $this->delete_model->delete_student_id($id);
  //     $this->show_student_id();
    
  // }

  public function proses_addkeyword()	{
      $kata_kunci = $this->input->post('keyword');
      $arti = $this->input->post('pengertian');
  		$syntax = $this->input->post('syntax');
      $required = $this->input->post('required');

      $data = array(
          // 'kode_buku' => $kodeBuku,
  		'kata_kunci' => $kata_kunci,
            'arti' => $arti,
            'syntax' => $syntax,
            'required' => $required
            );
      $this->TbMateri_model->savemateri($data);

      redirect('C_admin/addkeyword');
  	}

    public function cek_login()
    {
        $data = array
                (
                    'username' => $this->input->post('username', TRUE),
                    'password' => md5($this->input->post('password', TRUE))
                );
        $hasil = $this->TbMateri_model->cek_user($data);
        if ($hasil->num_rows() == 1)
        {
            foreach ($hasil->result() as $sess)
            {
                $sess_data['logged_in'] =   'logged in';
                $sess_data['id']        =   $sess->id;
                $sess_data['username']  =   $sess->username;
                $sess_data['firstname'] =   $sess->firstname;
                $sess_data['lastname']  =   $sess->lastname;
                $sess_data['level']     =   $sess->level;
                $sess_data['foto']      =   $sess->foto;
                $sess_data['jurusan']   =   $sess->jurusan;
                $sess_data['fakultas']  =   $sess->fakultas;
                $sess_data['universitas']=   $sess->universitas;
                $this->session->set_userdata($sess_data);

                if ($sess->level=='1') {
                    redirect('C_admin/addkeyword');
                } elseif ($sess->level=='2') {
                    redirect('C_index');
                } else {
                    redirect('login');
                }

            }
        }
        else
        {
            echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('firstname');
        $this->session->unset_userdata('lastname');
        $this->session->unset_userdata('level');
        session_destroy();
        $this->session->set_flashdata('msg','<div class="alert alert-dismissable bg-red" role="alert">
            Berhasil Log Out !
        <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button></div>');
        redirect(site_url('C_admin/index'));
    }

    public function go_register()
    {

      $username         = $this->input->post('username');
      $firstname        = $this->input->post('firstname');
      $lastname         = $this->input->post('lastname');
      $email            = $this->input->post('email');
      $password         = $this->input->post('password');
      $confirm_password = $this->input->post('confirm_password');

      if ($confirm_password!=$password) {
        $this->session->set_flashdata('msg','<div class="alert alert-dismissable bg-red" role="alert">
            Confirm Password Tidak Cocok.
        <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button></div>');
        redirect('C_admin/register');
      }elseif ($this->db->query("select * from users where username='".$username."'")->num_rows()!=0) {
        $this->session->set_flashdata('msg','<div class="alert alert-dismissable bg-red" role="alert">
            Username Sudah Terdaftar!
        <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button></div>');
        redirect('C_admin/register');
      }
        $data = array
                (
                  'username'=>$username,
                  'firstname'=>$firstname,
                  'lastname'=>$lastname,
                  'email'=>$email,
                  'password'=>md5($password),
                  'level'=>2,
                );
        $this->db->insert('users', $data);
        $this->session->set_flashdata('msg','<div class="alert alert-dismissable bg-green" role="alert">
            Anda Berhasil Register !
        <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button></div>');
        redirect('C_admin/index');
    }

  public function listkeyword(){
    $this->session_cek();
    $list=$this->db->query("select * from materi ORDER BY kata_kunci ASC");

    $data = array(
          'template' => 'admin/listkeyword',
          'list' => $list->result(),
          'count' => $list->num_rows()
          );
    $this->load->view('admin/listkeyword',$data);
  }


  public function detail_kamus($id)
  {
    $this->session_cek();
    $list=$this->db->query("select * from materi where id=$id ")->row();
    $list_komentar=$this->db->query("select komentar,firstname, tanggal_komentar,komentar.id from komentar join users on users.id = komentar.id_user where id_materi=$id ")->result_array();
    $data= array(
      'template' => 'admin/listkeyword_detail',
      'list' => $list ,
      'id' => $id ,
      'list_komentar' => $list_komentar 
    
    );

    $this->load->view('template/layout',$data);
  }

  public function profile(){
    $this->session_cek();
    $id=$this->session->userdata('id');
    $data = array(
          'template' => 'admin/profile',
          'list'=>$this->db->query("select * from users where id=$id ")->row()
          );
    $this->load->view('template/layout',$data);
  }
  public function add_user(){
    $data = array(
          'template' => 'admin/tambahuser'
          );
    $this->load->view('template/layout',$data);
  }

  public function listuser(){
    $this->session_cek();
    $list=$this->db->query("select * from users ORDER BY username ASC")->result();

    $data = array(
          'list' => $list
          );
    $this->load->view('admin/listuser',$data);
  }


  public function detail_user($id)
  {
    $this->session_cek();
    $list=$this->db->query("select * from users where id=$id ")->row();

    $data= array(
      'template' => 'admin/listuser_detail',
      'list' => $list ,
    );
    $this->load->view('template/layout',$data);
  }

    function session_cek()
    {

      if ($this->session->userdata('id')) {
      }else{            
          $this->session->set_flashdata('msg','<div class="alert alert-dismissable bg-red" role="alert">
                Anda Belum Login!
            <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button></div>');
            redirect('C_admin/index');
      
      };

    }


  public function delete_kamus($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('materi');

          $this->session->set_flashdata('msg','<div class="alert alert-dismissable bg-green" role="alert">
                Keyword Berhasil Dihapus !
            <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button></div>');
            redirect('C_admin/listkeyword');
  }


  public function delete_user($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('users');

          $this->session->set_flashdata('msg','<div class="alert alert-dismissable bg-green" role="alert">
                User Berhasil Dihapus !
            <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button></div>');
            redirect('C_admin/listuser');
  }

  public function simpan_komentar($id) {
      $komentar = $this->input->post('komentar');
      $id_user=$this->session->userdata('id');
      $data = array(
          // komentar
      'id_materi' => $id,
            'komentar' => $komentar,
            'id_user' =>  $id_user,
            'tanggal_komentar' => date("Y-m-d h:i:sa")
            );
      $this->TbMateri_model->savekomentar($data);

      redirect('C_index/detail_kamus/'.$id);
    }

 public function balas_komentar($id) {
      $komentar = $this->input->post('komentar');
      $id_user=$this->session->userdata('id');
      $data = array(
          // balas komentar
      'id_materi' => $id,
            'komentar' => $komentar,
            'id_user' =>  $id_user,
            'tanggal_komentar' => date("Y-m-d h:i:sa")
            );
      $this->TbMateri_model->savekomentar($data);

      redirect('C_admin/detail_kamus/'.$id);
    }

      public function hapus_komentar($id,$id_materi)
  {
    $this->db->where('id', $id);
    $this->db->delete('komentar');

          $this->session->set_flashdata('msg','<div class="alert alert-dismissable bg-green" role="alert">
                Komentar Berhasil Dihapus !
            <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button></div>');
            redirect('C_admin/detail_kamus/'.$id_materi);
  }
public function listkomentar(){
    $this->session_cek();
    $list=$this->db->query("select * from users ORDER BY username ASC")->result();

    $data = array(
          'list' => $list
          );
    $this->load->view('admin/listkomentar',$data);
  }
}
