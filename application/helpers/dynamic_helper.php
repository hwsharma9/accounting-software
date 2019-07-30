<?php 

if (!function_exists('foption')) {
	/**
	 * [foption just return boolean value to hide or show a div or anything on front]
	 * @param  string $file Name of file
	 * @param  string $opt  Title of field
	 * @return boolean       if file or $opt found return true, If $opt not found return false
	 */
	function foption($file='member',$opt='')
	{
		$CI =& get_instance();
		return $CI->dynamic->foption($file,$opt);
		/*$file_path = $CI->jsonpath.$file.".json";
		if (file_exists($file_path)) {
			$json = $CI->dynamic->fileContent($file);
			$result = getId($json,$opt);
			if ($result['status'] == 1) {
				return true;
			}else{
				return false;
			}
		}
		return true;*/
	}
}

if (!function_exists('authenticate')) {
	function authenticate($key='')
	{
		$CI =& get_instance();
		$permissions = json_decode($CI->session->userdata('permissions'),true);
		$exp = explode("_", $key);
		$status = true;
		if ($exp) {
			// foreach ($exp as $key => $value) {
				// $last = (isset($exp[$key-1])?$exp[$key-1]."_".$value:$value);
				if ($permissions[$key] == 0) {
					$status = false;
				}
			// }
		}
		return $status;
	}
}

if (!function_exists('getId')) {
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
	        		$value = getId($values['childs'],$val);
	        		if (is_array($value)) return $value;
	        	}
	        }
	    }
	}
}

if (!function_exists('fileContent')) {
	function fileContent($file='',$json=false)
	{
		$CI =& get_instance();
		$key = bin2hex($CI->encryption->create_key(32));
		$config['encryption_key'] = hex2bin($key);
		$config['cipher'] = 'aes-256';
        $config['mode'] = 'ctr';
		$CI->encryption->initialize($config);
		$json_data = read_file(JSONPATH.$file.".json",'r+');
		$json_decode = json_decode($json_data,true);
		if (is_array($json_decode)) {
			$ciphertext = $CI->encryption->encrypt($json_data);
			write_file(JSONPATH.$file.".json",$ciphertext,'r+');
			$json_data = $ciphertext;
		}
		if ($json) return $CI->encryption->decrypt($json_data);
		return json_decode($CI->encryption->decrypt($json_data),true);
	}
}

if (!function_exists('writeFile')) {
	function writeFile($file='',$content=array())
	{
		$CI =& get_instance();
		$file = JSONPATH.$file.".json";
		if (write_file($file,$CI->encryption->encrypt(json_encode($content)))) {
			return true;
		}else{
			return false;
		}
	}
}

?>