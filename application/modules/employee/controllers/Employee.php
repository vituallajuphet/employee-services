<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		// $parameters['select'] = 'fullname,username';
		// $parameters['search_like'] = 'da';
		// $parameters['column_order'] = array('fullname','username');
		// $data = getrow('tbl_users',$parameters,'array',true);
		// json($data,false);
		$data["title"] ="Employee";
		$data["pagename"] ="Employee";
		$data["files"] =$this->get_all_files();
		$this->load_employee_page("index", $data, "footer_index");
	}

	public function downloads ($file_id){
		$param["select"]="file_name";
		$param["where"]=array("file_id"=> $file_id);
		$res = $this->MY_Model->getRows("tbl_files", $param);
		if($res){
			$file = base_url()."assets/uploads/".$res[0]["file_name"];
			$fdata = array(
				"download_user_id" => $this->session->userdata("user_id"),
				"download_date" => date("Y-m-d H:i:s"),
				"file_id" => $file_id,
				"log_status" => 1,
			);
		   $res = $this->MY_Model->insert("tbl_download_logs", $fdata);
		  
		   if($res){
				header("Content-Description: File Transfer"); 
				header("Content-Type: application/octet-stream"); 
				header("Content-Disposition: attachment; filename=\"". basename($file) ."\""); 
				readfile ($file);
		   }
		}
	}

	// private function
	private function get_all_files (){
		$param["select"]="file_name, uploaded_date, tbl_users.user_id, file_id, tbl_users.first_name";
		$param["where"]=array("file_status"=>1 );
		$param["join"]=array("tbl_users"=> "tbl_users.user_id = tbl_files.user_id" );
		$res =  $this->MY_Model->getRows("tbl_files", $param);
		return $res;
	}
	
}
?>
