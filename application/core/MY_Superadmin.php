<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Superadmin extends MY_Controller {

	public $jsonpath;
	public function __construct()
	{
		parent::__construct();
		$this->checkAdminSession();
        $uri = $this->uri->segment(1);
        $this->jsonpath = APPPATH."modules/dynamic/views/json/";
		$this->user_type = $this->session->userdata('user_type');        
        // echo $this->jsonpath;
	}

	public function checkAdminSession()
	{
		$user_type = $this->session->userdata('user_type');
		if (empty($user_type)) {
			redirect(base_url(),'refresh');
		}
	}

}

/* End of file MY_Superadmin.php */
/* Location: ./application/core/MY_Superadmin.php */