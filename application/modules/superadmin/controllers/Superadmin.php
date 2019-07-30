<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends MY_Superadmin {

	public function __construct()
	{
		parent::__construct();
		$this->checkAdminSession();
		$this->load->config('member_custom');
		$this->load->model('superadmin_model',"superadmin");
		$this->load->model('member/members_model',"members");
	}

	public function checkAdminSession()
	{
		$user_type = $this->session->userdata('user_type');
		if (empty($user_type)) {
			redirect(base_url(),'refresh');
		}
	}

	/*
	*	View of admin dashboard page.
	*/
	public function index()
	{
		$data['total_members'] = $this->common->getData("members")->getResult(2);
		$data['total_loans'] = $this->common->getData("loans")->getResult(2);
		$this->loadSuperadminPage('index','Dashboard Page',$data);
	}

	/*
	*	View and edit Members detail page.
	*/
	public function addMemberPage()
	{
		(foption("sidebar","addmembers") && authenticate("0_0"))?'':redirect(base_url(),'refresh');
		$data = array();
		$data['cities'] = array();
		if (isset($_POST) && $_POST) {
			$add_member = config_item("add_member");
			$this->form_validation->set_error_delimiters('<div style="color: #dd4b39">', '</div>');
			$this->form_validation->set_rules($add_member);
			$this->form_validation->set_rules('passing_year[]', 'Passing Year', 'trim|integer|min_length[4]|max_length[4]|regex_match[/^(19|20)\d{2}$/]');
			$this->form_validation->set_rules('sibling_name[]', 'Sibling Name', 'trim|callback_alpha_dash_space');
			$this->form_validation->set_rules('child_name[]', 'Child Name', 'trim|callback_alpha_dash_space');
			if (isset($_POST['marital_status']) && !empty($_POST['marital_status']) && $_POST['marital_status'] == "married") {
				$this->form_validation->set_rules('spouse_name', 'Spouse Name', 'trim|required');
			}
			$this->form_validation->set_rules('annual_income', 'Annual Income', 'trim|numeric');
			if (isset($_POST['state']) && !empty($_POST['state'])) {
				$data['cities'] = $this->common->getData("cities",array("state_id"=>$_POST['state']))->getResult();
			}
			if ($this->form_validation->run() == TRUE) {
				$result = $this->superadmin->addUser($_POST,$_FILES);
				if ($result) {
					$this->session->set_flashdata("message","Member Added Successfully!");
					redirect(base_url('members/members-list'),'refresh');
				}else{
					$this->session->set_flashdata("emessage","Something went wrong!!");
					redirect(base_url('members/add-members'),'refresh');
				}
			}
		}
		
		$this->loadSuperadminPage('add-member','Add Member Page',$data);
	}

	public function checkMemberMobileNo()
	{
		$valid = true;
		$count = $this->common->getData("member_details",array("mobile_no"=>$_POST['mobile_no']))->getResult(2);
		if ($count) {
		    $valid = false;
		}

		echo json_encode(array(
		    'valid' => $valid,
		));
	}

	public function memberAccountPage($member_id='',$pay_type=1)
	{
		if (isset($_POST) && $_POST) {
			$_POST['amount'] = ((isset($_POST['transection_type']) && $_POST['transection_type'] == 2)?'-':'').$_POST['amount'];
			$account = $this->common->getField("member_account",$_POST);
			$account['paid_date'] = NOW;
			$this->common->insertData("member_account",$account);
			echo $this->db->affected_rows();die;
		}
		if ($this->common->getData("member_details",array("member_id"=>$member_id))->getResult(2)==0) {
			redirect(base_url('members/members-list'),'refresh');
		}
		$data['member'] = $this->common->getData("member_details",array("member_id"=>$member_id))->getResult(1);
		$data['share'] = $this->common->getData("member_account",array("member_id"=>$member_id,"fee_submission_type"=>$pay_type))->getResult();
		$data['pay_type'] = $pay_type;
		$data['member_id'] = $member_id;
		$this->loadSuperadminPage('member-account','member account',$data);
	}

	public function downloadAccountReceiptPage($id='',$pay_type=1)
	{
		if ($this->common->getData("member_account",array("TO_BASE64(concat(id,'_',member_id))"=>$id))->getResult(2)==0) {
			redirect(base_url('members/members-list'),'refresh');
		}
		$detail = base64_decode($id);
		$exp = explode("_", $detail);
		$member_id = $exp[1];
		// $data['loan'] = $this->common->getData("member_account AS MA",array("TO_BASE64(concat(MA.id,'_',MA.member_id))"=>$id),array("MA.*","MD.member_name","MD.address"))->joinTable(array("member_details AS MD"=>"MA.member_id = MD.member_id"),"left")->getResult(1);
		// $data['member'] = $this->common->getData("member_details",array("member_id"=>$member_id))->getResult(1);
		$data['installment'] = $this->superadmin->getShareReceiptDetail($id);
		$key = '';
		switch ($pay_type) {
			case 1:
				$key = 'pravesh_fund';
				break;
			case 2:
				$key = 'share';
				break;
			case 3:
				$key = 'anya_dand';
				break;
			case 4:
				$key = 'ani_sanchay';
				break;
			case 5:
				$key = 'kusha_fund';
				break;
			case 6:
				$key = 'bhawan_fund';
				break;
		}
		$data[$key] = $data['installment']['amount'];
		$data['title'] = lang('account_receipt');
		$this->loadSuperadminPage('share-receipt','Share Receipt',$data);
	}

	public function check_img_type()
	{
		$ext = array("image/gif","image/jpeg","image/png");
		if (empty($_FILES['profile_pic']['type'])) {
			return true;
		}
		if (!in_array($_FILES['profile_pic']['type'], $ext)) {
			$this->form_validation->set_message('check_img_type', 'Profile picture must contain only gif,jpg,png files.');
			return false;
		}else{
			return true;
		}
	}

	function alpha_dash_space($str_in){
		if (!empty($str_in)) {
			if (! preg_match("/^([a-z\s]+[a-z])+$/i", $str_in)) {
				$this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alphabet characters and spaces.');
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}

	/*
	*	View and edit Members detail page.
	*/
	public function editMemberPage($member_id='')
	{
		(authenticate("0_1") && authenticate("0_1_0"))?'':redirect(base_url(),'refresh');
		if ($this->common->getData("members",array("member_id"=>$member_id))->getResult(2)==0) {
			redirect(base_url('members/members-list'),'refresh');
		}
		if (isset($_POST) && $_POST) {
			$add_member = config_item("add_member");
			$this->form_validation->set_error_delimiters('<div style="color: #dd4b39">', '</div>');
			$this->form_validation->set_rules($add_member);
			$this->form_validation->set_rules('passing_year[]', 'Passing Year', 'trim|integer|min_length[4]|max_length[4]|regex_match[/^(19|20)\d{2}$/]');
			$this->form_validation->set_rules('sibling_name[]', 'Sibling Name', 'trim|callback_alpha_dash_space');
			/*if (is_array($_POST['sibling_name']) && !empty($_POST['sibling_name'])) {
				$this->form_validation->set_rules('sibling_dob[]', 'Sibling DOB', 'trim|required');
				$this->form_validation->set_rules('sibling_gender[]', 'Sibling Gender', 'trim|required');
			}*/
			$this->form_validation->set_rules('child_name[]', 'Child Name', 'trim|callback_alpha_dash_space');
			/*if (is_array($_POST['child_name']) && !empty($_POST['child_name'])) {
				$this->form_validation->set_rules('child_dob[]', 'Child DOB', 'trim|required');
				$this->form_validation->set_rules('child_gender[]', 'Child Gender', 'trim|required');
			}*/
			if (is_array($_POST['marital_status']) && !empty($_POST['marital_status']) && $_POST['marital_status'] == "married") {
				$this->form_validation->set_rules('spouse_name', 'Spouse Name', 'trim|required');
			}
			$this->form_validation->set_rules('annual_income', 'Annual Income', 'trim|numeric');
			if ($this->form_validation->run() == TRUE) {
				$result = $this->superadmin->editUser($_POST,$_FILES,$member_id);
				if ($result) {
					$this->session->set_flashdata("message","Member's Profile Updated Successfully!");
				}else{
					$this->session->set_flashdata("emessage","No Updation Occured!!");
				}
				redirect(base_url('members/edit-member-detail/'.$member_id),'refresh');
			}
		}
		$data['member'] = $this->common->getData("member_details",array("member_id"=>$member_id))->getResult(1);
		// $data['member_family'] = $this->common->getData("member_family_info",array("member_id"=>$member_id))->getResult(1);
		if (!empty($data['member']['state'])) {
			$data['cities'] = $this->common->getData("cities",array("state_id"=>$data['member']['state']))->getResult();
		}
		$data['education_details_10'] = $this->common->getData("education_details",array("member_id"=>$member_id,"education_type"=>"1"))->getResult(1);
		$data['education_details_12'] = $this->common->getData("education_details",array("member_id"=>$member_id,"education_type"=>"2"))->getResult(1);
		$data['education_details_ug'] = $this->common->getData("education_details",array("member_id"=>$member_id,"education_type"=>"3"))->getResult(1);
		$data['education_details_pg'] = $this->common->getData("education_details",array("member_id"=>$member_id,"education_type"=>"4"))->getResult(1);
		$data['education_details_other'] = $this->common->getData("education_details",array("member_id"=>$member_id,"education_type"=>"5"))->getResult();
		$this->loadSuperadminPage('edit-member','Edit Member Page',$data);

	}

	/*
	*	Delete the members siblings and childrens details
	*	from edit members profile page using ajax.
	*/
	public function deleteMemberDetailAjax()
	{
		$this->common->deleteData("sibling_children_details",array("id"=>$_POST['id'],"member_id"=>$_POST['member_id']));
		echo $this->db->affected_rows();die;
	}

	/*
	*	delete the education detailf from edit members profile page
	*	using ajax.
	*/
	public function deleteEducationDetailAjax()
	{
		$this->common->deleteData("education_details",array("id"=>$_POST['id'],"member_id"=>$_POST['member_id']));
		echo $this->db->affected_rows();die;
	}

	/*
	*	Members list page.
	*/
	public function membersListPage()
	{
		(foption("sidebar","memberslist") && authenticate("0_1"))?'':redirect(base_url(),'refresh');
		$this->loadSuperadminPage('members-list','All Members List Page');
	}
	
    /*
	*	Get members list for pagination.
	*/
	public function getMembersLists(){
		// $data = $row = array();
		$data = (isset($_GET) && $_GET)?array_merge($_GET,$_POST):$_POST;

        // Fetch member's records
		$memData = $this->members->getRows($data);
		$query = $this->db->last_query();
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->members->countAll(),
			"recordsFiltered" => $this->members->countFiltered($data),
			"data" => $memData,
			"query" => $query,
		);
		
        // Output to JSON format
		echo json_encode($output);die;
	}

	public function checkQuery()
	{
		$ic = @fsockopen('www.google.com',80);
		if ($ic) {
			echo "internet connected";
			$this->load->dbutil();
			$prefs = array(
				'format'      => 'zip',             
				'filename'    => DATE.'_backup.sql'
			);
			$backup = $this->dbutil->backup($prefs);
			$this->load->helper('file');
			$db_name = DATE."_backup.zip";
			$save = FCPATH.'/assets/admin/backup/'.$db_name;
			if(write_file($save, $backup)){
				echo "successfully written";
				if (file_exists($save)) {
					$this->load->library('email');
					$this->email->from('harshwardhan@ignisitsolutions.com', 'Harshwardhan');
					$this->email->to('hw.sharma9@gmail.com');
					$this->email->subject('subject');
					$this->email->attach($save);
					$this->email->message('<h1>message</h1>');
		    		$res = true;//$this->email->send();
		    		var_dump($res);
		    	}
		    }
		    
		}else{
			echo "Not internet connection";
		}die;
    	// var_dump($this->email->print_debugger());
	}

	public function checkFaker()
	{
    	// $time = time()-1000;
		$faker = Faker\Factory::create('pt_BR');
		for ($i=0; $i < 50; $i++) { 
			$data = array();
			$title = $this->config->item("title");
			$title_key = array_rand($title);
    		// $data['member_id'] = $time++;
			$data['title'] = $title[$title_key];
			$data['first_name'] = $faker->firstName;
			$data['last_name'] = $faker->lastName;
			$data['date_of_birth'] = $faker->date;
			$data['text_password'] = md5("test123");
			$data['password'] = "test123";
			$gender = array("male","female");
			$gender_key = array_rand($gender);
			$data['gender'] = $gender[$gender_key];
			$data['address'] = $faker->address;
			$data['zipcode'] = rand(452001,453000);
			$state = array(6 => 'CHATTISGARH',9 => 'DELHI',12 => 'GUJARAT',23 => 'MADHYA PRADESH',29 => 'RAJASTHAN');
			$state_key = array_rand($state);
			$data['state'] = $state_key;
			$city = $this->common->getData("cities",array("state_id"=>$state_key),array("city_id"))->getResult(1);
			$data['city'] = $city['city_id']??0;
			$data['phone_no'] = $faker->landlineNumber(false);
			$data['mobile_no'] = $faker->landlineNumber(false);
			$data['email'] = $faker->email;
			$occupation = $this->config->item("occupation");
			$occupation_key = array_rand($occupation);
			$data['occupation'] = $occupation[$occupation_key];
			$religion = $this->config->item("religion");
			$religion_key = array_rand($religion);
			$data['religion'] = $religion[$religion_key];
			$blood_group = $this->config->item("blood_group");
			$blood_group_key = array_rand($blood_group);
			$data['blood_group'] = $blood_group[$blood_group_key];
			$data['created_at'] = $faker->date." ".$faker->time;
			$data['no_family_members'] = rand(0,9);
			$head = $faker->firstName($gender = 'male')." ".$faker->lastName($gender = 'male');
			$data['head_family_name'] = $head;
			$data['fathers_name'] = $head;
			$data['mothers_name'] = $faker->firstName($gender = 'female')." ".$faker->lastName($gender = 'female');
			$marital_status = $this->config->item("marital_status");
			$marital_status_key = array_rand($marital_status);
			$data['marital_status'] = $marital_status[$marital_status_key];
			if ($marital_status[$marital_status_key] == "married") {
				$data['spouse_name'] = $faker->firstName($gender = ($data['gender'] == "male")?'female':'male')." ".$faker->lastName($gender = ($data['gender'] == "male")?'female':'male');
			}
			$data['siblings'] = "[]";
			$data['childrens'] = "[]";
			$this->superadmin->addUser($data);
			echo "<pre>";
			print_r ($data);
			echo "</pre>";
		}
	}

}

/* End of file Admin.php */
/* Location: ./application/modules/admin/controllers/Admin.php */