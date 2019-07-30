<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_auth extends MY_Superadmin {

	public function __construct()
	{
		parent::__construct();
		$this->checkAdminSession();
		$this->load->helper('auth');
		$this->lang->load('user_auth_message',$this->language);
	}

	public function checkAdminSession()
	{
		$user_type = $this->session->userdata('user_type');
		if (empty($user_type)) {
			redirect(base_url(),'refresh');
		}
		if ($user_type != "Superadmin") {
			redirect(base_url(),'refresh');
		}
	}

	public function index()
	{
		redirect(base_url('user_auth/admin-list'),'refresh');
	}

	public function adminListPage()
	{
		$data['admins'] = $this->common->getData("admins")->getResult();
		$groups = $this->common->getData("groups","",array("id","name"))->getResult();
		$data['groups'] = array_column($groups, "name","id");
		$this->loadSuperadminPage("admin-list","Admin List Page",$data);
	}

	public function addAdminPage()
	{
		if (isset($_POST) && $_POST) {
			$this->form_validation->set_error_delimiters('<div style="color: #dd4b39">', '</div>');
			$this->form_validation->set_rules('name', 'Admin Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Admin Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Admin Password', 'trim|required');
			$this->form_validation->set_rules('user_type', 'Admin Type', 'trim|required');
			$this->form_validation->set_rules('group[]', 'Group', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$_POST['group'] = json_encode($_POST['group']);
				$_POST['userid'] = time();
				$_POST['text_password'] = $_POST['password'];
				$_POST['password'] = md5($_POST['text_password']);
				$_POST['created_at'] = NOW;
				$admins = $this->common->getField("admins",$_POST);
				$this->common->insertData("admins",$admins);
				$id = $this->db->insert_id();
				$upload_image = $this->common->uploadImage($_FILES,$id,"assets/admin/admin_profile_pic/0/");
				if ($upload_image) {
					$profile_pic = $upload_image['upload_data']['image_path'];
					if ($this->session->userdata('id') == $id) {
						$this->session->set_userdata("profile_pic",$_POST['profile_pic']);
					}
					$this->common->updateData("admins",array("profile_pic"=>$profile_pic),array("id"=>$id));
				}
				// echo "<pre>";
				// print_r ($_POST);
				// echo "</pre>";die;
				if ($this->db->affected_rows()) {
					$this->session->set_flashdata("message","Admin Added Successfully.");
				}else{
					$this->session->set_flashdata("message","Admin Not Added.");
				}
				redirect(base_url('user_auth/admin-list'),'refresh');
			}
		}
		$data['groups'] = $this->common->getData("groups",array(),array("id","name"))->getResult();
		$this->loadSuperadminPage("add-admin","Add Admin Page",$data);
	}

	public function getPermission()
	{
		$permissions = json_decode($this->session->userdata('permissions'),true);
		var_dump(authenticate("0_1_0"));
		echo "<pre>";
		print_r ($permissions);
		echo "</pre>";
	}

	public function editAdminPage($id='')
	{
		if (isset($_POST) && $_POST) {
			$this->form_validation->set_error_delimiters('<div style="color: #dd4b39">', '</div>');
			$this->form_validation->set_rules('name', 'Admin Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Admin Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Admin Password', 'trim|required');
			$this->form_validation->set_rules('user_type', 'Admin Type', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$_POST['group'] = json_encode($_POST['group']);
				$_POST['text_password'] = $_POST['password'];
				$_POST['password'] = md5($_POST['text_password']);
				$upload_image = $this->common->uploadImage($_FILES,$id,"assets/admin/admin_profile_pic/0/");
				if ($upload_image) {
					$_POST['profile_pic'] = $upload_image['upload_data']['image_path'];
					if ($this->session->userdata('id') == $id) {
						$this->session->set_userdata("profile_pic",$_POST['profile_pic']);
					}
				}
				$admins = $this->common->getField("admins",$_POST);
				$this->common->updateData("admins",$admins,array("id"=>$id));
				if ($this->db->affected_rows()) {
					$this->session->set_flashdata("message","Admin Updated Successfully.");
				}else{
					$this->session->set_flashdata("message","Admin Not Updated.");
				}
				redirect(base_url('user_auth/admin-list'),'refresh');
			}
		}
		$data['groups'] = $this->common->getData("groups")->getResult();
		$data['admins'] = $this->common->getData("admins",array("id"=>$id))->getResult(1);
		$this->loadSuperadminPage("edit-admin","Edit Admin Page",$data);
	}

	public function deleteAdminPic($id)
	{
		if (file_exists($_POST['image_path'])) {
			$this->common->updateData("admins",array("profile_pic"=>""),array("id"=>$id));
			if ($this->db->affected_rows()) {
				if ($this->session->userdata('id') == $id) {
					$this->session->set_userdata("profile_pic","");
				}
				unlink($_POST['image_path']);
				echo $this->db->affected_rows();
			}die;
		}
	}

	public function groupListPage()
	{
		$data['groups'] = $this->common->getData("groups")->getResult();
		$this->loadSuperadminPage("group-list","Group List Page",$data);
	}

	public function addGroupPage()
	{
		if (isset($_POST) && $_POST) {
			$this->form_validation->set_error_delimiters('<div style="color: #dd4b39">', '</div>');
			$this->form_validation->set_rules('name', 'Group Name', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$name = $_POST['name'];
				unset($_POST['name']);
				$json_data = read_file(APPPATH."modules/user_auth/views/json/borrowerlist.json",'r+');
				$json_data = json_decode($json_data,true);
				$json = $this->dynamic->updateJsonObj($_POST,$json_data);
				$json = flatten($json);
				$this->common->insertData("groups",array("name"=>$name,"permissions"=>json_encode($json)));
				if ($this->db->affected_rows()) {
					$this->session->set_flashdata("message","Group Created Successfully.");
				}else{
					$this->session->set_flashdata("message","Group Not Created.");
				}
				redirect(base_url('user_auth/group-list'),'refresh');
			}
		}
		$this->loadSuperadminPage("add-group","Add Admin Page");
	}

	public function editGroupPage($id)
	{
		if (isset($_POST) && $_POST) {
			$name = $_POST['name'];
			unset($_POST['name']);
			$json_data = read_file(APPPATH."modules/user_auth/views/json/borrowerlist.json",'r+');
			$json_data = json_decode($json_data,true);
			$json = $this->dynamic->updateJsonObj($_POST,$json_data);
			$json = flatten($json);
			$this->common->updateData("groups",array("name"=>$name,"permissions"=>json_encode($json)),array("id"=>$id));
			if ($this->db->affected_rows()) {
				$this->session->set_flashdata("message","Group Updated Successfully.");
			}else{
				$this->session->set_flashdata("emessage","Group Not Updated");
			}
			redirect(base_url('user_auth/group-list'),'refresh');
		}
		$data['groups'] = $this->common->getData("groups",array("id"=>$id))->getResult(1);
		$this->loadSuperadminPage("edit-group","Edit Group Page",$data);
	}

	public function adminRoleListPage()
	{
		if (isset($_POST) && $_POST) {
			if (empty($_POST['id'])) {
				$this->common->insertData("roles",array("name"=>$_POST['name']));
				$this->session->set_flashdata("message","Role added Successfully!");
			}else{
				$this->common->updateData("roles",array("name"=>$_POST['name']),array("id"=>$_POST['id']));
				if ($this->db->affected_rows()) {
					$this->session->set_flashdata("message","Role Updated Successfully!");
				}else{
					$this->session->set_flashdata("emessage","No Updation Occure!");
				}
			}
			redirect(base_url("user_auth/admin-role-list"),'refresh');
		}
		$data['roles'] = $this->common->getData("roles")->getResult();
		$this->loadSuperadminPage("admin-role-list","Admin Role List Page",$data);
	}

}
