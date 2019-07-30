<div class="content-wrapper">
	<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<?php echo breadcrumb(lang('installments_detail')); ?>
    <section class="content">
		<div class="box box-primary">
            <div class="box-header">
                <h3><?php echo $loan['member_name'] ?></h3>
            </div>
			<div class="nav-tabs-custom">
            	<?php echo editLoanTabs($loan_id); ?>
              	<div class="tab-content">
					<div class="tab-pane active" id="tab_3">
						<div class="box-header with-border">
							<h1><strong><?php echo lang('installments_detail'); ?></strong></h1>
						</div>
						<div class="box-body">
							<table class="table table-bordered table-striped example1">
				              <thead>
				                <tr>
				                  <th><?php echo lang("receipt_id"); ?></th>
				                  <th><?php echo lang("installment_amount"); ?></th>
				                  <th><?php echo lang("installment_interest"); ?></th>
				                  <th><?php echo lang("penalty"); ?></th>
				                  <th><?php echo lang("total"); ?></th>
				                  <th><?php echo lang("left_amount"); ?></th>
				                  <th><?php echo lang("installment_dates"); ?></th>
				                  <th><?php echo lang("installment_end_dates"); ?></th>
				                  <th><?php echo lang("installment_paid_dates"); ?></th>
				                  <th><?php echo lang("installment_status"); ?></th>
				                  <th><?php echo lang("action"); ?></th>
				                </tr>
				              </thead>
				              <tbody>
				              	<?php if ($installments):
				              		$loan_amount = $installments[0]['loan_amount'];
				              		$total_paid = $interest = $penalty = array();
				              	?>
				              		<?php foreach ($installments as $key => $value):
				              			if ($value['payment_status'] != 0) {
				              				array_push($total_paid, $value['loan_amount']);
				              				array_push($interest, $value['interest']);
				              				array_push($penalty, $value['penalty']);
					              			// $value['paid_date'] = DATE;
					              			$value['member_id'] = $loan['member_id'];
					              			$value['last_amount'] = $loan_amount-array_sum($total_paid);
					              			$value['percentage_rate'] = $loan['percentage_rate'];
					              			// echo $loan_amount-array_sum($total_paid);
					              			// if ($value['loan_amount']!=0) {
				              		?>
						              	<tr class="<?php echo ($value['payment_status'] == 1)?"danger":"success"; ?>">
						              		<td><?php echo $value['id']; ?></td>
						              		<td><?php echo $value['loan_amount']; ?> <i class="fa fa-inr"></i></td>
						              		<td><?php echo $value['interest']; ?> <i class="fa fa-inr"></i></td>
						              		<td><?php echo $value['penalty']; ?> <i class="fa fa-inr"></i></td>
						              		<td><?php echo ($value['loan_amount']+$value['interest']+$value['penalty']); ?> <i class="fa fa-inr"></i></td>
						              		<td><?php echo $value['last_amount']; ?> <i class="fa fa-inr"></i></td>
						              		<td><?php echo $value['payment_date']; ?></td>
						              		<td><?php echo $value['payment_end_date']; ?></td>
						              		<td><?php echo $value['paid_date']; ?></td>
						              		<td><?php echo ($value['payment_status'] == 1)?lang("pending"):lang("paid"); ?></td>
						              		<td>
						              			<?php if ($value['payment_status'] == 1): ?>
						              				<a href="javascript:void(0)" class="btn btn-warning payInstallment" data-value='<?php echo json_encode($value); ?>'><i class="fa fa-credit-card"></i></a>
						              			<?php else: ?>
						              				<a href="<?php echo base_url("loan/download-installment-receipt/docs/".$value['id']); ?>" class="btn btn-success downloadReceipt" data-value='<?php echo json_encode($value); ?>'><i class="fa fa fa-ticket"></i></a>
						              			<?php endif ?>
						              		</td>
						              	</tr>
				              		<?php } endforeach ?>
				              	<?php endif ?>
				              </tbody>
						              <?php if($loan_amount-array_sum($total_paid) == 0){ ?>
						              	<tr class="text-center">
						              		<td>
						              			<strong><h1><?php echo lang('loan_completed') ?></h1></strong>
						              		</td>
					              			<td></td>
					              			<td></td>
					              			<td></td>
					              			<td></td>
					              			<td></td>
					              			<td></td>
					              			<td></td>
					              			<td></td>
					              			<td></td>
					              			<td></td>
						              	</tr>
						              <?php } ?>
				              		<tr>
				              			<th><?php echo lang("total"); ?></th>
				              			<th>
				              				<?php echo array_sum($total_paid); ?> <i class="fa fa-inr"></i>
				              			</th>
				              			<th>
				              				<?php echo array_sum($interest); ?> <i class="fa fa-inr"></i>
				              			</th>
				              			<th>
				              				<?php echo array_sum($penalty); ?> <i class="fa fa-inr"></i>
				              			</th>
				              			<th>
				              				<?php echo array_sum($total_paid)+array_sum($interest)+array_sum($penalty); ?> <i class="fa fa-inr"></i>
				              			</th>
				              			<th>
				              				<?php echo $loan_amount."-".array_sum($total_paid)." => "; ?>
				              				<?php echo $loan_amount-array_sum($total_paid); ?> <i class="fa fa-inr"></i>
				              			</th>
				              			<th></th>
				              			<th></th>
				              			<th></th>
				              			<th></th>
				              			<th></th>
				              		</tr>
				            </table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="payInstallmentPopup">
			<div class="modal-dialog">
				<div class="modal-content">
					<?php echo form_open(base_url(uri_string()),array("id"=>"payInstallmentForm")); ?>
						<input type="hidden" name="payment_date" id="payment_date">
						<input type="hidden" name="last_amount" id="last_amount">
						<input type="hidden" name="percentage_rate" id="percentage_rate">
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
							            	<input type="hidden" name="id" id="id">
							            	<input type="hidden" name="loan_id" id="loan_id">
											<span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
							            	<input type="text" name="paid_date" id="paid_date" value="<?php echo DATE; ?>" class="form-control" readonly="">
										</div>
							        </div>
							    </div>
								<div class="col-md-12">
									<div class="col-md-6">
								        <div class="form-group">
								            <label>Payment Amount</label>
								            <div class="input-group">
												<span class="input-group-addon"><i class="fa fa-inr"></i></span>
												<input type="text" name="paid_amount" id="paid_amount" class="form-control">
											</div>
								        </div>
									</div>
									<div class="col-md-6">
								        <div class="form-group">
								            <label>Take Amount From</label>
											<?php $fee_submission_type = config_item('fee_submission_type'); ?>
											<select name="amount_taken_from" id="" class="form-control">
												<option value="">Select Amount From</option>
												<?php if ($member_account): ?>
													<?php foreach ($member_account as $key => $value): ?>
														<option value="<?php echo $value['fee_submission_type']; ?>"><?php echo $fee_submission_type[$value['fee_submission_type']]; ?> (<?php echo $value['sum_amount']; ?>)</option>
													<?php endforeach ?>
												<?php endif ?>
											</select>
								        </div>
									</div>
							    </div>
								<div class="col-md-12">
							        <div class="form-group">
							            <label>Interest Amount</label>
							            <div class="input-group">
											<span class="input-group-addon"><i class="fa fa-inr"></i></span>
											<input type="text" name="interest" readonly id="interest" class="form-control">
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
		<!-- <div class="modal fade" id="installment-receipt-popup">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Installment Receipt</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<a href="javascript:void(0)" class="btn btn-primary btn-block word"><i class="fa fa-file-word-o fa-5x"></i></a>
							</div>
							<div class="col-md-6">
								<a href="javascript:void(0)" class="btn btn-primary btn-block pdf"><i class="fa fa-file-pdf-o fa-5x"></i></a>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div> -->
	</section>
	<script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$('.example1').DataTable();
		$(".payInstallment").on("click",function(){
			var value = $(this).data('value');
			// $("#paid_date").val(value.paid_date);
			$("#payment_date").val(value.payment_date);
			$("#last_amount").val(value.last_amount);
			$("#percentage_rate").val(value.percentage_rate);
			// $("#paid_amount").val(value.loan_amount);
			$("#interest").val(value.interest);
			$("#loan_id").val(value.loan_id);
			$("#id").val(value.id);
			// $("#paid_amount").focus();
			$("#payInstallmentPopup").modal("show");
		});
		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
		$(".downloadReceipt").on("click",function(){
			var value = $(this).data("value");
			console.log(value);
			$("#installment-receipt-popup").modal("show");
			$(".word").attr("href",site_url+"loan/download-installment-receipt/docx/"+value.id);
			$(".pdf").attr("href",site_url+"loan/download-installment-receipt/pdf/"+value.id);
		})
	</script>
	<script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/js/bootstrapValidator.js"></script>
    <script type="text/javascript">
        $('#payInstallmentForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                paid_amount: {
                    validators: {
                        notEmpty: {
                            message: 'The Payment Amount field is required.'
                        },
                        regexp: {
                            regexp: /^\d+(\.\d{1,2})?$/i,
                            message: 'The Payment Amount field must contain a 2 digit decimal number.'
                        }
                    }
                },
                interest: {
                    validators: {
                        notEmpty: {
                            message: 'The Interest Amount field is required.'
                        },
                        regexp: {
                            regexp: /^\d+(\.\d{1,2})?$/i,
                            message: 'The Interest Amount field must contain a 2 digit decimal number.'
                        }
                    }
                },
                late_payment_charge: {
                    validators: {
                        regexp: {
                            regexp: /^\d+(\.\d{1,2})?$/i,
                            message: 'The Payment Charge field must contain a 2 digit decimal number.'
                        }
                    }
                },
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                // console.log(result);
                if (result) { location.reload(); }
            }, 'json');
        });
    </script>
</div>