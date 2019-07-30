<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

	public function reportSearch($get=array())
	{
		//$q = "SELECT MA.member_id,sum(MA.amount) AS sum_amount,max(MA.id) as id,max(MA.fee_submission_type) AS fee_submission_type,max(MA.description) AS description,max(MA.paid_date) AS paid_date,max(MD.member_name) as member_name FROM `member_account` AS MA LEFT JOIN member_details AS MD ON MA.member_id = MD.member_id WHERE MA.fee_submission_type = 4 GROUP BY MA.member_id";
		$this->db->select("MA.member_id,sum(MA.amount) AS sum_amount,max(MA.fee_submission_type) AS fee_submission_type,max(MD.member_name) as member_name");
		$this->db->from("member_account AS MA");
		$this->db->join("member_details AS MD","MA.member_id = MD.member_id","left");
		$fee_submission_type = 1;
		if (isset($get['fee_submission_type']) && !empty($get['fee_submission_type']) && in_array($get['fee_submission_type'], array_keys(config_item('fee_submission_type')))) {
			$fee_submission_type = $get['fee_submission_type'];
		}
		$this->db->where("MA.fee_submission_type",$fee_submission_type);
		if (isset($get['paid_date']) && !empty($get['paid_date'])) {
			$exp = explode(" - ", $get['paid_date']);
			$this->db->group_start();
				$this->db->where('date(paid_date) >= "'.$exp[0].'" && date(paid_date) <= "'.$exp[1].'"');
			$this->db->group_end();
		}else{
			$this->db->where('date_format(MA.paid_date,"%Y")',date("Y"));
		}
		$this->db->group_by("MA.member_id");
		$this->db->order_by("sum_amount","desc");
		$res = $this->db->get()->result_array();
		return $res;
	}

}