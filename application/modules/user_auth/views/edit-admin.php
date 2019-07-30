<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/css/bootstrapValidator.css">
<script type="text/javascript" src="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/js/bootstrapValidator.js"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/select2/dist/css/select2.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php echo breadcrumb(lang("edit_admin")); ?>
    <!-- Main content -->
    <section class="content">
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- form start -->
            <?php echo form_open_multipart(base_url(uri_string()),array("id"=>"editAdminForm")); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo lang("edit_admin"); ?></h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang("admin_name"); ?></label>
                                <input type="text" class="form-control" name="name" value="<?php echo $admins['name']; ?>">
                                <?php echo form_error('name'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang("admin_email"); ?></label>
                                <input type="text" class="form-control" name="email" value="<?php echo $admins['email']; ?>">
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang("admin_password"); ?></label>
                                <input type="password" class="form-control" name="password" value="<?php echo $admins['text_password']; ?>">
                                <?php echo form_error('password'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang("admin_type"); ?></label>
                                <?php $roles = $this->common->getData("roles",array(),array("id","name"))->getResult(); ?>
                                <select name="user_type" id="type" class="form-control">
                                    <option value="">Select Admin Type</option>
                                    <?php if ($roles): ?>
                                        <?php foreach ($roles as $key => $value): ?>
                                            <option value="<?php echo $value['id'] ?>" <?php echo $admins['user_type']==$value['id']?'selected':''; ?>><?php echo $value['name'] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                                <?php echo form_error('user_type'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang("select_group"); ?></label>
                                <?php $group = json_decode($admins['group'],true); ?>
                                <select name="group[]" class="form-control select2" multiple="">
                                    <?php if ($groups): ?>
                                        <?php foreach ($groups as $key => $value): ?>
                                            <option value="<?php echo $value['id']; ?>" <?php echo in_array($value['id'], $group)?'selected':''; ?>><?php echo $value['name']; ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                                <?php echo form_error('group[]'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang("select_image"); ?></label>
                                <?php $image_path = $admins['profile_pic']; ?>
                                <?php if (!empty($image_path) && file_exists($image_path)): ?>
                                    <div class="col-md-12">
                                        <a href="<?php echo base_url("user_auth/deleteAdminPic/".$admins['id']); ?>" class="pull-right deleteAdminPic" data-path="<?php echo $image_path; ?>"><i class="fa fa-trash"></i></a>
                                        <img class="profile-user-img img-responsive img-circle" id="imagePreview" src="<?php echo base_url($image_path); ?>" alt="User profile picture">
                                    </div>
                                <?php else: ?>
                                    <input type="file" name="profile_pic" />
                                <?php endif ?>
                            </div>
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

    $(".deleteAdminPic").on("click",function(e){
        e.preventDefault();
        $.post($(this).attr("href"),{image_path:$(this).data("path"),'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},function(result){
            if (result == 1) {
                location.reload();
            }
        })
    })

    $('#editAdminForm').bootstrapValidator({
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
                        message: 'The Admin Name field is required.'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The Admin name can consist of alphabetical characters and spaces only'
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
                    }
                }
            },
            type: {
                validators: {
                    notEmpty: {
                        message: 'The Type field is required.'
                    }
                }
            },
            group: {
                validators: {
                    notEmpty: {
                        message: 'The Group field is required.'
                    }
                }
            },
        }
    });
</script>