<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo "Admin Login";
	}

}

/* End of file Admin.php */
/* Location: ./application/modules/admin/controllers/Admin.php */