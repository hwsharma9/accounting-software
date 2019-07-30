<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Superadmin {

	public function __construct()
	{
		parent::__construct();
		$this->checkAdminSession();
		$this->load->model('report_model','report');
		(foption("sidebar","reports") && authenticate("2"))?'':redirect(base_url(),'refresh');
	}

	public function checkAdminSession()
	{
		$user_type = $this->session->userdata('user_type');
		if (empty($user_type)) {
			redirect(base_url(),'refresh');
		}
	}

	public function index()
	{
		echo basename(__FILE__,".php")." Controller";
	}

	public function reportSearchPage()
	{
		(foption("sidebar","collectionreports") && authenticate("2_0"))?'':redirect(base_url(),'refresh');
		$result = array();
		if (isset($_GET) && $_GET) $result = $this->report->reportSearch($_GET);
		$this->loadSuperadminPage('report-search-page','Report Search Page',compact('result'));
	}

}

/* End of file Report.php */
/* Location: ./application/modules/report/controllers/Report.php */