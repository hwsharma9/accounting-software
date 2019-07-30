<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
<!-- <link rel="stylesheet" href="<?php //echo base_url("assets/admin/"); ?>bower_components/select2/dist/css/select2.min.css"> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/css/bootstrapValidator.css">
<script type="text/javascript" src="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/js/bootstrapValidator.js"></script>
<!-- <script type="text/javascript" src="<?php //echo base_url("assets/admin/"); ?>bower_components/select2/dist/js/select2.full.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<?php echo breadcrumb(lang("provide_loan")); ?>
    <!-- Main content -->
    <section class="content">
		<?php echo form_open(base_url(uri_string()),array("id"=>"loanProviderForm"),array("member_id"=>$member['member_id'])); ?>
			<div class="box box-primary">
				<div class="nav-tabs-custom">
	            	<ul class="nav nav-tabs nav-justified" id="myTab">
	              		<li class="<?php echo (foption("loan","personalloanAgreement"))?'active':''; ?>"><a href="#tab_1" data-toggle="tab"><?php echo lang("personal_loan_agreement"); ?></a></li>
	              		<li class="<?php echo (!foption("loan","personalloanAgreement") && foption("loan","loandetails"))?'active':''; ?>"><a href="#tab_2" data-toggle="tab"><?php echo lang("loan_details"); ?></a></li>
	              		<li class="<?php echo (!foption("loan","personalloanAgreement") && !foption("loan","loandetails") && foption("loan","assetsdetails"))?'active':''; ?>"><a href="#tab_3" data-toggle="tab"><?php echo lang("assets_details"); ?></a></li>
	              	</ul>
	              	<div class="tab-content">
	              		<div class="tab-pane <?php echo (foption("loan","personalloanAgreement"))?'active':""; ?>" id="tab_1">
	              			<div class="box-body">
								<?php if (foption("loan","borrowerdetails")): ?>
		              				<div class="applicant">
										<div class="row">
											<div class="box-header with-border">
												<h3 class="box-title"><?php echo lang("borrower_details"); ?></h3>
											</div>
											<?php if (foption("loan","profilepicture")): ?>
											<div class="col-md-3">
												<div class="box box-primary">
										            <div class="box-body box-profile">
										            	<?php echo form_hidden(array("branch"=>"Samaj Name")); ?>
										            	<?php 
										            		$image_path = profileImage($member['image_path']);
										            	?>
														<img class="profile-user-img img-responsive img-circle" id="imagePreview" src="<?php echo $image_path; ?>" style="width: 200px;" alt="User profile picture">
														<input type="file" name="profile_pic" id="imageUpload">
										            </div>
										        </div>
											</div>
											<?php endif ?>
											<div class="col-md-9">
												<?php if (foption("loan","borrowername")): ?>
													<div class="col-md-6">
												        <div class="form-group">
												            <label><?php echo lang("borrower_name"); ?></label>
												            <?php echo form_input(array("name"=>"borrower_name","type"=>"text","value"=>(set_value("borrower_name")?set_value("borrower_name"):$member["member_name"]),"class"=>"form-control","placeholder"=>"Borrower Name")); ?>
											            	<?php echo form_error('borrower_name'); ?>
												        </div>
												    </div>
												<?php endif ?>
											    <?php if (foption("loan","sowodoname")): ?>
													<div class="col-md-6">
												        <div class="form-group">
												            <label><?php echo lang("sod_name"); ?></label>
												            <?php echo form_input(array("name"=>"sod_name","type"=>"text","value"=>set_value("sod_name"),"class"=>"form-control","placeholder"=>"S/o, W/o, D/o")); ?>
											            	<?php echo form_error('sod_name'); ?>
												        </div>
												    </div>
											    <?php endif ?>
											    <div class="clearfix">&nbsp;</div>
											    <?php if (foption("loan","currentaddress")): ?>
												    <div class="col-md-6">
												        <div class="form-group">
												    		<label><?php echo lang("current")." ".lang("address"); ?></label>
												            <?php echo form_textarea(array("name"=>"current_address","type"=>"text","value"=>set_value("current_address")?set_value("current_address"):$member['address'],"class"=>"form-control","placeholder"=>"Current Address","rows"=>3)); ?>
											            	<?php echo form_error('current_address'); ?>
												        </div>
												    </div>
											    <?php endif ?>
											    <?php if (foption("loan","permanentaddress")): ?>
												    <div class="col-md-6">
												        <div class="form-group">
												    		<label><?php echo lang("permanent")." ".lang("address"); ?></label>
												            <?php echo form_textarea(array("name"=>"permanent_address","type"=>"text","value"=>set_value("permanent_address")?set_value("permanent_address"):$member['address'],"class"=>"form-control","placeholder"=>"Permanent Address","rows"=>3)); ?>
											            	<?php echo form_error('permanent_address'); ?>
												        </div>
												    </div>
											    <?php endif ?>
											    <div class="col-md-6">
											    	<?php if (foption("loan","currentstate")): ?>
												        <div class="form-group">
												    		<label><?php echo lang("current")." ".lang('state'); ?></label>
												            <?php $states = config_item("states"); $s = (set_value("current_state")?set_value("current_state"):$member['state']); ?>
												            <select name="current_state" data-append="current_cities" class="form-control states">
												            	<?php if ($states): ?>
												            		<option value="">Select States</option>
												            		<?php foreach ($states as $key => $value): ?><option value="<?php echo $key; ?>" <?php echo ($s == $key)?'selected':''; ?>><?php echo $value; ?></option><?php endforeach ?>
												            	<?php endif ?>
												            </select>
											            	<?php echo form_error('current_state'); ?>
												        </div>
											    	<?php endif ?>
											        <?php if (foption("loan","currentcity")): ?>
												        <div class="form-group">
												        	<label><?php echo lang("current")." ".lang('city'); ?></label>
												            <select name="current_city" id="current_cities" class="form-control">
												            	<?php if ($current_city): $cc = (set_value("current_city")?set_value("current_city"):$member['city']); ?>
												            		<option value="">Select City</option>
												            		<?php foreach ($current_city as $key => $value): ?><option value="<?php echo $value['city_id']; ?>" <?php echo ($cc == $value['city_id'])?'selected':''; ?>><?php echo $value['city_name']; ?></option><?php endforeach ?>
												            	<?php endif ?>
												            </select>
											            	<?php echo form_error('current_city'); ?>
												        </div>
											        <?php endif ?>
											    </div>
											    <div class="col-md-6">
											    	<?php if (foption("loan","permanentstate")): ?>
												        <div class="form-group">
												    		<label><?php echo lang("permanent")." ".lang('state'); ?></label>
												            <?php $states = config_item("states"); $s = (set_value("permanent_state")?set_value("permanent_state"):$member['state']); ?>
												            <select name="permanent_state" data-append="permanent_cities" class="form-control states">
												            	<?php if ($states): ?>
												            		<option value="">Select States</option>
												            		<?php foreach ($states as $key => $value): ?>
												            			<option value="<?php echo $key; ?>" <?php echo ($s == $key)?'selected':''; ?>><?php echo $value; ?></option>
												            		<?php endforeach ?>
												            	<?php endif ?>
												            </select>
											            	<?php echo form_error('permanent_state'); ?>
												        </div>
											    	<?php endif ?>
											        <?php if (foption("loan","permanentcity")): ?>
												        <div class="form-group">
												        	<label><?php echo lang("permanent")." ".lang('city'); ?></label>
												            <select name="permanent_city" id="permanent_cities" class="form-control">
												            	<?php if ($permanent_city): $pc = (set_value("permanent_city")?set_value("permanent_city"):$member['city']); ?>
												            		<option value="">Select City</option>
												            		<?php foreach ($permanent_city as $key => $value): ?>
												            			<option value="<?php echo $value['city_id']; ?>" <?php echo ($pc == $value['city_id'])?'selected':''; ?>><?php echo $value['city_name']; ?></option>
												            		<?php endforeach ?>
												            	<?php endif ?>
												            </select>
											            	<?php echo form_error('permanent_city'); ?>
												        </div>
											        <?php endif ?>
											    </div>
											    <div class="clearfix">&nbsp;</div>
											</div>
											<?php if (foption("loan","zipcode")): ?>
												<div class="col-md-3">
													<div class="form-group">
											            <label><?php echo lang('zip'); $zip = set_value("zipcode")?set_value("zipcode"):$member["zipcode"]; ?></label>
									            		<?php echo form_input(array("name"=>"zipcode","type"=>"text","value"=>$zip,"class"=>"form-control","placeholder"=>"Postal Zipcode")); ?>
											            <?php echo form_error('zipcode'); ?>
											        </div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","phoneno")): ?>
											    <div class="col-md-3">
											        <div class="form-group">
										            	<label><?php echo lang('p_no'); $pno = set_value("phone_no")?set_value("phone_no"):$member['phone_no']; ?></label>
								            			<?php echo form_input(array("name"=>"phone_no","type"=>"text","value"=>$pno,"class"=>"form-control","placeholder"=>"Phone No.")); ?>
											            <?php echo form_error('phone_no'); ?>
											        </div>
											    </div>
											<?php endif ?>
										    <?php if (foption("loan","mobileno")): ?>
											    <div class="col-md-3">
											        <div class="form-group">
										            	<label><?php echo lang('m_no'); $mno = set_value("mobile_no")?set_value("mobile_no"):$member["mobile_no"]; ?></label>
								            			<?php echo form_input(array("name"=>"mobile_no","type"=>"text","value"=>$mno,"class"=>"form-control","placeholder"=>"Mobile No.")); ?>
											            <?php echo form_error('mobile_no'); ?>
											        </div>
											    </div>
										    <?php endif ?>
										    <?php if (foption("loan","email")): ?>
											    <div class="col-md-3">
											        <div class="form-group">
											        	<label><?php echo lang('email'); $email = set_value("email")?set_value("email"):$member["email"]; ?></label>
										            	<?php echo form_input(array("name"=>"email","type"=>"text","value"=>$email,"class"=>"form-control","placeholder"=>"Email")); ?>
											            <?php echo form_error('email'); ?>
											        </div>
											    </div>
										    <?php endif ?>
											<?php if (foption("loan","dateofbirth")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("dob"); $dob = set_value("date_of_birth")?set_value("date_of_birth"):$member["date_of_birth"]; ?></label>
														<div class="input-group dob">
															<div class="input-group-addon">
																<i class="fa fa-calendar"></i>
															</div>
											            	<?php echo form_input(array("name"=>"date_of_birth","value"=>($dob),"class"=>"form-control pull-right","placeholder"=>"Date of Birth","autocomplete"=>"off")); ?>
											            </div>
											            <?php echo form_error('date_of_birth'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","gender")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("gender"); ?></label>
														<div class="row">
											            	<div class="col-md-6 col-xs-6">
											            		<input type="radio" name="gender" <?php echo ($member['gender'] == "male")?'checked':'checked' ?> value="male" /><?php echo lang("male"); ?>
											            	</div>
											            	<div class="col-md-6 col-xs-6">
											            		<input type="radio" name="gender" <?php echo ($member['gender'] == "female")?'checked':'' ?> value="female" /><?php echo lang("female"); ?>
											            	</div>
											            </div>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","maritalstatus")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("marital_status"); ?></label>
														<?php $marital_status = config_item("marital_status"); ?>
											            <select name="marital_status" id="marital_status" class="form-control select2">
											            	<?php if ($marital_status): ?>
											            		<option value="">Select Marital Status</option>
												            	<?php foreach ($marital_status as $key => $value): ?>
												            		<option value="<?php echo $value ?>" <?php echo ($member['marital_status'] == $value)?'selected':''; ?>><?php echo $value ?></option>
												            	<?php endforeach ?>
											            	<?php endif ?>
											            </select>
											            <?php echo form_error('marital_status'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","noofdependantschildrens")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("dependants_childrens"); ?></label>
														<?php echo form_input(array("name"=>"dependent_child","value"=>set_value("dependent_child"),"class"=>"form-control","placeholder"=>"No. of Dependant Childrens")); ?>
											            <?php echo form_error('dependent_child'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","noofdependantsothers")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("dependants_others"); ?></label>
														<?php echo form_input(array("name"=>"dependent_others","value"=>set_value("dependent_others"),"class"=>"form-control","placeholder"=>"No. of Dependant others")); ?>
											            <?php echo form_error('dependent_others'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","panno")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("pan_no"); ?></label>
														<?php echo form_input(array("name"=>"pan_no","value"=>set_value("pan_no"),"class"=>"form-control","placeholder"=>"PAN No.")); ?>
											            <?php echo form_error('pan_no'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","passportno")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("passport_no"); ?></label>
														<?php echo form_input(array("name"=>"passport_no","value"=>set_value("passport_no"),"class"=>"form-control","placeholder"=>"Passport No.")); ?>
											            <?php echo form_error('passport_no'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","occupation")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("occupation"); ?></label>
														<?php $occupation = config_item("occupation"); $o = (set_value('occupation'))??$member['occupation']; ?>
											            <select name="occupation" class="form-control select2">
											            	<?php if ($occupation): ?>
											            		<option value="">Select Occupation</option>
												            	<?php foreach ($occupation as $key => $value): ?>
												            		<option value="<?php echo $value ?>" <?php echo ($o == $value)?'selected':''; ?>><?php echo $value ?></option>
												            	<?php endforeach ?>
											            	<?php endif ?>
											            </select>
											            <?php echo form_error('occupation'); ?>
											            <?php if (set_value('occupation') == "others"): ?>
											            	<div class="others_detail">
											            		<div class="clearfix">&nbsp;</div>
											            		<input type="text" name="occupation_others" value="<?php echo set_value("occupation_others") ?>" class="form-control" placeholder="Others Detail" />
											            		<?php echo form_error('occupation_others'); ?>
											            	</div>
											            <?php endif ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","qualification")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("qualification"); ?></label>
														<?php echo form_input(array("name"=>"qualification","value"=>set_value("qualification"),"class"=>"form-control","placeholder"=>"Qualification")); ?>
											            <?php echo form_error('qualification'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","designation")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("designation"); ?></label>
														<?php echo form_input(array("name"=>"designation","value"=>set_value("designation"),"class"=>"form-control","placeholder"=>"Designation")); ?>
											            <?php echo form_error('designation'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","retirementage")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("retirement_age"); ?></label>
														<?php echo form_input(array("name"=>"retirement_age","value"=>set_value("retirement_age"),"class"=>"form-control","placeholder"=>"Retirement Age")); ?>
											            <?php echo form_error('retirement_age'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","monthlyincome")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("monthly_income"); ?></label>
														<?php echo form_input(array("name"=>"monthly_income","value"=>set_value("monthly_income"),"class"=>"form-control","placeholder"=>"Monthly Income")); ?>
											            <?php echo form_error('monthly_income'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","otherincome")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("other_income"); ?></label>
														<?php echo form_input(array("name"=>"other_income","value"=>set_value("other_income"),"class"=>"form-control","placeholder"=>"Other Income")); ?>
											            <?php echo form_error('other_income'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","otherincomesource")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("other_income_source"); ?></label>
														<?php echo form_input(array("name"=>"other_income_source","value"=>set_value("other_income_source"),"class"=>"form-control","placeholder"=>"Other Income Source")); ?>
											            <?php echo form_error('other_income_source'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","employerbusinessname")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("employer_business_name"); ?></label>
														<?php echo form_input(array("name"=>"emp_business_name","value"=>set_value("emp_business_name"),"class"=>"form-control","placeholder"=>"Employer/Business Name")); ?>
											            <?php echo form_error('emp_business_name'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","employerbusinessstate")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("employer_business_state"); ?></label>
														<?php //echo form_input(array("name"=>"emp_business_state","value"=>set_value("emp_business_state"),"class"=>"form-control","placeholder"=>"Employer/Business State")); ?>
											            <select name="emp_business_state" data-append="emp_business_cities" class="form-control states">
											            	<?php if ($states): ?>
											            		<option value="">Select States</option>
											            		<?php foreach ($states as $key => $value): ?>
											            			<option value="<?php echo $key; ?>" <?php echo (set_value("emp_business_state") == $key)?'selected':''; ?>><?php echo $value; ?></option>
											            		<?php endforeach ?>
											            	<?php endif ?>
											            </select>
											            <?php echo form_error('emp_business_state'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","employerbusinesscity")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("employer_business_city"); ?></label>
														<?php //echo form_input(array("name"=>"emp_business_city","value"=>set_value("emp_business_city"),"class"=>"form-control","placeholder"=>"Employer/Business City")); ?>
														<select name="emp_business_city" id="emp_business_cities" class="form-control">
											            	<?php if ($employer_business_city): ?>
											            		<option value="">Select City</option>
											            		<?php foreach ($employer_business_city as $key => $value): ?>
											            			<option value="<?php echo $value['city_id']; ?>" <?php echo (set_value("emp_business_city") == $value['city_id'])?'selected':''; ?>><?php echo $value['city_name']; ?></option>
											            		<?php endforeach ?>
											            	<?php endif ?>
											            </select>
											            <?php echo form_error('emp_business_city'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","employerbusinesspincode")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("employer_business_pincode"); ?></label>
														<?php echo form_input(array("name"=>"emp_business_pin","value"=>set_value("emp_business_pin"),"class"=>"form-control","placeholder"=>"Employer/Business Pincode")); ?>
											            <?php echo form_error('emp_business_pin'); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","organisation")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("organisation"); ?></label>
														<?php $organisation = config_item("organisation"); ?>
											            <select class="form-control select2" name="organisation">
											            	<option value="">Select Organisation</option>
											            	<?php if(isset($organisation) && !empty($organisation)){ foreach($organisation as $key=>$value) : ?>
											            		<option value="<?php echo $value; ?>" <?php echo (set_value("organisation") == $value)?'selected':''; ?>><?php echo ucwords($value); ?></option>
											            	<?php endforeach; } ?>
											            </select>
											            <?php echo form_error('organisation'); ?>
											            <?php if (set_value('organisation') == "others"): ?>
											            	<div class="others_detail">
											            		<div class="clearfix">&nbsp;</div>
											            		<input type="text" name="organisation_others" value="<?php echo set_value("organisation_others") ?>" class="form-control" placeholder="Others Detail" />
											            		<?php echo form_error('organisation_others'); ?>
											            	</div>
											            <?php endif ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","industry")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("industry"); ?></label>
														<?php $industry = config_item("industry"); ?>
											            <select class="form-control select2" name="industry">
											            	<option value="">Select Industry</option>
											            	<?php if(isset($industry) && !empty($industry)){ foreach($industry as $key=>$value) : ?>
											            		<option value="<?php echo $value; ?>" <?php echo (set_value("industry") == $value)?'selected':''; ?>><?php echo ucwords($value); ?></option>
											            	<?php endforeach; } ?>
											            </select>
											            <?php echo form_error('industry'); ?>
											            <?php if (set_value('industry') == "others"): ?>
											            	<div class="others_detail">
											            		<div class="clearfix">&nbsp;</div>
											            		<input type="text" name="industry_others" value="<?php echo set_value("industry_others") ?>" class="form-control" placeholder="Others Detail" />
											            		<?php echo form_error('industry_others'); ?>
											            	</div>
											            <?php endif ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","category")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("category"); ?></label>
														<?php $category = config_item("category"); ?>
											            <select class="form-control" name="category">
											            	<option value="">Select Category</option>
											            	<?php if(isset($category) && !empty($category)){ foreach($category as $key=>$value) : ?>
											            		<option value="<?php echo $value; ?>" <?php echo (set_value("category") == $value)?'selected':''; ?>><?php echo ucwords($value); ?></option>
											            	<?php endforeach; } ?>
											            </select>
											            <?php echo form_error('category'); ?>
													</div>
												</div>
											<?php endif ?>
										</div>
									</div>
								<?php endif ?>
								<?php if (foption("loan","witnessinformation")): ?>
									<div class="row">
										<div class="box-header with-border">
											<h3 class="box-title"><?php echo lang("witness_info"); ?></h3>
										</div>
										<?php if (foption("loan","witnessname")): ?>
											<div class="col-md-4">
										        <div class="form-group">
										            <label><?php echo lang('witness_name'); ?></label>
										            <?php echo form_input(array("name"=>"witness_name","type"=>"text","value"=>set_value("witness_name"),"class"=>"form-control","placeholder"=>"Witness Name")); ?>
										            <?php echo form_error('witness_name'); ?>
										        </div>
										    </div>
										<?php endif ?>
									    <?php if (foption("loan","witnessemail")): ?>
											<div class="col-md-4">
										        <div class="form-group">
										            <label><?php echo lang('email'); ?></label>
										            <?php echo form_input(array("name"=>"witness_email","type"=>"text","value"=>set_value("witness_email"),"class"=>"form-control","placeholder"=>"Witness Email")); ?>
										            <?php echo form_error('witness_email'); ?>
										        </div>
										    </div>
									    <?php endif ?>
									    <?php if (foption("loan","witnessmobileno")): ?>
											<div class="col-md-4">
										        <div class="form-group">
										            <label><?php echo lang('m_no'); ?></label>
										            <?php echo form_input(array("name"=>"witness_mobile_no","type"=>"text","value"=>set_value("witness_mobile_no"),"class"=>"form-control","placeholder"=>"Witness Mobile No.")); ?>
										            <?php echo form_error('witness_mobile_no'); ?>
										        </div>
										    </div>
									    <?php endif ?>
									</div>
									<div class="row">
										<?php if (foption("loan","witnessaddress")): ?>
											<div class="col-md-4">
										        <div class="form-group">
										            <label><?php echo lang('address'); ?></label>
										            <?php echo form_textarea(array("name"=>"witness_address","value"=>set_value("witness_address"),"class"=>"form-control","placeholder"=>"Address","rows"=>"5")); ?>
										            <?php echo form_error('witness_address'); ?>
										        </div>
										    </div>
										<?php endif ?>
									    <div class="col-md-8">
									    	<?php if (foption("loan","witnessstate")): ?>
											    <div class="col-md-6">
											        <div class="form-group">
											            <label><?php echo lang('state'); ?></label>
											            <?php $states = config_item("states"); ?>
											            <select name="witness_state" data-append="witness_cities" class="form-control states">
											            	<?php if ($states): ?>
											            		<option value="">Select States</option>
											            		<?php foreach ($states as $key => $value): ?>
											            			<option value="<?php echo $key; ?>" <?php echo (set_value('witness_state') == $key)?'selected':''; ?>><?php echo $value; ?></option>
											            		<?php endforeach ?>
											            	<?php endif ?>
											            </select>
											            <?php echo form_error('witness_state'); ?>
											        </div>
												</div>
									    	<?php endif ?>
											<?php if (foption("loan","witnesscity")): ?>
												<div class="col-md-6">
													<div class="form-group">
											            <label><?php echo lang('city'); ?></label>
											            <select name="witness_city" id="witness_cities" class="form-control">
											            	<?php if ($witness_cities): ?>
											            		<option value="">Select City</option>
											            		<?php foreach ($witness_cities as $key => $value): ?>
											            			<option value="<?php echo $value['city_id']; ?>" <?php echo (set_value('witness_city') == $value['city_id'])?'selected':''; ?>><?php echo $value['city_name']; ?></option>
											            		<?php endforeach ?>
											            	<?php endif ?>
											            </select>
											            <?php echo form_error('witness_city'); ?>
											        </div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","witnesszipcode")): ?>
												<div class="col-md-6">
													<div class="form-group">
											            <label><?php echo lang('zip'); ?></label>
									            		<?php echo form_input(array("name"=>"witness_zipcode","type"=>"text","value"=>set_value("witness_zipcode"),"class"=>"form-control","placeholder"=>"Postal Zipcode")); ?>
											            <?php echo form_error('witness_zipcode'); ?>
											        </div>
												</div>
											<?php endif ?>
										</div>
									</div>
								<?php endif ?>
								<div class="row">
									<div class="box-header with-border">
										<h3 class="box-title"><?php echo lang('guarantor_details'); ?></h3>
									</div>
									<div class="col-sm-12 clone_detail">
										<?php if (set_value('guarantor_member_id')): ?>
											<?php for ($i=0; $i < count(set_value('guarantor_member_id')); $i++) { ?>
												<div class="html_detail">
													<div class="col-md-3">
												        <div class="form-group">
												            <label><?php echo lang('guarantor_member_id'); ?></label>
												            <?php echo form_input(array("name"=>"guarantor_member_id[]","type"=>"text","value"=>set_value("guarantor_member_id[$i]"),"class"=>"form-control guarantor_member_id","placeholder"=>"Guarantor Id")); ?>
												            <?php echo form_error('guarantor_member_id[]'); ?>
												        </div>
												    </div>
													<div class="col-md-3">
												        <div class="form-group">
												            <label><?php echo lang('guarantor_name'); ?></label>
												            <?php echo form_input(array("name"=>"guarantor_name[]","type"=>"text","value"=>set_value("guarantor_name[$i]"),"class"=>"form-control guarantor_name","placeholder"=>"Guarantor Name")); ?>
												            <?php echo form_error('guarantor_name[]'); ?>
												        </div>
												    </div>
													<div class="col-md-3">
												        <div class="form-group">
												            <label><?php echo lang('guarantor_bail_money'); ?></label>
												            <?php echo form_input(array("name"=>"guarantor_bail_money[]","type"=>"text","value"=>set_value("guarantor_bail_money[$i]"),"class"=>"form-control","placeholder"=>"Bail Money")); ?>
												            <?php echo form_error('guarantor_bail_money[]'); ?>
												        </div>
												    </div>
												    <div class="col-md-3">
										            	<div class="form-group">
										            		<div class="clearfix">&nbsp;</div>
										                    <?php if ($i == 0): ?>
										                    	<button type="button" class="btn btn-primary add_html"><i class="fa fa-plus"></i></button>
										            		<?php else: ?>
										            			<button type="button" class="btn btn-danger remove_html"><i class="fa fa-trash"></i>
										            		<?php endif ?>
										                </div>
										            </div>
										            <div class="col-md-12 member_detail" style="color:red;"></div>
											        <div class="clearfix">&nbsp;</div>
										        </div>
										<?php } else: ?>
											<div class="html_detail">
												<div class="col-md-3">
											        <div class="form-group">
											            <label><?php echo lang('guarantor_member_id'); ?></label>
											            <?php echo form_input(array("name"=>"guarantor_member_id[]","type"=>"text","value"=>set_value("guarantor_member_id[]"),"class"=>"form-control guarantor_member_id","placeholder"=>"Guarantor Id")); ?>
											            <?php echo form_error('guarantor_member_id[]'); ?>
											        </div>
											    </div>
												<div class="col-md-3">
											        <div class="form-group">
											            <label><?php echo lang('guarantor_name'); ?></label>
											            <?php echo form_input(array("name"=>"guarantor_name[]","type"=>"text","value"=>set_value("guarantor_name[]"),"class"=>"form-control guarantor_name","placeholder"=>"Guarantor Name")); ?>
											            <?php echo form_error('guarantor_name[]'); ?>
											        </div>
											    </div>
												<div class="col-md-3">
											        <div class="form-group">
											            <label><?php echo lang('guarantor_bail_money'); ?></label>
											            <?php echo form_input(array("name"=>"guarantor_bail_money[]","type"=>"text","value"=>set_value("guarantor_bail_money[]"),"class"=>"form-control","placeholder"=>"Bail Money")); ?>
											            <?php echo form_error('guarantor_bail_money[]'); ?>
											        </div>
											    </div>
											    <div class="col-md-3">
									            	<div class="form-group">
									            		<div class="clearfix">&nbsp;</div>
									                    <button type="button" class="btn btn-primary add_html"><i class="fa fa-plus"></i></button>
									                </div>
									            </div>
									            <div class="col-md-12 member_detail" style="color:red;"></div>
										        <div class="clearfix">&nbsp;</div>
									        </div>
								        <?php endif ?>
								    </div>
								</div>
							</div>
	              		</div>
	              		<div class="tab-pane <?php echo (!foption("loan","personalloanAgreement") && foption("loan","loandetails"))?'active':""; ?>" id="tab_2">
	              			<?php if (foption("loan","existingloansdetails")): ?>
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo lang('existing_loans_details'); ?></h3>
								</div>
								<div class="box-body">
	              					<?php if (foption("loan","autoloansdetails")): ?>
										<div class="row">
											<?php if (foption("loan","autoloan")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('type_of_loan'); ?></label>
														<?php echo form_input(array("name"=>"eld_type_of_loan[]","type"=>"text","value"=>"Auto","disabled"=>true,"class"=>"form-control","placeholder"=>"Type of Loan")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","autobankfinancia")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('bank_financial_institution'); ?></label>
														<?php echo form_input(array("name"=>"eld_bank_financial_institution[]","type"=>"text","value"=>set_value("eld_bank_financial_institution[0]"),"class"=>"form-control","placeholder"=>"Bank/Financial Institution")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","autoloanamount")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('loan_amount'); ?></label>
														<?php echo form_input(array("name"=>"eld_loan_amount[]","type"=>"text","value"=>set_value("eld_loan_amount[0]"),"class"=>"form-control","placeholder"=>"Loan Amount")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","autoloantenure")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('loan_tenure'); ?></label>
														<?php echo form_input(array("name"=>"eld_loan_tenure[]","type"=>"text","value"=>set_value("eld_loan_tenure[0]"),"class"=>"form-control","placeholder"=>"Loan Tenure")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","autonoofemipaid")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('no_emi_paid'); ?></label>
														<?php echo form_input(array("name"=>"eld_emi_paid[]","type"=>"text","value"=>set_value("eld_emi_paid[0]"),"class"=>"form-control","placeholder"=>"No. of EMI Paid")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","autoemi")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('emi'); ?></label>
														<?php echo form_input(array("name"=>"eld_emi[]","type"=>"text","value"=>set_value("eld_emi[0]"),"class"=>"form-control","placeholder"=>"EMI")); ?>
													</div>
												</div>
											<?php endif ?>
										</div>
	              					<?php endif ?>
	              					<?php if (foption("loan","homeloansdetails")): ?>
										<div class="row">
											<?php if (foption("loan","homeloan")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('type_of_loan'); ?></label>
														<?php echo form_input(array("name"=>"eld_type_of_loan[]","type"=>"text","value"=>"Home","disabled"=>true,"class"=>"form-control","placeholder"=>"Type of Loan")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","homebankfinancia")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('bank_financial_institution'); ?></label>
														<?php echo form_input(array("name"=>"eld_bank_financial_institution[]","type"=>"text","value"=>set_value("eld_bank_financial_institution[1]"),"class"=>"form-control","placeholder"=>"Bank/Financial Institution")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","homeloanamount")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('loan_amount'); ?></label>
														<?php echo form_input(array("name"=>"eld_loan_amount[]","type"=>"text","value"=>set_value("eld_loan_amount[1]"),"class"=>"form-control","placeholder"=>"Loan Amount")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","homeloantenure")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('loan_tenure'); ?></label>
														<?php echo form_input(array("name"=>"eld_loan_tenure[]","type"=>"text","value"=>set_value("eld_loan_tenure[1]"),"class"=>"form-control","placeholder"=>"Loan Tenure")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","homenoofemipaid")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('no_emi_paid'); ?></label>
														<?php echo form_input(array("name"=>"eld_emi_paid[]","type"=>"text","value"=>set_value("eld_emi_paid[1]"),"class"=>"form-control","placeholder"=>"No. of EMI Paid")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","homeemi")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('emi'); ?></label>
														<?php echo form_input(array("name"=>"eld_emi[]","type"=>"text","value"=>set_value("eld_emi[1]"),"class"=>"form-control","placeholder"=>"EMI")); ?>
													</div>
												</div>
											<?php endif ?>
										</div>
	              					<?php endif ?>
	              					<?php if (foption("loan","personalloansdetails")): ?>
										<div class="row">
											<?php if (foption("loan","personalloan")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('type_of_loan'); ?></label>
														<?php echo form_input(array("name"=>"eld_type_of_loan[]","type"=>"text","value"=>"Personal","disabled"=>true,"class"=>"form-control","placeholder"=>"Type of Loan")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","personalbankfinancialinstitution")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('bank_financial_institution'); ?></label>
														<?php echo form_input(array("name"=>"eld_bank_financial_institution[]","type"=>"text","value"=>set_value("eld_bank_financial_institution[2]"),"class"=>"form-control","placeholder"=>"Bank/Financial Institution")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","personalloanamount")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('loan_amount'); ?></label>
														<?php echo form_input(array("name"=>"eld_loan_amount[]","type"=>"text","value"=>set_value("eld_loan_amount[2]"),"class"=>"form-control","placeholder"=>"Loan Amount")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","personalloantenure")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('loan_tenure'); ?></label>
														<?php echo form_input(array("name"=>"eld_loan_tenure[]","type"=>"text","value"=>set_value("eld_loan_tenure[2]"),"class"=>"form-control","placeholder"=>"Loan Tenure")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","personalnoofemipaid")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('no_emi_paid'); ?></label>
														<?php echo form_input(array("name"=>"eld_emi_paid[]","type"=>"text","value"=>set_value("eld_emi_paid[2]"),"class"=>"form-control","placeholder"=>"No. of EMI Paid")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","personalemi")): ?>
												<div class="col-md-4">
													<div class="form-group">
														<label><?php echo lang('emi'); ?></label>
														<?php echo form_input(array("name"=>"eld_emi[]","type"=>"text","value"=>set_value("eld_emi[2]"),"class"=>"form-control","placeholder"=>"EMI")); ?>
													</div>
												</div>
											<?php endif ?>
										</div>
	              					<?php endif ?>
								</div>
	              			<?php endif ?>
	              			<?php if (foption("loan","creditcarddetails")): ?>
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo lang('credit_card_details'); ?></h3>
								</div>
								<div class="box-body">
	              					<?php if (foption("loan","visacreditcarddetails")): ?>
										<div class="row">
											<?php if (foption("loan","visacreditcard")): ?>
												<div class="col-md-2">
													<div class="form-group">
														<label><?php echo lang('type_of_card'); ?></label>
														<?php echo form_input(array("name"=>"ccd_type_of_card[]","type"=>"text","value"=>"VISA","disabled"=>true,"class"=>"form-control","placeholder"=>"Type of Card")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","visabankfinancialinstitution")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang('bank_financial_institution'); ?></label>
														<?php echo form_input(array("name"=>"ccd_bank_financial_institution[]","type"=>"text","value"=>set_value("ccd_bank_financial_institution[0]"),"class"=>"form-control","placeholder"=>"Bank/Financial Institution")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","visacardholder")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang('card_holder'); ?></label>
														<?php echo form_input(array("name"=>"ccd_card_holder[]","type"=>"text","value"=>set_value("ccd_card_holder[0]"),"class"=>"form-control","placeholder"=>"Card Holder")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","visacardno")): ?>
												<div class="col-md-2">
													<div class="form-group">
														<label><?php echo lang('card_no'); ?></label>
														<?php echo form_input(array("name"=>"ccd_card_no[]","type"=>"text","value"=>set_value("ccd_card_no[0]"),"class"=>"form-control","placeholder"=>"Card No.")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","visacardlimit")): ?>
												<div class="col-md-2">
													<div class="form-group">
														<label><?php echo lang('card_limit'); ?></label>
														<?php echo form_input(array("name"=>"ccd_card_limit[]","type"=>"text","value"=>set_value("ccd_card_limit[0]"),"class"=>"form-control","placeholder"=>"Card Limit")); ?>
													</div>
												</div>
											<?php endif ?>
										</div>
	              					<?php endif ?>
	              					<?php if (foption("loan","mastercreditcarddetails")): ?>
										<div class="row">
											<?php if (foption("loan","mastercreditcard")): ?>
												<div class="col-md-2">
													<div class="form-group">
														<label><?php echo lang('type_of_card'); ?></label>
														<?php echo form_input(array("name"=>"ccd_type_of_card[]","type"=>"text","value"=>"Master","disabled"=>true,"class"=>"form-control","placeholder"=>"Type of Card")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","masterbankfinancialinstitution")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang('bank_financial_institution'); ?></label>
														<?php echo form_input(array("name"=>"ccd_bank_financial_institution[]","type"=>"text","value"=>set_value("ccd_bank_financial_institution[1]"),"class"=>"form-control","placeholder"=>"Bank/Financial Institution")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","visacardholder")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang('card_holder'); ?></label>
														<?php echo form_input(array("name"=>"ccd_card_holder[]","type"=>"text","value"=>set_value("ccd_card_holder[1]"),"class"=>"form-control","placeholder"=>"Card Holder")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","visacardno")): ?>
												<div class="col-md-2">
													<div class="form-group">
														<label><?php echo lang('card_no'); ?></label>
														<?php echo form_input(array("name"=>"ccd_card_no[]","type"=>"text","value"=>set_value("ccd_card_no[1]"),"class"=>"form-control","placeholder"=>"Card No.")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","visacardlimit")): ?>
												<div class="col-md-2">
													<div class="form-group">
														<label><?php echo lang('card_limit'); ?></label>
														<?php echo form_input(array("name"=>"ccd_card_limit[]","type"=>"text","value"=>set_value("ccd_card_limit[1]"),"class"=>"form-control","placeholder"=>"Card Limit")); ?>
													</div>
												</div>
											<?php endif ?>
										</div>
	              					<?php endif ?>
								</div>
	              			<?php endif ?>
	              			<?php if (foption("loan","bankaccountdetails")): ?>
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo lang('bank_account_details'); ?></h3>
								</div>
								<div class="box-body">
	              					<?php if (foption("loan","salsavingaccountdetail")): ?>
										<div class="row">
											<?php if (foption("loan","salsavingaccount")): ?>
												<div class="col-md-2">
													<div class="form-group">
														<label><?php echo lang('type_of_account'); ?></label>
														<?php echo form_input(array("name"=>"bd_type_of_account[]","type"=>"text","value"=>"Sal./Saving","disabled"=>true,"class"=>"form-control","placeholder"=>"Type of A/c")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","salsavingbankfinancialinstitution")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang('bank_financial_institution'); ?></label>
														<?php echo form_input(array("name"=>"bd_bank_financial_institution[]","type"=>"text","value"=>set_value("bd_bank_financial_institution[0]"),"class"=>"form-control","placeholder"=>"Bank/Financial Institution")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","salsavingaccountholder")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("account_holder") ?></label>
														<?php echo form_input(array("name"=>"bd_account_holder[]","type"=>"text","value"=>set_value("bd_account_holder[0]"),"class"=>"form-control","placeholder"=>"Account Holder")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","salsavingaccountno")): ?>
												<div class="col-md-2">
													<div class="form-group">
														<label><?php echo lang("account_no"); ?></label>
														<?php echo form_input(array("name"=>"bd_account_no[]","type"=>"text","value"=>set_value("bd_account_no[0]"),"class"=>"form-control","placeholder"=>"Account No.")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","salsavingbankingsince")): ?>
												<div class="col-md-2">
													<div class="form-group">
														<label><?php echo lang("banking_since"); ?></label>
														<?php echo form_input(array("name"=>"bd_banking_since[]","type"=>"text","value"=>set_value("bd_banking_since[0]"),"class"=>"form-control","placeholder"=>"Banking Since")); ?>
													</div>
												</div>
											<?php endif ?>
										</div>
	              					<?php if (foption("loan","currentaccountdetails")): ?>
			              			<?php endif ?>
										<div class="row">
											<?php if (foption("loan","currentaccount")): ?>
												<div class="col-md-2">
													<div class="form-group">
														<label><?php echo lang('type_of_account'); ?></label>
														<?php echo form_input(array("name"=>"bd_type_of_account[]","type"=>"text","value"=>"Current","disabled"=>true,"class"=>"form-control","placeholder"=>"Type of A/c")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","currentbankfinancialinstitution")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang('bank_financial_institution'); ?></label>
														<?php echo form_input(array("name"=>"bd_bank_financial_institution[]","type"=>"text","value"=>set_value("bd_bank_financial_institution[1]"),"class"=>"form-control","placeholder"=>"Bank/Financial Institution")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","currentaccountholder")): ?>
												<div class="col-md-3">
													<div class="form-group">
														<label><?php echo lang("account_holder") ?></label>
														<?php echo form_input(array("name"=>"bd_account_holder[]","type"=>"text","value"=>set_value("bd_account_holder[1]"),"class"=>"form-control","placeholder"=>"Account Holder")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","currentaccountno")): ?>
												<div class="col-md-2">
													<div class="form-group">
														<label><?php echo lang("account_no"); ?></label>
														<?php echo form_input(array("name"=>"bd_account_no[]","type"=>"text","value"=>set_value("bd_account_no[1]"),"class"=>"form-control","placeholder"=>"Account No.")); ?>
													</div>
												</div>
											<?php endif ?>
											<?php if (foption("loan","currentbankingsince")): ?>
												<div class="col-md-2">
													<div class="form-group">
														<label><?php echo lang("banking_since"); ?></label>
														<?php echo form_input(array("name"=>"bd_banking_since[]","type"=>"text","value"=>set_value("bd_banking_since[1]"),"class"=>"form-control","placeholder"=>"Banking Since")); ?>
													</div>
												</div>
											<?php endif ?>
										</div>
			              			<?php endif ?>
								</div>
	              			<?php endif ?>
	              			<?php if (foption("loan","insurancedetails")): ?>
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo lang('insurance_details'); ?></h3>
								</div>
								<div class="box-body">
									<div class="row">
										<?php if (foption("loan","lifepolicy")): ?>
											<div class="col-md-2">
												<div class="form-group">
													<label><?php echo lang("policy_type"); ?></label>
													<?php echo form_input(array("name"=>"id_type_of_policy[]","type"=>"text","value"=>"Life","disabled"=>true,"class"=>"form-control","placeholder"=>"Policy Type")); ?>
												</div>
											</div>
										<?php endif ?>
										<?php if (foption("loan","lifeinsurancecompany")): ?>
											<div class="col-md-3">
												<div class="form-group">
													<label><?php echo lang("insurance_company"); ?></label>
													<?php echo form_input(array("name"=>"id_insurance_company[]","type"=>"text","value"=>set_value("db_insurance_company[0]"),"class"=>"form-control","placeholder"=>"Insurance Company")); ?>
												</div>
											</div>
										<?php endif ?>
										<?php if (foption("loan","lifepolicyholder")): ?>
											<div class="col-md-3">
												<div class="form-group">
													<label><?php echo lang("policy_holder"); ?></label>
													<?php echo form_input(array("name"=>"id_policy_holder[]","type"=>"text","value"=>set_value("db_policy_holder[0]"),"class"=>"form-control","placeholder"=>"Policy Holder")); ?>
												</div>
											</div>
										<?php endif ?>
										<?php if (foption("loan","lifepolicyno")): ?>
											<div class="col-md-2">
												<div class="form-group">
													<label><?php echo lang("policy_no"); ?></label>
													<?php echo form_input(array("name"=>"id_policy_no[]","type"=>"text","value"=>set_value("db_policy_no[0]"),"class"=>"form-control","placeholder"=>"Policy No.")); ?>
												</div>
											</div>
										<?php endif ?>
										<?php if (foption("loan","lifeinsurancevalue")): ?>
											<div class="col-md-2">
												<div class="form-group">
													<label><?php echo lang("insurance_value"); ?></label>
													<?php echo form_input(array("name"=>"id_insurance_calue[]","type"=>"text","value"=>set_value("db_insurance_calue[0]"),"class"=>"form-control","placeholder"=>"Insurance Value")); ?>
												</div>
											</div>
										<?php endif ?>
									</div>
								</div>
	              			<?php endif ?>
							<?php if (foption("loan","detailsofloan")): ?>
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo lang("details_of_loan"); ?></h3>
								</div>
								<div class="row">
									<?php if (foption("loan","purposeofloan")): ?>
										<div class="col-md-6 col-md-offset-3">
									        <div class="form-group">
									            <label><?php echo lang("Purpose_of_Loan"); ?></label>
									            <?php $loan_purpose = config_item("loan_purpose"); ?>
									            <select class="form-control" name="loan_purpose">
									            	<option value="">Select Purpose of Loan</option>
									            	<?php if(isset($loan_purpose) && !empty($loan_purpose)){ foreach($loan_purpose as $key=>$value) : ?>
									            		<option value="<?php echo $key; ?>" <?php echo (set_value("loan_purpose") == $key)?'selected':''; ?>><?php echo $value; ?></option>
									            	<?php endforeach; } ?>
									            </select>
									            <?php echo form_error('loan_purpose'); ?>
									        </div>
										</div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption("loan","amountofloan")): ?>
										<div class="col-md-6 col-md-offset-3">
									        <div class="form-group">
									            <label><?php echo lang("Amount_of_Loan"); ?></label>
									            <?php echo form_input(array("name"=>"amount_of_loan","id"=>"amount_of_loan","value"=>set_value("amount_of_loan"),"class"=>"form-control","placeholder"=>"Amount of Loan")); ?>
									            <?php echo form_error('amount_of_loan'); ?>
									        </div>
										</div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption("loan","loanformonths")): ?>
										<div class="col-md-6 col-md-offset-3">
									        <div class="form-group">
									            <label><?php echo lang("Loan_for_months"); ?></label>
									            <?php echo form_input(array("name"=>"loan_for_months","id"=>"loan_for_months","value"=>set_value("loan_for_months"),"class"=>"form-control","placeholder"=>"Loan for months","rows"=>"5")); ?>
									            <?php echo form_error('loan_for_months'); ?>
									        </div>
									    </div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption("loan","financecharge")): ?>
										<div class="col-md-6 col-md-offset-3">
									        <div class="form-group">
									            <label><?php echo lang("Finance_charge"); ?></label>
									            <?php echo form_input(array("name"=>"finance_charge","id"=>"finance_charge","value"=>set_value("finance_charge"),"class"=>"form-control","placeholder"=>"Finance charge","rows"=>"5")); ?>
									            <?php echo form_error('finance_charge'); ?>
									        </div>
									    </div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption("loan","amountfinanced")): ?>
										<div class="col-md-6 col-md-offset-3">
									        <div class="form-group">
									            <label><?php echo lang("Amount_Financed"); ?></label>
									            <?php echo form_input(array("name"=>"amount_financed","id"=>"amount_financed","value"=>set_value("amount_financed"),"class"=>"form-control","placeholder"=>"Amount Financed","rows"=>"5")); ?>
									            <?php echo form_error('amount_financed'); ?>
									        </div>
									    </div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption("loan","annualpercentagerateyear")): ?>
										<div class="col-md-6 col-md-offset-3">
									        <div class="form-group">
									            <label><?php echo lang("Annual_Percentage_Rate_Year"); ?></label>
									            <?php echo form_input(array("name"=>"percentage_rate","id"=>"percentage_rate","value"=>set_value("percentage_rate"),"class"=>"form-control","placeholder"=>"Annual Percentage Rate","rows"=>"5")); ?>
									            <?php echo form_error('percentage_rate'); ?>
									        </div>
									    </div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption("loan","installmentpermonth")): ?>
										<div class="col-md-6 col-md-offset-3">
									        <div class="form-group">
									            <label><?php echo lang("Installment_per_month"); ?></label>
									            <?php echo form_input(array("name"=>"installment_per_month","id"=>"installment_per_month","value"=>set_value("installment_per_month"),"class"=>"form-control","placeholder"=>"Installment per month","rows"=>"5")); ?>
									            <?php echo form_error('installment_per_month'); ?>
									        </div>
									    </div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption("loan","totalofpayment")): ?>
										<div class="col-md-6 col-md-offset-3">
									        <div class="form-group">
									            <label><?php echo lang("Total_of_payment"); ?></label>
									            <?php echo form_input(array("name"=>"total_payment","id"=>"total_payment","value"=>set_value("total_payment"),"class"=>"form-control","placeholder"=>"Total of payment","rows"=>"5")); ?>
									            <?php echo form_error('total_payment'); ?>
									        </div>
									    </div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption("loan","agreementstartdate")): ?>
										<div class="col-md-6 col-md-offset-3">
									        <div class="form-group">
									            <label><?php echo lang("Agreement_Start_Date"); ?></label>
									            <?php echo form_input(array("name"=>"agreement_start","type"=>"text","value"=>set_value("agreement_start"),"class"=>"form-control datepicker","placeholder"=>"Agreement Start Date","autocomplete"=>"off")); ?>
									            <?php echo form_error('agreement_start'); ?>
									        </div>
									    </div>
									<?php endif ?>
								</div>
								<div class="row">
								    <?php if (foption("loan","agreementenddate")): ?>
										<div class="col-md-6 col-md-offset-3">
									        <div class="form-group">
									            <label><?php echo lang("Agreement_End_Date"); ?></label>
									            <?php echo form_input(array("name"=>"agreement_end","value"=>set_value("agreement_end"),"id"=>"agreement_end","type"=>"text","class"=>"form-control","placeholder"=>"Agreement End Date","readonly"=>true)); ?>
									            <?php echo form_error('agreement_end'); ?>
									        </div>
									    </div>
								    <?php endif ?>
								</div>
	              			<?php endif ?>
	              		</div>
							<!--div class="row">
								<div class="col-md-6 col-md-offset-3">
							        <div class="form-group">
							            <llabel>Lender Fees</label>
							            <?php //echo form_input(array("name"=>"lender_fees","value"=>set_value("lender_fees"),"class"=>"form-control","placeholder"=>"Lender Fees","rows"=>"5")); ?>
							            <?php //echo form_error('lender_fees'); ?>
							        </div>
							    </div>
							</div-->
	              		<div class="tab-pane <?php echo (!foption("loan","personalloanAgreement") && !foption("loan","loandetails") && foption("loan","assetsdetails"))?'active':""; ?>" id="tab_3">
	              			<div class="row">
	              				<?php if (foption("loan","securitycollateraldetails")): ?>
									<div class="box-header with-border">
										<h3 class="box-title"><?php echo lang("security_collateral_details"); ?></h3>
									</div>
								    <div class="col-sm-12 clone_detail">
								    	<?php $assets = config_item("assets"); ?>
								    	<?php if (set_value("assets_name[]")): ?>
											<?php for ($i=0; $i < count(set_value("assets_name[]")); $i++) : ?>
										        <div class="html_detail">
										        	<div class="col-sm-11">
										        		<?php if (foption("loan","assetsname")): ?>
												            <div class="col-sm-6">
												            	<div class="form-group">
													            	<label><?php echo lang("assets_name"); ?></label>
												                    <input type="text" class="form-control" name="assets_name[]" value="<?php echo set_value("assets_name[$i]"); ?>" placeholder="Assets Name">
												                    <!--select name="assets_name[]" class="form-control" style="width: 100%;">
												                    	<option value="">Select Type of Asset</option>
												                    	<?php /*if ($assets): ?>
												                    		<?php foreach ($assets as $key => $value): ?>
												                    			<option value="<?php echo $value; ?>" <?php echo (set_value("assets_name[$i]") == $value)?'selected':''; ?>><?php echo $value; ?></option>
												                    		<?php endforeach ?>
												                    	<?php endif*/ ?>
												                    </select-->
														            <?php /*if (set_value("assets_name[$i]") == "others"): ?>
														            	<div class="others_detail">
														            		<div class="clearfix">&nbsp;</div>
														            		<input type="text" name="assets_name_others[]" value="<?php echo set_value("assets_name_others[$i]"); ?>" class="form-control" placeholder="Others Detail" />
														            		<?php echo form_error('assets_name_others[]'); ?>
														            	</div>
														            <?php endif*/ ?>
												                </div>
												            </div>
										        		<?php endif ?>
											            <?php if (foption("loan","assetsprice")): ?>
												            <div class="col-sm-6">
												            	<div class="form-group">
													            	<label><?php echo lang("assets_price"); ?></label>
												                    <input type="text" class="form-control" name="assets_price[]" value="<?php echo set_value("assets_price[$i]"); ?>" placeholder="Assets Price">
												                </div>
												            </div>
											            <?php endif ?>
											            <?php if (foption("loan","assetsdescription")): ?>
												            <div class="col-sm-12">
												            	<div class="form-group">
													            	<label><?php echo lang("assets_description"); ?></label>
												                    <textarea name="assets_description[]" class="form-control" cols="30" rows="10" placeholder="Assets Description"><?php echo set_value("assets_description[$i]"); ?></textarea>
												                </div>
												            </div>
											            <?php endif ?>
										        	</div>
										        	<?php if (foption("loan","assetsplus")): ?>
											            <div class="col-sm-1">
											            	<div class="form-group">
											            		<div class="clearfix">&nbsp;</div>
											                    <?php if ($i == 0): ?>
											                    	<button type="button" class="btn btn-primary add_html"><i class="fa fa-plus"></i></button>
											            		<?php else: ?>
											            			<button type="button" class="btn btn-danger remove_html"><i class="fa fa-trash"></i>
											            		<?php endif ?>
											                </div>
											            </div>
										        	<?php endif ?>
										            <div class="clearfix">&nbsp;</div>
										        </div>
										    <?php endfor; ?>
										<?php else: ?>
											<div class="html_detail">
									        	<div class="col-sm-11">
									        		<?php if (foption("loan","assetsname")): ?>
											            <div class="col-sm-6">
											            	<div class="form-group">
												            	<label><?php echo lang("assets_name"); ?></label>
												            	<input type="text" class="form-control" name="assets_name[]" placeholder="Assets Name">
											                    <!-- <select name="assets_name[]" class="form-control" style="width: 100%;">
											                    	<option value="">Select Type of Asset</option>
											                    	<?php /*if ($assets): ?>
											                    		<?php foreach ($assets as $key => $value): ?>
											                    			<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
											                    		<?php endforeach ?>
											                    	<?php endif*/ ?>
											                    </select> -->
											                </div>
											            </div>
									        		<?php endif ?>
										            <?php if (foption("loan","assetsprice")): ?>
											            <div class="col-sm-6">
											            	<div class="form-group">
												            	<label><?php echo lang("assets_price"); ?></label>
											                    <input type="text" class="form-control" name="assets_price[]" value="" placeholder="Assets Price">
											                </div>
											            </div>
										            <?php endif ?>
										            <?php if (foption("loan","assetsdescription")): ?>
											            <div class="col-sm-12">
											            	<div class="form-group">
												            	<label><?php echo lang("assets_description"); ?></label>
											                    <textarea name="assets_description[]" class="form-control" cols="30" rows="10" placeholder="Assets Description"></textarea>
											                </div>
											            </div>
										            <?php endif ?>
									        	</div>
									        	<?php if (foption("loan","assetsplus")): ?>
										            <div class="col-sm-1">
										            	<div class="form-group">
										            		<div class="clearfix">&nbsp;</div>
										                    <button type="button" class="btn btn-primary btn-icon-anim btn-square add_html"><i class="fa fa-plus"></i>
										                    </button>
										                </div>
										            </div>
									        	<?php endif ?>
									            <div class="clearfix">&nbsp;</div>
									        </div>
										<?php endif; ?>
								    </div>
	              				<?php endif ?>
							</div>
	              		</div>
	              	</div>
			    	<div class="box-footer">
			        	<button type="submit" class="btn btn-primary">Submit</button>
					</div>
	            </div>
	        </div>
		<?php echo form_close(); ?>
	</section>
</div>

<!-- daterangepicker -->
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/moment/min/moment.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
	$('.dob').datetimepicker({
      format: "YYYY-MM-DD hh:mm:ss",
      maxDate: moment(),
      useCurrent: false
    })
    .on('dp.change dp.show', function(e) {
    	var id = $(this).closest("form").attr("id");
    	var field = $(this).find("input").attr("name");
        $('#'+id).bootstrapValidator('revalidateField', field);
    });
    $(".is_coapplicant").on("click",function(){
    	if ($(this).is(":checked")) {
    		$(".coapplicant").show();
    	}else{
    		$(".coapplicant").hide();
    	}
    });
	$('.datepicker').datetimepicker({
    	format: "YYYY-MM-DD",
    	useCurrent: false,
		minDate: moment()
    });
    $(".add_html").on("click",function(){
		var html = $(this).closest(".html_detail").clone();
		var id = parseInt(html.find(".select2").attr("data-select2-id"));
		html.find("input[type=text],textarea,select").val("");
		html.find(".others_detail").remove();
		html.find(".member_detail").html("");
		html.find(".add_html").removeClass("add_html btn-primary").addClass("remove_html btn-danger");
		html.find(".fa-plus").removeClass("fa-plus").addClass("fa-trash").closest(".html_detail");
		$(this).closest(".clone_detail").append(html);
		html.find("input[type=text],textarea,select").each(function(){
			$el = $(this).attr("name");
			$('#loanProviderForm').bootstrapValidator('addField', $el);
		})
	    /*$(".select2").select2({
	    	"tags":true
	    });*/
	    // $(this).closest(".clone_detail").find("[data-select2-id="+id+"]:not(:first)").remove();
		/*$('.datepicker').datetimepicker({
			format: "YYYY-MM-DD hh:mm:ss",
			minDate: moment()
		});*/
	});
	$("body").on("click",".remove_html",function(){
		$(this).closest(".html_detail").remove();
	});
    $(".datepicker").on("dp.change", function (e) {
    	var loan_for_months = parseInt($("#loan_for_months").val());
    	// console.log(loan_for_months);
    	if (loan_for_months) {
	    	// var new_date = e.date.add(loan_for_months,'M');
	    	// console.log(new_date.format("YYYY-MM-DD"));
	    	// console.log(new_date.format("YYYY-MM-DD hh:mm:ss"));
	    	// $("#agreement_end").val(new_date.format("YYYY-MM-DD"));
	    	$.ajax({
	    		url: site_url+"loan/getAgreementEndDate",
	    		type: "POST",
	    		data: "start_date="+e.date.format("YYYY-MM-DD hh:mm:ss")+"&loan_for_months="+loan_for_months,
	    		success: function(result){
	    			$("#agreement_end").val(result.end_date);
	    		}
	    	});
    	}else{
    		$(this).val("");
    	}
    });

    $(document).on("change",".select2",function(){
    	var value = $(this).val();
    	var name = $(this).attr("name");
    	var others_detail = $(this).closest(".form-group").find(".others_detail");
    	if (value === "others") {
    		if (!others_detail.length) {
	    		var html = '<div class="others_detail"><div class="clearfix">&nbsp;</div><input type="text" name="'+name+'_others" class="form-control" placeholder="Others Detail" /></div>';
	    		$(this).closest(".form-group").append(html);
	    	}else{
    			others_detail.show();
	    	}
    	}else{
    		(others_detail.length)?others_detail.hide():others_detail.remove();
    	}
    });

    /*$("#ca_mobile_no").on("keyup",function(){
    	var value = $(this).val();
    	if (value) {
	    	$.ajax({
	    		url: site_url+"loan/findMemberID",
	    		type: "POST",
	    		data: "mobile_no="+value+"&csrf_test_name="+$('input[name="csrf_test_name"]').attr('value'),
	    		success: function(result){
	    			$("#ca_member_id").val(result);
	    		}
	    	});
    	}else{
	    	$("#ca_member_id").val("");
    	}
    });*/

    $("#amount_of_loan").on("keyup",function(){
    	calculateAmtFinanced();
    });

    $("#finance_charge").on("keyup",function(){
    	calculateAmtFinanced();
    });

    $("#loan_for_months").on("keyup",function(){
    	calculateAmtFinanced();
    	calculateTotalPayment();
    });

    function calculateAmtFinanced() {
    	var amount_of_loan = ($("#amount_of_loan").val());
    	var finance_charge = ($("#finance_charge").val());
    	if (amount_of_loan && finance_charge) {
    		$("#amount_financed").val((parseFloat(amount_of_loan)+parseFloat(finance_charge)));
    	}else{
    		$("#amount_financed").val("");
    	}
    }

    $("#percentage_rate").on("keyup",function(){
    	calculateTotalPayment();
    });

    function calculateTotalPayment() {
    	var P = parseFloat($("#amount_financed").val());
    	var R = $("#percentage_rate").val();
    	var M = $("#loan_for_months").val();
    	if (finance_charge && percentage_rate && loan_for_months) {
    		R = R/100;
    		var T = M/12;

    		var SI = parseFloat(P*R*T);
    		var IPM = (parseFloat(P/M)+parseFloat(SI/M));
    		var TP = parseFloat(P+SI);
    		if (!isNaN(IPM) && !isNaN(TP)) {
	    		$("#installment_per_month").val(IPM.toFixed(2));
	    		$("#total_payment").val(TP);
    		}
    	}else{
    		$("#total_payment").val("");
    	}
    }
    $(".states").on("change",function(){
    	var append_id = $(this).data("append");
    	$.ajax({
    		url: site_url+"common/getAjaxCity",
    		type: "POST",
    		data: "sid="+$(this).val()+"&csrf_test_name="+$('input[name="csrf_test_name"]').attr('value'),
    		success: function(result){
    			$("#"+append_id).html(result);
    		}
    	});
    });
    /*$(".select2").select2({
	  tags: true
	});*/

	$(document).on("blur",".guarantor_member_id",function(){
		var guarantor_member_id = $(this).val();
		var that = $(this);
		if (guarantor_member_id != "") {
			$.ajax({
				url: site_url+"loan/getMemberDetail",
				type: "POST",
				data: {guarantor_member_id:guarantor_member_id,'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
				success: function(result){
					if(result.profile)
					{
						that.closest(".html_detail").find(".guarantor_name").val(result.profile.member_name);
					}
					if (result.is_guarantor || result.defaulter) {
						var html = '';
						result.msg.forEach(function(v,k){
							html += v.msg + '<br />';
						});
						that.closest(".html_detail").find(".member_detail").html(html);
					}else{
						that.closest(".html_detail").find(".member_detail").html("");
					}
				}
			});
		}else{
			that.closest(".html_detail").find(".guarantor_name").val("");
			that.closest(".html_detail").find(".member_detail").html("");
		}
	});

	$('#loanProviderForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            witness_name: {
                validators: {
                    notEmpty: {
                        message: 'The Witness\'s Name field is required.'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The Witness\'s name can consist of alphabetical characters and spaces only'
                    }
                }
            },
            amount_of_loan: {
                validators: {
                    notEmpty: {
                        message: 'The Amount of Loan field is required.'
                    },
                    regexp: {
                        regexp: /^\d+(\.\d{1,2})?$/i,
                        message: 'The Amount of Loan field must contain a decimal number.'
                    }
                }
            },
            loan_for_months: {
                validators: {
                    notEmpty: {
                        message: 'The Loan for months is required.'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Loan for months field must contain an integer.'
                    }
                }
            },
            finance_charge: {
                validators: {
                    notEmpty: {
                        message: 'The Finance charge is required.'
                    },
                    regexp: {
                        regexp: /^\d+(\.\d{1,2})?$/i,
                        message: 'The Finance charg field must contain a decimal number.'
                    }
                }
            },
            amount_financed: {
                validators: {
                    notEmpty: {
                        message: 'The Amount Financed is required.'
                    },
                    regexp: {
                        regexp: /^\d+(\.\d{1,2})?$/i,
                        message: 'The Amount Financed field must contain a decimal number.'
                    }
                }
            },
            percentage_rate: {
                validators: {
                    notEmpty: {
                        message: 'The Annual Percentage Rate/Year is required.'
                    },
                    regexp: {
                        regexp: /^\d+(\.\d{1,2})?$/i,
                        message: 'The Annual Percentage Rate/Year field must contain a decimal number.'
                    }
                }
            },
            installment_per_month: {
                validators: {
                    notEmpty: {
                        message: 'The Installment per month is required.'
                    },
                    regexp: {
                        regexp: /^\d+(\.\d{1,2})?$/i,
                        message: 'The Installment per month field must contain a decimal number.'
                    }
                }
            },
            total_payment: {
                validators: {
                    notEmpty: {
                        message: 'The Total of payment is required.'
                    },
                    regexp: {
                        regexp: /^\d+(\.\d{1,2})?$/i,
                        message: 'The Total of payment field must contain a decimal number.'
                    }
                }
            },
            agreement_start: {
                validators: {
                    notEmpty: {
                        message: 'The Agreement Start Date is required.'
                    }
                }
            },
            agreement_end: {
                validators: {
                    notEmpty: {
                        message: 'The Agreement End Date is required.'
                    }
                }
            },
            'guarantor_member_id[]': {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Guarantor Member id field must contain an integer.'
                    },
                    /*callback: {
                        message: 'The password is not valid',
                        callback: function(value, validator, $field) {
                        	$.ajax({
                        		url: site_url+"loan/getMemberDetail",
                        		type: "POST",
                        		data: {member_id:validator.getFieldElements('guarantor_member_id[]').val(),
                        		csrf_test_name:$('input[name="csrf_test_name"]').attr('value')},
                        		success: function(result){
                        			// console.log(result);
                        			return true;
                        		}
                        	});
                        }
                    }
                    remote: {
                        type: 'POST',
                        url: site_url+'loan/getMemberDetail',
                        data: function(validator) {
                            return {
                        		member_id:validator.getFieldElements('guarantor_member_id[]').val(),
                        		csrf_test_name:$('input[name="csrf_test_name"]').attr('value')
                        	};
                        },
                        success: function(result) {
                        	console.log(result);
                        },
                        message: 'The username is not available',
                    }*/
                }
            },
            'guarantor_name[]': {
                validators: {
                    regexp: {
                        regexp: /^[a-z.\s]+$/i,
                        message: 'The Guarantor\'s name can consist of alphabetical characters and spaces only'
                    }
                }
            },
            'guarantor_bail_money[]': {
                validators: {
                    regexp: {
                        regexp: /^\d+(\.\d{1,2})?$/i,
                        message: 'The Guarantor\'s Bail Money field must contain a decimal number'
                    }
                }
            },
        }
    });
</script>