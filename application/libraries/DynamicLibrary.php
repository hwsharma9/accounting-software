<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DynamicLibrary
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	/**
	 * [foption just return boolean value to hide or show a div or anything on front]
	 * @param  string $file Name of file
	 * @param  string $opt  Title of field
	 * @return boolean       if file or $opt found return true, If $opt not found return false
	 */
	public function foption($file='member',$opt='')
	{
		$file_path = $this->ci->jsonpath.$file.".json";
		if (file_exists($file_path)) {
			$json = $this->ci->dynamic->fileContent($file);
			$result = getId($json,$opt);
			if ($result['status'] == 1) {
				return true;
			}else{
				return false;
			}
		}
		return true;
	}

	/**
	 * [getId its a recursive function to find title in json file]
	 * @param  array $arr array of json file
	 * @param  string $val Title name from json file
	 * @return array
	 */
	function getId($arr, $val){
	    if(is_array($arr)){
	        foreach($arr as $values){
	        	if ($values['title'] == $val) {
	        		return array("status" => $values['status']);
	        	}
	        	if (isset($values['childs']) && is_array($values['childs'])) {
	        		$value = $this->ci->dynamic->getId($values['childs'],$val);
	        		if (is_array($value)) return $value;
	        	}
	        }
	    }
	}

	function fileContent($file='',$json=false)
	{
		$key = bin2hex($this->ci->encryption->create_key(32));
		$config['encryption_key'] = hex2bin($key);
		$config['cipher'] = 'aes-256';
        $config['mode'] = 'ctr';
		$this->ci->encryption->initialize($config);
		$json_data = read_file($this->ci->jsonpath.$file.".json",'r+');
		$json_decode = json_decode($json_data,true);
		if (is_array($json_decode)) {
			$ciphertext = $this->ci->encryption->encrypt($json_data);
			write_file($this->ci->jsonpath.$file.".json",$ciphertext,'r+');
			$json_data = $ciphertext;
		}
		if ($json) return $this->ci->encryption->decrypt($json_data);
		return json_decode($this->ci->encryption->decrypt($json_data),true);
	}

	function writeFile($file='',$content=array())
	{
		$file = $this->ci->jsonpath.$file.".json";
		if (write_file($file,$this->ci->encryption->encrypt(json_encode($content)))) {
			return true;
		}else{
			return false;
		}
	}

	public function addItemAction($post=array())
	{
		$file = $post['file'];
		$parent = $post['parent'];
		unset($post['file'],$post['parent']);
		$string = $this->ci->dynamic->fileContent($file);
		$post['title'] = url_title($post['desc'],"",true);
		$item = array(
					'title' => url_title($post['desc'],"",true),
					'desc' => $post['desc'],
					'status' => $post['status']
				);
		if ($string) {
			$exp = explode(".", $parent);
			if (count($exp) == 1) {
				if (isset($string[$exp[0]]['childs'])) {
					array_push($string[$exp[0]]['childs'], $item);
				}else{
					$string[$exp[0]]['childs'] = array($item);
				}
			}else if (count($exp) == 2) {
				if (isset($string[$exp[0]]['childs'][$exp[1]]['childs'])) {
					array_push($string[$exp[0]]['childs'][$exp[1]]['childs'], $item);
				}else{
					$string[$exp[0]]['childs'][$exp[1]]['childs'] = array($item);
				}
			}else if (count($exp) == 3) {
				if (isset($string[$exp[0]]['childs'][$exp[1]]['childs'][$exp[2]]['childs'])) {
					array_push($string[$exp[0]]['childs'][$exp[1]]['childs'][$exp[2]]['childs'], $item);
				}else{
					$string[$exp[0]]['childs'][$exp[1]]['childs'][$exp[2]]['childs'] = array($item);
				}
			}else if (count($exp) == 4) {
				if (isset($string[$exp[0]]['childs'][$exp[1]]['childs'][$exp[2]]['childs'][$exp[3]]['childs'])) {
					array_push($string[$exp[0]]['childs'][$exp[1]]['childs'][$exp[2]]['childs'][$exp[3]]['childs'], $item);
				}else{
					$string[$exp[0]]['childs'][$exp[1]]['childs'][$exp[2]]['childs'][$exp[3]]['childs'] = array($item);
				}
			}else if (count($exp) == 5) {
				if (isset($string[$exp[0]]['childs'][$exp[1]]['childs'][$exp[2]]['childs'][$exp[3]]['childs'][$exp[4]]['childs'])) {
					array_push($string[$exp[0]]['childs'][$exp[1]]['childs'][$exp[2]]['childs'][$exp[3]]['childs'][$exp[4]]['childs'], $item);
				}else{
					$string[$exp[0]]['childs'][$exp[1]]['childs'][$exp[2]]['childs'][$exp[3]]['childs'][$exp[4]]['childs'] = array($item);
				}
			}
		}
		return $this->ci->dynamic->writeFile($file,$string);
	}

	public function updateJson($post=array())
	{
		$file_name = $post['file'];
		$file = $this->ci->jsonpath.$file_name.".json";
		unset($post['file']);
		$json = $this->ci->dynamic->fileContent($file_name);
		return $this->ci->dynamic->updateJsonObj($post,$json);
	}

	public function updateJsonObj($post=array(),$json=array())
	{
		if ($post) {
			foreach ($post as $key => $value) {
				$exp = explode("_", $key);
				if (count($exp) == 1) {
					$json[$exp[0]]['status'] = $value;
				}else if (count($exp) == 2) {
					$json[$exp[0]]['childs'][$exp[1]]['status'] = $value;
				}else if (count($exp) == 3) {
					$json[$exp[0]]['childs'][$exp[1]]['childs'][$exp[2]]['status'] = $value;
				}else if (count($exp) == 4) {
					$json[$exp[0]]['childs'][$exp[1]]['childs'][$exp[2]]['childs'][$exp[3]]['status'] = $value;
				}else if (count($exp) == 5) {
					$json[$exp[0]]['childs'][$exp[1]]['childs'][$exp[2]]['childs'][$exp[3]]['childs'][$exp[4]]['status'] = $value;
				}
			}
		}
		return $json;
	}
}

/* End of file Dynamic.php */
/* Location: ./application/libraries/Dynamic.php */
