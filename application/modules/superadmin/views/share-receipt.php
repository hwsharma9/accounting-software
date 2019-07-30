<div class="content-wrapper">
	<?php echo breadcrumb($title); ?>
    <section class="content">
		<div class="box box-primary">
			<div class="box-body">
				<div class="box-header with-border">
					<h1><strong><?php echo $title ?></strong></h1>
					<div class="box-tools pull-right">
						<a href="javascript:void(0)" class="btn btn-info" onclick="printDiv('tab1html')">Print</a>
					</div>
				</div>
				<div class="row" id="tab1html">
					<div class="col-md-8 col-md-offset-2" style="font-family: DevLys;font-size: 25px;">
						<div class="row">
							<div class="col-md-5 col-sm-5 col-xs-5 pull-left">
								LFkkiuk o"kZ% 1940<br> 
								[kkrk dz- <u><?php echo $installment['member_id']; ?></u>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2 text-center">
								<img src="<?php echo base_url("assets/admin/dist/img/Saraswati-Puja-Sketch.png"); ?>" alt="Saraswati-Puja-Sketch" style="height: 75px;">
							</div>
							<div class="col-md-5 col-sm-5 col-xs-5"><?php echo $installment['id']; ?></div>
						</div>
					</div>
					<div class="col-md-8 col-md-offset-2 text-center">
						<h1 style="font-size: 45px;font-family: DevLys;">Jh dks"Vh {kf=; lgk;d la?k</h1>
						<h3 style="font-family: DevLys;">103] U;w nsokl jksM] bUnkSj e-iz-</h3>
					</div>

					<div class="col-md-8 col-md-offset-2">
						<h3 class="pull-right"><span style="font-family: DevLys;">fnukad%</span> <span><u><?php echo $installment['paid_date']; ?></u></span></h3>
					</div>

					<div class="col-md-8 col-md-offset-2">
						<h3><span style="font-family: DevLys;">Jh</span> <span><u><?php echo $installment['member_name']; ?></u></span></h3>
					</div>

					<div class="col-md-8 col-md-offset-2">
						<table class="table table-bordered table-hover" style="    font-size: 25px;">
							<thead>
								<tr style="font-family: DevLys;">
									<th></th>
									<th>:i;s</th>
									<th>iSls</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$moolkhaata = (isset($mool_khaata))?explode(".",$mool_khaata):array();
									$moolbhawan = (isset($mool_bhawan))?explode(".",$mool_bhawan):array();
									$byajkhaata = (isset($byaj_khaata))?explode(".",$byaj_khaata):array();
									$byajbhawan = (isset($byaj_bhawan))?explode(".",$byaj_bhawan):array();
									$anisanchay = (isset($ani_sanchay))?explode(".",$ani_sanchay):array();
									$anyadand = (isset($anya_dand))?explode(".",$anya_dand):array();
									$shares = (isset($share))?explode(".",$share):array();
									$kushafund = (isset($kusha_fund))?explode(".",$kusha_fund):array();
									$bhawanfund = (isset($bhawan_fund))?explode(".",$bhawan_fund):array();
									$praveshfund = (isset($pravesh_fund))?explode(".",$pravesh_fund):array();									?>
								<tr>
									<td style="font-family: DevLys;">
										<span class="pull-left">ewy</span>
										<span class="pull-right">[kkrk</span>
									</td>
									<td>
										<?php echo (isset($moolkhaata[0]))?$moolkhaata[0].' <i class="fa fa-inr"></i>':""; ?>
									</td>
									<td>
										<?php echo (isset($moolkhaata[1]))?$moolkhaata[1]:""; ?>
									</td>
								</tr>
								<tr>
									<td style="font-family: DevLys;">
										<span class="pull-left">ewy</span>
										<span class="pull-right">tsoj@Hkou</span>
									</td>
									<td>
										<?php echo (isset($moolbhawan[0]))?$moolbhawan[0].' <i class="fa fa-inr"></i>':""; ?>
									</td>
									<td>
										<?php echo (isset($moolbhawan[1]))?$moolbhawan[1]:""; ?>
									</td>
								</tr>
								<tr>
									<td style="font-family: DevLys;">
										<span class="pull-left">C;kt</span>
										<span class="pull-right">[kkrk</span>
									</td>
									<td>
										<?php echo (isset($byajkhaata[0]))?$byajkhaata[0].' <i class="fa fa-inr"></i>':""; ?>
									</td>
									<td>
										<?php echo (isset($byajkhaata[1]))?$byajkhaata[1]:""; ?>
									</td>
								</tr>
								<tr>
									<td style="font-family: DevLys;">
										<span class="pull-left">C;kt</span>
										<span class="pull-right">tsoj@Hkou</span>
									</td>
									<td>
										<?php echo (isset($byajbhawan[0]))?$byajbhawan[0].' <i class="fa fa-inr"></i>':""; ?>
									</td>
									<td>
										<?php echo (isset($byajbhawan[1]))?$byajbhawan[1]:""; ?>
									</td>
								</tr>
								<tr>
									<td style="font-family: DevLys;">
										vfu- la"k;
									</td>
									<td>
										<?php echo (isset($anisanchay[0]))?$anisanchay[0].' <i class="fa fa-inr"></i>':""; ?>
									</td>
									<td>
										<?php echo (isset($anisanchay[1]))?$anisanchay[1]:""; ?>
									</td>
								</tr>
								<tr>
									<td style="font-family: DevLys;">
										vU;@n.M
									</td>
									<td>
										<?php echo (isset($anyadand[0]))?$anyadand[0].' <i class="fa fa-inr"></i>':""; ?>
									</td>
									<td>
										<?php echo (isset($anyadand[1]))?$anyadand[1]:""; ?>
									</td>
								</tr>
								<tr>
									<td style="font-family: DevLys;">
										'ksvj
									</td>
									<td>
										<?php echo (isset($shares[0]))?$shares[0].' <i class="fa fa-inr"></i>':""; ?>
									</td>
									<td>
										<?php echo (isset($shares[1]))?$shares[1]:""; ?>
									</td>
								</tr>
								<tr>
									<td style="font-family: DevLys;">
										dq- lk- Q.M
									</td>
									<td>
										<?php echo (isset($kushafund[0]))?$kushafund[0].' <i class="fa fa-inr"></i>':""; ?>
									</td>
									<td>
										<?php echo (isset($kushafund[1]))?$kushafund[1]:""; ?>
									</td>
								</tr>
								<tr>
									<td style="font-family: DevLys;">
										Hkou Q.M
									</td>
									<td>
										<?php echo (isset($bhawanfund[0]))?$bhawanfund[0].' <i class="fa fa-inr"></i>':""; ?>
									</td>
									<td>
										<?php echo (isset($bhawanfund[1]))?$bhawanfund[1]:""; ?>
									</td>
								</tr>
								<tr>
									<td style="font-family: DevLys;">
										izos'k 'kqYd
									</td>
									<td>
										<?php echo (isset($praveshfund[0]))?$praveshfund[0].' <i class="fa fa-inr"></i>':""; ?>
									</td>
									<td>
										<?php echo (isset($praveshfund[1]))?$praveshfund[1]:""; ?>
									</td>
								</tr>
								<tr>
									<td style="font-family: DevLys;">
										;ksx
									</td>
									<td>
										<?php 
											$moolkhaata = (is_array($moolkhaata) && $moolkhaata)?implode(".",$moolkhaata):0;
											$moolbhawan = (is_array($moolbhawan) && $moolbhawan)?implode(".",$moolbhawan):0;
											$byajkhaata = (is_array($byajkhaata) && $byajkhaata)?implode(".",$byajkhaata):0;
											$byajbhawan = (is_array($byajbhawan) && $byajbhawan)?implode(".",$byajbhawan):0;
											$anisanchay = (is_array($anisanchay) && $anisanchay)?implode(".",$anisanchay):0;
											$anyadand = (is_array($anyadand) && $anyadand)?implode(".",$anyadand):0;
											$shares = (is_array($shares) && $shares)?implode(".",$shares):0;
											$kushafund = (is_array($kushafund) && $kushafund)?implode(".",$kushafund):0;
											$bhawanfund = (is_array($bhawanfund) && $bhawanfund)?implode(".",$bhawanfund):0;
											$praveshfund = (is_array($praveshfund) && $praveshfund)?implode(".",$praveshfund):0;
											$sum = $moolkhaata+$moolbhawan+$byajkhaata+$byajbhawan+$anisanchay+$anyadand+$shares+$kushafund+$bhawanfund+$praveshfund											?>
										<?php echo $sum; ?> <i class="fa fa-inr"></i>
									</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="col-md-8 col-md-offset-2">
						<h3><span style="font-family: DevLys;">v{kjh</span> <span><u><?php echo convertToIndianCurrency($sum); ?></u></span></h3>
					</div>

					<div class="col-md-8 col-md-offset-2">
						<h3><span class="pull-right" style="font-family: DevLys;">dks"kk/;{k</span></h3>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>
</div>