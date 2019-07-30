<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Member {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->loadMemberPage('index');
	}

	public function memberLoanList()
	{
		$loan_detail = $this->common->getData("loans AS L",array("member_id"=>$this->memberid),array("L.*","LS.loan_status_description"))->joinTable(array("loan_status AS LS"=>"L.loan_status = LS.loan_status_code"))->getResult();
		// echo "<pre>";
		// print_r ($loan_detail);
		// echo "</pre>";die;
		$this->loadMemberPage('member-loan-list',"Member Loan List",compact('loan_detail'));
	}

	public function loanInstallments($loan_id='')
	{
		$loan = $this->common->getData("loans AS L",array("TO_BASE64(concat(L.id,'_',L.member_id))"=>$loan_id),array("L.id","L.member_id","L.percentage_rate","MD.member_name"))->joinTable(array("member_details AS MD"=>"L.member_id = MD.member_id"),"left")->getResult(1);
		$installments = $this->common->getData("loan_installments",array("loan_id"=>$loan['id']))->getResult();
		$this->loadMemberPage('member-loan-installments-list',"Member Loan Installments List",compact('installments','loan'));
	}

	public function memberAccountPayments($pay_type=1)
	{
		/*if ($this->common->getData("member_details",array("member_id"=>$this->memberid))->getResult(2)==0) {
			redirect(base_url('members/members-list'),'refresh');
		}*/
		$data['member'] = $this->common->getData("member_details",array("member_id"=>$this->memberid))->getResult(1);
		$data['share'] = $this->common->getData("member_account",array("member_id"=>$this->memberid,"fee_submission_type"=>$pay_type))->getResult();
		$data['pay_type'] = $pay_type;
		$data['member_id'] = $this->memberid;
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";die;
		$this->loadMemberPage('member-account','member account',$data);
	}

}

/* End of file Front_Controller.php */
/* Location: ./application/modules/front/controllers/Front_Controller.php */