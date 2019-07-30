<?php

if (!function_exists('findGroupName')) {
	function findGroupName($groups=array(),$id=array())
	{
		$names = array();
		if ($id) {
			foreach ($id as $key => $value) {
				if (array_key_exists($value, $groups)) {
					array_push($names, $groups[$value]);
				}
			}
		}
		return implode(",", $names);
	}
}

if (!function_exists("flatten")) {
	function flatten($array=array(),$k='')
	{
		if ($array) {
			$result = array();
			foreach ($array as $key => $value) :
				$result[$k.$key] = $value['status'];
				if (array_key_exists("childs", $value)) $result = array_merge($result,flatten($value['childs'],$k.$key."_"));
			endforeach;
		}
		return $result;
	}
}

if (!function_exists("merge_flatten_array")) {
	function merge_flatten_array($array=array())
	{
		$new_array = array();
		if ($array) {
			$c = count($array);
			$keys = array_keys($array[0]);
			foreach ($keys as $key => $value) {
				$status = false;
				for ($i=0; $i < $c; $i++) {
					if ($array[$i][$value] == 1) {
						$status = true;
						break;
					}
				}
				if ($status) {
					$new_array[$value] = 1;
				}else{
					$new_array[$value] = 0;
				}
			}
		}
		return $new_array;
	}
}

if (!function_exists('authTabs')) {
	function authTabs()
	{
		$CI =& get_instance();
		$html = '<ul class="nav nav-tabs nav-justified">
                    <li class="'.($CI->uri->segment(2) == "admin-list"?"active":"").'">
                        <a href="'.base_url("user_auth/admin-list").'">'.lang('admin_list').'</a>
                    </li>
                    <li class="'.($CI->uri->segment(2) == "group-list"?"active":"").'">
                        <a href="'.base_url("user_auth/group-list").'">'.lang('group_list').'</a>
                    </li>
                    <li class="'.($CI->uri->segment(2) == "admin-role-list"?"active":"").'">
                        <a href="'.base_url("user_auth/admin-role-list").'">'.lang('user_roles').'</a>
                    </li>
                </ul>';
        return $html;
	}
}

?>
