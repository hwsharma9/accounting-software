<div class="content-wrapper">
    <link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <?php echo breadcrumb(lang("admin_list")); ?>
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
                                    <h3 class="box-title"><?php echo lang("admin_list"); ?></h3>
                                    <div class="box-tools">
                                        <a href="<?php echo base_url("user_auth/add-admin"); ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><?php echo lang("admin_name"); ?></th>
                                                <th><?php echo lang("admin_email"); ?></th>
                                                <th><?php echo lang("admin_password"); ?></th>
                                                <th><?php echo lang("admin_type"); ?></th>
                                                <th><?php echo lang("select_group"); ?></th>
                                                <th><?php echo lang("action"); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($admins): ?>
                                                <?php foreach ($admins as $key => $value): ?>
                                                    <tr id="<?php echo "admins_".$value['id']; ?>">
                                                        <td><?php echo $key+1; ?></td>
                                                        <td><?php echo $value['name']; ?></td>
                                                        <td><?php echo $value['email']; ?></td>
                                                        <td><?php echo $value['text_password']; ?></td>
                                                        <td><?php echo $value['user_type']; ?></td>
                                                        <td><?php echo findGroupName($groups,json_decode($value['group'])); ?></td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-danger deleteAjax" data-table="admins" data-id="<?php echo $value['id'] ?>" data-where='<?php echo json_encode(array("id"=>$value['id'])) ?>'><i class="fa fa-trash"></i></a>
                                                            <a href="<?php echo base_url("user_auth/edit-admin/".$value['id']); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
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
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#example1').DataTable();
    $.contextMenu({
        selector: '.context-menu-one',
        trigger: 'hover',
        autoHide: true,
        build: function($triggerElement, e){
            var value = $triggerElement.data("value");
            return {
                    callback: function(){},
                    items: {
                        "edit": {
                            name: "<?php echo lang('edit'); ?>", 
                            icon: "edit", 
                            callback: function(key, options) {
                                location.href = site_url+"members/edit-member-detail/"+value.member_id;
                            }
                        },
                        "account": {
                            name: "<?php echo lang('members_account'); ?>", 
                            icon: "edit", 
                            callback: function(key, options) {
                                location.href = site_url+"members/member-account/"+value.member_id+"/1";
                            }
                        },
                        "provide_loan": {name: "<?php echo lang('provide_loan'); ?>", icon: "fa-money",
                            callback: function(key, options) {
                                location.href = site_url+"loan/provide-loan/"+btoa(value.id+"_"+value.member_id);
                            }
                        },
                        "delete": {
                            name: "<a href='javascript:void(0)' class='deleteAjax' data-table='members' data-id='"+value.id+"' data-image='"+value.image_path+"' data-where='"+JSON.stringify({member_id:value.member_id})+"'><?php echo lang('delete'); ?></a>", 
                            icon: "delete",
                            isHtmlName: true
                        },
                        // "copy": {name: "Copy", icon: "copy"},
                        // "paste": {name: "Paste", icon: "paste"},
                        // "sep1": "---------",
                        // "quit": {name: "Quit", icon: function($element, key, item){ return 'context-menu-icon context-menu-icon-quit'; }}
                    }
            }
        }
    });
    $("body").on("click",".deleteAjax",function(){
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
    });
  });

</script>
