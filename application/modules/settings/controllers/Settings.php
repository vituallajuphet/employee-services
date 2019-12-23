<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {



	public function __construct(){
		parent::__construct();
	}

	public function index(){
		// $parameters['select'] = 'fullname,username';
		// $parameters['search_like'] = 'da';
		// $parameters['column_order'] = array('fullname','username');
		// $data = getrow('tbl_users',$parameters,'array',true);
		// json($data,false);
		$data["title"] ="Settings";
		$data["pagename"] ="dashboard";
		// $this->load_page("index", $data, "admin_footer");
	}


	
}
?>
