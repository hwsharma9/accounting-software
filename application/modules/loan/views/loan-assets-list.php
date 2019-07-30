<div class="content-wrapper">
	<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<?php echo breadcrumb(lang('assets_detail')); ?>
    <section class="content">
		<div class="box box-primary">
            <div class="box-header">
                <h3><?php echo $loan['member_name'] ?></h3>
            </div>
			<div class="nav-tabs-custom">
            	<?php echo editLoanTabs($loan_id); ?>
              	<div class="tab-content">
              		<div class="tab-pane active" id="tab_2">
						<div class="box-header with-border">
							<h1><strong><?php echo lang('assets_detail'); ?></strong></h1>
						</div>
						<div class="box-body">
							<table class="table table-bordered table-striped example1">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th><?php echo lang("assets_name"); ?></th>
				                  <th><?php echo lang("assets_price"); ?></th>
				                  <th><?php echo lang("assets_description"); ?></th>
				                </tr>
				              </thead>
				              <tbody>
				              	<?php if ($assets): ?>
				              		<?php foreach ($assets as $key => $value): ?>
						              	<tr>
						              		<td><?php echo $key+1; ?></td>
						              		<td><?php echo $value['assets_name']; ?></td>
						              		<td><?php echo $value['assets_price']; ?></td>
						              		<td><?php echo $value['assets_description']; ?></td>
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
		<div class="modal fade" id="payInstallmentPopup">
			<div class="modal-dialog">
				<div class="modal-content">
					<?php echo form_open(base_url(uri_string())); ?>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Pay Installment</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
							        <div class="form-group">
							            <label>Payment Date</label>
							            <div class="input-group">
							            	<input type="hidden" name="loan_id" id="loan_id">
											<span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
							            	<input type="text" name="paid_date" id="paid_date" class="form-control" readonly="">
										</div>
							        </div>
							    </div>
								<div class="col-md-12">
							        <div class="form-group">
							            <label>Payment Amount</label>
							            <div class="input-group">
											<span class="input-group-addon"><i class="fa fa-inr"></i></span>
											<input type="text" name="paid_amount" id="paid_amount" class="form-control">
										</div>
							        </div>
							    </div>
								<div class="col-md-12">
							        <div class="form-group">
							            <label>Late Payment Charge</label>
							            <div class="input-group">
											<span class="input-group-addon"><i class="fa fa-inr"></i></span>
							            	<input type="text" name="late_payment_charge" id="late_payment_charge" class="form-control">
										</div>
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
	</section>
	<script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$('.example1').DataTable();
		$(".payInstallment").on("click",function(){
			var value = $(this).data('value');
			console.log(value);
			$("#paid_date").val(value.paid_date);
			$("#paid_amount").val(value.loan_amount);
			$("#loan_id").val(value.loan_id);
			$("#payInstallmentPopup").modal("show");
		});
		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>
</div>