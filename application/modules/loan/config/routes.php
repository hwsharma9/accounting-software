<?php 

// Loan
$route['loan/provide-loan/(:any)'] = 'loan/provideLoanPage/$1';
$route['loan/loan-agreement-form/(:any)'] = 'loan/loanAgreementForm/$1';
$route['loan/loan-assets-list/(:any)'] = 'loan/loanAssetsList/$1';
$route['loan/loan-installments-list/(:any)'] = 'loan/loanInstallmentsList/$1';
$route['loan/loan-providers-list'] = 'loan/loanProvidersList';
$route['loan/loan-providers-list/(:num)'] = 'loan/loanProvidersList/$1';
$route['loan/loan-receipt/([a-z]+)/(:any)'] = 'loan/downloadLoanReceipt/$1/$2';
$route['loan/download-installment-receipt/([a-z]+)/(:any)'] = 'loan/downloadInstallmentReceipt/$1/$2';

?>