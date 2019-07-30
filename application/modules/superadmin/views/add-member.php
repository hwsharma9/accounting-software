<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/css/bootstrapValidator.css">
<script type="text/javascript" src="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/js/bootstrapValidator.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<?php echo breadcrumb(lang('add_members')); ?>
    <!-- Main content -->
    <section class="content">
		<!-- general form elements -->
		<div class="box box-primary">
			<!-- form start -->
	        <?php echo form_open_multipart(base_url(uri_string()),array("id"=>"addMemberForm")); ?>
	        <div class="nav-tabs-custom">
            	<ul class="nav nav-tabs nav-justified" id="myTab">
					<?php if (foption('member','personalinfo')): ?>
              		<li class="<?php echo foption('member','personalinfo')?'active':''; ?>"><a href="#tab_1" data-toggle="tab"><?php echo lang('personal_info'); ?></a></li>
              		<?php endif ?>
              		<?php if (foption('member','familyinfo')): ?>
              		<li class="<?php echo (!foption('member','personalinfo') && foption('member','familyinfo'))?'active':''; ?>"><a href="#tab_2" data-toggle="tab"><?php echo lang('family_info'); ?></a></li>
              		<?php endif ?>
              		<?php if (foption('member','acedemic_info')): ?>
              		<li class="<?php echo (!foption('member','personalinfo') && !foption('member','familyinfo') && foption('member','acedemic_info'))?'active':''; ?>"><a href="#tab_3" data-toggle="tab"><?php echo lang('acedemic_info'); ?></a></li>
              		<?php endif ?>
              	</ul>
              	<div class="tab-content">
					<?php if (foption('member','personalinfo')): ?>
	              		<div class="tab-pane <?php echo foption('member','personalinfo')?'active':''; ?>" id="tab_1">
							<!-- <div class="box-header with-border">
								<h3 class="box-title">Quick Example</h3>
							</div> -->
							<div class="box-body">
								<div class="row">
									<?php if (foption('member','profileimage')): ?>
										<div class="col-md-3">
											<div class="box box-primary">
									            <div class="box-body box-profile">
													<img class="profile-user-img img-responsive img-circle" id="imagePreview" src="<?php echo base_url("assets/admin/dist/img/profile_pic_default.png"); ?>" alt="User profile picture">
													<input type="file" name="profile_pic" id="imageUpload">
									            </div>
									        </div>
										</div>
									<?php endif ?>
									<div class="col-md-9">
										<?php if (foption('member','title')): ?>
										<div class="col-md-2">
									        <div class="form-group">
									            <label><?php echo lang('title'); ?></label>
									            <?php $title = $this->config->item("title"); ?>
									            <select name="title" class="form-control">
									            	<?php if ($title): ?>
									            		<?php foreach ($title as $key => $value): ?>
									            			<option value="<?php echo $value; ?>" <?php echo (set_value('title') == $value)?'selected':''; ?>><?php echo $value; ?></option>
									            		<?php endforeach ?>
									            	<?php endif ?>
									            </select>
									        </div>
									    </div>
										<?php endif; ?>
										<?php if (foption('member','fnapplicant')): ?>
										<div class="col-md-5">
									        <div class="form-group">
									            <label><?php echo lang('fn_applicant'); ?></label>
									            <?php echo form_input(array("name"=>"first_name","type"=>"text","value"=>set_value("first_name"),"class"=>"form-control","placeholder"=>"First Name of Applicant")); ?>
									            <?php echo form_error('first_name'); ?>
									        </div>
									    </div>
										<?php endif; ?>
										<?php if (foption('member','lnapplicant')): ?>
										<div class="col-md-5">
									        <div class="form-group">
									            <label><?php echo lang('ln_applicant'); ?></label>
									            <?php echo form_input(array("name"=>"last_name","type"=>"text","value"=>set_value("last_name"),"class"=>"form-control","placeholder"=>"Last Name of Applicant")); ?>
									            <?php echo form_error('last_name'); ?>
									        </div>
									    </div>
										<?php endif; ?>
										<?php if (foption('member','dob')): ?>
										<div class="col-md-6">
									        <div class="form-group">
									            <label><?php echo lang('dob'); ?></label>
									            <div class="input-group datepicker">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
									            	<?php echo form_input(array("name"=>"date_of_birth","value"=>set_value("date_of_birth"),"class"=>"form-control pull-right","placeholder"=>"Date of Birth","autocomplete"=>"off")); ?>
								                </div>
									            <?php echo form_error('date_of_birth'); ?>
									        </div>
										</div>
										<?php endif; ?>
										<?php if (foption('member','gender')): ?>
										<div class="col-md-6">
									        <div class="form-group">
									            <label><?php echo lang('gender'); ?></label>
									            <div class="row">
									            	<div class="col-md-6 col-xs-6">
									            		<input type="radio" name="gender" <?php echo (set_value('gender') == "male")?'checked':'checked' ?> value="male" /><?php echo lang("male"); ?>
									            	</div>
									            	<div class="col-md-6 col-xs-6">
									            		<input type="radio" name="gender" <?php echo (set_value('gender') == "female")?'checked':'' ?> value="female" /><?php echo lang("female"); ?>
									            	</div>
									            </div>
									        </div>
									    </div>
										<?php endif; ?>
									</div>
								</div>
								<div class="row">
									<?php if (foption('member','address')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('address'); ?></label>
								            <?php echo form_textarea(array("name"=>"address","value"=>set_value("address"),"class"=>"form-control","placeholder"=>"Address","rows"=>"9")); ?>
								            <?php echo form_error('address'); ?>
								        </div>
								    </div>
									<?php endif ?>
									<div class="col-md-6">
										<div class="row">
											<?php if (foption('member','state')): ?>
											<div class="col-md-12">
										        <div class="form-group">
										            <label><?php echo lang('state'); ?></label>
										            <?php $states = $this->config->item("states"); ?>
										            <select name="state" id="states" class="form-control">
										            	<?php if ($states): ?>
										            		<option value="">Select States</option>
										            		<?php foreach ($states as $key => $value): ?>
										            			<option value="<?php echo $key; ?>" <?php echo (set_value('state') == $key)?'selected':''; ?>><?php echo $value; ?></option>
										            		<?php endforeach ?>
										            	<?php endif ?>
										            </select>
										            <?php echo form_error('state'); ?>
										        </div>
											</div>
											<?php endif ?>
											<?php if (foption('member','city')): ?>
											<div class="col-md-12">
												<div class="form-group">
										            <label><?php echo lang('city'); ?></label>
										            <select name="city" id="cities" class="form-control">
										            	<?php if ($cities): ?>
										            		<option value="">Select City</option>
										            		<?php foreach ($cities as $key => $value): ?>
										            			<option value="<?php echo $value['city_id']; ?>" <?php echo (set_value('city') == $value['city_id'])?'selected':''; ?>><?php echo $value['city_name']; ?></option>
										            		<?php endforeach ?>
										            	<?php endif ?>
										            </select>
										            <?php echo form_error('city'); ?>
										        </div>
											</div>
											<?php endif ?>
											<?php if (foption('member','zip')): ?>
											<div class="col-md-12">
												<div class="form-group">
										            <label><?php echo lang('zip'); ?></label>
								            		<?php echo form_input(array("name"=>"zipcode","type"=>"text","value"=>set_value("zipcode"),"class"=>"form-control","placeholder"=>"Postal Zipcode")); ?>
										            <?php echo form_error('zipcode'); ?>
										        </div>
											</div>
											<?php endif ?>
										</div>
								    </div>
								</div>
								<div class="row">
									<?php if (foption('member','pno')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('p_no'); ?></label>
								            <?php echo form_input(array("name"=>"phone_no","type"=>"text","class"=>"form-control","placeholder"=>"Phone No.")); ?>
								        </div>
								    </div>
									<?php endif ?>
									<?php if (foption('member','mno')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('m_no'); ?></label>
								            <?php echo form_input(array("name"=>"mobile_no","type"=>"text","value"=>set_value("mobile_no"),"class"=>"form-control","placeholder"=>"Mobile No.")); ?>
								            <?php echo form_error('mobile_no'); ?>
								        </div>
								    </div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption('member','email')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('email'); ?></label>
								            <?php echo form_input(array("name"=>"email","type"=>"text","value"=>set_value("email"),"class"=>"form-control","placeholder"=>"Email")); ?>
								            <?php echo form_error('email'); ?>
								        </div>
								    </div>
									<?php endif ?>
									<?php if (foption('member','password')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('password'); ?></label>
								            <?php echo form_password(array("name"=>"password","type"=>"text","value"=>set_value("password"),"class"=>"form-control","placeholder"=>"Password")); ?>
								            <?php echo form_error('password'); ?>
								        </div>
								    </div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption('member','website')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('website'); ?></label>
								            <?php echo form_input(array("name"=>"website","type"=>"text","value"=>set_value("website"),"class"=>"form-control","placeholder"=>"Website")); ?>
								            <?php echo form_error('website'); ?>
								        </div>
								    </div>
									<?php endif ?>
									<?php if (foption('member','occupation')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('occupation'); ?></label>
										    <?php $occupation = $this->config->item("occupation"); ?>
								            <select name="occupation" class="form-control">
								            	<?php if ($occupation): ?>
								            		<option value="">Select Occupation</option>
									            	<?php foreach ($occupation as $key => $value): ?>
									            		<option value="<?php echo $value ?>" <?php echo (set_value('occupation') == $value)?'selected':''; ?>><?php echo $value ?></option>
									            	<?php endforeach ?>
								            	<?php endif ?>
								            </select>
								            <?php echo form_error('occupation'); ?>
								        </div>
								    </div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption('member','religion')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('religion'); ?></label>
										    <?php $religion = $this->config->item("religion"); ?>
								            <select name="religion" class="form-control">
								            	<?php if ($religion): ?>
								            		<option value="">Select Religion</option>
									            	<?php foreach ($religion as $key => $value): ?>
									            		<option value="<?php echo $value ?>" <?php echo (set_value('religion') == $value)?'selected':''; ?>><?php echo $value ?></option>
									            	<?php endforeach ?>
								            	<?php endif ?>
								            </select>
								            <?php echo form_error('religion'); ?>
								        </div>
								    </div>
									<?php endif ?>
									<?php if (foption('member','bloodgroop')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('blood_groop'); ?></label>
								            <?php $blood_group = $this->config->item("blood_group"); ?>
								            <select name="blood_group" class="form-control">
								            	<?php if ($blood_group): ?>
								            		<option value="">Select Blood Group</option>
									            	<?php foreach ($blood_group as $key => $value): ?>
									            		<option value="<?php echo $value ?>" <?php echo (set_value('blood_group') == $value)?'selected':''; ?>><?php echo $value ?></option>
									            	<?php endforeach ?>
								            	<?php endif ?>
								            </select>
								            <?php echo form_error('blood_group'); ?>
								        </div>
								    </div>
									<?php endif ?>
								</div>
							</div>
						</div>
					<?php endif ?>
					<?php if (foption('member','familyinfo')): ?>
						<div class="tab-pane <?php echo (!foption('member','personalinfo') && foption('member','familyinfo'))?'active':''; ?>" id="tab_2">
							<!-- <div class="box-header with-border">
								<h3 class="box-title">Family Details</h3>
							</div> -->
							<div class="box-body">
								<div class="row">
									<?php if (foption('member','nofamilymembers')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('no_family_members'); ?></label>
								            <?php echo form_input(array("name"=>"no_family_members","type"=>"text","value"=>set_value("no_family_members"),"class"=>"form-control","placeholder"=>"No. of Family Members")); ?>
								            <?php echo form_error('no_family_members'); ?>
								        </div>
								    </div>
									<?php endif ?>
									<?php if (foption('member','headpersonname')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('head_person_name'); ?></label>
								            <?php echo form_input(array("name"=>"head_family_name","type"=>"text","value"=>set_value("head_family_name"),"class"=>"form-control","placeholder"=>"Family Head Person Name")); ?>
								            <?php echo form_error('head_family_name'); ?>
								        </div>
								    </div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption('member','fathername')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('father_name'); ?></label>
								            <?php echo form_input(array("name"=>"fathers_name","type"=>"text","value"=>set_value("fathers_name"),"class"=>"form-control","placeholder"=>"Father's Name")); ?>
								            <?php echo form_error('fathers_name'); ?>
								        </div>
								    </div>
									<?php endif ?>
									<?php if (foption('member','mothername')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('mother_name'); ?></label>
								            <?php echo form_input(array("name"=>"mothers_name","type"=>"text","value"=>set_value("mothers_name"),"class"=>"form-control","placeholder"=>"Mother's Name")); ?>
								            <?php echo form_error('mothers_name'); ?>
								        </div>
								    </div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption('member','maritalstatus')): ?>
									<div class="col-md-6">
								        <div class="form-group">
								            <label><?php echo lang('marital_status'); ?></label>
								            <?php $marital_status = $this->config->item("marital_status"); ?>
								            <select name="marital_status" id="marital_status" class="form-control">
								            	<?php if ($marital_status): ?>
								            		<option value="">Select Marital Status</option>
									            	<?php foreach ($marital_status as $key => $value): ?>
									            		<option value="<?php echo $value ?>" <?php echo (set_value('marital_status') == $value)?'selected':''; ?>><?php echo $value ?></option>
									            	<?php endforeach ?>
								            	<?php endif ?>
								            </select>
								            <?php echo form_error('marital_status'); ?>
								        </div>
								    </div>
									<?php endif ?>
									<?php if (foption('member','spousename')): ?>
									<div class="col-md-6" style="<?php echo (set_value('marital_status') == "married")?'display: block':'display: none'; ?>">
								        <div class="form-group">
								            <label><?php echo lang('spouse_name'); ?></label>
								            <?php echo form_input(array("name"=>"spouse_name","id"=>"spouse_name","type"=>"text","value"=>set_value("spouse_name"),"class"=>"form-control","placeholder"=>"Spouse Name")); ?>
								            <?php echo form_error('spouse_name'); ?>
								        </div>
								    </div>
									<?php endif ?>
								</div>
								<div class="row">
									<?php if (foption('member','employmentdetails')): ?>
									<div class="col-sm-12">
										<div class="box-header with-border">
											<h3 class="box-title"><?php echo lang('employment_details'); ?></h3>
										</div>
										<div class="row">
										<?php if (foption('member','employmentstatus')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('employment_status'); ?></label>
										            <?php $employment_status = $this->config->item("employment_status"); ?>
										            <select name="employement_status" class="form-control">
										            	<option value="">Select Employment Status</option>
										            	<?php if ($employment_status): ?>
										            		<?php foreach ($employment_status as $key => $value): ?>
										            			<option value="<?php echo $value; ?>" <?php echo (set_value("employement_status") == $value)?'selected':''; ?>><?php echo $value; ?></option>
										            		<?php endforeach ?>
										            	<?php endif ?>
										            	<!-- <option value="employee" <?php //echo (set_value("employement_status") == "employee")?'selected':''; ?>>Employee</option>
										            	<option value="worker" <?php //echo (set_value("employement_status") == "worker")?'selected':''; ?>>Worker</option>
										            	<option value="self employed" <?php //echo (set_value("employement_status") == "self employed")?'selected':''; ?>>Self Employed</option> -->
										            </select>
										            <?php echo form_error('employement_status'); ?>
										        </div>
										    </div>
											<?php endif ?>
											<?php if (foption('member','annualincome')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('annual_income'); ?></label>
										            <?php echo form_input(array("name"=>"annual_income","type"=>"text","value"=>set_value("annual_income"),"class"=>"form-control","placeholder"=>"Annual Income")); ?>
										            <?php echo form_error('annual_income'); ?>
										        </div>
										    </div>
											<?php endif ?>
										</div>
										<div class="row">
											<?php if (foption('member','workplaceinfo')): ?>
											<div class="col-md-12">
										        <div class="form-group">
										            <label><?php echo lang('work_place_info'); ?></label>
										            <textarea name="work_place_info" class="form-control" cols="30" rows="5"><?php echo set_value('work_place_info') ?></textarea>
										            <?php echo form_error('work_place_info'); ?>
										        </div>
										    </div>
											<?php endif ?>
										</div>
									</div>
									<?php endif ?>
								</div>
								<div class="row single_detail" style="<?php echo (set_value('marital_status') == "single")?'display: block':'display: none'; ?>">
									<?php if (foption('member','astrologyinfo')): ?>
									<div class="col-sm-12">
										<div class="box-header with-border">
											<h3 class="box-title"><?php echo lang('astrology_info'); ?></h3>
										</div>
										<div class="row">
											<?php if (foption('member','starsign')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('star_sign'); ?></label>
										            <?php $star_sign = $this->config->item("star_sign"); ?>
										            <select class="form-control" name="star_sign">
										            	<option value="">Select Star Sign</option>
										            	<?php if(isset($star_sign) && !empty($star_sign)){ foreach($star_sign as $key=>$value) : ?>
										            		<option value="<?php echo $value; ?>" <?php echo (set_value("star_sign") == $value)?'selected':''; ?>><?php echo $value; ?></option>
										            	<?php endforeach; } ?>
										            </select>
										            <?php echo form_error('star_sign'); ?>
										        </div>
										    </div>
											<?php endif ?>
											<?php if (foption('member','zodiacsign')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('zodiac_sign'); ?></label>
										            <?php $zodiac_sign = $this->config->item("zodiac_sign"); ?>
										            <select class="form-control" name="zodiac_sign">
										            	<option value="">Select Zodiac Sign</option>
										            	<?php if(isset($zodiac_sign) && !empty($zodiac_sign)){ foreach($zodiac_sign as $key=>$value) : ?>
										            		<option value="<?php echo $value; ?>" <?php echo (set_value("zordiac_sign") == $value)?'selected':''; ?>><?php echo $value; ?></option>
										            	<?php endforeach; } ?>
										            </select>
										            <?php echo form_error('zodiac_sign'); ?>
										        </div>
										    </div>
											<?php endif ?>
										</div>
										<div class="row">
											<?php if (foption('member','swamidosh')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('swami_dosh'); ?></label>
										            <select name="swami_dosh" class="form-control">
										            	<option value="">Swami Dosh?</option>
										            	<option value="1" <?php echo (set_value("swami_dosh") == 1)?'selected':''; ?>><?php echo lang("yes"); ?></option>
										            	<option value="2" <?php echo (set_value("swami_dosh") == 2)?'selected':''; ?>><?php echo lang("no"); ?></option>
										            </select>
										            <?php echo form_error('swami_dosh'); ?>
										        </div>
										    </div>
											<?php endif ?>
											<?php if (foption('member','gotra')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('gotra'); ?></label>
										            <?php echo form_input(array("name"=>"gotra","type"=>"text","value"=>set_value("gotra"),"class"=>"form-control","placeholder"=>"Gotra")); ?>
										            <?php echo form_error('gotra'); ?>
										        </div>
										    </div>
											<?php endif ?>
										</div>
										<div class="row">
											<?php if (foption('member','mothertong')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('mother_tong'); ?></label>
										            <?php $mother_tong = $this->config->item("mother_tong"); ?>
										            <select class="form-control" name="mother_toung">
										            	<option value="">Select Mother Tong</option>
										            	<?php if(isset($mother_tong) && !empty($mother_tong)){ foreach($mother_tong as $key=>$value) : ?>
										            		<option value="<?php echo $value; ?>" <?php echo (set_value("mother_toung") == $value)?'selected':''; ?>><?php echo $value; ?></option>
										            	<?php endforeach; } ?>
										            </select>
										            <?php echo form_error('mother_toung'); ?>
										        </div>
										    </div>
											<?php endif ?>
										</div>
									</div>
									<?php endif ?>
									<?php if (foption('member','lifestyleinfo')): ?>
									<div class="col-sm-12">
										<div class="box-header with-border">
											<h3 class="box-title"><?php echo lang('life_style_info'); ?></h3>
										</div>
										<div class="row">
											<?php if (foption('member','yourdiet')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('your_diet'); ?></label>
										            <?php $your_diet = $this->config->item("your_diet"); ?>
										            <select class="form-control" name="your_diet">
										            	<option value="">Select Your diet</option>
										            	<?php if(isset($your_diet) && !empty($your_diet)){ foreach($your_diet as $key=>$value) : ?>
										            		<option value="<?php echo $value; ?>" <?php echo (set_value("your_diet") == $value)?'selected':''; ?>><?php echo $value; ?></option>
										            	<?php endforeach; } ?>
										            </select>
										            <?php echo form_error('your_diet'); ?>
										        </div>
										    </div>
											<?php endif ?>
											<?php if (foption('member','dosmoke')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('do_smoke'); ?></label>
										            <select name="smoke" class="form-control">
										            	<option value="">Do you Smoke?</option>
										            	<option value="1" <?php echo (set_value("smoke") == 1)?'selected':''; ?>><?php echo lang("yes"); ?></option>
										            	<option value="2" <?php echo (set_value("smoke") == 2)?'selected':''; ?>><?php echo lang("no"); ?></option>
										            </select>
										            <?php echo form_error('smoke'); ?>
										        </div>
										    </div>
											<?php endif ?>
										</div>
										<div class="row">
											<?php if (foption('member','drink')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('drink'); ?></label>
										            <select name="drink" class="form-control">
										            	<option value="">Do you Smoke?</option>
										            	<option value="1" <?php echo (set_value("drink") == 1)?'selected':''; ?>><?php echo lang("yes"); ?></option>
										            	<option value="2" <?php echo (set_value("drink") == 2)?'selected':''; ?>><?php echo lang("no"); ?></option>
										            </select>
										            <?php echo form_error('drink'); ?>
										        </div>
										    </div>
											<?php endif ?>
											<?php if (foption('member','yourheight')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('your_height'); ?></label>
										            <?php echo form_input(array("name"=>"height","type"=>"text","value"=>set_value("gotra"),"class"=>"form-control","placeholder"=>"Do you smoke?")); ?>
										            <?php echo form_error('height'); ?>
										        </div>
										    </div>
											<?php endif ?>
										</div>
										<div class="row">
											<?php if (foption('member','bodytype')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('body_type'); ?></label>
										            <?php $body_type = $this->config->item("body_type"); ?>
										            <select class="form-control" name="body_type">
										            	<option value="">Select Body Type</option>
										            	<?php if(isset($body_type) && !empty($body_type)){ foreach($body_type as $key=>$value) : ?>
										            		<option value="<?php echo $value; ?>" <?php echo (set_value("body_type") == $value)?'selected':''; ?>><?php echo ucwords($value); ?></option>
										            	<?php endforeach; } ?>
										            </select>
										            <?php echo form_error('body_type'); ?>
										        </div>
										    </div>
											<?php endif ?>
											<?php if (foption('member','skintone')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('skin_tone'); ?></label>
										            <?php //echo form_input(array("name"=>"skin_tone","type"=>"text","value"=>set_value("gotra"),"class"=>"form-control","placeholder"=>"Gotra")); ?>
										            <?php $skin_tone = $this->config->item("skin_tone"); ?>
										            <select class="form-control" name="skin_tone">
										            	<option value="">Select Skin Tone</option>
										            	<?php if(isset($skin_tone) && !empty($skin_tone)){ foreach($skin_tone as $key=>$value) : ?>
										            		<option value="<?php echo $value; ?>" <?php echo (set_value("skin_tone") == $value)?'selected':''; ?>><?php echo ucwords($value); ?></option>
										            	<?php endforeach; } ?>
										            </select>
										            <?php echo form_error('skin_tone'); ?>
										        </div>
										    </div>
											<?php endif ?>
										</div>
										<div class="row">
											<?php if (foption('member','anydisability')): ?>
											<div class="col-md-6">
										        <div class="form-group">
										            <label><?php echo lang('any_disability'); ?></label><br>
													<div class="row">
											            <div class="col-md-6">
											            	<input type="radio" name="disability" <?php echo (set_value('disability') == "no")?'checked':''; ?> value="no" /><?php echo lang("no"); ?>
											            </div>
											            <div class="col-md-6">
											            	<input type="radio" name="disability" <?php echo (set_value('disability') == "yes")?'checked':''; ?> value="yes" /><?php echo lang("yes"); ?>
											            </div>
											        </div>
										            <?php echo form_error('disability'); ?>
										        </div>
										    </div>
											<?php endif ?>
											<?php if (foption('member','disabilitydesc')): ?>
											<div class="col-md-6 disability_yes" style="<?php echo (set_value('disability') == "yes")?'display: block':'display: none'; ?>">
										        <div class="form-group">
										            <label><?php echo lang('disability_desc'); ?></label>
													<textarea name="disability_description" class="form-control" cols="10" rows="5"></textarea>
										            <?php echo form_error('disability'); ?>
										        </div>
										    </div>
											<?php endif ?>
										</div>
									</div>
									<?php endif ?>
								</div>
								<?php if (foption('member','siblingsdetail')): ?>
								<div class="row">
								    <div class="col-sm-12 clone_detail">
								    	<div class="box-header with-border">
											<h3 class="box-title"><?php echo lang('siblings_detail'); ?></h3>
										</div>
										<?php print_r(set_value("sibling_name")); ?>
										<?php if (set_value("sibling_name[]")): ?>
											<?php for ($i=0; $i < count(set_value("sibling_name[]")); $i++) : ?>
										        <div class="html_detail">
										        	<div class="col-sm-10">
										        		<div class="row">
															<?php if (foption('member','siblingname')): ?>
												            <div class="col-sm-5">
												            	<div class="form-group">
												                    <?php echo form_input('sibling_name[]', set_value("sibling_name[$i]"), array("class"=>"form-control","placeholder"=>lang('sibling_name'))); ?>
												                </div>
												            </div>
															<?php endif ?>
															<?php if (foption('member','siblingdob')): ?>
												            <div class="col-sm-4">
												            	<div class="form-group">
												                    <div class="input-group datepicker">
																		<div class="input-group-addon">
																			<i class="fa fa-calendar"></i>
																		</div>
														            	<?php echo form_input('sibling_dob[]','',array("value"=>set_value("sibling_dob[$i]"),"class"=>"form-control pull-right","placeholder"=>lang('dob'),"autocomplete"=>"off")); ?>
														            </div>
												                </div>
												            </div>
															<?php endif ?>
															<?php if (foption('member','siblinggender')): ?>
												            <div class="col-sm-3">
												            	<div class="form-group">
												                    <select name="sibling_gender[]" class="form-control">
												                    	<option value="">Select Gender</option>
												                    	<option value="male" <?php echo (set_value("sibling_gender[$i]") == "male")?'selected':""; ?>><?php echo lang("male"); ?></option>
												                    	<option value="female" <?php echo (set_value("sibling_gender[$i]") == "female")?'selected':""; ?>><?php echo lang("female"); ?></option>
												                    </select>
												                </div>
												            </div>
															<?php endif ?>
												        </div>
														<?php if (foption('member','siblingqualification')): ?>
										        		<div class="row">
										        			<div class="col-sm-5">
												            	<div class="form-group">
												                    <?php echo form_input('qualification[]', set_value("qualification[$i]"), array("class"=>"form-control","placeholder"=>lang('qualification'))); ?>
												                </div>
												            </div>
										        		</div>
														<?php endif ?>
												    </div>
													<?php if (foption('member','siblingplus')): ?>
											            <div class="col-sm-2">
											            	<div class="form-group">
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
												<div class="col-sm-10">
										        	<div class="row">
														<?php if (foption('member','siblingname')): ?>
											            <div class="col-sm-5">
											            	<div class="form-group">
											                    <?php echo form_input('sibling_name[]', '', array("class"=>"form-control","placeholder"=>lang('sibling_name'))); ?>
											                </div>
											            </div>
														<?php endif ?>
														<?php if (foption('member','siblingdob')): ?>
											            <div class="col-sm-4">
											            	<div class="form-group">
											                    <div class="input-group datepicker">
																	<div class="input-group-addon">
																		<i class="fa fa-calendar"></i>
																	</div>
													            	<?php echo form_input('sibling_dob[]','',array("class"=>"form-control pull-right","placeholder"=>lang('dob'),"autocomplete"=>"off")); ?>
													            </div>
											                </div>
											            </div>
											            <?php endif ?>
														<?php if (foption('member','siblinggender')): ?>
											            <div class="col-sm-3">
											            	<div class="form-group">
											                    <select name="sibling_gender[]" class="form-control">
											                    	<option value="">Select Gender</option>
											                    	<option value="male"><?php echo lang("male"); ?></option>
											                    	<option value="female"><?php echo lang("female"); ?></option>
											                    </select>
											                </div>
											            </div>
											            <?php endif ?>
											        </div>
													<?php if (foption('member','siblingqualification')): ?>
									        		<div class="row">
									        			<div class="col-sm-5">
											            	<div class="form-group">
											                    <?php echo form_input('qualification[]', '', array("class"=>"form-control","placeholder"=>lang('qualification'))); ?>
											                </div>
											            </div>
									        		</div>
											        <?php endif ?>
											    </div>
											    <?php if (foption('member','siblingplus')): ?>
										            <div class="col-sm-2">
										            	<div class="form-group">
										                    <button type="button" class="btn btn-primary add_html"><i class="fa fa-plus"></i>
										                    </button>
										                </div>
										            </div>
											    <?php endif ?>
									            <div class="clearfix">&nbsp;</div>
									        </div>
										<?php endif ?>
								    </div>
								</div>
								<?php endif ?>
								<?php if (foption('member','childrensdetail')): ?>
								<div class="row children_row">
								    <div class="col-sm-12 clone_detail">
								    	<div class="box-header with-border">
											<h3 class="box-title"><?php echo lang('childrens_detail'); ?></h3>
										</div>
										<?php if (set_value("child_name[]")): ?>
											<?php for ($i=0; $i < count(set_value("child_name[]")); $i++) : ?>
										        <div class="html_detail">
										        	<div class="col-sm-10">
										        		<div class="row">
															<?php if (foption('member','childrenname')): ?>
												            <div class="col-sm-5">
												            	<div class="form-group">
												                    <?php echo form_input('child_name[]', set_value('child_name[$i]'), array("class"=>"form-control","placeholder"=>lang('child_name'))); ?>
												                </div>
												            </div>
															<?php endif ?>
															<?php if (foption('member','childrendob')): ?>
												            <div class="col-sm-4">
												            	<div class="form-group">
												                    <div class="input-group datepicker">
																		<div class="input-group-addon">
																			<i class="fa fa-calendar"></i>
																		</div>
														            	<?php echo form_input(array("name"=>"child_dob[]","value"=>set_value("child_dob[$i]"),"class"=>"form-control pull-right","placeholder"=>lang('dob'),"autocomplete"=>"off")); ?>
														            </div>
												                </div>
												            </div>
															<?php endif ?>
															<?php if (foption('member','childrengender')): ?>
												            <div class="col-sm-3">
												            	<div class="form-group">
												                    <select name="child_gender[]" class="form-control">
												                    	<option value="">Select Gender</option>
												                    	<option value="male" <?php echo (set_value("child_gender[$i]") == "male")?'selected':""; ?>><?php echo lang("male"); ?></option>
												                    	<option value="female" <?php echo (set_value("child_gender[$i]") == "female")?'selected':""; ?>><?php echo lang("female"); ?></option>
												                    </select>
												                </div>
												            </div>
															<?php endif ?>
										        		</div>
														<?php if (foption('member','childrenqualification')): ?>
										        		<div class="row">
										        			<div class="col-sm-5">
												            	<div class="form-group">
												                    <?php echo form_input('qualification[]', set_value('qualification[$i]'), array("class"=>"form-control","placeholder"=>lang('qualification'))); ?>
												                </div>
												            </div>
										        		</div>
														<?php endif ?>
										        	</div>
										        	<?php if (foption('member','childplus')): ?>
											            <div class="col-sm-2">
											            	<div class="form-group">
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
											<?php endfor ?>
										<?php else: ?>
									        <div class="html_detail">
									        	<div class="col-sm-10">
										        	<div class="row">
														<?php if (foption('member','childrenname')): ?>
											            <div class="col-sm-5">
											            	<div class="form-group">
											                    <?php echo form_input('child_name[]', set_value('child_name[]'), array("class"=>"form-control","placeholder"=>lang('child_name'))); ?>
											                </div>
											            </div>
														<?php endif ?>
														<?php if (foption('member','childrendob')): ?>
											            <div class="col-sm-4">
											            	<div class="form-group">
											                    <div class="input-group datepicker">
																	<div class="input-group-addon">
																		<i class="fa fa-calendar"></i>
																	</div>
													            	<?php echo form_input("child_dob[]",set_value("child_dob[]"),array("class"=>"form-control pull-right","placeholder"=>lang('dob'),"autocomplete"=>"off")); ?>
													            </div>
											                </div>
											            </div>
														<?php endif ?>
														<?php if (foption('member','childrengender')): ?>
											            <div class="col-sm-3">
											            	<div class="form-group">
											                    <select name="child_gender[]" class="form-control">
											                    	<option value="">Select Gender</option>
											                    	<option value="male"><?php echo lang("male"); ?></option>
											                    	<option value="female"><?php echo lang("female"); ?></option>
											                    </select>
											                </div>
														<?php endif ?>
											            </div>
											        </div>
													<?php if (foption('member','childrenqualification')): ?>
									        		<div class="row">
									        			<div class="col-sm-5">
											            	<div class="form-group">
											                    <?php echo form_input('qualification[]', set_value('qualification[]'), array("class"=>"form-control","placeholder"=>lang('qualification'))); ?>
											                </div>
											            </div>
									        		</div>
													<?php endif ?>
											    </div>
											    <?php if (foption('member','childplus')): ?>
										            <div class="col-sm-2">
										            	<div class="form-group">
										                    <button type="button" class="btn btn-primary btn-icon-anim btn-square add_html"><i class="fa fa-plus"></i>
										                    </button>
										                </div>
										            </div>
												<?php endif ?>
									            <div class="clearfix">&nbsp;</div>
									        </div>
										<?php endif ?>
								    </div>
								</div>
								<?php endif ?>
							</div>
						</div>
					<?php endif ?>
					<?php if (foption('member','acedemic_info')): ?>
						<div class="tab-pane <?php echo (!foption('member','personalinfo') && !foption('member','familyinfo') && foption('member','acedemic_info'))?'active':''; ?>" id="tab_3">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo lang('education_detail'); ?></h3>
							</div>
							<?php if (foption('member','educationdetail')): ?>
								<?php if (foption('member','10info')): ?>
									<div class="row">
									    <div class="col-sm-12 clone_detail">
									        <div class="html_detail">
									        	<?php if (foption('member','10title')): ?>
										            <div class="col-sm-4">
										            	<div class="form-group">
											            	<label>10<sup>th</sup></label>
											            	<?php echo form_hidden('education_type[]', 1); ?>
										                    <?php echo form_input('edu_cource[]', '10', array("class"=>"form-control","readonly"=>true,"placeholder"=>"10th")); ?>
										                </div>
										            </div>
									        	<?php endif ?>
									            <?php if (foption('member','10schoolname')): ?>
										            <div class="col-sm-5">
										            	<div class="form-group">
											            	<label><?php echo lang("school_name"); ?></label>
										                    <?php echo form_input('institute_name[]', set_value('institute_name[0]'), array("class"=>"form-control","placeholder"=>"School Name")); ?>
										                </div>
										            </div>
									            <?php endif ?>
									            <?php if (foption('member','10passingyear')): ?>
										            <div class="col-sm-2">
										            	<div class="form-group">
											            	<label><?php echo lang("passing_year"); ?></label>
										                    <?php echo form_input('passing_year[]', set_value('passing_year[0]'), array("class"=>"form-control","placeholder"=>"Passing Year")); ?>
										                    <?php echo form_error('passing_year[]'); ?>
										                </div>
										            </div>
									            <?php endif ?>
									        </div>
									    </div>
									</div>
									<hr>
								<?php endif ?>
								<?php if (foption('member','12info')): ?>
									<div class="row">
									    <div class="col-sm-12">
									        <div class="html_detail">
									        	<?php if (foption("member","12title")): ?>
										            <div class="col-sm-4">
										            	<div class="form-group">
											            	<label>12<sup>th</sup></label>
											            	<?php echo form_hidden('education_type[]', 2); ?>
										                    <?php echo form_input('edu_cource[]', '12', array("class"=>"form-control","readonly"=>true,"placeholder"=>"12th")); ?>
										                </div>
										            </div>
									        	<?php endif ?>
									            <?php if (foption("member","12schoolname")): ?>
										            <div class="col-sm-5">
										            	<div class="form-group">
											            	<label><?php echo lang("school_name"); ?></label>
										                    <?php echo form_input('institute_name[]', set_value('institute_name[1]'), array("class"=>"form-control","placeholder"=>"School Name")); ?>

										                </div>
										            </div>
									            <?php endif ?>
									            <?php if (foption("member","12passingyear")): ?>
										            <div class="col-sm-2">
										            	<div class="form-group">
											            	<label><?php echo lang("passing_year"); ?></label>
										                    <?php echo form_input('passing_year[]', set_value('passing_year[1]'), array("class"=>"form-control","placeholder"=>"Passing Year")); ?>
										                    <?php echo form_error('passing_year[]'); ?>
										                </div>
										            </div>
									            <?php endif ?>
									        </div>
									    </div>
									</div>
									<hr>
								<?php endif ?>
								<?php if (foption('member','uginfo')): ?>
									<div class="row">
									    <div class="col-sm-12">
									        <div class="html_detail">
									        	<?php if (foption("member","ugtitle")): ?>
										            <div class="col-sm-4">
										            	<div class="form-group">
											            	<label><?php echo lang("ug"); ?></label>
											            	<?php echo form_hidden('education_type[]', 3); ?>
										                    <?php $ug = $this->config->item("ug"); ?>
												            <select name="edu_cource[]" class="form-control">
												            	<?php if ($ug): ?>
												            		<option value="">Select UG Cource</option>
													            	<?php foreach ($ug as $key => $value): ?>
													            		<option value="<?php echo $value ?>" <?php echo (set_value('edu_cource[2]') == $value)?'selected':''; ?>><?php echo $value ?></option>
													            	<?php endforeach ?>
												            	<?php endif ?>
												            </select>
										                </div>
										            </div>
									        	<?php endif ?>
									            <?php if (foption("member","ugcollegename")): ?>
										            <div class="col-sm-5">
										            	<div class="form-group">
											            	<label><?php echo lang("college_name"); ?></label>
										                    <?php echo form_input('institute_name[]', set_value('institute_name[2]'), array("class"=>"form-control","placeholder"=>"College Name")); ?>
										                </div>
										            </div>
									            <?php endif ?>
									            <?php if (foption("member","ugpassingyear")): ?>
										            <div class="col-sm-2">
										            	<div class="form-group">
											            	<label><?php echo lang("passing_year"); ?></label>
										                    <?php echo form_input('passing_year[]', set_value('passing_year[2]'), array("class"=>"form-control","placeholder"=>"Passing Year")); ?>
										                    <?php echo form_error('passing_year[]'); ?>
										                </div>
										            </div>
									            <?php endif ?>
									        </div>
									    </div>
									</div>
									<hr>
								<?php endif ?>
								<?php if (foption('member','pginfo')): ?>
									<div class="row">
									    <div class="col-sm-12">
									        <div class="html_detail">
									        	<?php if (foption("member","pgtitle")): ?>
										            <div class="col-sm-4">
										            	<div class="form-group">
											            	<label><?php echo lang("pg"); ?></label>
											            	<?php echo form_hidden('education_type[]', 4); ?>
										                    <?php $pg = $this->config->item("pg"); ?>
												            <select name="edu_cource[]" class="form-control">
												            	<?php if ($pg): ?>
												            		<option value="">Select PG Cource</option>
													            	<?php foreach ($pg as $key => $value): ?>
													            		<option value="<?php echo $value ?>" <?php echo (set_value('edu_cource[3]') == $value)?'selected':''; ?>><?php echo $value ?></option>
													            	<?php endforeach ?>
												            	<?php endif ?>
												            </select>
										                </div>
										            </div>
												<?php endif ?>
									            <?php if (foption("member","pgcollegename")): ?>
										            <div class="col-sm-5">
										            	<div class="form-group">
											            	<label><?php echo lang("college_name"); ?></label>
										                    <?php echo form_input('institute_name[]', set_value('institute_name[3]'), array("class"=>"form-control","placeholder"=>"College Name")); ?>
										                </div>
										            </div>
												<?php endif ?>
									            <?php if (foption("member","pgpassingyear")): ?>
										            <div class="col-sm-2">
										            	<div class="form-group">
											            	<label><?php echo lang("passing_year"); ?></label>
										                    <?php echo form_input('passing_year[]', set_value('passing_year[3]'), array("class"=>"form-control","placeholder"=>"Passing Year")); ?>
										                    <?php echo form_error('passing_year[]'); ?>
										                </div>
										            </div>
												<?php endif ?>
									        </div>
									    </div>
									</div>
									<hr>
								<?php endif ?>
							<?php endif ?>
							<?php if (foption('member','otherqua')): ?>
								<div class="row">
								    <div class="col-sm-12 clone_detail">
								    	<?php if (set_value('edu_cource[]') && count(set_value('edu_cource[]'))>4): ?>
								    		<?php for ($i=4; $i < count(set_value("edu_cource[]")); $i++) :  ?>
								    			<div class="html_detail">
								    				<?php if (foption("member","otherquatitle")): ?>
											            <div class="col-sm-4">
											            	<div class="form-group">
												            	<label><?php echo lang("other_qua"); ?></label>
												            	<?php echo form_hidden('education_type[]', 5); ?>
											                    <?php echo form_input('edu_cource[]', set_value('edu_cource['.$i.']'), array("class"=>"form-control","placeholder"=>"Other Qualification Name")); ?>
											                </div>
											            </div>
								    				<?php endif ?>
										            <?php if (foption("member","institutename")): ?>
											            <div class="col-sm-5">
											            	<div class="form-group">
												            	<label><?php echo lang("institute_name"); ?></label>
											                    <?php echo form_input('institute_name[]', set_value('institute_name['.$i.']'), array("class"=>"form-control","placeholder"=>"Institute Name")); ?>
											                </div>
											            </div>
										            <?php endif ?>
										            <?php if (foption("member","ugpassingyear")): ?>
											            <div class="col-sm-2">
											            	<div class="form-group">
												            	<label><?php echo lang("passing_year"); ?></label>
											                    <?php echo form_input('passing_year[]', set_value('passing_year['.$i.']'), array("class"=>"form-control","placeholder"=>"Passing Year")); ?>
											                </div>
											            </div>
										            <?php endif ?>
										            <?php if (foption("member","otherquaplus")): ?>
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
								    		<?php endfor ?>
								    	<?php else: ?>
									        <div class="html_detail">
									        	<?php if (foption("member","otherquatitle")): ?>
										            <div class="col-sm-4">
										            	<div class="form-group">
											            	<label><?php echo lang("other_qua"); ?></label>
											            	<?php echo form_hidden('education_type[]', 5); ?>
										                    <?php echo form_input('edu_cource[]', '', array("class"=>"form-control","placeholder"=>"Other Qualification Name")); ?>
										                </div>
										            </div>
										        <?php endif ?>
									            <?php if (foption("member","institutename")): ?>
										            <div class="col-sm-5">
										            	<div class="form-group">
											            	<label><?php echo lang("institute_name"); ?></label>
										                    <?php echo form_input('institute_name[]', '', array("class"=>"form-control","placeholder"=>"Institute Name")); ?>
										                </div>
										            </div>
										        <?php endif ?>
									            <?php if (foption("member","ugpassingyear")): ?>
										            <div class="col-sm-2">
										            	<div class="form-group">
											            	<label><?php echo lang("passing_year"); ?></label>
										                    <?php echo form_input('passing_year[]', '', array("class"=>"form-control","placeholder"=>"Passing Year")); ?>
										                </div>
										            </div>
										        <?php endif ?>
									            <?php if (foption("member","otherquaplus")): ?>
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
								    	<?php endif ?>
								    </div>
								</div>
							<?php endif ?>
						</div>
					<?php endif ?>
				</div>
		    	<div class="box-footer">
		        	<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</section>
</div>

<!-- daterangepicker -->
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/moment/min/moment.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
	$(".removeDiv").remove();
	$('.datepicker').datetimepicker({
      format: "YYYY-MM-DD hh:mm:ss",
      maxDate: moment(),
      useCurrent: false
    })
    .on('dp.change dp.show', function(e) {
    	var id = $(this).closest("form").attr("id");
    	var field = $(this).find("input").attr("name");
        $('#'+id).bootstrapValidator('revalidateField', field);
    });
    $("#states").on("change",function(){
    	var site_url = '<?php echo base_url(); ?>';
    	$.ajax({
    		url: site_url+"common/getAjaxCity",
    		type: "POST",
    		data: "sid="+$(this).val()+"&csrf_test_name="+$('input[name="csrf_test_name"]').attr('value'),
    		success: function(result){
    			$("#cities").html(result);
    		}
    	});
    });
    $("#marital_status").on("change",function(){
    	if ($(this).val()) {
	    	($(this).val() == "married")?$("#spouse_name").closest(".col-md-6").show(500):$("#spouse_name").closest(".col-md-6").hide(500);
	    	if($(this).val() != "married"){
	    		$(".single_detail").show(500);
	    	}else{
	    		$(".single_detail").hide(500);
	    	}
	    	if($(this).val() != "single"){
	    		$(".children_row").show(500);
	    	}else{
	    		$(".children_row").hide(500);
	    	}
    	}else{
    		$("#spouse_name").closest(".col-md-6").hide(500);
    		$(".single_detail").hide(500);
    		$(".children_row").show(500);
    	}
    });
    $("input[name=disability]").on("change",function(){
    	if ($(this).val() == "yes") {
    		$(".disability_yes").show(500);
    	}else{
    		$(".disability_yes").hide(500);
    	}
    });
    $(".add_html").on("click",function(){
		var html = $(this).closest(".html_detail").clone();
		html.find("input[type=text],textarea").val("");
		html.find(".add_html").removeClass("add_html btn-primary").addClass("remove_html btn-danger");
		html.find(".fa-plus").removeClass("fa-plus").addClass("fa-trash").closest(".html_detail");
		$(this).closest(".clone_detail").append(html);
		$('.datepicker').datetimepicker({
			format: "YYYY-MM-DD hh:mm:ss",
			maxDate: moment(),
      		useCurrent: false
		});
	});
	$("body").on("click",".remove_html",function(){
		$(this).closest(".html_detail").remove();
	});

	/*$('#myTab a').click(function(e) {
	  e.preventDefault();
	  $(this).tab('show');
	});

	// store the currently selected tab in the hash value
	$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
	  var id = $(e.target).attr("href").substr(1);
	  window.location.hash = id;
	});

	// on load of the page: switch to the currently selected tab
	var hash = window.location.hash;
	$('#myTab a[href="' + hash + '"]').tab('show');*/

	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function(e) {
	            $('#imagePreview').attr('src', e.target.result);
	            $('#imagePreview').hide();
	            $('#imagePreview').fadeIn(650);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$("#imageUpload").change(function() {
	    readURL(this);
	});

	$('#addMemberForm').bootstrapValidator({
		excluded: [':disabled'],
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The First Name field is required.'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The First name can consist of alphabetical characters and spaces only'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'The Last Name field is required.'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The Last name can consist of alphabetical characters and spaces only'
                    }
                }
            },
            date_of_birth: {
                validators: {
                    notEmpty: {
                        message: 'The Date of Birth field is required.'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The Address field is required.'
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: 'The State field is required.'
                    }
                }
            },
            city: {
                validators: {
                    notEmpty: {
                        message: 'The City field is required.'
                    }
                }
            },
            occupation: {
                validators: {
                    notEmpty: {
                        message: 'The Occupation field is required.'
                    }
                }
            },
            religion: {
                validators: {
                    notEmpty: {
                        message: 'The Religion field is required.'
                    }
                }
            },
            mobile_no: {
                validators: {
                    notEmpty: {
                        message: 'The Mobile Number is required.'
                    },
                	regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Mobile Number field must contain only numbers.'
                    },
                    remote: {
                        type: 'POST',
                        url: site_url+'superadmin/checkMemberMobileNo',
                        data: {csrf_test_name:$('input[name="csrf_test_name"]').attr('value')},
                        message: 'This mobile no is already in use. Choose another.'
                    }
                }
            },
            email: {
                validators: {
                	emailAddress: {
                        message: 'The Email field must contain a valid email address.'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The Password field is required.'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The Password field may only contain alpha-numeric characters.'
                    },
                }
            },
            no_family_members: {
                validators: {
                    notEmpty: {
                        message: 'The No of family members field is required.'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The No of family members field must contain only numbers.'
                    },
                }
            },
            head_family_name: {
                validators: {
                    notEmpty: {
                        message: 'The Family Head Person Name field is required.'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The Family Head Person name can consist of alphabetical characters and spaces only'
                    }
                }
            },
            fathers_name: {
                validators: {
                    notEmpty: {
                        message: 'The Fathers Name field is required.'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The Fathers Name can consist of alphabetical characters and spaces only'
                    }
                }
            },
            mothers_name: {
                validators: {
                    notEmpty: {
                        message: 'The Mothers Name field is required.'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The Mothers Name can consist of alphabetical characters and spaces only'
                    }
                }
            },
            marital_status: {
                validators: {
                    notEmpty: {
                        message: 'The Marital Status field is required.'
                    }
                }
            },
            annual_income: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Annual Income field must contain only numbers.'
                    }
                }
            },
            'passing_year[]': {
                validators: {
                	integer: {
                        message: 'The value is not a valid integer number',
                    },
                    regexp: {
                        regexp: /^(19|20)\d{2}$/,
                        message: 'The Passing Year field must be a valid year.'
                    },
                    stringLength: {
                        min: 4,
                        max: 4,
                        message: 'The Passing Year must be 4 characters long'
                    },
                }
            },
        }
    }).on('status.field.bv', function(e, data) {
        var $form     = $(e.target),
            validator = data.bv,
            $tabPane  = data.element.parents('.tab-pane'),
            tabId     = $tabPane.attr('id');
        
        if (tabId) {
            var $icon = $('a[href="#' + tabId + '"][data-toggle="tab"]').parent().find('i');

            // Add custom class to tab containing the field
            if (data.status == validator.STATUS_INVALID) {
                $icon.removeClass('fa-check').addClass('fa-times');
            } else if (data.status == validator.STATUS_VALID) {
                var isValidTab = validator.isValidContainer($tabPane);
                $icon.removeClass('fa-check fa-times')
                     .addClass(isValidTab ? 'fa-check' : 'fa-times');
            }
        }
    });
</script>