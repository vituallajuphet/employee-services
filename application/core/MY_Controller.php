<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public function __construct(){
		$route = $this->router->fetch_class();
		if($route == 'login'){
			if($this->session->has_userdata('logged_in')){
	
				if($this->session->userdata('user_type') == 1){
					redirect(base_url("admin"));
				}else{
					redirect(base_url("employee"));
				}
			}
		} else {
			if(!$this->session->has_userdata('logged_in')){
				redirect(base_url('login'));
			}else{
				if($route == "admin" && $this->session->userdata('user_type')  == 2 ){
					redirect(base_url("employee"));
				}
				else if($route == "employee" && $this->session->userdata('user_type')  == 1 ){
					redirect(base_url("admin"));
				}
			}
		}
	}

	public function load_page($page, $data = array(), $footer){
		$this->load->view('includes/head',$data);
		$this->load->view('includes/admin/header',$data);
		$this->load->view('includes/admin/sidebar',$data);
      	$this->load->view($page,$data);
      	$this->load->view($footer,$data);
 
	 }
	 public function load_employee_page($page, $data = array(), $footer){
		$this->load->view('includes/head',$data);
		$this->load->view('includes/admin/header',$data);
		$this->load->view('includes/employee/sidebar',$data);
      	$this->load->view($page,$data);
      	$this->load->view($footer,$data);
 
	 }
	 
	public function load_login_page($page, $data = array()){
      	$this->load->view('includes/login_head',$data);
      	$this->load->view($page,$data);
      	$this->load->view('includes/login_footer',$data);
    }

}
