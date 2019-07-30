<?php 

if (!function_exists('loanListTabs')) {
	function loanListTabs($type='1')
	{
		$CI =& get_instance();
		$html = '<ul class="nav nav-tabs nav-justified" id="myTab">';
		if (foption("sidebar","pendingloanrequest") && authenticate("1_0")):
        	$html .= '<li class="'.(($type==1)?'active':'').'"><a href="'.base_url("loan/loan-providers-list/1").'">'.lang('pending_loans_request').'</a></li>';
    	endif;
		if (foption("sidebar","liveloan") && authenticate("1_1")):
        $html .= '<li class="'.(($type==2)?'active':'').'"><a href="'.base_url("loan/loan-providers-list/2").'">'.lang('live_loans').'</a></li>';
    	endif;
		if (foption("sidebar","completeloan") && authenticate("1_2")):
        $html .= '<li class="'.(($type==3)?'active':'').'"><a href="'.base_url("loan/loan-providers-list/3").'">'.lang('complete_loans').'</a></li>';
    	endif;
        $html .= '</ul>';
        return $html;
	}
}

if (!function_exists('editLoanTabs')) {
	function editLoanTabs($id)
	{
		$CI =& get_instance();
		$detail = base64_decode($id);
		$exp = explode("_", $detail);
		$segment = $CI->uri->segment(2);
		$html = '<ul class="nav nav-tabs" id="myTab">
              		<li class="'.($segment == "loan-agreement-form"?"active":"").'">'.anchor(base_url('loan/loan-agreement-form/'.$id), lang('loan_agreement_form')).'</li>
              		<li class="'.($segment == "loan-assets-list"?"active":"").'">'.anchor(base_url('loan/loan-assets-list/'.$id), lang('assets')).'</li>
              		<li class="'.($segment == "loan-installments-list"?"active":"").'">'.anchor(base_url('loan/loan-installments-list/'.$id), lang('installments')).'</li>
              		<li class="">'.anchor(base_url('members/member-account/'.$exp[1]."/1"), lang('members_account')).'</li>
              	</ul>';
        return $html;
	}
}

?>