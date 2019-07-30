<div class="content-wrapper">
    <link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/css/bootstrapValidator.css">
    <script type="text/javascript" src="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/js/bootstrapValidator.js"></script>
    <?php echo breadcrumb(lang("user_roles")); ?>
    <section class="content">
        <?php echo flashAlertMessage(); ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <!-- Nav tabs -->
                    <?php echo authTabs(); ?>
                
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo lang("user_roles"); ?></h3>
                                    <div class="box-tools">
                                        <a href="javascript:void(0)" class="btn btn-primary addRole"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><?php echo lang("role_name"); ?></th>
                                                <th><?php echo lang("action"); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($roles): ?>
                                                <?php foreach ($roles as $key => $value): ?>
                                                    <tr>
                                                        <td><?php echo $key+1; ?></td>
                                                        <td><?php echo $value['name']; ?></td>
                                                        <td>
                                                            <a href="javascript:void(0)" data-id="<?php echo $value['id']; ?>" data-name="<?php echo $value['name']; ?>" class="btn btn-primary editRole"><i class="fa fa-pencil"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="add-role-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open(base_url(uri_string()),array("id"=>"addRoleForm")); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo lang("add_role"); ?></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="roleid">       
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang("role_name"); ?></label>
                                <input type="text" name="name" id="rolename" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#example1').DataTable();
    $('.addRole').on("click",function(){
        $("#roleid").val("");
        $("#rolename").val("");
        $("#add-role-modal .modal-title").text('<?php echo lang("add_role"); ?>');
        $("#add-role-modal").modal("show");
    });
    $('.editRole').on("click",function(){
        $("#roleid").val($(this).attr("data-id"));
        $("#rolename").val($(this).attr("data-name"));
        $("#add-role-modal .modal-title").text('<?php echo lang("edit_role"); ?>');
        $("#add-role-modal").modal("show");
    });

    $('#addRoleForm').bootstrapValidator({
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
                        message: 'The Role Name field is required.'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The Role name can consist of alphabetical characters and spaces only'
                    }
                }
            }
        }
    });
    
    /*$("body").on("click",".deleteAjax",function(){
        var table = $(this).data("table");
        var image = $(this).data("image");
        var where = $(this).data("where");
        var id = $(this).data("id");
        var that = this;
        // console.log(that);
        swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
        }).then((result) => {
          if (result.value == 1) {
            $.ajax({
                url: site_url+"/common/deleteAjax",
                type: "POST",
                dataType:"text",
                data: {table:table,where:where,image:image},
                success: function(response){
                  if (response == 1) {
                    $("#"+table+"_"+id).remove();
                    // $(that).closest("tr").remove();
                    swal.fire(
                      'Deleted!',
                      'Row has been deleted.',
                      'success'
                    )
                  }else{
                    swal.fire(
                      'Not Deleted',
                      'Something went wrong.',
                      'error'
                    )
                  }
                }
            });
          } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swal.fire(
              'Cancelled',
              'Your detail is safe :)',
              'error'
            )
          }
      });
    });*/
  });

</script>
