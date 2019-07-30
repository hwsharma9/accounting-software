<div class="content-wrapper">
	<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<?php echo breadcrumb(lang('loans_borrower_list')); ?>
    <section class="content">
		<div class="box box-primary">
            <div class="box-header">
                <h3><?php echo $loan['member_name'] ?></h3>
            </div>
			<div class="nav-tabs-custom">
            	<?php echo editLoanTabs($id); ?>
              	<div class="tab-content">
              		<div class="tab-pane active" id="tab_1">
						<div class="box-body">
							<div class="box-header with-border">
								<h1><strong><?php echo lang('personal_loan_agreement'); ?></strong></h1>
								<div class="box-tools pull-right">
									<a href="javascript:void(0)" class="btn btn-info" onclick="printDiv('tab1html')">Print</a>
								</div>
							</div>
							<div class="row" id="tab1html">
								<div class="col-md-12 text-center">
									<h1 style="font-weight: bold;font-size: 30;font-family: DevLys;">Jh dks"Vh {kf=; lgk;d la?k] bUnkSj</h1>
									<h3 style="font-family: DevLys;">103] U;w nsokl jksM] bUnkSj e-iz-</h3>
								</div>
								<div class="col-md-12">
									<div class="pull-left"><span style="font-family: DevLys;">[kkrk dzekad </span><span><u><?php echo $member['member_id']; ?></u></span></div>
									<div class="pull-right"><span style="font-family: DevLys;">fnukad </span><span><u><?php echo $loan['loan_approve_date']; ?></u></span></div>
								</div>
								<div class="col-md-12">
									<div class="text-center">
										<h1><u style="font-weight: bold;font-size: 45px;font-family: DevLys;">dtZ vkosnu i=</u></h1>
									</div>
								</div>
								<div class="col-md-12">
									<h4 style="font-family: DevLys;">Jheku v/;{k egksn;]</h4>
									<h4><?php echo nbs(30); ?><span style="font-family: DevLys;">eq>s</span> <u><?php echo $loan_purpose[$memData['loan_purpose']]; ?></u> <span style="font-family: DevLys;">dk;Z ds fy, :i;s</span> <u><?php echo $memData['amount_of_loan']; ?></u> <span style="font-family: DevLys;">v{kjh :i;</span> <u><?php echo convertToIndianCurrency($memData['amount_of_loan']); ?></u> <span style="font-family: DevLys;">dtZ dh vko';drk gSA</span></h4>
									<h4><?php echo nbs(15); ?><span style="font-family: DevLys;">eSa fu;ekuqlkj dtZ dh vnk;xh izfrekg fd'r C;kt lfgr fu;fer tek d:axkA</span></h4>
									<h4><span style="font-family: DevLys;">esjs [kkrs esa 'ks;j pUnk vekur : </span> <span><u><?php echo $account['amount']; ?></u></span> <span style="font-family: DevLys;">tek gSaA</span></h4>
									<h4 class="text-center"><i class="fa fa-asterisk"></i><span style="font-family: DevLys;"> tekurnkj </span><i class="fa fa-asterisk"></i></h4>
									<h4><span style="font-family: DevLys;">ge mijksDr dtZ nsus gsrq viuh tekur nssrs gSA dtZ vnk;xh esa =qfV gksus ij gekjs [kkrs tek vekur 'ks;j pUnk ls laLFkk jkf'k olwy dj ldsxhA</span></h4>

									<table class="table table-hover table-bordered">
										<thead>
											<tr>
												<th></th>
												<th><span style="font-family: DevLys;">iwjk uke</span></th>
												<th><span style="font-family: DevLys;">[kkrk dz-</span></th>
												<th><span style="font-family: DevLys;">tekur jkf'k</span></th>
											</tr>
										</thead>
										<tbody>
											<?php for ($i = 1; $i <= 2; $i++) { ?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo isset($loan_guarantor[$i-1])?$loan_guarantor[$i-1]['guarantor_name']:''; ?></td>
													<td><?php echo isset($loan_guarantor[$i-1])?$loan_guarantor[$i-1]['guarantor_member_id']:''; ?></td>
													<td><?php echo isset($loan_guarantor[$i-1])?$loan_guarantor[$i-1]['guarantor_bail_money']:''; ?></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
									<div class="row">
										<div class="col-md-6 pull-left">
											<h4 class="text-center"><span style="font-family: DevLys;">mijksDr vuqlkj dtZ <br />ik=rk gksus ls Lohd`r]</span></h4>
											<div class="row text-center" style="position: relative;bottom: -75px;font-family: DevLys;">
												<div class="col-md-6 col-sm-6 col-xs-6">
													केशियर
												</div>
												<div class="col-md-6 col-sm-6 col-xs-6">
													अध्यक्ष
												</div>
											</div>
										</div>
										<div class="col-md-6 pull-right">
											<h4><span style="font-family: DevLys;">vkosnd ds gLrk{kj ---------------------------------------------</span></h4>
											<h4><span style="font-family: DevLys;">iwjk uke </span><span><u><?php echo $member['member_name']; ?></u></span></h4>
											<h4><span style="font-family: DevLys;">orZeku iwjk irk </span><u><?php echo $member['address']; ?></u></h4>
											<h4><span style="font-family: DevLys;">eksckby@Qksu ua </span><u><?php echo $member['mobile_no']."/".$member['phone_no']; ?></u></h4>
											<h4><span style="font-family: DevLys;">lnL; [kkrk dzekad </span><u><?php echo $member['member_id']; ?></u></h4>
										</div>
									</div>
									_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _<br /><br />

									<h3 class="text-center"><b><span style="font-family: DevLys;">!! ikorh !!</span></b></h3>
									<h4><?php echo nbs(15); ?><span style="font-family: DevLys;">mijksDr vuqlkj dtZ jkf'k :i;s</span> <u><?php echo number_format($memData['amount_of_loan'],2); ?></u> <span style="font-family: DevLys;">v{kjh :i;</span> <u><?php echo convertToIndianCurrency($memData['amount_of_loan']); ?></u> <span style="font-family: DevLys;">laLFkk ls udn izkIr gq,A</span></h4>
									<div class="col-md-6 col-md-offset-6 pull-right">
										<h4><span style="font-family: DevLys;">gLrk{kj izkIr drkZ---------------------</span></h4>
										<h4><span style="font-family: DevLys;">iwjk uke </span><span><u><?php echo $member['member_name']; ?></u></span></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
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