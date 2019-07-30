<?php 

if (!function_exists('breadcrumb')) {
	function breadcrumb($page='')
	{
		$CI =& get_instance();
		$html = '<section class="content-header">
					<ol class="breadcrumb">
						<li><a href="'.base_url("superadmin").'"><i class="fa fa-dashboard"></i> '.lang('dashboard').'</a></li>
						<li><a href="'.base_url(uri_string()).'">'.(empty($page)?'Add Breadcrumb Name':$page).'</a></li>
					</ol>
			    	<div class="clearfix">&nbsp;</div>
			    </section>';
		return $html;
	}
}

?>