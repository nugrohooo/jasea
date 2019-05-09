<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_index extends CI_Controller {

	public function index()
	{
		// $data
		$this->load->view('pages/index');
	}
	public function about()
	{
		// $data
		$this->load->view('pages/tentang');
	}
	public function information()
	{
		$this->load->view('pages/petunjuk');
	}
	public function listkamus()
	{
        $this->load->model('TbMateri_model');
        // // init params
        // $params = array();
        // $limit_per_page = 5;
        // $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        // $total_records = $this->TbMateri_model->get_total();

        // if ($total_records > 0)
        // {
        //     // get current page records
        //     $params["results"] = $this->TbMateri_model->get_current_page_records($limit_per_page, $page*$limit_per_page);

        //     $config['base_url'] = site_url() . '/C_index/listkamus';
        //     $config['total_rows'] = $total_records;
        //     $config['per_page'] = $limit_per_page;
        //     $config["uri_segment"] = 3;

        //     // custom paging configuration
        //     $config['num_links'] = 2;
        //     $config['use_page_numbers'] = TRUE;
        //     $config['reuse_query_string'] = TRUE;

        //     $config['full_tag_open'] = '<div class="pagination">';
        //     $config['full_tag_close'] = '</div>';

        //     $config['first_link'] = '<i class="fa fa-fw fa-angle-double-left"></i>';
        //     $config['first_tag_open'] = '<span class="firstlink">';
        //     $config['first_tag_close'] = '</span>';

        //     $config['last_link'] = '<i class="fa fa-fw fa-angle-double-right"></i>';
        //     $config['last_tag_open'] = '<span class="lastlink">';
        //     $config['last_tag_close'] = '</span>';

        //     $config['next_link'] = '<i class="fa fa-fw fa-angle-right"></i>';
        //     $config['next_tag_open'] = '<span class="nextlink">';
        //     $config['next_tag_close'] = '</span>';

        //     $config['prev_link'] = '<i class="fa fa-fw fa-angle-left"></i>';
        //     $config['prev_tag_open'] = '<span class="prevlink">';
        //     $config['prev_tag_close'] = '</span>';

        //     $config['cur_tag_open'] = '<span class="curlink">';
        //     $config['cur_tag_close'] = '</span>';

        //     $config['num_tag_open'] = '<span class="numlink">';
        //     $config['num_tag_close'] = '</span>';

        //     $this->pagination->initialize($config);

        //     // build paging links
        //     $params["links"] = $this->pagination->create_links();
        // }

        // $this->load->view('pages/daftarkamus', $params);
	$list=$this->db->query("select id,kata_kunci from materi ORDER BY kata_kunci ASC")->result();
	$data= array('list' => $list );
	$this->load->view('pages/daftarkamus',$data);

    }

	// public function cari_data_all_string()
	// {
	// 	$kata_kunci=$this->input->post('kata_kunci');

	// 	$searchTerms = explode(' ', $kata_kunci);
	// 	$searchTermBits = array();
	// 	foreach ($searchTerms as $term) {
	// 	    $term = trim($term);
	// 	    if (!empty($term)) {
	// 	        $searchTermBits[] = "kata_kunci LIKE '%$term%'";
	// 	    }
	// 	}

	// 	$result = $this->db->query("SELECT * FROM kamus WHERE ".implode(' or ', $searchTermBits))->result();
	// 	//$result=$this->db->query("select * from kamus where kata_kunci like '%".$kata_kunci."%' ")->result();
	// 	$data=array(
	// 		'data' => $result
	// 		);
	// 	$this->load->view('pages/search_result',$data);
	// }

	public function detail_kamus($id)
	{
		$list=$this->db->query("select * from materi where id=$id ")->row();
		$list_komentar=$this->db->query("select komentar,firstname, tanggal_komentar from komentar join users on users.id = komentar.id_user where id_materi=$id ")->result_array();

		$detail= array(
			'list' => $list ,
			 'id_materi' => $id ,
			 "list_komentar" =>$list_komentar,
			'new_desc' => $this->find_link2($list->kata_kunci),
			'similiar'=> $this->similiar_key($list->kata_kunci,2,$id)
		);
		$this->load->view('pages/detail_materi',$detail);
	}

	public function cari_data_by_kata_fix()
	{
		$kata_kunci=$this->input->post('kata_kunci');
		$search = array('dan', 'atau', 'and', 'or','!','~','*','%','^','&','*','(',')','_','+','-','=','{','}','[',']','|',';',':','..','/','<','>','?','$','`',',','\/');
		$kata_kunci=$this->input->post('kata_kunci');
		$newstr = str_replace($search, '' , $kata_kunci);

		$searchTerms = explode(' ', $newstr);
		$searchTermBits = array();
		foreach ($searchTerms as $term) {
		    $term = trim($term);
		    if (!empty($term)) {
		        // $searchTermBits[] = "kata_kunci REGEXP '(^| )$term( |$)'";
		        $searchSyntak[] = "syntax like '%$term%'";
		        $searchTermBits[] = "kata_kunci like '%$term%'";
		    } else{
		        $searchSyntak[] = "syntax ='~!@#$'";
		        $searchTermBits[] = "kata_kunci ='~!@#$'";
		    }
		}

		$result = $this->db->query("SELECT * FROM materi WHERE ".implode(' or ', $searchTermBits). "OR ".implode(' or ', $searchSyntak))->result();
		$data=array(
			'data' => $result,
			'kata_kunci'=> $kata_kunci
			);
		$this->load->view('pages/search_result',$data);
	}

	public function find_link2($data)
	{
		$kata_kunci=$this->db->query("SELECT id,kata_kunci FROM materi");
		$arti=$this->db->query("SELECT arti FROM materi where kata_kunci='".$data."' " );
		$new_desc=strtolower($arti->row()->arti);

				foreach ($kata_kunci->result() as $key1 => $key_1 ) {
				$new_desc=str_replace(strtolower($key_1->kata_kunci),'<a style="color:blue;text-decoration: underline" href="'.site_url('C_index/detail_kamus/'.$key_1->id).'" >'.$key_1->kata_kunci.'</a>',strtolower($new_desc));

				}
				return $new_desc;
	}

	public function similiar_key($data,$kondisi,$id)
	{
		$data_low=strtolower($data);
		$search = array('dan', 'atau', 'and', 'or','!','~','*','%','^','&','*','(',')','_','+','-','=','{','}','[',']','|',';',':','.','/','<','>','?','$','`',',','\/');
		$kata_kunci=$this->input->post('kata_kunci');
		$newstr = str_replace($search, '' , $data_low);
		$similiar_key = explode(' ', $newstr);
		foreach ($similiar_key as $key => $value) {
			$term = trim($value);
		    if (!empty($term)) {

		    	if ($kondisi==1) {

		       		$searchTermBits[] = "kata_kunci like '%$term%' ";
		    	}
					else{
					$term = preg_replace('/[^a-zA-Z0-9\']/','', $term);
		        	$searchTermBits[] = "kata_kunci REGEXP '(^| )$term( |$)'";
		    	}

		    } else{
		        $searchTermBits[] = "kata_kunci ='~!@#$'";
		    }
		}
		$find_key=implode(' or ', $searchTermBits);
		$result = $this->db->query("SELECT id,kata_kunci FROM materi WHERE (".$find_key.") and id !=$id" )->result();
		return $result;
		// echo "Similiar with $data : <br>";
		// foreach ($result as $key => $value) {
		// 	echo $key.". $value->kata_kunci<br>";
		// }

	}


public function tes_input()
{
	$this->load->view('admin/tes_input');
}


public function tes()
{
	$search = array('dan', 'atau', 'and', 'or','!','~','*','%','^','&','*','(',')','_','+','-','=','{','}','[',']','|',';',':','.','/','<','>','?','$','`',',','\/');
	$kata_kunci=$this->input->post('kata_kunci');
	$newstr = str_replace($search, '' , $kata_kunci);
	echo "$newstr";
}

}
