<?php 

$config['add_loan'] = array(
						array(
							'field'=>'borrower_name',
							'label'=>'Borrower\'s Name',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'sod_name',
							'label'=>'S/o, W/o, D/o Name',
							'rules'=>'trim|required|callback_alpha_dash_space'
						),
						array(
							'field'=>'current_address',
							'label'=>'Current Address',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'current_state',
							'label'=>'State',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'current_city',
							'label'=>'City',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'permanent_address',
							'label'=>'Current Address',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'permanent_state',
							'label'=>'State',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'permanent_city',
							'label'=>'City',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'zipcode',
							'label'=>'Zipcode',
							'rules'=>'trim|required|numeric'
						),
						array(
							'field'=>'mobile_no',
							'label'=>'Mobile Number',
							'rules'=>'trim|required|numeric|min_length[10]|max_length[12]'
						),
						array(
							'field'=>'email',
							'label'=>'Email',
							'rules'=>'trim|valid_email'
						),
						array(
							'field'=>'date_of_birth',
							'label'=>'Date of Birth',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'marital_status',
							'label'=>'Marital Status',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'dependent_child',
							'label'=>'No. of Dependants Childrens',
							'rules'=>'trim|required|integer'
						),
						array(
							'field'=>'dependent_others',
							'label'=>'No. of Dependants Others',
							'rules'=>'trim|required|integer'
						),
						array(
							'field'=>'pan_no',
							'label'=>'PAN No.',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'occupation',
							'label'=>'Occupation',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'occupation_others',
							'label'=>'Other Occupation Detail',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'qualification',
							'label'=>'Qualification',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'designation',
							'label'=>'Designation',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'retirement_age',
							'label'=>'Retirement Age',
							'rules'=>'trim|required|integer'
						),
						array(
							'field'=>'monthly_income',
							'label'=>'Monthly Income',
							'rules'=>'trim|required|numeric'
						),
						array(
							'field'=>'other_income',
							'label'=>'Other Income',
							'rules'=>'trim|numeric'
						),
						array(
							'field'=>'organisation',
							'label'=>'Organisation',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'organisation_others',
							'label'=>'Other Organisation Detail',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'industry',
							'label'=>'Industry',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'industry_others',
							'label'=>'Other Industry Detail',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'category',
							'label'=>'category',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'witness_name',
							'label'=>'Witness\'s Name',
							'rules'=>'trim|required|callback_alpha_dash_space'
						),
						array(
							'field'=>'witness_email',
							'label'=>'Witness\'s Email',
							'rules'=>'trim|valid_email'
						),
						array(
							'field'=>'witness_mobile_no',
							'label'=>'Witness\'s Mobile Number',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'witness_address',
							'label'=>'Witness\'s Address',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'witness_state',
							'label'=>'Witness\'s State',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'witness_city',
							'label'=>'Witness\'s City',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'witness_zipcode',
							'label'=>'Witness\'s Zipcode',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'loan_purpose',
							'label'=>'Purpose of Loan',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'amount_of_loan',
							'label'=>'Amount of Loan',
							'rules'=>'trim|required|regex_match[/^\d+(\.\d{1,2})?$/]'
						),
						array(
							'field'=>'loan_for_months',
							'label'=>'Loan for months',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'finance_charge',
							'label'=>'Finance charge',
							'rules'=>'trim|required|regex_match[/^\d+(\.\d{1,2})?$/]'
						),
						array(
							'field'=>'amount_financed',
							'label'=>'Amount Financed',
							'rules'=>'trim|required|regex_match[/^\d+(\.\d{1,2})?$/]'
						),
						array(
							'field'=>'percentage_rate',
							'label'=>'Annual Percentage Rate/Year',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'installment_per_month',
							'label'=>'Installment per month',
							'rules'=>'trim|required|regex_match[/^\d+(\.\d{1,2})?$/]'
						),
						array(
							'field'=>'total_payment',
							'label'=>'Total of payment',
							'rules'=>'trim|required|regex_match[/^\d+(\.\d{1,2})?$/]'
						),
						array(
							'field'=>'agreement_start',
							'label'=>'Agreement Start Date',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'agreement_end',
							'label'=>'Agreement End Date',
							'rules'=>'trim|required'
						),
						/*array(
							'field'=>'guarantor_member_id',
							'label'=>'Guarantor Member ID',
							'rules'=>'trim|required|regex_match[/^\d+(\.\d{1,2})?$/]'
						),*/
					);

?>