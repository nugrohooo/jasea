<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TbMateri_model extends CI_Model {
  public function savemateri($data,$table){
          $this->db->insert('materi', $data); // Untuk mengeksekusi perintah insert data
          $lastId['lastId'] = $this->db->insert_id();
          return $lastId;
     }

      public function savekomentar($data){
          $this->db->insert('komentar', $data); // Untuk mengeksekusi perintah insert data
          $lastId['lastId'] = $this->db->insert_id();
          return $lastId;
     }

	public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->order_by('kata_kunci','ASC');
        $query = $this->db->get("materi");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total() 
    {
        return $this->db->count_all("materi");
    }

    public function cek_user($data)
        {
      $query = $this->db->get_where('users', $data);
      return $query;
    }

    function insert_data($tabel,$data){
        $this->db->insert($tabel, $data);
    }


}
