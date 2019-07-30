<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $language;
	public function __construct()
	{
		parent::__construct();
		$this->language = $this->session->userdata('lang')??"hindi";
		$this->lang->load('message',$this->language);
	}

	/*public function checkUserSession()
	{
		$user_type = $this->session->userdata('user_type');
		if (empty($user_type)) {
			redirect(base_url(),'refresh');
		}
	}*/

	public function loadSuperadminPage($pagename='',$head_title='',$data=array())
	{
		$this->load->helper('superadmin_html');
		$data['head_title'] = $head_title;
		$this->load->view('superadmin/superadmin-header',$data);
		$this->load->view('superadmin/superadmin-sidebar',$data);
		$this->load->view($pagename,$data);
		$this->load->view('superadmin/superadmin-footer',$data);
	}

	public function loadMemberPage($pagename='',$head_title='',$data=array())
	{
		$data['head_title'] = $head_title;
		$this->load->view('member/member-header',$data);
		$this->load->view('member/member-sidebar',$data);
		$this->load->view($pagename,$data);
		$this->load->view('member/member-footer',$data);
	}

	public function updateLang()
	{
		$this->session->set_userdata("lang",$_POST['language']);
		echo 1;die;
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */