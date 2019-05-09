<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Upload_img extends CI_Controller {
        var $gallery_path;
        var $gallery_path_url;
        public function __construct() {
             parent::__construct();
             $this->gallery_path = realpath(APPPATH . '../assets/images/');
             $this->gallery_path_url = base_url() . 'assets/images/';

$this->load->helper(array('url','html','form'));

 }

function index()
{
  $this->load->view('upload');
}



 public function upload() {
    $kata_kunci=$this->input->post('kata_kunci');
    $query = $this->db->query("Select * from materi where kata_kunci='".$kata_kunci."' ")->num_rows();
    if ($query!=0) 
    {
      $this->session->set_flashdata('msg', '<div class="panel alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Keyword Sudah ada, silahkan masukkan Keyword yang lain.
          </div>');
      redirect (site_url('C_admin/addkeyword'));
    }

    if($this->input->post('upload')) 
      {
        $config = array(
          'allowed_types' => 'jpg|jpeg|gif|png',
          'upload_path' => $this->gallery_path,
          'max_size' => 99999,
          'file_name' => url_title($this->input->post('file_upload'))
        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        if ($this->upload->file_name=="") 
        {
          $data=array(
            'kata_kunci' => $this->input->post('kata_kunci'),
            'arti' => $this->input->post('arti'),
            'syntax' => $this->input->post('syntax'),
            'required' => $this->input->post('required'),
            'tanggal' => date("Y-m-d h:i:sa")
          );
          $this->db->insert('materi', $data);
          $this->session->set_flashdata('msg', '<div class="panel alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Keyword '.$kata_kunci.' Berhasi Di Ditambahkan !
          </div>');
          redirect (site_url('C_admin/addkeyword'));
        }
        $kode=$this->session->userdata('username');
        $data=array(
          'kata_kunci' => $this->input->post('kata_kunci'),
          'arti' => $this->input->post('arti'),
          'syntax' => $this->input->post('syntax'),
          'required' => $this->input->post('required'),
          'gambar' => $this->upload->file_name,
          'tanggal' => date("Y-m-d h:i:sa")
        );
        $this->db->insert('materi', $data);
        $this->session->set_flashdata('msg', '<div class="panel alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Keyword '.$kata_kunci.' Berhasi Di Tambahkan !
        </div>');
        redirect (site_url('C_admin/addkeyword'));

      }
      else
      {
        $this->session->set_flashdata('msg', '<div class="panel alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Foto Gagal Di Unggah ! '.$this->upload->display_errors().'
          </div>');
        redirect (site_url('C_admin/addkeyword'));
      }

    }



public function update_keyword() {
    $id=$this->input->post('id');
    $kata_kunci=$this->input->post('kata_kunci');
    $query = $this->db->query("Select * from materi where kata_kunci='".$kata_kunci."' and id!=$id ")->num_rows();
    
    if ($query!=0) {
      $this->session->set_flashdata('msg', '<div class="panel alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Keyword Sudah ada, silahkan masukkan Keyword yang lain.
          </div>');
          redirect (site_url('C_admin/detail_kamus/'.$id));
    }

    if($this->input->post('upload')) {
      $config = array(
        'allowed_types' => 'jpg|jpeg|gif|png',
        'upload_path' => $this->gallery_path,
        'max_size' => 99999,
        'file_name' => url_title($this->input->post('file_upload'))
      );
      $this->load->library('upload', $config);
      $this->upload->do_upload();
      if ($this->upload->file_name=="") {

      $data=array(
        'kata_kunci' => $this->input->post('kata_kunci'),
        'arti' => $this->input->post('arti'),
        'syntax' => $this->input->post('syntax'),
        'required' => $this->input->post('required')
      );
      $this->db->where('id',$id);
      $this->db->update('materi', $data);
      $this->session->set_flashdata('msg', '<div class="panel alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Keyword '.$kata_kunci.' Data Berhasil Di Update !
        </div>');
          redirect (site_url('C_admin/detail_kamus/'.$id));
        }
      $data=array(
        'kata_kunci' => $this->input->post('kata_kunci'),
        'arti' => $this->input->post('arti'),
        'syntax' => $this->input->post('syntax'),
        'required' => $this->input->post('required'),
        'gambar' => $this->upload->file_name,
      );
      $this->db->where('id',$id);
      $this->db->update('materi', $data);
      $this->session->set_flashdata('msg', '<div class="panel alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Keyword '.$kata_kunci.' Berhasi Di Unggah !
        </div>');
          redirect (site_url('C_admin/detail_kamus/'.$id));

      }
      else
      {
        $this->session->set_flashdata('msg', '<div class="panel alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Foto Gagal Di Unggah ! '.$this->upload->display_errors().'
          </div>');
          redirect (site_url('C_admin/detail_kamus/'.$id));
      }

    }

 public function add_user() {

      $username         = $this->input->post('username');
      $firstname        = $this->input->post('firstname');
      $lastname         = $this->input->post('lastname');
      $email            = $this->input->post('email');
      $password         = $this->input->post('password');
      $confirm_password = $this->input->post('confirm_password');
      $level            = $this->input->post('level');

// print_r($username.' - '.$firstname.' - '.$lastname.' - '.$email.' - '.$password.' - '.$confirm_password.' - '.$level);exit();
      if ($confirm_password!=$password) {
        $this->session->set_flashdata('msg','<div class="alert alert-dismissable bg-red" role="alert">
            Confirm Password Tidak Cocok.
        <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button></div>');
        redirect('C_admin/add_user');
      }elseif ($this->db->query("select * from users where username='".$username."'")->num_rows()!=0) {
        $this->session->set_flashdata('msg','<div class="alert alert-dismissable bg-red" role="alert">
            Username Sudah Terdaftar!
        <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button></div>');
        redirect('C_admin/add_user');
      } 

      // print_r($username.' - '.$firstname.' - '.$lastname.' - '.$email.' - '.$password.' - '.$confirm_password.' - '.$level);exit();
      //var_dump($this->input->post('upload'));exit;
       if($this->input->post('upload')) 
      {
        $config = array(
          'allowed_types' => 'jpg|jpeg|gif|png',
          'upload_path' => $this->gallery_path,
          'max_size' => 99999,
          'file_name' => url_title($this->input->post('file_upload'))
        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $data=array(
                  'username'=>$username,
                  'firstname'=>$firstname,
                  'lastname'=>$lastname,
                  'email'=>$email,
                  'password'=>md5($password),
                  'level'=>$level,
                  'foto' => $this->upload->file_name,
        );
        $this->db->insert('users', $data);
        $this->session->set_flashdata('msg', '<div class="panel alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Data User '.$username.' Berhasi Di Tambahkan !
        </div>');
        redirect (site_url('C_admin/add_user'));
      }
      else
      {
        $this->session->set_flashdata('msg', '<div class="panel alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Foto Gagal Di Unggah ! '.$this->upload->display_errors().'
          </div>');
        redirect (site_url('C_admin/add_user'));
      }
        

    }



public function update_profile() {
    $id       =$this->input->post('id');
    $firstname =$this->input->post('firstname');
    $lastname =$this->input->post('lastname');
    $alamat =$this->input->post('alamat');
    $jurusan =$this->input->post('jurusan');
    $fakultas =$this->input->post('fakultas');
    $universitas =$this->input->post('universitas');
    $angkatan =$this->input->post('angkatan');

    if($this->input->post('upload')) {
      $config = array(
        'allowed_types' => 'jpg|jpeg|gif|png',
        'upload_path' => $this->gallery_path,
        'max_size' => 99999,
        'file_name' => url_title($this->input->post('file_upload'))
      );
      $this->load->library('upload', $config);
      $this->upload->do_upload();
      if ($this->upload->file_name=="") {

        $data=array(
          'firstname' => $firstname,
          'lastname' => $lastname,
          'alamat' => $alamat,
          'jurusan' => $jurusan,
          'fakultas' => $fakultas,
          'universitas' => $universitas,
          'angkatan' => $angkatan,
        ); 
        $this->db->where('id',$id);
        $this->db->update('users', $data);
        $this->session->set_flashdata('msg', '<div class="panel alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          User '.$username.' Data Berhasil Di Update !
          </div>');
            redirect (site_url('C_admin/detail_user/'.$id));

        }

        $data=array(
          'firstname' => $firstname,
          'lastname' => $lastname,
          'alamat' => $alamat,
          'jurusan' => $jurusan,
          'fakultas' => $fakultas,
          'universitas' => $universitas,
          'angkatan' => $angkatan,
          'foto' => $this->upload->file_name,
        ); 
      $this->db->where('id',$id);
      $this->db->update('users', $data);
      $this->session->set_flashdata('msg', '<div class="panel alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          User '.$username.' Data Berhasil Di Update !
        </div>');
          redirect (site_url('C_admin/detail_user/'.$id));

      }
      else
      {
        $this->session->set_flashdata('msg', '<div class="panel alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Foto Gagal Di Unggah ! '.$this->upload->display_errors().'
          </div>');
          redirect (site_url('C_admin/detail_user/'.$id));
      }
          $this->session->set_flashdata('msg', '<div class="panel alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Data User '.$username.' berhasil di ubah!
          </div>');
          redirect (site_url('C_admin/detail_user/'.$id));

    }



public function update_user() {
    $id               =$this->input->post('id');
    $username         =$this->input->post('username');
    $email            =$this->input->post('email');
    $password         =$this->input->post('password');
    $confirm_password =$this->input->post('confirm_password');
    $level            =$this->input->post('level');

    $query = $this->db->query("Select * from users where username='".$username."' and id!=$id ")->num_rows();
    
    if ($query!=0) {
      $this->session->set_flashdata('msg', '<div class="panel alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Username Sudah ada, silahkan masukkan username yang lain.
          </div>');
          redirect (site_url('C_admin/detail_user/'.$id));
    }
    if ($confirm_password!=$password) {
        $this->session->set_flashdata('msg','<div class="alert alert-dismissable bg-red" role="alert">
            Confirm Password Tidak Cocok.
        <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button></div>');
        redirect('C_admin/detail_user/'.$id);
      }
    if ($password=="xxxxxxxx") {

        $data=array(
          'username' => $username,
          'email' => $email,
          'level' => $level,
        ); 
        $this->db->where('id',$id);
        $this->db->update('users', $data);
        $this->session->set_flashdata('msg', '<div class="panel alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          User '.$username.' Data Berhasil Di Update !
          </div>');
            redirect (site_url('C_admin/detail_user/'.$id));
      }else{

        $data=array(
          'username'  => $username,
          'email'     => $email,
          'password'  => md5($password),
          'level'     => $level,
        ); 
        $this->db->where('id',$id);
        $this->db->update('users', $data);
        $this->session->set_flashdata('msg', '<div class="panel alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          User '.$username.' Data Berhasil Di Update !
          </div>');
            redirect (site_url('C_admin/detail_user/'.$id));
      }


    }


public function delete_gambar($id)
{
        $data = array('gambar' =>' ');
        $this->db->where('id',$id);
        $this->db->update('materi', $data);
        $this->session->set_flashdata('msg', '<div class="panel alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Gambar Berhasi Di Delete !
        </div>');
        redirect (site_url('C_admin/detail_kamus/'.$id));

}
        


}