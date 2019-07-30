<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin_model extends CI_Model {

	public function addUser($post=array(),$files=array())
	{
		$post['member_id'] = $this->common->getMaxCountId('members','member_id');
		$status = false;
		$post['created_at'] = NOW;
		$post['updated_at'] = NOW;
		$post['joining_fees'] = 200;
		$post['text_password'] = $post['password'];
		$post['password'] = md5($post['text_password']);
		$post['spouse_name'] = ($post['marital_status'] == "married")?$post['spouse_name']:"";
		$this->db->trans_begin();
		$this->common->arrayInsert("sibling_children_details",$this->getSiblingJSON($post));
		if ($post['marital_status'] != "" && $post['marital_status'] != "single") {
			$this->common->arrayInsert("sibling_children_details",$this->getChildrenJSON($post));
		}
		$member_data = $this->common->getField("members",$post);
		$this->common->insertData("members",$member_data);
		if ($this->db->affected_rows()) { $status = true; }
		$addresses_data = $this->common->getField("addresses",$post);
		$addresses_data['type'] = 1;
		$this->common->updateData("addresses",$addresses_data,array("userid"=>$post['member_id']));
		if ($this->db->affected_rows()) { $status = true; }
		$member_family_data = $this->common->getField("member_family_info",$post);
		$this->common->updateData("member_family_info",$member_family_data,array("member_id"=>$post['member_id']));
		if ($this->db->affected_rows()) { $status = true; }
		$this->common->arrayInsert("education_details",$this->getEducationDetailArray($post));
		$member_account = array(
								"member_id" => $post['member_id'],
								"amount" => $post['joining_fees'],
								"fee_submission_type" => 1,
								"paid_date" => NOW
							);
		$this->common->insertData("member_account",$member_account);
		if (!empty($files['profile_pic']['name'])) {
			$upload_image = $this->uploadImage($files,$post['member_id']);
			$profile_image = $this->common->getField("profile_image",$upload_image['upload_data']);
			$this->common->insertData("profile_image",$profile_image);
			if ($this->db->affected_rows()) { $status = true; }
		}
		if ($this->db->trans_status() === FALSE || !$status)
		{
		    $this->db->trans_rollback();
		}else{
			$this->db->trans_commit();
		}
		return $status;
	}

	public function uploadImage($files='',$userid,$type=1)
	{
		if (!empty($files['profile_pic']['name'])) {
        	$path = "assets/admin/member_profile_pic/0/".$userid;
        	if (!is_dir($path)) {
        		mkdir($path,0777,true);
        		chmod($path,0777);
        	}
			$config['upload_path']          = $path;
            $config['allowed_types']        = 'gif|jpg|png';
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('profile_pic'))
            {
                $error = array('error' => $this->upload->display_errors());
                return $error;
            }
            else
            {
            	$upload = $this->upload->data();
            	$upload['image_path'] = $path."/".$upload['file_name'];
            	$upload['userid'] = $userid;
            	$upload['type'] = $type;
                $data = array('upload_data' => $upload);
                return $data;
            }
		}
	}

	public function getEducationDetailArray($post=array())
	{
		$education_detail = array();
		if (isset($post['education_type'])) {
			for ($i=0; $i < count($post['education_type']); $i++) { 
				$s = false;
				if (in_array($post['education_type'][$i], array(1,2))) {
					if (!empty($post['institute_name'][$i]) && !empty($post['passing_year'][$i])) {
						$s = true;
					}
				}else{
					if (!empty($post['edu_cource'][$i]) &&!empty($post['institute_name'][$i]) && !empty($post['passing_year'][$i])) {
						$s = true;
					}
				}
				if ($s) {
					$exp = explode("_", $post['education_type'][$i]);
					$array = array(
								"member_id"=>$post['member_id'],
								"education_type"=>$exp[0],
								"edu_cource"=>$post['edu_cource'][$i],
								"institute_name"=>$post['institute_name'][$i],
								"passing_year"=>$post['passing_year'][$i],
							);
					if (isset($exp[1]) && !empty($exp[1])) {
						$array['id'] = $exp[1];
					}
					array_push($education_detail, $array);
				}
			}
		}
		return $education_detail;
	}

	public function getSiblingJSON($post=array())
	{
		$siblings = array();
		if (isset($post['sibling_name']) && is_array($post['sibling_name']) && $post['sibling_name']) {
			for ($i=0; $i < count($post['sibling_name']); $i++) { 
				if (!empty($post['sibling_name'][$i])) {
					$sarray = array(
									"member_id"=>$post['member_id'],
									"name" => $post['sibling_name'][$i],
									"dob" => $post['sibling_dob'][$i],
									"gender" => $post['sibling_gender'][$i],
									"qualification" => $post['qualification'][$i],
									"type" => "sibling",
								);
					if (isset($post['siblings_id'][$i])) {
						$sarray["id"]=$post['siblings_id'][$i];
					}
					array_push($siblings, $sarray);
				}
			}
		}
		return $siblings;
	}

	public function getChildrenJSON($post=array())
	{
		$childrens = array();
		if (isset($post['child_name']) && is_array($post['child_name']) && $post['child_name']) {
			for ($i=0; $i < count($post['child_name']); $i++) { 
				if (!empty($post['child_name'][$i])) {
					$carray = array(
									"member_id"=>$post['member_id'],
									"name" => $post['child_name'][$i],
									"dob" => $post['child_dob'][$i],
									"gender" => $post['child_gender'][$i],
									"qualification" => $post['qualification'][$i],
									"type" => "children",
								);
					if (isset($post['children_id'][$i])) {
						$carray["id"]=$post['children_id'][$i];
					}
					array_push($childrens, $carray);
				}
			}
		}
		return $childrens;
	}

	public function editUser($post=array(),$files=array(),$member_id)
	{
		$siblings = $childrens = array();
		$status = false;
		$post['updated_at'] = NOW;
		$post['text_password'] = $post['password'];
		$post['password'] = md5($post['text_password']);
		$post['spouse_name'] = ($post['marital_status'] == "married")?$post['spouse_name']:"";
		$this->db->trans_begin();
		$member_data = $this->common->getField("members",$post);
		$result = $this->common->updateData("members",$member_data,array("member_id"=>$member_id));
		if ($this->db->affected_rows()) { $status = true; }
		$addresses_data = $this->common->getField("addresses",$post);
		$this->common->updateData("addresses",$addresses_data,array("userid"=>$member_id,"type"=>1));
		if ($this->db->affected_rows()) { $status = true; }
		$member_family_data = $this->common->getField("member_family_info",$post);
		$result = $this->common->updateData("member_family_info",$member_family_data,array("member_id"=>$member_id));
		if ($this->db->affected_rows()) { $status = true; }

		$post['member_id'] = $member_id;
		$siblings = $this->getSiblingJSON($post);
		if ($post['marital_status'] != "" && $post['marital_status'] != "single") {
			$childrens = $this->getChildrenJSON($post);
		}
		$education_detail = $this->getEducationDetailArray($post);
		if ($education_detail) {
			foreach ($education_detail as $key => $value) {
				if (isset($value['id']) && !empty($value['id'])) {
					$id = $value['id'];
					unset($value['id']);
					$this->common->updateData("education_details",$value,array("id"=>$id,"member_id"=>$member_id));
				}else{
					$this->common->insertData("education_details",$value);
				}
			}
		}
		if ($siblings) {
			foreach ($siblings as $key => $value) {
				if (isset($value['id']) && !empty($value['id'])) {
					$id = $value['id'];
					unset($value['id']);
					$this->common->updateData("sibling_children_details",$value,array("id"=>$id,"member_id"=>$member_id));
				}else{
					$this->common->insertData("sibling_children_details",$value);
				}
			}
		}
		if ($childrens) {
			foreach ($childrens as $key => $value) {
				if (isset($value['id']) && !empty($value['id'])) {
					$id = $value['id'];
					unset($value['id']);
					$this->common->updateData("sibling_children_details",$value,array("id"=>$id,"member_id"=>$member_id));
				}else{
					$this->common->insertData("sibling_children_details",$value);
				}
			}
		}
		if (!empty($files['profile_pic']['name'])) {
			$upload_image = $this->uploadImage($files,$member_id);
			if (!isset($upload_image['error'])) {
				if (isset($upload_image['upload_data']['is_image']) && $upload_image['upload_data']['is_image'] == 1) {
					$old_img = (isset($post['old_img']) && !empty($post['old_img']))?$post['old_img']:"";
					if (file_exists($old_img)) {
						unlink($old_img);
					}
				}
				$profile_image = $this->common->getField("profile_image",$upload_image['upload_data']);
				if ($this->common->getData("profile_image",array("userid"=>$member_id,"type"=>1))->getResult(2) == 0) {
					$this->common->insertData("profile_image",$profile_image);
				}else{
					unset($profile_image['userid']);
					$this->common->updateData("profile_image",$profile_image,array("userid"=>$member_id,"type"=>1));
				}
				if ($this->db->affected_rows()) { $status = true; }
			}else{
				$status = false;
			}
		}
		if ($this->db->trans_status() === FALSE || !$status)
		{
		    $this->db->trans_rollback();
		}else{
			$this->db->trans_commit();
		}
		return $status;
	}

    public function getShareReceiptDetail($share_id)
    {
        $this->db->select("MA.*,MD.member_id,MD.member_name");
        $this->db->from("member_account AS MA");
        $this->db->join("member_details AS MD","MD.member_id = MA.member_id","left");
        $this->db->where(array("TO_BASE64(concat(MA.id,'_',MA.member_id))"=>$share_id));
        $res = $this->db->get()->row_array();
        return $res;
    }

}

/* End of file Superadmin_model.php */
/* Location: ./application/modules/superadmin/models/Superadmin_model.php */