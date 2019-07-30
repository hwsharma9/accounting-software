<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function uploadImage($files='')
	{
		if ($files) {
			$config['upload_path']          = 'assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('image'))
            {
                $error = array('error' => $this->upload->display_errors());
                return $error;
            }
            else
            {
            	$upload = $this->upload->data();
            	$upload['asset_path'] = "assets/uploads/".$upload['file_name'];
                $data = array('upload_data' => $upload);
                return $data;
            }
		}
	}
}

/* End of file Admin_model.php */
/* Location: ./application/modules/admin/models/Admin_model.php */