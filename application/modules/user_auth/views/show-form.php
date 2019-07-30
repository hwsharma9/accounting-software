<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<?php echo form_open(base_url("dynamic/updateJson"),'',array("file"=>$file)); ?>
						<div class="box-header">
							<?php echo heading('Json Field List',3,'class="box-title"'); ?>
							<div class="box-tools pull-right">
								<a href="javascript:void(0)" class="btn btn-warning addItem" data-parent="0"><i class="fa fa-plus"></i></a>
								<?php echo form_submit('', 'submit',array("class"=>"btn btn-primary")); ?>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body" id="accordion">
							<ul class="list-group">
							<?php if ($json) { foreach ($json as $key => $value) { ?>
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
						<div class="box-footer">
							<?php echo form_submit('', 'submit',array("class"=>"btn btn-primary")); ?>
						</div>
						<!-- /.box-body -->
					<?php echo form_close(); ?>
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
	<div class="modal fade" id="add-item">
		<div class="modal-dialog">
			<div class="modal-content">
				<?php echo form_open(base_url("dynamic/addItemAction"),array("id"=>"add-item-form"),array("file"=>$file)); ?>
				<input type="hidden" name="parent" id="itemParent">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Item</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Item Name</label>
								<input type="text" class="form-control" name="desc">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>View Status</label><br>
								<input type="radio" name="status" checked value="1"> Show
								<input type="radio" name="status" value="0"> Hide
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(".addItem").on("click",function(){
			$("#itemParent").val($(this).data("parent"));
			$("#add-item").modal("show");
		});
		$("#add-item-form").on("submit",function(e){
			e.preventDefault();
			var value = $(this).serialize();
			// console.log(value);
			$.ajax({
				url: $(this).attr("action"),
				type: "POST",
				data: value,
				success: function(result){
					if(result==1)
					{
						location.reload();
					}
				}
			});
		});
		$(".deleteItem").on("click",function(){
			var parent = $(this).data("parent");
			var file = '<?php echo $file ?>';
			// console.log(value);
			if (confirm("Really want to delete this item?")) {
				$.ajax({
					url: site_url+"dynamic/deleteItem",
					type: "POST",
					data: {parent:parent,file:file,'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
					success: function(result){
						if(result==1){}
					}
				});
			}
		});
	</script>
</div>