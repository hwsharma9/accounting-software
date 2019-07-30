<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Member extends MY_Controller {

	public $jsonpath;
	public function __construct()
	{
		parent::__construct();
		$this->checkUserSession();
		$this->memberid = $this->session->userdata('member_id');
		$this->member = $this->common->getData("member_details",array("member_id"=>$this->memberid))->getResult(1);
	}

	public function checkUserSession()
	{
		$member_user_type = $this->session->userdata('member_user_type');
		if (empty($member_user_type)) {
			redirect(base_url("member-login"),'refresh');
		}
	}

}

/* End of file MY_Superadmin.php */
/* Location: ./application/core/MY_Superadmin.php */