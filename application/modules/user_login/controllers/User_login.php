<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_login_model','login');
	}

	public function checkAdminSession()
	{
		$user_type = $this->session->userdata('user_type');
		$roles = $this->common->getData("roles",array(),array("name"))->getResult();
		$roles = array_column($roles, "name");
		if (!empty($user_type)) {
			if (in_array($user_type, $roles)) {
				redirect(base_url("superadmin"),'refresh');
			}
		}
	}

	public function checkUserSession()
	{
		$member_user_type = $this->session->userdata('member_user_type');
		if (!empty($member_user_type)) {
			if ($member_user_type == "member") {
				redirect(base_url("member"),'refresh');
			}
		}
	}

	public function superadminLoginPage()
	{
		$this->checkAdminSession();
		if (isset($_POST) && $_POST) {
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$this->form_validation->set_rules('error', 'Error', 'callback_emailpassword_check');
				if ($this->form_validation->run() == TRUE) {
					$email = $this->input->post("email");
					$password = md5($this->input->post("password"));
					$data = $this->common->getData("admins AS A",array("A.email"=>$email,"A.password"=>$password),array("A.*","R.name as user_role"))->joinTable(array("roles AS R"=>"A.user_type = R.id"))->getResult(1);
					$authority = $this->db->select("permissions")->from("groups")->where_in("id",json_decode($data['group'],true))->get()->result_array();
					$this->load->helper('user_auth/auth');
					$authority = array_column($authority, "permissions");
					$permissions = array();
					if ($authority) {
						foreach ($authority as $key => $value) {
							$flatten = json_decode($value,true);
							array_push($permissions, $flatten);
						}
					}
					$permissions = merge_flatten_array($permissions);
					if ($data) {
						$array = array(
							'name' => $data['name'],
							'email' => $data['email'],
							'user_type' => $data['user_role'],
							'profile_pic' => $data['profile_pic'],
							'id' => $data['id'],
							"permissions" => json_encode($permissions)
						);
						$this->setSession($array,'superadmin');
					}
				}
			}
		}
		$this->load->view('admin-login-page');
	}

	public function memberLoginPage()
	{
		$this->checkUserSession();
		if (isset($_POST) && $_POST) {
			$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$this->form_validation->set_rules('error', 'Error', 'callback_mobilepassword_check');
				if ($this->form_validation->run() == TRUE) {
					$mobile_no = $this->input->post("mobile_no");
					$password = md5($this->input->post("password"));
					$data = $this->common->getData("member_details",array("mobile_no"=>$mobile_no,"password"=>$password))->getResult(1);
					if ($data) {
						$array = array(
							'member_name' => $data['first_name']." ".$data['last_name'],
							'member_mobile_no' => $data['mobile_no'],
							'member_user_type' => "member",
							'member_id' => $data['member_id'],
							'member_profile_pic' => $data['image_path'],
							'member_address' => $data['address'],
						);
						$this->setSession($array,'member');
					}
				}
			}
		}
		$this->load->view('member-login-page');
	}

	public function setSession($array = array(),$redirect = 'superadmin')
	{
		$this->session->set_userdata($array);
		redirect(base_url($redirect),'refresh');
	}

	public function emailpassword_check()
	{
		$email = $this->input->post("email");
		$password = md5($this->input->post("password"));
		if(isset($email) && isset($password)) {
			$data = $this->common->getData("admins",array("email"=>$email,"password"=>$password))->getResult(2);
			if($data) {
				return TRUE;
			}else{
				$this->form_validation->set_message('emailpassword_check', 'Email-id or Password Not Found!');
				return FALSE;
			}
		}
	}

	public function mobilepassword_check()
	{
		$mobile_no = $this->input->post("mobile_no");
		$password = md5($this->input->post("password"));
		if(isset($mobile_no) && isset($password)) {
			$data = $this->common->getData("members",array("mobile_no"=>$mobile_no,"password"=>$password))->getResult(2);
			if($data) {
				return TRUE;
			}else{
				$this->form_validation->set_message('mobilepassword_check', 'Mobile Number or Password Not Found!');
				return FALSE;
			}
		}
	}

	public function logout()
	{
		$segment = explode("-",$this->uri->segment(1));
		if ($segment[0] == "superadmin") {
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('user_type');
			$this->session->unset_userdata('userid');
			$this->session->unset_userdata('permissions');
			redirect(base_url("superadmin-login"),'refresh');
		}
		if ($segment[0] == "member") {
			$this->session->unset_userdata('member_name');
			$this->session->unset_userdata('member_mobile_no');
			$this->session->unset_userdata('member_user_type');
			$this->session->unset_userdata('member_id');
			redirect(base_url("member-login"),'refresh');
		}
	}

}

/* End of file Admin_login_controller.php */
/* Location: ./application/modules/admin_login/controllers/Admin_login_controller.php */