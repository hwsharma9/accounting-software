<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<?php echo heading('Component List',3,'class="box-title"'); ?>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example1" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>S. No.</th>
									<th>Component Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($json_map): ?>
									<?php foreach ($json_map as $key => $value): 
										$file_name = basename($value,".json");
									?>
										<tr>
											<td><?php echo $key+1; ?></td>
											<td><?php echo ucfirst($file_name); ?></td>
											<td>
												<a href="<?php echo base_url("dynamic/readJson/".$file_name); ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
							</tfoot>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
	<script src="<?php echo base_url("assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"); ?>"></script>
	<script>
		$(function () {
			$('#example1').DataTable()
		});
	</script>
</div>