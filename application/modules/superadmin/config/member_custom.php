<?php 

$config['add_member'] = array(
						array(
							'field' => 'profile_pic',
							'label' => 'Profile Picture',
							'rules' => 'callback_check_img_type'
						),
						array(
							'field' => 'first_name',
							'label' => 'First Name',
							'rules' => 'trim|required|callback_alpha_dash_space'
						),
						array(
							'field' => 'last_name',
							'label' => 'Last Name',
							'rules' => 'trim|required|callback_alpha_dash_space'
						),
						array(
							'field' => 'date_of_birth',
							'label' => 'Date of Birth',
							'rules' => 'trim|required'
						),
						array(
							'field' => 'address',
							'label' => 'Address',
							'rules' => 'trim|required'
						),
						array(
							'field' => 'state',
							'label' => 'State',
							'rules' => 'trim|required'
						),
						array(
							'field' => 'city',
							'label' => 'City',
							'rules' => 'trim|required'
						),
						array(
							'field' => 'zipcode',
							'label' => 'Postal zipcode',
							'rules' => 'trim|required|numeric'
						),
						array(
							'field' => 'occupation',
							'label' => 'Occupation',
							'rules' => 'trim|required'
						),
						array(
							'field' => 'religion',
							'label' => 'Religion',
							'rules' => 'trim|required'
						),
						array(
							'field' => 'mobile_no',
							'label' => 'Mobile Number',
							'rules' => 'trim|numeric|min_length[10]|max_length[12]'
						),
						array(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'trim|valid_email'
						),
						array(
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'trim|required|alpha_numeric'
						),
						array(
							'field' => 'no_family_members',
							'label' => 'No of family members',
							'rules' => 'trim|required'
						),
						array(
							'field' => 'head_family_name',
							'label' => 'Family Head Person Name',
							'rules' => 'trim|required|callback_alpha_dash_space'
						),
						array(
							'field' => 'fathers_name',
							'label' => 'Fathers Name',
							'rules' => 'trim|required|callback_alpha_dash_space'
						),
						array(
							'field' => 'mothers_name',
							'label' => 'Mothers Name',
							'rules' => 'trim|required|callback_alpha_dash_space'
						),
						array(
							'field' => 'marital_status',
							'label' => 'Marital Status',
							'rules' => 'trim|required'
						),
						array(
							'field' => 'website',
							'label' => 'Website',
							'rules' => 'trim|valid_url'
						),
						array(
							'field' => 'passing_year[]',
							'label' => 'Passing Year',
							'rules' => 'trim|integer|min_length[4]|max_length[4]|regex_match[/^(19|20)\d{2}$/]'
						),
						/*array(
							'field'=>'guarantor_member_id',
							'label'=>'Guarantor Member ID',
							'rules'=>'trim|required|regex_match[/^\d+(\.\d{1,2})?$/]'
						),*/
					);

?>