<?php

$route['member/member-loan-list'] = "member/memberLoanList";
$route['member/member-loan-installment-list/(:any)'] = "member/loanInstallments/$1";
$route['member/member-account/(:any)'] = "member/memberAccountPayments/$1";

?>
