<div class="content-wrapper">
    <link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <?php echo breadcrumb(lang("members_list")); ?>
    <section class="content">
        <?php echo flashAlertMessage(); ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo lang("members_list"); ?></h3>
                        <div class="box-box pull-right"><a href="javascript:void(0)" class="btn btn-primary searchMember"><i class="fa fa-search"></i></a></div>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo lang("name"); ?></th>
                                    <th><?php echo lang("email"); ?></th>
                                    <th><?php echo lang("m_no"); ?></th>
                                    <th><?php echo lang("address"); ?></th>
                                    <th><?php echo lang("defaulter"); ?></th>
                                    <th><?php echo lang("date"); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="searchMemberModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url("members/members-list"); ?>" method="GET">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Member Search</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Member ID</label>
                                <input type="text" name="member_id" class="form-control" value="<?php echo (isset($_GET['member_id']) && !empty($_GET['member_id']))?$_GET['member_id']:""; ?>"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Member Name</label>
                                <input type="text" name="member_name" class="form-control" value="<?php echo (isset($_GET['member_name']) && !empty($_GET['member_name']))?$_GET['member_name']:""; ?>"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Member Phone/Mobile No.</label>
                                <input type="text" name="number" class="form-control" value="<?php echo (isset($_GET['number']) && !empty($_GET['number']))?$_GET['number']:""; ?>"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Member Status</label>
                                <select name="member_status" class="form-control">
                                    <option value="">Select Member Status</option>
                                    <option value="1" <?php echo (isset($_GET['member_status']) && ($_GET['member_status'] == 1))?'selected':""; ?>>Defaulter</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".searchMember").on("click",function(){
        $("#searchMemberModal").modal("show");
    });

    $("body").on("click",".updateStatus",function(){
        var value = 0;
        if ($(this).is(":checked")) {
                value = 1;
        }
        var table = $(this).data("table");
        var setfield = $(this).data("set");
        var where = $(this).data("where");
        $.ajax({
            url: site_url+"common/updateStatusAction",
            type: "POST",
            // data: "table="+table+"&set="+set+"&value="+value+"&where="+where,
            data: {table,where,setfield,value,'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
            success: function(result){}
        });
    });
    $('#example1').DataTable({
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('superadmin/getMembersLists?'.$_SERVER['QUERY_STRING']); ?>",
            "type": "POST"
        },
        "columns": [
            { "data": function(e,k){
              var value = JSON.stringify({member_id:e.member_id,id:e.id,image_path:e.image_path});
              return "<a href='javascript:void(0)' class='context-menu-one' data-value='"+value+"'>"+e.member_id+"</a>";
            } },
            { "data": "member_name" },
            { "data": "email" },
            { "data": "mobile_no" },
            { "data": "address" },
            { "data": function(e,k) {
                var where = JSON.stringify({member_id:e.member_id});
                return "<input type='checkbox' class='updateStatus' " + (e.member_status == 1?'checked':'') + " data-table='members' data-set='member_status' data-where='"+where+"' />";
            } },
            { "data": "created_at" },
            /*{ "data": function(e){
                var where = JSON.stringify({member_id:e.member_id});
                var html = '<a href="'+site_url+'members/edit-member-detail/'+e.member_id+'" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>';
                html += "<a href='javascript:void(0)' class='btn btn-danger btn-sm deleteAjax' data-table='members' data-id='"+e.id+"'' data-where='"+where+"'><i class='fa fa-trash'></i></a>";
                html += "<a href='"+site_url+"loan/provide-loan/"+e.member_id+"' class='btn btn-warning btn-sm'><i class='fa fa-money'></i></a>";
                return html;
            } }*/
        ],
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
            var id = "members_"+aData.id;
            $(nRow).attr('id', id);
        }
    });
    $.contextMenu({
        selector: '.context-menu-one',
        trigger: 'hover',
        autoHide: true,
        build: function($triggerElement, e){
            var value = $triggerElement.data("value");
            var items = {};
            if ('<?php echo authenticate('0_1_0'); ?>') {
            items.edit = {
                            name: "<?php echo lang('edit'); ?>", 
                            icon: "edit", 
                            callback: function(key, options) {
                                location.href = site_url+"members/edit-member-detail/"+value.member_id;
                            }
                        };
            }
            items.account = {
                            name: "<?php echo lang('members_account'); ?>", 
                            icon: "edit", 
                            callback: function(key, options) {
                                location.href = site_url+"members/member-account/"+value.member_id+"/1";
                            }
                        };
            if ('<?php echo authenticate('0_1_1'); ?>') {
            items.provide_loan = {
                            name: "<?php echo lang('provide_loan'); ?>", 
                            icon: "fa-money",
                            callback: function(key, options) {
                                location.href = site_url+"loan/provide-loan/"+btoa(value.id+"_"+value.member_id);
                            }
                        };
            }
            if ('<?php echo authenticate('0_1_2'); ?>') {
            items.delete = {
                            name: "<a href='javascript:void(0)' class='deleteAjax' data-table='members' data-id='"+value.id+"' data-image='"+value.image_path+"' data-where='"+JSON.stringify({member_id:value.member_id})+"'><?php echo lang('delete'); ?></a>", 
                            icon: "delete",
                            isHtmlName: true
                        };
            }
            return {
                    callback: function(){},
                    items: items
            }
        }
    });
    $("body").on("click",".deleteAjax",function(){
        var table = $(this).data("table");
        var image = $(this).data("image");
        var where = $(this).data("where");
        var id = $(this).data("id");
        var that = this;
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
