<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dynamic extends MY_Superadmin {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * [index show name of all json files]
	 * @return void 
	 */
	public function index()
	{
		$json_map = directory_map($this->jsonpath, FALSE, TRUE);
		$this->loadSuperadminPage("jsonfile-list","Json File List",compact("json_map"));
	}

	/**
	 * [readJson read the json and show the tree view of json data with checkbox]
	 * @param  string $file Provide json file name
	 * @return void
	 */
	public function readJson($file='member')
	{
		// $map = directory_map($json, FALSE, TRUE);
		$json = $this->dynamic->fileContent($file);
		$this->loadSuperadminPage("show-form","Json Fields List",compact("file","json"));
	}

	/**
	 * [updateJson update json file]
	 * @return void 
	 */
	public function updateJson()
	{
		$file_name = $_POST['file'];
		$json = $this->dynamic->updateJson($_POST);
		if ($this->dynamic->writeFile($file_name,$json)) {
			$this->session->set_flashdata("message","File Updated.");
		}else{
			$this->session->set_flashdata("message","File not Updated.");
		}
		redirect(base_url('dynamic/readJson/'.$file_name),'refresh');
	}

	public function decrypt($file='member')
	{
		$string =$this->dynamic->fileContent($file,true);
		echo "<pre>";
		print_r ($string);
		echo "<br>";
		print_r (json_decode($string,true));
		echo "</pre>";
	}

	public function addItemAction()
	{
		echo $this->dynamic->addItemAction($_POST);die;
	}

	public function deleteItem()
	{
		die;
		$file = $_POST['file'];
		$string = fileContent($file);
		$exp = explode(".", $_POST['parent']);
		$str = $str1 = "";
		foreach ($exp as $key => $value) {
			$str .= ($key!=0?'.':'').$value.".childs";
			if ($key != count($exp)-1) {
				$str1 .= ($key!=0?'.':'').$value.".childs";
			}
		}
		$str = rtrim($str,".childs");
		array_forget($string,$str);
		echo writeFile($file,$string);
		$str = $str.".childs";
		$get_array = array_get($string,$str);
		$count = count(($get_array)?$get_array:array());
		if ($count == 0) {
			array_forget($string,$str1);
			writeFile($file,$string);
		}
		die;
	}

}

/* End of file Dynamic.php */
/* Location: ./application/modules/dynamic/controllers/Dynamic.php */