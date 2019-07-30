<span class="box-tools pull-right">
												<input type="checkbox" name="is_coapplicant" <?php echo (set_value("is_coapplicant") == "on")?"checked":""; ?> class="is_coapplicant">Co-Applicant
											</span>
<?php 


			/* Co-Applicant Validation End */
			if (isset($_POST['is_coapplicant']) && $_POST['is_coapplicant'] == "on") {
				$this->form_validation->set_rules('ca_borrower_name', 'Borrower\'s Name', 'trim|required');
				$this->form_validation->set_rules('ca_sod_name', 'S/o, W/o, D/o Name', 'trim|required|callback_alpha_dash_space');
				$this->form_validation->set_rules('ca_current_address', 'Current Address', 'trim|required');
				$this->form_validation->set_rules('ca_current_state', 'State', 'trim|required');
				$this->form_validation->set_rules('ca_current_city', 'City', 'trim|required');
				$this->form_validation->set_rules('ca_permanent_address', 'Current Address', 'trim|required');
				$this->form_validation->set_rules('ca_permanent_state', 'State', 'trim|required');
				$this->form_validation->set_rules('ca_permanent_city', 'City', 'trim|required');
				$this->form_validation->set_rules('ca_zipcode', 'Zipcode', 'trim|required|numeric');
				$this->form_validation->set_rules('ca_mobile_no', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[12]');
				$this->form_validation->set_rules('ca_email', 'Email', 'trim|valid_email');
				$this->form_validation->set_rules('ca_date_of_birth', 'Date of Birth', 'trim|required');
				$this->form_validation->set_rules('ca_marital_status', 'Marital Status', 'trim|required');
				$this->form_validation->set_rules('ca_dependent_child', 'No. of Dependants Childrens', 'trim|required|integer');
				$this->form_validation->set_rules('ca_dependent_others', 'No. of Dependants Others', 'trim|required|integer');
				$this->form_validation->set_rules('ca_pan_no', 'PAN No.', 'trim|required');
				$this->form_validation->set_rules('ca_occupation', 'Occupation', 'trim|required');
				$this->form_validation->set_rules('ca_qualification', 'Qualification', 'trim|required');
				$this->form_validation->set_rules('ca_designation', 'Designation', 'trim|required');
				$this->form_validation->set_rules('ca_retirement_age', 'Retirement Age', 'trim|required');
				$this->form_validation->set_rules('ca_monthly_income', 'Monthly Income', 'trim|required|numeric');
				$this->form_validation->set_rules('ca_other_income', 'Other Income', 'trim|numeric');
				$this->form_validation->set_rules('ca_organisation', 'Organisation', 'trim|required');
				$this->form_validation->set_rules('ca_industry', 'Industry', 'trim|required');
				$this->form_validation->set_rules('ca_category', 'category', 'trim|required');
			}
			/* Co-Applicant Validation End */
 ?>
<div class="coapplicant" style=" <?php echo (set_value("is_coapplicant") == "on")?"display: block;":"display: none;"; ?>">
									<div class="row">
										<div class="box-header with-border">
											<h3 class="box-title"><?php echo lang("caborrower_details"); ?></h3>
										</div>
										<div class="col-md-3">
											<div class="box box-primary">
									            <div class="box-body box-profile">
									            	<?php 
									            		$image_path = profileImage();
									            	?>
													<img class="profile-user-img img-responsive img-circle" id="imagePreview" src="<?php echo $image_path; ?>" style="width: 200px;" alt="User profile picture">
													<input type="file" name="ca_profile_pic" id="imageUpload">
									            </div>
									        </div>
										</div>
										<div class="col-md-9">
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang("borrower_name"); ?></label>
										            <?php echo form_input(array("name"=>"ca_borrower_name","type"=>"text","value"=>set_value("ca_borrower_name"),"class"=>"form-control","placeholder"=>"Borrower Name")); ?>
									            	<?php echo form_error('ca_borrower_name'); ?>
										        </div>
										    </div>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang("sod_name"); ?></label>
										            <?php echo form_input(array("name"=>"ca_sod_name","type"=>"text","value"=>set_value("ca_sod_name"),"class"=>"form-control","placeholder"=>"S/o, W/o, D/o")); ?>
									            	<?php echo form_error('ca_sod_name'); ?>
										        </div>
										    </div>
										    <div class="clearfix">&nbsp;</div>
										    <div class="col-md-6">
										        <div class="form-group">
										    		<label><?php echo lang("current")." ".lang("address"); ?></label>
										            <?php echo form_textarea(array("name"=>"ca_current_address","type"=>"text","value"=>set_value('ca_current_address'),"class"=>"form-control","placeholder"=>"Address","rows"=>6)); ?>
									            	<?php echo form_error('ca_current_address'); ?>
										        </div>
										    </div>
										    <div class="col-md-6">
										        <div class="form-group">
										    		<label><?php echo lang("permanent")." ".lang("address"); ?></label>
										            <?php echo form_textarea(array("name"=>"ca_permanent_address","type"=>"text","value"=>set_value('ca_permanent_address'),"class"=>"form-control","placeholder"=>"Address","rows"=>6)); ?>
									            	<?php echo form_error('ca_permanent_address'); ?>
										        </div>
										    </div>
										    <div class="col-md-6">
										        <div class="form-group">
										    		<label><?php echo lang("current")." ".lang('state'); ?></label>
										            <?php $states = $this->config->item("states"); ?>
										            <select name="ca_current_state" data-append="ca_cities" class="form-control states">
										            	<?php if ($states): ?>
										            		<option value="">Select States</option>
										            		<?php foreach ($states as $key => $value): ?>
										            			<option value="<?php echo $key; ?>" <?php echo (set_value('state') == $key)?'selected':''; ?>><?php echo $value; ?></option>
										            		<?php endforeach ?>
										            	<?php endif ?>
										            </select>
									            	<?php echo form_error('ca_current_state'); ?>
										        	<label><?php echo lang("current")." ".lang('city'); ?></label>
										            <select name="ca_current_city" id="ca_cities" class="form-control">
										            	<?php if ($cities): ?>
										            		<option value="">Select City</option>
										            		<?php foreach ($cities as $key => $value): ?>
										            			<option value="<?php echo $value['city_id']; ?>" <?php echo (set_value('city') == $value['city_id'])?'selected':''; ?>><?php echo $value['city_name']; ?></option>
										            		<?php endforeach ?>
										            	<?php endif ?>
										            </select>
									            	<?php echo form_error('ca_current_city'); ?>
										        </div>
										    </div>
										    <div class="col-md-6">
										        <div class="form-group">
										    		<label><?php echo lang("permanent")." ".lang('state'); ?></label>
										            <?php $states = $this->config->item("states"); ?>
										            <select name="ca_permanent_state" data-append="ca_cities" class="form-control states">
										            	<?php if ($states): ?>
										            		<option value="">Select States</option>
										            		<?php foreach ($states as $key => $value): ?>
										            			<option value="<?php echo $key; ?>" <?php echo (set_value('state') == $key)?'selected':''; ?>><?php echo $value; ?></option>
										            		<?php endforeach ?>
										            	<?php endif ?>
										            </select>
									            	<?php echo form_error('ca_permanent_state'); ?>
										        	<label><?php echo lang("permanent")." ".lang('city'); ?></label>
										            <select name="ca_city" id="ca_cities" class="form-control">
										            	<?php if ($cities): ?>
										            		<option value="">Select City</option>
										            		<?php foreach ($cities as $key => $value): ?>
										            			<option value="<?php echo $value['city_id']; ?>" <?php echo (set_value('city') == $value['city_id'])?'selected':''; ?>><?php echo $value['city_name']; ?></option>
										            		<?php endforeach ?>
										            	<?php endif ?>
										            </select>
									            	<?php echo form_error('ca_permanent_city'); ?>
										        </div>
										    </div>
										    <div class="clearfix">&nbsp;</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
									            <label><?php echo lang('zip'); ?></label>
							            		<?php echo form_input(array("name"=>"ca_zipcode","type"=>"text","value"=>set_value("zipcode"),"class"=>"form-control","placeholder"=>"Postal Zipcode")); ?>
									            	<?php echo form_error('ca_zipcode'); ?>
									        </div>
										</div>
									    <div class="col-md-3">
									        <div class="form-group">
								            	<label><?php echo lang('p_no'); ?></label>
						            			<?php echo form_input(array("name"=>"ca_phone_no","type"=>"text","value"=>set_value('phone_no'),"class"=>"form-control","placeholder"=>"Phone No.")); ?>
									            	<?php echo form_error('ca_phone_no'); ?>
									        </div>
									    </div>
									    <div class="col-md-3">
									        <div class="form-group">
								            	<label><?php echo lang('m_no'); ?></label>
						            			<?php echo form_input(array("name"=>"ca_mobile_no","id"=>"ca_mobile_no","type"=>"text","value"=>set_value("mobile_no"),"class"=>"form-control","placeholder"=>"Mobile No.")); ?>
									            <?php echo form_input(array("name"=>"ca_member_id","type"=>"hidden","id"=>"ca_member_id")); ?>
									            <?php echo form_error('ca_mobile_no'); ?>
									        </div>
									    </div>
									    <div class="col-md-3">
									        <div class="form-group">
									        	<label><?php echo lang('email'); ?></label>
								            	<?php echo form_input(array("name"=>"ca_email","type"=>"text","value"=>set_value("email"),"class"=>"form-control","placeholder"=>"Email")); ?>
									            	<?php echo form_error('ca_email'); ?>
									        </div>
									    </div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("dob"); ?></label>
												<div class="input-group dob">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
									            	<?php echo form_input(array("name"=>"ca_date_of_birth","value"=>set_value("ca_date_of_birth"),"class"=>"form-control pull-right","placeholder"=>"Date of Birth","autocomplete"=>"off")); ?>
									            </div>
									            <?php echo form_error('ca_date_of_birth'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("gender"); ?></label>
												<div class="row">
									            	<div class="col-md-6 col-xs-6">
									            		<input type="radio" name="ca_gender" <?php echo (set_value('ca_gender') == "male")?'checked':'checked' ?> value="male" /><?php echo lang("male"); ?>
									            	</div>
									            	<div class="col-md-6 col-xs-6">
									            		<input type="radio" name="ca_gender" <?php echo (set_value('ca_gender') == "female")?'checked':'' ?> value="female" /><?php echo lang("female"); ?>
									            	</div>
									            </div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("marital_status"); ?></label>
												<?php $marital_status = $this->config->item("marital_status"); ?>
									            <select name="ca_marital_status" id="marital_status" class="form-control select2" style="width: 100%;">
									            	<?php if ($marital_status): ?>
									            		<option value="">Select Marital Status</option>
										            	<?php foreach ($marital_status as $key => $value): ?>
										            		<option value="<?php echo $value ?>" <?php echo (set_value('ca_marital_status') == $value)?'selected':''; ?>><?php echo $value ?></option>
										            	<?php endforeach ?>
									            	<?php endif ?>
									            </select>
									            <?php echo form_error('ca_marital_status'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("dependants_childrens"); ?></label>
												<?php echo form_input(array("name"=>"ca_dependent_child","value"=>set_value("ca_dependent_child"),"class"=>"form-control","placeholder"=>"No. of Dependant Childrens")); ?>
									            <?php echo form_error('ca_dependent_child'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("dependants_others"); ?></label>
												<?php echo form_input(array("name"=>"ca_dependent_others","value"=>set_value("ca_dependent_others"),"class"=>"form-control","placeholder"=>"No. of Dependant others")); ?>
									            <?php echo form_error('ca_dependent_others'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("pan_no"); ?></label>
												<?php echo form_input(array("name"=>"ca_pan_no","value"=>set_value("ca_pan_no"),"class"=>"form-control","placeholder"=>"PAN No.")); ?>
									            <?php echo form_error('ca_pan_no'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("passport_no"); ?></label>
												<?php echo form_input(array("name"=>"ca_passport_no","value"=>set_value("ca_passport_no"),"class"=>"form-control","placeholder"=>"Passport No.")); ?>
									            <?php echo form_error('ca_passport_no'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("occupation"); ?></label>
												<?php $occupation = $this->config->item("occupation"); ?>
									            <select name="ca_occupation" class="form-control select2" style="width: 100%;">
									            	<?php if ($occupation): ?>
									            		<option value="">Select Occupation</option>
										            	<?php foreach ($occupation as $key => $value): ?>
										            		<option value="<?php echo $value ?>" <?php echo (set_value('ca_occupation') == $value)?'selected':''; ?>><?php echo $value ?></option>
										            	<?php endforeach ?>
									            	<?php endif ?>
									            </select>
									            <?php echo form_error('ca_occupation'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("qualification"); ?></label>
												<?php echo form_input(array("name"=>"ca_qualification","value"=>set_value("ca_qualification"),"class"=>"form-control","placeholder"=>"Qualification")); ?>
									            <?php echo form_error('ca_qualification'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("designation"); ?></label>
												<?php echo form_input(array("name"=>"ca_designation","value"=>set_value("ca_designation"),"class"=>"form-control","placeholder"=>"Designation")); ?>
									            <?php echo form_error('ca_designation'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("retirement_age"); ?></label>
												<?php echo form_input(array("name"=>"ca_retirement_age","value"=>set_value("ca_retirement_age"),"class"=>"form-control","placeholder"=>"Retirement Age")); ?>
									            <?php echo form_error('ca_retirement_age'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("monthly_income"); ?></label>
												<?php echo form_input(array("name"=>"ca_monthly_income","value"=>set_value("ca_monthly_income"),"class"=>"form-control","placeholder"=>"Monthly Income")); ?>
									            <?php echo form_error('ca_monthly_income'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("other_income"); ?></label>
												<?php echo form_input(array("name"=>"ca_other_income","value"=>set_value("ca_other_income"),"class"=>"form-control","placeholder"=>"Other Income")); ?>
									            <?php echo form_error('ca_other_income'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("other_income_source"); ?></label>
												<?php echo form_input(array("name"=>"ca_other_income_source","value"=>set_value("ca_other_income_source"),"class"=>"form-control","placeholder"=>"Other Income Source")); ?>
									            <?php echo form_error('ca_other_income_source'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("employer_business_name"); ?></label>
												<?php echo form_input(array("name"=>"ca_emp_business_name","value"=>set_value("ca_emp_business_name"),"class"=>"form-control","placeholder"=>"Employer/Business Name")); ?>
									            <?php echo form_error('ca_emp_business_name'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("employer_business_state"); ?></label>
												<?php echo form_input(array("name"=>"ca_emp_business_state","value"=>set_value("ca_emp_business_state"),"class"=>"form-control","placeholder"=>"Employer/Business State")); ?>
									            <?php echo form_error('ca_emp_business_state'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("employer_business_city"); ?></label>
												<?php echo form_input(array("name"=>"ca_emp_business_city","value"=>set_value("ca_emp_business_city"),"class"=>"form-control","placeholder"=>"Employer/Business City")); ?>
									            <?php echo form_error('ca_emp_business_city'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("employer_business_pincode"); ?></label>
												<?php echo form_input(array("name"=>"ca_emp_business_pin","value"=>set_value("ca_emp_business_pin"),"class"=>"form-control","placeholder"=>"Employer/Business Pincode")); ?>
									            <?php echo form_error('ca_emp_business_pin'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("organisation"); ?></label>
												<?php $organisation = $this->config->item("organisation"); ?>
									            <select class="form-control select2" name="ca_organisation" style="width: 100%;">
									            	<option value="">Select Organisation</option>
									            	<?php if(isset($organisation) && !empty($organisation)){ foreach($organisation as $key=>$value) : ?>
									            		<option value="<?php echo $value; ?>" <?php echo (set_value("organisation") == $value)?'selected':''; ?>><?php echo ucwords($value); ?></option>
									            	<?php endforeach; } ?>
									            </select>
									            <?php echo form_error('ca_organisation'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("industry"); ?></label>
												<?php $industry = $this->config->item("industry"); ?>
									            <select class="form-control select2" name="ca_industry" style="width: 100%;">
									            	<option value="">Select Industry</option>
									            	<?php if(isset($industry) && !empty($industry)){ foreach($industry as $key=>$value) : ?>
									            		<option value="<?php echo $value; ?>" <?php echo (set_value("industry") == $value)?'selected':''; ?>><?php echo ucwords($value); ?></option>
									            	<?php endforeach; } ?>
									            </select>
									            <?php echo form_error('ca_industry'); ?>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php echo lang("category"); ?></label>
												<?php $category = $this->config->item("category"); ?>
									            <select class="form-control" name="ca_category">
									            	<option value="">Select Category</option>
									            	<?php if(isset($category) && !empty($category)){ foreach($category as $key=>$value) : ?>
									            		<option value="<?php echo $value; ?>" <?php echo (set_value("category") == $value)?'selected':''; ?>><?php echo ucwords($value); ?></option>
									            	<?php endforeach; } ?>
									            </select>
									            <?php echo form_error('ca_category'); ?>
											</div>
										</div>
									</div>
								</div>