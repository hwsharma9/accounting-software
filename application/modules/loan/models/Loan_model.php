<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan_model extends CI_Model {

	function __construct() {
        // Set table name
        $this->table = 'loans';
        // Set orderable column fields
        $this->column_order = array(null, 'id','member_id','branch','amount_of_loan','loan_for_months','installment_per_month','total_payment','agreement_start','agreement_end');
        // Set searchable column fields
        $this->column_search = array('id','member_id','branch','amount_of_loan','loan_for_months','installment_per_month','total_payment','agreement_start','agreement_end');
        // Set default order
        $this->order = array('id' => 'desc');
    }
    
    /*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows($postData){
        $this->_get_datatables_query($postData);
        if(isset($postData['length']) && $postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    /*
     * Count all records
     */
    public function countAll(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    /*
     * Count records based on the filter params
     * @param $_POST filter data based on the posted parameters
     */
    public function countFiltered($postData){
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    /*
     * Perform the SQL queries needed for an server-side processing requested
     * @param $_POST filter data based on the posted parameters
     */
    private function _get_datatables_query($postData){
        if (isset($postData['fields']) && !empty($postData['fields'])) {
            $this->db->select($postData['fields']);
        }else{
            $this->db->select("L.id,L.member_id,L.branch,L.amount_of_loan,L.loan_for_months,L.installment_per_month,L.total_payment,L.agreement_start,L.agreement_end,L.date,L.loan_approve_date,L.loan_complete_date,MA.borrower_name");
        }
        $this->db->from($this->table." AS L");
        $this->db->join("loan_applicant AS MA","L.id = MA.loan_id","left");
        // loop searchable columns 
        if (isset($postData['search'])) {
            foreach($this->column_search as $key => $item){
                // if datatable send POST for search
                if($postData['search']['value']){
                    // first loop
                    if($key===0){
                        // open bracket
                        $this->db->group_start();
                    }
                    $this->db->or_like($item, $postData['search']['value']);
                    
                    // last loop
                    if(count($this->column_search) - 1 == $key){
                        // close bracket
                        $this->db->group_end();
                    }
                }
            }
        }

        if (isset($postData['loan_status'])) {
            $this->db->where("loan_status",$postData['loan_status']);
        }

        if (isset($postData['id'])) {
            $this->db->where("L.id",$postData['id']);
        }
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    /**
     * Save the loan asset and installment details
     * @param  array  $post Post data submited by add loan form
     * @return int       returns the last inserted loanid.
     */
    public function saveLoanDetails($post=array())
    {
        $post['loan_status'] = 1;
        $post['existing_loans_detail'] = $this->getExistingLoansDetail($post);
        $post['credit_card_detail'] = $this->getCreditCardDetail($post);
        $post['bank_account_detail'] = $this->getBankAccountDetail($post);
        $post['insurance_detail'] = $this->getInsuranceDetail($post);
        $loan_data = $this->common->getField("loans",$post);
        $loan_applicant = $this->common->getField("loan_applicant",$post);
        // echo "<pre>";
        // print_r ($post);
        // print_r($loan_data);
        // print_r($loan_applicant);
        // echo "</pre>";die;
        $res = $this->common->insertData("loans",$loan_data);
        $loan_id = $this->db->insert_id();
        $post['loan_id'] = $loan_id;
        $loan_applicant['userid'] = $post['member_id'];
        $loan_applicant['loan_id'] = $loan_id;
        $res = $this->common->insertData("loan_applicant",$loan_applicant);
        // $this->common->arrayInsert("loan_installments",$this->setLoanInstallments($post));
        $this->common->arrayInsert("loan_assets",$this->setLoanAssets($post));
        $this->common->arrayInsert("loan_guarantor",$this->getGuarantoDetail($post));
        return $loan_id;
    }

    public function getGuarantoDetail($post=array())
    {
        $guarantor_detail = array();
        if (isset($post['guarantor_member_id']) && is_array($post['guarantor_member_id'])) {
            for ($i=0; $i < count($post['guarantor_member_id']); $i++) { 
                if (!empty($post['guarantor_member_id'][$i])) {
                    $array = array(
                                "loan_id" => $post['loan_id'],
                                "guarantor_member_id" => $post['guarantor_member_id'][$i],
                                "guarantor_name" => $post['guarantor_name'][$i],
                                "guarantor_bail_money" => $post['guarantor_bail_money'][$i]
                            );
                    array_push($guarantor_detail, $array);
                }
            }
        }
        return $guarantor_detail;
    }

    public function getExistingLoansDetail(&$post=array())
    {
        $el_detail = array();
        if (isset($post['eld_bank_financial_institution']) && is_array($post['eld_bank_financial_institution'])) {
            for ($i=0; $i < count($post['eld_bank_financial_institution']); $i++) { 
                $array = array(
                            "eld_bank_financial_institution" => $post['eld_bank_financial_institution'][$i],
                            "eld_loan_amount" => $post['eld_loan_amount'][$i],
                            "eld_loan_tenure" => $post['eld_loan_tenure'][$i],
                            "eld_emi_paid" => $post['eld_emi_paid'][$i],
                            "eld_emi" => $post['eld_emi'][$i],
                        );
                array_push($el_detail, $array);
            }
        }
        unset($post['eld_bank_financial_institution'],
                $post['eld_loan_amount'],
                $post['eld_loan_tenure'],
                $post['eld_emi_paid'],
                $post['eld_emi']);
        return json_encode($el_detail);
    }

    public function getCreditCardDetail(&$post=array())
    {
        $cc_detail = array();
        if (isset($post['ccd_bank_financial_institution']) && is_array($post['ccd_bank_financial_institution'])) {
            for ($i=0; $i < count($post['ccd_bank_financial_institution']); $i++) { 
                $array = array(
                            "ccd_bank_financial_institution" => $post['ccd_bank_financial_institution'][$i],
                            "ccd_card_holder" => $post['ccd_card_holder'][$i],
                            "ccd_card_no" => $post['ccd_card_no'][$i],
                            "ccd_card_limit" => $post['ccd_card_limit'][$i]
                        );
                array_push($cc_detail, $array);
            }
        }
        unset(
            $post['ccd_bank_financial_institution'],
            $post['ccd_card_holder'],
            $post['ccd_card_no'],
            $post['ccd_card_limit']
        );
        return json_encode($cc_detail);
    }

    public function getBankAccountDetail(&$post=array())
    {
        $ba_detail = array();
        if (isset($post['bd_bank_financial_institution']) && is_array($post['bd_bank_financial_institution'])) {
            for ($i=0; $i < count($post['bd_bank_financial_institution']); $i++) { 
                $array = array(
                            "bd_bank_financial_institution" => $post['bd_bank_financial_institution'][$i],
                            "bd_account_holder" => $post['bd_account_holder'][$i],
                            "bd_account_no" => $post['bd_account_no'][$i],
                            "bd_banking_since" => $post['bd_banking_since'][$i]
                        );
                array_push($ba_detail, $array);
            }
        }
        unset(
            $post['bd_bank_financial_institution'],
            $post['bd_account_holder'],
            $post['bd_account_no'],
            $post['bd_banking_since']
        );
        return json_encode($ba_detail);
    }

    public function getInsuranceDetail(&$post=array())
    {
        $i_detail = array();
        if (isset($post['id_insurance_company']) && is_array($post['id_insurance_company'])) {
            for ($i=0; $i < count($post['id_insurance_company']); $i++) { 
                $array = array(
                            "id_insurance_company" => $post['id_insurance_company'][$i],
                            "id_policy_holder" => $post['id_policy_holder'][$i],
                            "id_policy_no" => $post['id_policy_no'][$i],
                            "id_insurance_calue" => $post['id_insurance_calue'][$i]
                        );
                array_push($i_detail, $array);
            }
        }
        unset(
            $post['id_insurance_company'],
            $post['id_policy_holder'],
            $post['id_policy_no'],
            $post['id_insurance_calue']
        );
        return json_encode($i_detail);
    }

    /**
     * Creates the multidiamentional array of loan_assets table.
     * @param array $loan_data Post data submited by add loan form
     */
    public function setLoanAssets($loan_data=array())
    {
        $assets = array();
        if (isset($loan_data['assets_name']) && $loan_data['assets_name']) {
            for ($i=0; $i < count($loan_data['assets_name']); $i++) {
                if (!empty($loan_data['assets_name'][$i])) {
                    $array = array(
                                "loan_id" => $loan_data['loan_id'],
                                "assets_name" => $loan_data['assets_name'][$i],
                                "assets_price" => $loan_data['assets_price'][$i],
                                "assets_description" => $loan_data['assets_description'][$i],
                            );
                    array_push($assets, $array);
                }
            }
        }
        return $assets;
    }

    /**
     * Creates the multidiamentional array of loan_installments table.
     * @param array $loan_data Post data submited by add loan form
     */
    public function setLoanInstallments($loan_data=array())
    {
        $installments = array();
        if ($loan_data) {
            $start_date = $loan_data['agreement_start'];
            for ($i=0; $i < $loan_data['loan_for_months']; $i++) { 
                if (!empty($start_date)) {
                    if ($i!=0) {
                        $start_date = date("Y-m-d",strtotime($start_date."+1 month"));
                    }
                    $array = array(
                                "loan_id" => $loan_data['loan_id'],
                                "loan_amount" => $loan_data['installment_per_month'],
                                "payment_date" => $start_date,
                                "payment_end_date" => date("Y-m-d",strtotime($start_date."+7 day"))
                            );
                    array_push($installments, $array);
                }
            }
        }
        return $installments;
    }

    public function getInstallmentDetail($installment_id)
    {
        $this->db->select("LI.*,MD.member_id,MD.member_name");
        $this->db->from("loan_installments AS LI");
        $this->db->join("loans AS L","LI.loan_id = L.id","left");
        $this->db->join("member_details AS MD","MD.member_id = L.member_id","left");
        $this->db->where("LI.id",$installment_id);
        $res = $this->db->get()->row_array();
        return $res;
    }

}

/* End of file Load_model.php */
/* Location: ./application/modules/loan/models/Load_model.php */