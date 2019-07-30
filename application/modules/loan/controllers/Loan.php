<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\Style\TablePosition;

class Loan extends MY_Superadmin {

	public function __construct()
	{
		parent::__construct();
		$this->checkAdminSession();
		$this->load->helper('loanhtml');
		$this->load->model('loan_model','loan');
		$this->lang->load('loan_message',$this->language);
		$this->load->config("loan_custom");
	}

	public function checkAdminSession()
	{
		$user_type = $this->session->userdata('user_type');
		if (empty($user_type)) {
			redirect(base_url(),'refresh');
		}
	}

	/**
	 * Load the Provide Loan HTML and save the form data.
	 * @param  base64 encrepted data $member_id Contain id and member_id
	 * @return void            redirect to Provide Loan Form
	 */
	public function provideLoanPage($member_id)
	{
		(authenticate("0_1") && authenticate("0_1_1"))?'':redirect(base_url(),'refresh');
		$detail = base64_decode($member_id);
		$exp = explode("_", $detail);
		$member_id = $exp[1];
		if ($this->common->getData("members",array("member_id"=>$member_id))->getResult(2)==0 || !is_numeric($member_id)) {
			flashdata("emessage","Member not found!","set");
			redirect(base_url('members/members-list'),'refresh');
		}
		$data['member'] = $this->common->getData("member_details",array("member_id"=>$member_id))->orderBy("id desc")->getResult(1);
		if (isset($_POST) && $_POST) {
			$this->form_validation->set_error_delimiters('<div style="color: #dd4b39">', '</div>');
			$add_loan = config_item("add_loan");
			$add_loan = $this->findVelidationFields($add_loan,$_POST);
			$this->form_validation->set_rules($add_loan);
			if (!empty($_POST['witness_state'])) {
				$data['witness_cities'] = $this->common->getData("cities",array("state_id"=>$_POST['witness_state']))->getResult();
			}
			if (!empty($_POST['current_state'])) {
				$data['current_city'] = $this->common->getData("cities",array("state_id"=>$_POST['current_state']))->getResult();
			}
			if (!empty($_POST['permanent_state'])) {
				$data['permanent_city'] = $this->common->getData("cities",array("state_id"=>$_POST['permanent_state']))->getResult();
			}
			if (!empty($_POST['emp_business_state'])) {
				$data['employer_business_city'] = $this->common->getData("cities",array("state_id"=>$_POST['emp_business_state']))->getResult();
			}
			if ($this->form_validation->run() == TRUE) {
				$_POST['date'] = NOW;
				$loan_id = $this->loan->saveLoanDetails($_POST);
				if ($loan_id) {
					flashdata("message","Your loan request confirmed successfully!","set");
				}else{
					flashdata("emessage","Something went wrong!","set");
				}
				redirect(base_url('loan/loan-agreement-form/'.$loan_id),'refresh');
			}
		}else{
			if (!empty($data['member']['state'])) {
				$data['current_city'] = $data['permanent_city'] = $this->common->getData("cities",array("state_id"=>$data['member']['state']))->getResult();
			}
		}
		$this->loadSuperadminPage('loan-provider-page','Loan Provider Page',$data);
	}

	public function findVelidationFields($validation=array(),$post=array())
	{
		$new_validation=array();
		$post_fields = array_keys($post);
		if ($validation) {
			foreach ($validation as $key => $value) {
				if (in_array($value['field'], $post_fields)) {
					array_push($new_validation, $value);
				}
			}
		}
		return $new_validation;
	}

	public function findMemberID()
	{
		$id = $this->common->getData("members",array("mobile_no"=>$_POST['mobile_no']),array("member_id"))->getResult(1);
		echo ($id)?$id['member_id']:"";die;
	}

	public function getMemberDetail()
	{
		$data['profile'] = $this->common->getData("member_details",array("member_id"=>$_POST['guarantor_member_id']),array("member_id","member_name","member_status"))->getResult(1);
		$data['msg'] = array();
		if($is_guarantor = $this->db->query("SELECT LG.*,L.loan_status,L.member_id FROM `loan_guarantor` as LG LEFT JOIN loans as L ON LG.loan_id = L.id WHERE LG.guarantor_member_id = {$_POST['guarantor_member_id']} AND loan_status = 2")->result_array()){
			$data['is_guarantor'] = $is_guarantor;
			if ($is_guarantor) {
				foreach ($is_guarantor as $key => $value) {
					$array = array(
								"msg" => "Member ".$value['guarantor_name']." aleready a guarantor of <a href='".base_url("loan/loan-agreement-form/".base64_encode($value['loan_id']."_".$value['member_id'])."' target='_blank'").">loan id ".$value['loan_id']."</a>"
							);
					array_push($data['msg'], $array);
				}
			}
		}else{
			$data['is_guarantor'] = false;
		}
		if ($data['profile']['member_status'] == 1) {
			$data['defaulter'] = true;
			$array = array("msg"=>"Member ".$data['profile']['member_name']." is defaulter.");
			array_push($data['msg'], $array);
		}
		if (empty($data['profile'])) {
			$data['profile'] = "[]";
		}
		echo $this->common->jsonEncode($data);die;
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

	public function loanFaker($member_id)
	{
		$faker = Faker\Factory::create('pt_BR');
		// $detail = base64_decode($member_id);
		// $exp = explode("_", $detail);
		// $member_id = $exp[1];
		for ($j=42; $j < 48; $j++) { 
			$member_id = $j;
			$member = $this->common->getData("member_details",array("member_id"=>$member_id))->getResult(1);
			$array = array();
			$array['member_id'] = $member["member_id"];
			$array['branch'] = "Samaj Name";
			$array['borrower_name'] = $member["member_name"];
			$array['sod_name'] = PNAME;
			$array['current_address'] = $member['address'];
			$array['current_state'] = $member['state'];
			$array['current_city'] = $member['city'];
			$array['permanent_address'] = $member['address'];
			$array['permanent_state'] = $member['state'];
			$array['permanent_city'] = $member['city'];
			$array['zipcode'] = $member['zipcode'];
			$array['phone_no'] = $member['phone_no'];
			$array['mobile_no'] = $member['mobile_no'];
			/*$array['email'] = $member['email'];
			$array['date_of_birth'] = $member['date_of_birth'];
			$array['gender'] = $member['gender'];
			$array['marital_status'] = $member['marital_status'];
			$array['dependent_child'] = rand(1,6);
			$array['dependent_others'] = rand(1,6);
			$array['pan_no'] = "PANCORD".rand(100,999);
			$array['passport_no'] = "PASSPORT".rand(100,999);
			$occupation = $this->config->item("occupation");
	    	$occupation_key = array_rand($occupation);
	    	$array['occupation'] = $occupation[$occupation_key];
	    	if ($array['occupation'] == "others") {
	    		$array['occupation_others'] = "Other Occupation Name";
	    	}
			$array['qualification'] = $this->common->randString(10,"alpha");
			$array['designation'] = $this->common->randString(10,"alpha");
			$array['retirement_age'] = rand(55,65);
			$array['monthly_income'] = rand(30000,50000);
			$array['other_income'] = rand(30000,50000);
			$array['other_income_source'] = $this->common->randString(10,"alpha");
			$array['emp_business_name'] = $this->common->randString(10,"alpha")." ".$this->common->randString(5,"alpha");
			$state = array(6 => 'CHATTISGARH',9 => 'DELHI',12 => 'GUJARAT',23 => 'MADHYA PRADESH',29 => 'RAJASTHAN');
	    	$state_key = array_rand($state);
	    	$array['emp_business_state'] = $state_key;
	    	$city = $this->common->getData("cities",array("state_id"=>$state_key),array("city_id"))->getResult();
	    	$city = array_column($city, "city_id");
		    $array['emp_business_city'] = array_rand($city);
		    $array['emp_business_pin'] = rand(452001,500000);
		    $organisation = $this->config->item("organisation");
	    	$organisation_key = array_rand($organisation);
	    	$array['organisation'] = $organisation[$organisation_key];
	    	if ($array['organisation'] == "others") {
	    		$array['organisation_others'] = "Other Organisation Name";
	    	}*/
		    $industry = $this->config->item("industry");
	    	$industry_key = array_rand($industry);
	    	$array['industry'] = $industry[$industry_key];
	    	if ($array['industry'] == "others") {
	    		$array['industry_others'] = "Other Industry Name";
	    	}
	    	$category = $this->config->item("category");
	    	$category_key = array_rand($category);
	    	$array['category'] = $category[$category_key];
			/*$array['witness_name'] = $faker->name;
			$array['witness_email'] = $faker->email;
			$array['witness_address'] = $faker->address;
			$array['witness_state'] = $state_key;
			$array['witness_city'] =  array_rand($city);
			$array['witness_mobile_no'] = $faker->landlineNumber(false);;
			$array['witness_zipcode'] = rand(452001,500000);*/


		    $loan_purpose = $this->config->item("loan_purpose");
	    	$loan_purpose_key = array_rand($loan_purpose);
	    	$array['loan_purpose'] = $loan_purpose_key;
			$array['amount_of_loan'] = rand(15,50)*10000;
			$array['percentage_rate'] = 12;
			$guarantor = $this->db->select("member_id,member_name")->from("member_details")->where_not_in("member_id",array($member_id))->limit(2)->order_by('rand()')->get()->result_array();
			$guarantor_member_id = $guarantor_name = $guarantor_bail_money = array();
			if ($guarantor) {
				foreach ($guarantor as $key => $value) {
					$guarantor_member_id[$key] = $value['member_id'];
					$guarantor_name[$key] = $value['member_name'];
					$guarantor_bail_money[$key] = rand(15,50)*10000;
				}
				$array['guarantor_member_id'] = $guarantor_member_id;
				$array['guarantor_name'] = $guarantor_name;
				$array['guarantor_bail_money'] = $guarantor_bail_money;
			}
			$assets_name = $assets_price = $assets_description = array();
			for ($i=0; $i < rand(1,2); $i++) { 
				$assets_name[$key] = $faker->name;
				$assets_price[$key] = rand(15,50)*10000;
				$assets_description[$key] = $faker->realText($faker->numberBetween(10,100));;
			}
			$array['assets_name'] = $assets_name;
			$array['assets_price'] = $assets_price;
			$array['assets_description'] = $assets_description;
			$array['date'] = NOW;
			/*$array['loan_for_months'] = $m = rand(1,12);
			$array['finance_charge'] = rand(1,10)*100;
			$array['amount_financed'] = $p = $array['amount_of_loan']-$array['finance_charge'];
			$r = $array['percentage_rate']/100;
			$t = $array['loan_for_months']/12;
			$SI = ($r*$r*$t);
			$IPM = ($p/$m) + ($SI/$m);
			$TP = $p+$SI;
			$array['installment_per_month'] = str_replace(",", "", number_format($IPM,2));
			$array['total_payment'] = str_replace(",", "", number_format($TP,2));
			$array['agreement_start'] = "";*/
			echo "<pre>";
			print_r ($array);
			echo "</pre>";
			$loan_id = $this->loan->saveLoanDetails($array);
		}
	}

	public function getAgreementEndDate()
	{
		$start_date = $_POST['start_date'];
        for ($i=0; $i < $_POST['loan_for_months']; $i++) { 
            if ($i!=0) {
                $start_date = date("Y-m-d",strtotime($start_date."+1 month"));
            }
        }
		$new_date = $start_date;
		echo $this->common->jsonEncode(array("end_date"=>$new_date));die;
	}

	public function loanAgreementForm($id)
	{
		(authenticate("1") && authenticate("1_7"))?'':redirect(base_url(),'refresh');
		$detail = base64_decode($id);
		$exp = explode("_", $detail);

		if ($this->common->getData("loans",array("TO_BASE64(concat(id,'_',member_id))"=>$id))->getResult(2)==0) {
			redirect(base_url('loan/loan-providers-list'),'refresh');
		}
		$data['loan'] = $this->common->getData("loans AS L",array("TO_BASE64(concat(L.id,'_',L.member_id))"=>$id),array("L.*","MD.member_name","MD.address"))->joinTable(array("member_details AS MD"=>"L.member_id = MD.member_id"),"left")->getResult(1);
		// $data['assets'] = $this->common->getData("loan_assets",array("loan_id"=>$data['loan']['id']))->getResult();
		// $data['installments'] = $this->common->getData("loan_installments",array("loan_id"=>$data['loan']['id']))->getResult();
		$loan_id = $exp[0];
		$member_id = $exp[1];
		$data['member'] = $this->common->getData("member_details",array("member_id"=>$member_id))->getResult(1);
		$data['loan_guarantor'] = $this->common->getData("loan_guarantor",array("loan_id"=>$loan_id))->getResult();
		$data['loan_id'] = $loan_id;
		$data['member_id'] = $member_id;

        $post['loan_id'] = $loan_id;
        $post['fields'] = "L.*,MA.borrower_name";
        $memData = $this->loan->getRows($post);
        // $query = $this->db->last_query();
        $data['memData'] = ($memData)?$memData[0]:array();
        // Output to JSON format
		$data['loan_purpose'] = config_item('loan_purpose');
		$data['id'] = $id;
		$data['account'] = $this->db->select_sum("amount")->from("member_account")->where("member_id",$member_id)->where_in("fee_submission_type",array(2,3))->get()->row_array();
		// echo $this->db->last_query();
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";die;
		$this->loadSuperadminPage('loan-agreement-page','Loan Agreement Page',$data);
	}

	public function loanReceiptHtml($member_id='MV81MA==')
	{
		$detail = base64_decode($member_id);
		$exp = explode("_", $detail);
		$member_id = $exp[1];
		if ($this->common->getData("members",array("member_id"=>$member_id))->getResult(2)==0 || !is_numeric($member_id)) {
			flashdata("emessage","Member not found!","set");
			redirect(base_url('members/members-list'),'refresh');
		}
		$member = $this->common->getData("member_details",array("member_id"=>$member_id))->getResult(1);
		$loan_guarantor = $this->common->getData("loan_guarantor",array("loan_id"=>$exp[0]))->getResult();
		echo "<pre>";
		print_r ($member);
		echo "</pre>";
		$data = $row = array();
        
        // Fetch member's records
        $post['loan_id'] = $exp[0];
        $post['fields'] = "L.*,MA.borrower_name";
        $memData = $this->loan->getRows($post);
        // $query = $this->db->last_query();
        $memData = ($memData)?$memData[0]:array();
        // Output to JSON format
		$loan_purpose = config_item('loan_purpose');
        echo "<pre>";
        print_r($memData);
        print_r($loan_guarantor);
        echo "</pre>";die;

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $html = $this->load->view('loan-receipt',compact('member','memData','loan_guarantor','loan_purpose'),true);
        echo $html;die;
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);
		// $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $file_name = 'test.odt';
        $targetFile = ("assets/files/{$file_name}");
        $phpWord->save($targetFile, "ODText");
  //       header("Content-Description: File Transfer");
		// header('Content-Disposition: attachment; filename="' . $file_name . '"');
		// header("Content-Type: application/docx");
		// header('Content-Transfer-Encoding: binary');
		// header("Cache-Control: public");
		// header('Expires: 0');
  //       $phpWord->save("php://output");
		// Save file
		// echo write($phpWord, basename(__FILE__, '.php'), $writers);
	}

	public function loanAssetsList($loan_id='')
	{
		(authenticate("1") && authenticate("1_4"))?'':redirect(base_url(),'refresh');
		if ($this->common->getData("loans",array("TO_BASE64(concat(id,'_',member_id))"=>$loan_id))->getResult(2)==0) {
			redirect(base_url('loan/loan-providers-list'),'refresh');
		}
		$data['loan'] = $this->common->getData("loans AS L",array("TO_BASE64(concat(L.id,'_',L.member_id))"=>$loan_id),array("L.id","MD.member_name"))->joinTable(array("member_details AS MD"=>"L.member_id = MD.member_id"),"left")->getResult(1);
		$data['assets'] = $this->common->getData("loan_assets",array("loan_id"=>$data['loan']['id']))->getResult();
		$data['loan_id'] = $loan_id;
		$this->loadSuperadminPage('loan-assets-list','Loan Assets List',$data);
	}
	
	public function loanInstallmentsList($loan_id='')
	{
		(authenticate("1") && authenticate("1_5"))?'':redirect(base_url(),'refresh');
		if ($this->common->getData("loans",array("TO_BASE64(concat(id,'_',member_id))"=>$loan_id))->getResult(2)==0) {
			$this->session->set_flashdata("emessage","Loan detail not found!");
			redirect(base_url('loan/loan-borrower-list'),'refresh');
		}
		$detail = base64_decode($loan_id);
		$exp = explode("_", $detail);
		$member_id = $exp[1];
		if (isset($_POST) && $_POST) {
			$installments = array(
								"loan_amount"=>$_POST['paid_amount'],
								"interest"=>$_POST['interest'],
								"paid_date"=>$_POST['paid_date'],
								"payment_status"=>2
							);
			if (!empty($_POST['amount_taken_from'])) {
				$member_account = array(
								"member_id" => $member_id,
								"amount" => "-".$_POST['paid_amount'],
								"fee_submission_type" => 4,
								"description" => "Loan Instalment paid from Aniwary Sanchay on ".NOW,
								"transection_type" => 2,
								"paid_date" => NOW
							);
				$this->common->insertData("member_account",$member_account);
				$installments['maid'] = $this->db->insert_id();
			}
			$_POST['last_amount'] = $_POST['last_amount']-$_POST['paid_amount'];
			$next_installments = array();
			if ($_POST['last_amount']!=0) {
				$next_date = date("Y-m-t", strtotime("+1 day",strtotime($_POST['payment_date'])));
				$next_installments = array(
									"loan_id" => $_POST['loan_id'],
									"loan_amount"=>0,
	        						"interest"=>((($_POST['last_amount']*$_POST['percentage_rate'])/100)/12),
									"payment_date"=>$next_date,
	        						"payment_end_date"=>date("Y-m-d", strtotime("+7 day",strtotime($next_date))),
									"payment_status"=>1
								);
			}
			// echo "<pre>";
			// print_r ($_POST);
			// print_r ($installments);
			// print_r ($next_installments);
			// echo "</pre>";die;
			$this->common->updateData("loan_installments",$installments,array("id"=>$_POST['id'],"loan_id"=>$_POST['loan_id']));
			if ($next_installments) {
				$this->common->insertData("loan_installments",$next_installments);
			}else{
				$this->common->updateData("loan",array("loan_status"=>3,"loan_complete_date"=>NOW),array("id"=>$_POST['loan_id']));
			}
			echo $this->db->affected_rows();die;
			// redirect($_SERVER['HTTP_REFERER'],'refresh');
		}	
		$data['loan'] = $this->common->getData("loans AS L",array("TO_BASE64(concat(L.id,'_',L.member_id))"=>$loan_id),array("L.id","L.member_id","L.percentage_rate","MD.member_name"))->joinTable(array("member_details AS MD"=>"L.member_id = MD.member_id"),"left")->getResult(1);
		$data['member_account'] = $this->db->query("SELECT member_id,sum(amount) as sum_amount,fee_submission_type FROM `member_account` WHERE member_id = ".$member_id." AND fee_submission_type in (4) GROUP BY fee_submission_type")->result_array();
		$data['installments'] = $this->common->getData("loan_installments",array("loan_id"=>$data['loan']['id']))->getResult();
		$data['loan_id'] = $loan_id;
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";die;
		$this->loadSuperadminPage('loan-installments-list','Loan Installments List',$data);
	}

	/**
	 * Load the list of Loan borrower members.
	 * @return void
	 */
	public function loanProvidersList($type='1')
	{
		if (!in_array($type, array(1,2,3))) redirect(base_url('loan/loan-providers-list'),'refresh');
		if ($type == 1) {
			(foption("sidebar","pendingloanrequest") && authenticate("1") && authenticate("1_0"))?'':redirect(base_url(),'refresh');
		} else if ($type == 2) {
			(foption("sidebar","liveloan") && authenticate("1") && authenticate("1_1"))?'':redirect(base_url(),'refresh');
		}else{
			(foption("sidebar","completeloan") && authenticate("1") && authenticate("1_2"))?'':redirect(base_url(),'refresh');
		}
		$this->loadSuperadminPage('loan-borrower-list','Loan Borrower List',compact("type"));
	}

	public function approveLoan()
	{
		$post['id'] = $_POST['id'];
        $post['fields'] = "L.*,MA.borrower_name";
        $loan = $this->loan->getRows($post);
        $loan = ($loan)?$loan[0]:array();
        $installments = array(
        					array(
        						"loan_id"=>$_POST['id'],
        						"loan_amount"=>$loan['amount_of_loan']
        					),
        					array(
        						"loan_id"=>$_POST['id'],
        						"interest"=>((($loan['amount_of_loan']*$loan['percentage_rate'])/100)/12),
        						"payment_date"=>date("Y-m-t", strtotime(DATE)),
        						"payment_end_date"=>date("Y-m-d", strtotime("+7 day",strtotime(date("Y-m-t", strtotime(DATE))))),
        						"payment_status" => 1
        					)
        				);
        // echo "<pre>";
        // print_r ($loan);
        // print_r ($installments);
        // echo "</pre>";die;
        if ($installments) {
        	foreach ($installments as $key => $value) {
        		$this->db->insert("loan_installments",$value);
        	}
        }
		$this->common->updateData("loans",array("loan_status"=>$_POST['loan_status'],"loan_approve_date"=>NOW),array("id"=>$_POST['id']));
		echo $this->db->affected_rows();die;
	}

	public function completeLoan()
	{
		$this->common->updateData("loans",array("loan_status"=>$_POST['loan_status'],"loan_complete_date"=>NOW),array("id"=>$_POST['id']));
		echo $this->db->affected_rows();die;
	}

	/**
	 * Get loan providers list for pagination.
	 * @return json Return JSON Object for datatable.
	 */
	public function getLoanProvidersLists()
	{        
        // Fetch member's records
        $memData = $this->loan->getRows($_POST);
        $query = $this->db->last_query();
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->loan->countAll(),
            "recordsFiltered" => $this->loan->countFiltered($_POST),
            "data" => $memData,
            "query" => $query
        );
        
        // Output to JSON format
        echo json_encode($output);die;
	}

	public function downloadLoanReceipt($file_type='docx',$member_id)
	{
		(authenticate("1") && authenticate("1_8"))?'':redirect(base_url(),'refresh');
		$detail = base64_decode($member_id);
		$exp = explode("_", $detail);
		$member_id = $exp[1];
		if ($this->common->getData("members",array("member_id"=>$member_id))->getResult(2)==0 || !is_numeric($member_id)) {
			flashdata("emessage","Member not found!","set");
			redirect(base_url('members/members-list'),'refresh');
		}
		$member = $this->common->getData("member_details",array("member_id"=>$member_id))->getResult(1);
		$loan_guarantor = $this->common->getData("loan_guarantor",array("loan_id"=>$exp[0]))->getResult();
		// echo "<pre>";
		// print_r ($member);
		// echo "</pre>";
		$data = $row = array();
        
        // Fetch member's records
        $post['loan_id'] = $exp[0];
        $post['fields'] = "L.*,MA.borrower_name";
        $memData = $this->loan->getRows($post);
        // $query = $this->db->last_query();
        $memData = ($memData)?$memData[0]:array();
        // Output to JSON format
		$loan_purpose = config_item('loan_purpose');
  //       echo "<pre>";
  //       print_r($memData);
  //       print_r($loan_guarantor);
  //       echo "</pre>";
		// die;
		$writers = array('Word2007' => 'docx', 'ODText' => 'odt', 'RTF' => 'rtf', 'HTML' => 'html', 'PDF' => 'pdf');
		$languageEnGb = new \PhpOffice\PhpWord\Style\Language(\PhpOffice\PhpWord\Style\Language::EN_GB);
		$phpWord = new \PhpOffice\PhpWord\PhpWord();
		$phpWord->setDefaultFontName('DevLys');
		$phpWord->getSettings()->setThemeFontLang($languageEnGb);
		$fontStyleName = 'rStyle';
		$phpWord->addFontStyle($fontStyleName, array('bold' => true, 'italic' => true, 'size' => 16, 'allCaps' => true, 'doubleStrikethrough' => true));
		$paragraphStyleName = 'pStyle';
		$phpWord->addParagraphStyle($paragraphStyleName, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));
		$phpWord->addTitleStyle(1, array('bold' => true), array('spaceAfter' => 240));
		// New portrait section
		$section = $phpWord->addSection();
		// Simple text
		$phpWord->addFontStyle('r2Style', array('bold'=>true, 'italic'=>false, 'size'=>30));
		$phpWord->addParagraphStyle('p2Style', array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));
		// $section->addText($text, 'r2Style', 'p2Style');
		$section->addText('श्री कोष्टी क्षेत्रिय सहायक संघ, इंदौर','r2Style', 'p2Style');
		$section->addText('१०३, नई देवास रोड, इंदौर (म.प्.)',array('size'=>15), 'p2Style');
		$section->addText('खाता क्रमांक............');
		$section->addText('दिनांक ............');

		$section->addText('कर्ज आवेदन पत्र',array('bold' => true, 'size' => 25, 'underline' => 'single'), 'p2Style');
		$section->addTextBreak();
		$section->addText('श्री मान अध्यक्ष महोदय,');
		$section->addTextBreak();
		$textrun = $section->addTextRun();
		$textrun->addText('		मुझे 	');
		$textrun->addText($loan_purpose[$memData['loan_purpose']],array("underline"=>"single"));
		$textrun->addText(' कार्य के लिए रूपये ');
		$textrun->addText(number_format($memData['amount_of_loan'],2),array("underline"=>"single"));
		$textrun->addText(' अक्षरी रुपये ');
		$textrun->addText(convertToIndianCurrency($memData['amount_of_loan']),array("underline"=>"single"));
		$textrun->addText(' कर्ज की आवश्यकता है।', null, array('spaceBefore'=>\PhpOffice\PhpWord\Shared\Converter::pointToTwip(6)));
		$section->addTextBreak();
		$section->addText('          मैं नियमानुसार कर्ज की अदायगी प्रतिमाह क़िस्त ब्याज सहित नियमित जमा करूँगा।');
		$section->addTextBreak();
		$section->addText('मेरे खाते में शेयर + चंदा अमानत रु __________________________ जमा हैं।');
		$section->addTextBreak();
		$section->addText('जमानतदार',null,'p2Style');
		$section->addTextBreak();
		$section->addText('हम उपरोक्त कर्ज देने हेतु अपनी जमानत देते हैं। कर्ज अदायगी में त्रुटि होने पर हमारे कहते जमा अमानत (शेयर + चंदा) से संस्था राशि वसूल कर सकेगी।');

		$section->addTextBreak(1);

		$fancyTableStyleName = 'Fancy Table';
		$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
		$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
		$fancyTableCellStyle = array('valign' => 'center');
		$fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
		$fancyTableFontStyle = array('bold' => true);
		$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
		$table = $section->addTable($fancyTableStyleName);
		$table->addRow(900);
		$table->addCell(500, $fancyTableCellStyle)->addText('', $fancyTableFontStyle);
		$table->addCell(4000, $fancyTableCellStyle)->addText('पूरा नाम', $fancyTableFontStyle);
		$table->addCell(2000, $fancyTableCellStyle)->addText('खाता क्रमांक', $fancyTableFontStyle);
		$table->addCell(2000, $fancyTableCellStyle)->addText('जमानत राशि', $fancyTableFontStyle);
		// $table->addCell(2000, $fancyTableCellStyle)->addText('जमानतदार के हस्ताक्षर', $fancyTableFontStyle);
		for ($i = 1; $i <= 2; $i++) {
		    $table->addRow();
		    $table->addCell(2000)->addText($i.".",array("lineHeight"=>1));
		    $table->addCell(4000)->addText(isset($loan_guarantor[$i-1])?$loan_guarantor[$i-1]['guarantor_name']:'');
		    $table->addCell(2000)->addText(isset($loan_guarantor[$i-1])?$loan_guarantor[$i-1]['guarantor_member_id']:'');
		    $table->addCell(2000)->addText(isset($loan_guarantor[$i-1])?$loan_guarantor[$i-1]['guarantor_bail_money']:'');
		    // $table->addCell(2000);
		}
		$table->addRow();
		$table->addCell(2000)->addText();

		$section->addTextBreak(2);
		$textrun = $section->addTextRun();
		$textrun->addText('उपरोक्त अनुसार कर्ज');
		$textrun->addText('आवेदक के हस्ताक्षर __________________');
		$textrun->addTextBreak(1);
		$textrun->addText('पात्रता होने से स्वीकृत');
		$textrun->addText('पूरा नाम __________________');
		
		$section->addTextBreak(2);
		$section->addText('|| पावती ||',null,'p2Style');
		$textrun = $section->addTextRun();
		$textrun->addText('          उपरोक्त अनुसार कर्ज राशि रूपये ');
		$textrun->addText(number_format($memData['amount_of_loan'],2),array("underline"=>"single"));
		$textrun->addText(' अक्षरी रूपये ');
		$textrun->addText(convertToIndianCurrency($memData['amount_of_loan']),array("underline"=>"single"));
		$textrun->addText(' संस्था से नगद प्राप्त हुए।');

		$file_name = "loan_{$exp[0]}.{$file_type}";
		// echo $file_name;die;
		// $targetFile = ("assets/files/{$file_name}");
		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $file_name . '"');
		header("Content-Type: application/docx");
		header('Content-Transfer-Encoding: binary');
		header("Cache-Control: public");
		header('Expires: 0');
		$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$xmlWriter->save("php://output");
		/*if ($writers) {
			foreach ($writers as $key => $value) {
				if ($value == $file_type) {
					// redirect($_SERVER['HTTP_REFERER'],'refresh');
				}
			}
		}*/
	}

	public function downloadInstallmentReceipt($file_type='docx',$installment_id)
	{
		// echo $file_type."<br>";
		// echo $installment_id."<br>";
		$data['installment'] = $this->loan->getInstallmentDetail($installment_id);
		$data['mool_khaata'] = $data['installment']['loan_amount'];
		$data['byaj_khaata'] = $data['installment']['interest'];
		$data['title'] = lang('loan_receipt');
		$this->loadSuperadminPage("installment-receipt","installment receipt",$data);
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";
		// die;
	}

	public function testD()
	{
		$phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();
		$section->addText("hello world");
		$file = 'testFile.docx';
		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $file . '"');
		header("Content-Type: application/docx");
		header('Content-Transfer-Encoding: binary');
		header("Cache-Control: public");
		header('Expires: 0');
		$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$xmlWriter->save("php://output");
	}

}

/* End of file Loan_controller.php */
/* Location: ./application/modules/loan/controllers/Loan_controller.php */