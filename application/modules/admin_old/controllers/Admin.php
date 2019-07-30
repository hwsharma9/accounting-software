<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin_model","admin");
	}

	public function index()
	{
		$this->sliderListPage();
	}

	public function addSliderPage()
	{
		$data['action'] = base_url("admin/addSliderAction");
		$data['button'] = "Add";
		$this->load->view('add-slider',$data);
	}

	public function addSliderAction()
	{
		$response = $this->admin->uploadImage($_FILES);
		if (isset($response['error'])) {
			redirect(base_url("admin/addSliderPage"),'refresh');
		}
		if (isset($response['upload_data'])) {
			$_POST['asset_path'] = $response['upload_data']['asset_path'];
		}
		$res = $this->db->insert("slider",$_POST);
		if ($res) {
			redirect(base_url("admin/sliderListPage"),'refresh');
		}
	}

	public function editSliderPage($id)
	{
		$data['slider'] = $this->db->select("*")->from('slider')->where("id",$id)->get()->row_array();
		$data['action'] = base_url("admin/editSliderAction");
		$data['button'] = "Update";
		$data['status'] = 1;
		$this->load->view('add-slider',$data);
	}

	public function sliderListPage()
	{
		$data['slider'] = $this->db->order_by("id","desc")->get('slider')->result_array();
		$this->load->view('slider-list',$data);
	}

	public function editSliderAction()
	{
		$id = $_POST['id'];
		unset($_POST['id']);
		$this->db->set($_POST);
		$this->db->where("id",$id);
		$this->db->update("slider");
		if ($this->db->affected_rows()) {
			redirect(base_url("admin/sliderListPage"),'refresh');
		}else{
			redirect(base_url("admin/editSliderPage/".$id),'refresh');
		}
	}

	public function testHtml()
	{
		$this->load->view("test-html");
	}

	public function deleteSlider()
	{
		$id = $_POST['id'];
		$this->db->where("id",$id);
		$this->db->delete("slider");
		echo $this->db->affected_rows();die;
	}

}

/* End of file Admin.php */
/* Location: ./application/modules/admin/controllers/Admin.php */