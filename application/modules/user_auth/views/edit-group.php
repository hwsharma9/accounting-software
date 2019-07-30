<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/css/bootstrapValidator.css">
<script type="text/javascript" src="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/js/bootstrapValidator.js"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/select2/dist/css/select2.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php echo breadcrumb(lang('edit_group')); ?>
    <!-- Main content -->
    <section class="content">
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- form start -->
            <?php echo form_open_multipart(uri_string(),array("id"=>"editGroupForm")); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo lang('edit_group'); ?></h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang("add_group"); ?></label>
                                <input type="text" class="form-control" name="name" value="<?php echo $groups['name']; ?>">
                            </div>
                        </div>
                    </div>
                	<div class="box-header">
                		<h3 class="box-title"><?php echo lang("select_authority"); ?></h3>
                	</div>
                    <div class="row" id="accordion">
                    	<div class="col-md-12">
	                        <ul class="list-group">
								<?php 
								$permissions = json_decode($groups['permissions'],true);
								$json_data = read_file(APPPATH."modules/user_auth/views/json/borrowerlist.json",'r+');
								$json = json_decode($json_data,true);
								if (isset($json) && $json) { foreach ($json as $key => $value) { ?>
									<li class="list-group-item col-md-4">
										<?php echo form_hidden($key, 0); ?>
										<?php echo form_checkbox($key, 1,((isset($permissions[$key]) && $permissions[$key])?TRUE:FALSE)); ?>
										<a href="<?php echo "#collapse".$key; ?>" data-toggle="collapse">
								 			<?php echo $value['desc']." (".$key.")"; ?>
								 		</a>
								 		<?php if (isset($value['childs']) && $value['childs']) {
								 			$name = $key;
								 			$childs = $value['childs'];
								 			$k =$key;
								 			$this->load->view("child-element",compact("childs","name","k","permissions"));
								 		} ?>
								 	</li>
								 <?php }
								}
								?>
							</ul>
                    	</div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </section>
</div>
<!-- daterangepicker -->
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/moment/min/moment.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
    $('.select2').select2();
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

    $('#editGroupForm').bootstrapValidator({
        excluded: [':disabled'],
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Group Name field is required.'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The Group name can consist of alphabetical characters and spaces only'
                    }
                }
            }
        }
    });
</script>