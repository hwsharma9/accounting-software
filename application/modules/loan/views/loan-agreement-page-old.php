<div class="content-wrapper">
	<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<?php echo breadcrumb("Loan Agreement Form"); ?>
    <section class="content">
		<div class="box box-primary">
			<div class="nav-tabs-custom">
            	<ul class="nav nav-tabs" id="myTab">
              		<li class="active"><?php echo anchor(base_url('loan/loan-agreement-form/'.$loan_id), 'Loan Agreement Form'); ?></li>
              		<li><?php echo anchor(base_url('loan/loan-assets-list/'.$loan_id), 'Assets'); ?></li>
              		<li><?php echo anchor(base_url('loan/loan-installments-list/'.$loan_id), 'Installments'); ?></li>
              	</ul>
              	<div class="tab-content">
              		<div class="tab-pane active" id="tab_1">
					<span class="pull-right">
						<a href="javascript:void(0)" onclick="printDiv('tab1html')">Print</a>
					</span>
						<div class="box-body" id="tab1html">
							<div class="row">
								<div class="box-header with-border">
									<h1><strong>Personal Loan Agreement</strong></h1>
								</div>
								<div class="clearfix">&nbsp;</div>
								<div class="col-md-12">
									<p>This loan agreement is made and will be affective on <strong><i><u><?php echo date("d/m/Y",strtotime($loan['date'])); ?></u></i></strong>.</p>
									<h3><strong>BETWEEN</strong></h3>
									<h4>
										<u><?php echo $loan['member_name']; ?></u> hereinafter referred to as the "Borrower" with a street address of <u><?php echo $loan['address']; ?></u>
									</h4>
									<h3><strong>AND</strong></h3>
									<h4>
										<u>Lender Name</u> hereinafter referred to as the "Lender" with a street address of <u>Lender Address</u>
									</h4>
								</div>
								<div class="box-header with-border">
									<h1><strong>Terms and Conditions</strong></h1>
								</div>
								<div class="col-md-12">
									<h4><strong>Promise to Pay</strong></h4>
									<p>
										Within <u><?php echo $loan['loan_for_months']; ?></u> months from today, Borrower promises to pay the Lender <u><?php echo convertToIndianCurrency($loan['amount_financed']); ?></u> (<i class="fa fa-inr"></i> <u><?php echo $loan['amount_financed']; ?></u>) and interest as well as other charges avowed below.
									</p>
									<h4><strong>Liability</strong></h4>
									<p>
										Although more than one person may sign this agreement below, wach of the undersigned understands that they are each as individuals responsible and jointly and severally liable for paying back the full amount.
									</p>
									<h4><strong>Deails of Loan: Agreed Between Borrower and Lender:</strong></h4>
									<strong>Amount of Loan: <i class="fa fa-inr"></i><u><?php echo $loan['amount_of_loan']; ?></u></strong><br>
									<strong>Amount financed: <i class="fa fa-inr"></i><u><?php echo $loan['amount_financed']; ?></u></strong><br>
									<strong>Finance charge: <i class="fa fa-inr"></i><u><?php echo $loan['finance_charge']; ?></u></strong><br>
									<strong>Total of payments: <i class="fa fa-inr"></i><u><?php echo $loan['amount_financed']; ?></u></strong><br>
									<strong>ALLUAL PERCENTAGE RATE <u><?php echo $loan['percentage_rate']; ?></u></strong>%<br>
									<h4><strong>Repayment of Loan:</strong></h4>
									<p>
										Borrower will pay back in the following manner: Borrower will repay the amount of this note in <u><?php echo $loan['loan_for_months']; ?></u> equal continuous monthly installments of <i class="fa fa-inr"></i><u><?php echo $loan['installment_per_month']; ?></u> each on the <u>_____</u> day of each month preliminary on the <u>_____</u> day of <u>_____</u>, 20 <u>____</u>, and ending on <u>______</u>, 20<u>__</u>.
									</p>

									<h4><strong>Late Charges:</strong></h4>
									<p>
										Any payment not remunerated within ________ (___) days of its due date shall be subject to a belatedly charge of ____% of the payment, not to exceed $____________ for any such late installment.
									</p>

									<h4><strong>Security/Collateral:</strong></h4>
									<p>
										To protect Lender, Borrower gives what is known as a security interest or mortgage in:
										__________________________________________________________________________________________________________________________________________
										__________________________________________________________________________________________________________________________________________
										__________________________________________________________________________________________________________________________________________
									</p>

									<h4><strong>Failure to pay:</strong></h4>
									<p>
										If for any reason Borrower not succeeds to make any payment on time, Borrower shall be in default. The Lender can then order instant payment of the entire remaining unpaid balance of this loan, without giving anyone further notices. If Borrower has not paid the full amount of the loan when the final payment is due, the Lender will charge Borrower interest on the unpaid balance at ______ percent (%) per year.
									</p>

									<h4><strong>Collection fees:</strong></h4>
									<p>
										If this note is placed with a legal representative for collection, then Borrower agrees to pay an attorney's fee of fifteen percent (15%) of the voluntary balance. This fee will be added to the unpaid balance of the loan.
									</p>

									<h4><strong>Co-borrowers:</strong></h4>
									<p>
										Any Co-borrowers signing this agreement agree to be likewise accountable with the borrower for this loan.
									</p>
									<p>Borrower and Lender both agree to follow above mentioned terms and conditions.</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<div class="col-md-6">
										<p>
											____________________
										</p>
										Borrower's Signature
									</div>
									<div class="col-md-6">
										<p>
											____________________
										</p>
										Witness's Signature
									</div>
								</div>
							</div>
							<div class="clearfix">&nbsp;</div>
							<div class="clearfix">&nbsp;</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<div class="col-md-6">
										<p>
											____________________
										</p>
										Lender’s Signature
									</div>
									<div class="col-md-6">
										<p>
											____________________
										</p>
										Witness's Signature
									</div>
								</div>
							</div>
							<div class="clearfix">&nbsp;</div>
							<div class="clearfix">&nbsp;</div>
						</div>
					</div>
					<div class="tab-pane" id="tab_2">
						<div class="box-header with-border">
							<h1><strong>Assets Detail</strong></h1>
						</div>
						<div class="box-body">
							<table class="table table-bordered table-striped example1">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>Assets Name</th>
				                  <th>Assets Price</th>
				                  <th>Assets Description</th>
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
					<div class="tab-pane" id="tab_3">
						<div class="box-header with-border">
							<h1><strong>Installments Detail</strong></h1>
						</div>
						<div class="box-body">
							<table class="table table-bordered table-striped example1">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>Installment Amount</th>
				                  <th>Installment Dates</th>
				                  <th>Installment End Dates</th>
				                  <th>Installment Status</th>
				                  <th>Action</th>
				                </tr>
				              </thead>
				              <tbody>
				              	<?php if ($installments): ?>
				              		<?php foreach ($installments as $key => $value):
				              			$value['paid_date'] = DATE;
				              		?>
						              	<tr>
						              		<td><?php echo $key+1; ?></td>
						              		<td><?php echo $value['loan_amount']; ?> <i class="fa fa-inr"></i></td>
						              		<td><?php echo $value['payment_date']; ?></td>
						              		<td><?php echo $value['payment_end_date']; ?></td>
						              		<td><?php echo $value['payment_status']; ?></td>
						              		<td>
						              			<a href="javascript:void(0)" class="btn btn-warning payInstallment" data-value='<?php echo json_encode($value); ?>'><i class="fa fa-credit-card"></i></a>
						              		</td>
						              	</tr>
				              		<?php endforeach ?>
				              		<tr>
				              			<th>Total</th>
				              			<th>
				              				<?php echo round(array_sum(array_column($installments, "loan_amount"))); ?> <i class="fa fa-inr"></i>
				              			</th>
				              			<th></th>
				              			<th></th>
				              			<th></th>
				              			<th></th>
				              		</tr>
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