<div class="content-wrapper">
    <link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <?php echo breadcrumb(lang("group_list")); ?>
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
			                        <h3 class="box-title"><?php echo lang("group_list"); ?></h3>
			                        <div class="box-tools">
			                            <a href="<?php echo base_url("user_auth/add-group"); ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
			                        </div>
			                    </div>
			                    <div class="box-body">
			                        <table id="example1" class="table table-bordered table-striped">
			                            <thead>
			                                <tr>
			                                    <th>#</th>
			                                    <th><?php echo lang("group_name"); ?></th>
			                                    <th><?php echo lang("action"); ?></th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                                <?php if ($groups): ?>
			                                    <?php foreach ($groups as $key => $value): ?>
			                                        <tr id="<?php echo "groups_".$value['id']; ?>">
			                                            <td><?php echo $key+1; ?></td>
			                                            <td><?php echo $value['name']; ?></td>
			                                            <td>
			                                                <a href="javascript:void(0)" class="btn btn-danger deleteAjax" data-table="gropus" data-id="<?php echo $value['id'] ?>" data-where='<?php echo json_encode(array("id"=>$value['id'])) ?>'><i class="fa fa-trash"></i></a>
			                                                <a href="<?php echo base_url("user_auth/edit-group/".$value['id']); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
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