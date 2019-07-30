<?php  if (!defined('BASEPATH'))  exit('No direct script access allowed');
class Common_Model extends CI_Model
{
	public $data=array();
	function __construct()
	{
		parent::__construct();		
	}
	/*public function getData($tablename='', $where = array(), $field = array(),$order=array(),$limit=array(),$count='0')
	{
		if(!empty($field))
		{
			$this->db->select($field);
		}else{
			$this->db->select('*');
		}
		$this->db->from($tablename);
		if(!empty($where))
		{
			$this->db->where($where);
		}
		if($order)
		{
			$this->db->order_by($order['field'],$order['by']);
		}
		if(isset($limit['limit']) && isset($limit['offset']))
		{
			$this->db->limit($limit['limit'],$limit['offset']);
		}

		if(isset($limit['limit']) && !isset($limit['offset']))
		{
			$this->db->limit($limit['limit']);
		}
		$query = $this->db->get();
		if($count==0){
			$result = $query->result_array();
		}else{
			$result = $query->num_rows();
		}
		if($result)
		{
			$query->free_result();
			return $result;
		}else{
			return false;
		}
	}
	
	public function getsData($tablename='', $where = array(), $field = array(),$order=array(),$limit=array(),$count='0')
	{
		if(!empty($field))
		{
			$this->db->select($field);
		}else{
			$this->db->select('*');
		}
		$this->db->from($tablename);
		if(!empty($where))
		{
			$this->db->where($where);
		}
		if($order)
		{
			$this->db->order_by($order[0],$order[1]);
		}
		if(isset($limit['limit']) && isset($limit['offset']))
		{
			$this->db->limit($limit['limit'],$limit['offset']);
		}

		if(isset($limit['limit']) && !isset($limit['offset']))
		{
			$this->db->limit($limit['limit']);
		}
		$query = $this->db->get();
		if($count==0){
			$result = $query->result_array();
		}else{
			$result = $query->num_rows();
		}
		if($result)
		{
			$query->free_result();
			return $result[0];
		}else{
			return false;
		}
	}*/

	public function select($table='',$where=array(),$field='*')
	{
		$this->db->select($field)->from($table);
		if ($where) {
			$this->db->where($where);
		}
		return $this;
	}

	public function setLimit($limit='',$offset='')
	{
		if(!empty($limit) && !empty($offset))
		{
			$this->db->limit($limit,$offset);
		}

		if(!empty($limit) && empty($offset))
		{
			$this->db->limit($limit);
		}

		return $this;
	}

	public function getData($table='',$where=array(),$field='*')
	{
		$this->select($table,$where,$field);
		return $this;
	}

	public function where_in($colname='',$in='')
	{
		if(isset($colname) && isset($in))
		{
			$this->db->where_in($colname ,$in);
			return $this;
		}
	}

	public function joinTable($where=array(),$join='left')
	{
		if ($where) {
			foreach ($where as $key => $value) {
				$this->db->join($key,$value,$join);
			}
		}
		return $this;
	}

	public function getResult($status = '')
	{
		$result = array();
		$query = $this->db->get();
		if ($status == 3) {
			$result = $query;
		}else if ($status == 2) {
			$result = $query->num_rows();
		}else if ($status == 1) {
			$result = $query->row_array();
		}else{
			$result = $query->result_array();
		}
		return $result;
	}

	public function orderBy($value='')
	{
		if (!empty($value)) {
			$this->db->order_by($value);
		}
		return $this;
	}

	public function updateData($tablename='',$data=array(),$where=array())
	{
		return $this->db->update($tablename, $data, $where);
	}
	
	function getField($tablename,$post)
	{
		$content = array();
		$result = $this->db->list_fields($tablename);
		foreach ($post as $key => $value) {
			if(in_array($key, $result))
			{
				$content[$key] = $value;
			}
		}
		return $content;
	}
	public function insertData($tablename='',$data=array())
	{
		return $this->db->insert($tablename, $data);
	}
	public function jsonEncode($data=array())
	{
		header('Content-type:"application/json; charset=utf-8"');
		return json_encode($data);
	}
	public function deletedata($tablename='',$where=''){
		if(!empty($tablename) && !empty($where)):
			$this->db->where($where);
			$this->db->delete($tablename);
		else: return "Invalid Input Provided";
		endif;
	}
	
	public function sendMail($message='',$email='',$subject='')

	{
		$this->email->from("test@gmail.com",'title');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);
		if($this->email->send())
		{
			return true;
		}else{
			return false;
		}
	}


	public function getDropDowns($dropdowns=array())
	{
		foreach ($dropdowns as $key => $value) {
			$data[$value] = $this->getData($value);
		}
		return $data;
	} 

    // Return an array to use as reference or dropdown selection
    public function get_ref($table,$key,$value,$dropdown=false)
    {
        $this->db->select($key.",".$value);
        $this->db->from($table);
        $this->db->order_by($value);
        $result = $this->db->get();
        
        $array = array();
        if ($dropdown)
            $array = array("" => "Please Select");
 
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
            $array[$row[$key]] = $row[$value];
            }
        }
        return $array;
    }

    public function getCount($table,$limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->get($table);
        $result = count($query->result());
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;   
    }

	public function getMaxId($table='',$max='') {

		$query = $this->db->query("SELECT max(".$max.") as ".$max." FROM ".$table)->result_array();
		if($query[0][$max]){
			$id = (int) ($query[0][$max]+1);
		}else{
			$id = 1;
		}
		return $id;
	}


	public function getMaxCountId($table='',$max='',$where=array()) {

		$this->db->select("count(".$max.") as ".$max);
		$this->db->from($table);
		if($where){
			$this->db->where($where);
		}
		$query = $this->db->get()->result_array();
		if($query[0][$max]){
			$id = (int) ($query[0][$max]+1);
		}else{
			$id = 1;
		}
		return $id;
	}

    public function arrayInsert($table='',$data=array())
    {
        if ($data) $this->db->insert_batch($table,$data);
        return $this->db->affected_rows();
    }

    function randString( $length, $type = 'alpha_mumeric' ) {
    	if ($type == "alpha_mumeric") {
	    	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    	}else if($type == "alpha"){
	    	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    	}else{
	    	$chars = "0123456789";
    	}
	    return substr(str_shuffle($chars),0,$length);
	}


	public function backupDB()
	{
		$this->load->dbutil();
		$prefs = array(     
		    'format'      => 'zip',             
		    'filename'    => DATE.'_backup.sql'
		    );
		$backup = $this->dbutil->backup($prefs); 
		$db_name = 'backup-on-'. DATE .'.zip';
		$save = base_url().'/assets/admin/backup/'.$db_name;
		$this->load->helper('file');
		write_file($save, $backup); 
		// $this->load->helper('download');
		// force_download($db_name, $backup);
	}

	public function uploadImage($files='',$userid,$path='')
	{
		$name = array_keys($files);
		if (!empty($files[$name[0]]['name'])) {
        	$path = $path.$userid;
        	if (!is_dir($path)) {
        		mkdir($path,0777,true);
        		chmod($path,0777);
        	}
			$config['upload_path']          = $path;
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload($name[0]))
            {
                $error = array('error' => $this->upload->display_errors());
                return $error;
            }
            else
            {
            	$upload = $this->upload->data();
            	$upload['image_path'] = $path."/".$upload['file_name'];
            	$upload['userid'] = $userid;
                $data = array('upload_data' => $upload);
                return $data;
            }
		}
	}

}