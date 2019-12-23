<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	private $errmsg = "";

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		// $parameters['select'] = 'fullname,username';
		// $parameters['search_like'] = 'da';
		// $parameters['column_order'] = array('fullname','username');
		// $data = getrow('tbl_users',$parameters,'array',true);
		// json($data,false);
		$data["title"] ="Admin Dashboard";
		$data["pagename"] ="dashboard";
		$data["active_users"] =$this->get_all_users();
		$data["allfiles"] =$this->get_all_files();
		$data["alldownloads"] =$this->get_download_logs(true);
		$this->load_page("index", $data, "admin_footer");
	}

	public function manageusers (){
		$data["title"] ="Manage Users";
		$data["pagename"] ="manageusers";
		$data["active_users"] =$this->get_all_users();
		$this->load_page("manageusers", $data, "footer_manageuser");
	}

	public function managefiles (){
		$data["title"] ="Manage Files";
		$data["pagename"] ="managefiles";
		$data["files"] = $this->get_all_files();
		$this->load_page("managefiles", $data, "footer_managefiles");
	}

	public function logs (){
		$data["title"] ="Download Logs";
		$data["pagename"] ="downloadlogs";
		$data["logs"] = $this->get_download_logs();
		$this->load_page("logs", $data, "footer_logs");
	}

	public function profile (){
		$data["title"] ="Admin Profile";
		$data["pagename"] ="profile";
		$this->load_page("profile", $data, "footer_profile");
	}

	// files
	public function upload_file() {
				$param = array(
					'select'=> '*',
					'where' => array('file_name'=>$_FILES['file_upload']['name']),
				);
			   $res =  $this->MY_Model->getRows("tbl_files", $param);	
			   if(!empty($res)){
					$resmsg=array("err"=>true, "msg"=>"This file is already uploaded!");
					$this->session->set_flashdata('res_err',$resmsg);
			   }else{
					$config['upload_path'] = './assets/uploads/';
					$config['allowed_types'] = 'gif|jpg|png|pdf|txt|docx';
					// $config['max_size'] = 2000;
					// $config['max_width'] = 1500;
					// $config['max_height'] = 1500;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('file_upload')) {
						$resmsg=array("err"=>true, "msg"=>$this->upload->display_errors());
						$this->session->set_flashdata('res_err',$resmsg);
					} else {
							$file = array(
								'file_name' => $this->upload->data('file_name'),
								'user_id' => $this->session->userdata("user_id"),
								'uploaded_date' => date("Y-m-d H:i:s"),
								'file_status' => 1,
							);
							$res=$this->MY_Model->insert('tbl_files',$file);
							if($res){
								$this->errmsg = "";
								$resmsg=array("err"=>false, "msg"=>"Uploaded Successfully!");
								$this->session->set_flashdata('res_err',$resmsg);
							}	
					}
			   }
			   redirect(base_url("admin/managefiles"));	
	}
	// users
	public function save_user(){
		$post = $this->input->post();
		if($this->validated_user($post)){
			if(!empty($post)){
				$userdata = array(
					'first_name' =>$post["first_name"],
					'last_name' =>$post["last_name"],
					'username' =>$post["username"],
					'password' =>$post["password"],
					'user_type' =>2,
					'user_status' =>1,
					'is_logged' =>0,
				);
				$res=$this->MY_Model->insert("tbl_users", $userdata);
				if($res){
					$userdata = array(
						"user_id" => $res,
						"email" => $post["email"],
						"address" => $post["address"],
						"gender" => $post["gender"],
					);
					$res=$this->MY_Model->insert("tbl_user_details", $userdata);
					if($res){
						$this->errmsg = "";
						$resmsg=array("err"=>false, "msg"=>"Added Successfully!");
						$this->session->set_flashdata('res_err',$resmsg);
					}
				}
			}
		}else{
			$resmsg=array("err"=>true, "msg"=>$this->errmsg);
			$this->session->set_flashdata('res_err',$resmsg);
		}
		redirect(base_url("admin/manageusers"));		
	}

	public function update_user(){
		$post = $this->input->post();
		
		if($this->validated_user($post, "update")){
			if(!empty($post)){
				$set = array(
					'first_name' =>$post["first_name"],
					'last_name' =>$post["last_name"],
					'username' =>$post["username"],
					'password' =>$post["password"],
				);
				$where = array("user_id" =>$post["user_id"] );
				$res = $this->MY_Model->update("tbl_users", $set, $where);
				if($res){
					$set = array(
						"email" => $post["email"],
						"address" => $post["address"],
						"gender" => $post["gender"],
					);
					$res=$this->MY_Model->update("tbl_user_details", $set, $where);
					if($res){
						$this->errmsg = "";
						$resmsg=array("err"=>false, "msg"=>"Updated Successfully!");
						$this->session->set_flashdata('res_err',$resmsg);

						if(!empty($post["is_admin"])){
							$userdata = array(
								"user_id" => $post["user_id"],
								"username" => $post["username"],
								"first_name" => $post["first_name"],
								"last_name" => $post["last_name"],
								"gender" => $post["gender"],
								"user_type" => 1,
								"user_status" =>1,
								"password" =>$post["password"],
								"email" => $post["email"],
								"address" =>$post["address"],
								"logged_in" => 1
							);
							$this->session->set_userdata($userdata);
						}

					}else{
						$resmsg=array("err"=>true, "msg"=>"Updating user failed!");
						$this->session->set_flashdata('res_err',$resmsg);
					}
				}
			}
		}else{
			$resmsg=array("err"=>true, "msg"=>$this->errmsg);
			$this->session->set_flashdata('res_err',$resmsg);
		}
		redirect(base_url("admin/manageusers"));	
	}

	// API functions 
	public function delete_user (){
		$user_id = $this->input->post("user_id");
		if(!empty($user_id)){
			$response = [];
			$set= array( "user_status" => 0 );
			$where= array( "user_id" => $user_id );
			$res =  $this->MY_Model->update("tbl_users", $set, $where);
			if($res){
				$response = array( "code" => 200, "message" => "success", "data" => $this->get_all_users() );
			}else{
				$response = array( "code" => 204, "message" => "failed", "data" => [] );
			}
			echo json_encode($response);
		}
	}

	public function delete_file (){
		$file_id = $this->input->post("file_id");
		if(!empty($file_id)){
			$response = [];
			$set= array( "file_status" => 0 );
			$where= array( "file_id" => $file_id );
			$res =  $this->MY_Model->update("tbl_files", $set, $where);
			if($res){
				$response = array( "code" => 200, "message" => "success", "data" => $this->get_all_files() );
			}else{
				$response = array( "code" => 204, "message" => "failed", "data" => [] );
			}
			echo json_encode($response);
		}
	}

	public function delete_log (){
		$log_id = $this->input->post("log_id");
		if(!empty($log_id)){
			$response = [];
			$set= array( "log_status" => 0 );
			$where= array( "log_id" => $log_id );
			$res =  $this->MY_Model->update("tbl_download_logs", $set, $where);
			if($res){
				$response = array( "code" => 200, "message" => "success", "data" => $this->get_download_logs() );
			}else{
				$response = array( "code" => 204, "message" => "failed", "data" => [] );
			}
			echo json_encode($response);
		}
	}

	// private functions
	private function get_all_users (){
		$param["select"]="*";
		$param["where"]=array("user_status"=>1 );
		$param["join"]=array("tbl_user_details"=> "tbl_users.user_id = tbl_user_details.user_id" );
		$res =  $this->MY_Model->getRows("tbl_users", $param);
		return $res;
	}

	private function get_all_files (){
		$param["select"]="file_name, uploaded_date, tbl_users.user_id, file_id, tbl_users.first_name";
		$param["where"]=array("file_status"=>1 );
		$param["join"]=array("tbl_users"=> "tbl_users.user_id = tbl_files.user_id" );
		$res =  $this->MY_Model->getRows("tbl_files", $param);
		return $res;
	}

	private function get_download_logs ($all = false){
		$param["select"]="*";
		if(!$all){
			$param["where"]=array("log_status"=>1 );
		}
		$param["join"]=array("tbl_files"=> "tbl_files.file_id = tbl_download_logs.file_id" );
		$res =  $this->MY_Model->getRows("tbl_download_logs", $param);
		if($res){
			$c = 0;
			foreach ($res as $r) {
				
				$param["select"]="first_name, last_name";
				$param["where"]=array("user_id"=> $r["download_user_id"]);
				$param["join"] =[];
				$res2 =  $this->MY_Model->getRows("tbl_users", $param);
				if($res2){
					$res[$c] = $res[$c] + $res2[0];
				}
				$c++;
			}
		}
		return $res;
	}

	private function validated_user($user, $opt = ""){
		$param["select"]="tbl_users.user_id";
		if(empty($opt)){
			$param["where"]=array( "first_name"=> $user["first_name"], "last_name"=> $user["last_name"] );
			$res =  $this->MY_Model->getRows("tbl_users", $param);
			if($res){
				$this->errmsg = "This fullname is already exists!";
				return false;
			}
			$param["where"]=array( "username"=> $user["username"], "password"=> $user["password"] );
			$param["or_where"]=array( "email"=> $user["email"] );
		}else{
			$param["where"]=array( "username"=> $user["username"], "password"=> $user["password"], "tbl_users.user_id !="=> $user["user_id"] );
			$res =  $this->MY_Model->getRows("tbl_users", $param);
			if($res){
				$this->errmsg = "username and password is already exists;";
				return false;
			}
			$param["where"]=array( "email"=> $user["email"],  "tbl_users.user_id !="=> $user["user_id"] );
			
		}
		$param["join"]=array("tbl_user_details"=> "tbl_users.user_id = tbl_user_details.user_id");
		$res =  $this->MY_Model->getRows("tbl_users", $param);
		if($res){
			$this->errmsg = "Email / username and password is already exists;";
			return false;
		}
		return true;
	}


	public function get_chart_data (){
		$months = array('1', '2', '3', '4', '5', 
		 '6', '7', '8', '9', '10', '11', '12'); 
		$curYear = date("Y");

		$downloadData = [];
		
		foreach ($months as $month) {
			$params["select"] = "download_user_id, download_date";
			$params["where"] = array("MONTH(download_date)" => $month, "YEAR(download_date)" =>$curYear );
			$resMonth =  $this->MY_Model->getRows("tbl_download_logs", $params);
			if(!empty($resMonth)){
				array_push($downloadData, count($resMonth));
			}else{
				array_push($downloadData, 0);
			}	
		}
		echo '<pre>';
		print_r($downloadData);
		echo '</pre>';

		$data["max"] = max($downloadData);
		$data["max"] = max($downloadData);
		echo array_search(max($downloadData), $downloadData);


	}

	
}
?>
