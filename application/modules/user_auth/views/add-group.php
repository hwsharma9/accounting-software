<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/css/bootstrapValidator.css">
<script type="text/javascript" src="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/js/bootstrapValidator.js"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/select2/dist/css/select2.min.css">
<div class="content-wrapper">
    <?php echo breadcrumb(lang('add_group')); ?>
    <section class="content">
        <div class="box box-primary">
            <?php echo form_open_multipart(base_url(uri_string()),array("id"=>"addGroupForm")); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo lang('add_group'); ?></h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang("add_group"); ?></label>
                                <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>">
                                <?php echo form_error('name'); ?>
                            </div>
                        </div>
                    </div>
                	<div class="box-header">
                		<h3 class="box-title"><?php echo lang("select_authority"); ?></h3>
                	</div>
                    <div class="row" id="accordion">
                        <ul class="list-group">
							<?php 
								$json_data = read_file(APPPATH."modules/user_auth/views/json/borrowerlist.json",'r+');
								$json = json_decode($json_data,true);
							if ($json) { foreach ($json as $key => $value) { ?>
								<li class="list-group-item col-md-4">
									<?php echo form_hidden($key, 0); ?>
									<?php echo form_checkbox($key, 1,(($value['status'])?TRUE:FALSE)); ?>
									<a href="<?php echo "#collapse".$key; ?>" data-toggle="collapse">
							 			<?php echo $value['desc']; ?>
							 		</a>
								 	<a href="javascript:void(0)" class="addItem" data-parent="<?php echo $key ?>"><i class="fa fa-plus"></i></a>
							 		<?php if (isset($value['childs']) && $value['childs']) {
							 			$name = $key;
							 			$childs = $value['childs'];
							 			$k =$key;
							 			$this->load->view("child-element",compact("childs","name","k"));
							 		} ?>
							 	</li>
							 <?php }
							}
							?>
						</ul>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </section>
</div>
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/moment/min/moment.min.js"></script>
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

    $('#addGroupForm').bootstrapValidator({
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