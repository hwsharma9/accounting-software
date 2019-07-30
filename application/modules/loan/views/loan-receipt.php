<html lang="en">
<head>
	<title></title>
    <link rel="stylesheet" href="<?php echo base_url("assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>" />

    <link rel="stylesheet" href="<?php echo base_url("assets/admin/bower_components/font-awesome/css/font-awesome.min.css"); ?>" />

</head>
<body>
	<div class="container bg-warning">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 style="font-weight: bold;font-size: 30;">श्री कोष्टी क्षत्रिय सहायक संघ, इंदौर</h1>
				<h3>१०३, नई देवास रोड, इंदौर (म.प्.)</h3>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<span class="pull-left">खाता क्रमांक............</span>
				<span class="pull-right">दिनांक............</span>
			</div>
			<div class="col-md-12">
				<div class="text-center">
					<h1><u style="font-weight: bold;font-size: 45px;">कर्ज आवेदन पत्र</u></h1>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<h4>श्री मान अध्यक्ष महोदय,</h4>
				<h4><?php echo nbs(30); ?>मुझे <u><?php echo $loan_purpose[$memData['loan_purpose']]; ?></u> कार्य के लिए रूपये <u><?php echo $memData['amount_of_loan']; ?></u> अक्षरी रूपये <u><?php echo convertToIndianCurrency($memData['amount_of_loan']); ?></u> कर्ज की आवश्यकता है।</h4><br />
				<h4><?php echo nbs(15); ?>मैं नियमानुसार कर्ज की अदायगी प्रतिमाह क़िस्त ब्याज सहित नियमित जमा करूँगा।</h4><br />
				<h4>मेरे खाते में शेयर + चंदा अमानत रु __________________________ जमा हैं।</h4><br />
				<h4 class="text-center"><i class="fa fa-asterisk"></i> जमानतदार <i class="fa fa-asterisk"></i></h4>
				<h4>हम उपरोक्त कर्ज देने हेतु अपनी जमानत देते हैं। कर्ज अदायगी में त्रुटि होने पर हमारे कहते जमा अमानत (शेयर + चंदा) से संस्था राशि वसूल कर सकेगी।</h4>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th></th>
							<th>पूरा नाम</th>
							<th>खाता क्रमांक</th>
							<th>जमानत राशि</th>
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
							<tr>
								<td colspan="4"></td>
							</tr>
					</tbody>
				</table>

				<div class="col-md-6">
					<h4 class="text-center">उपरोक्त अनुसार कर्ज <br />पात्रता होने से स्वीकृत</h4>
				</div>
				<div class="col-md-6">
					<h4>आवेदक के हस्ताक्षर _____________________</h4>
					<h4>पूरा नाम ____________________________</h4>
					<h4>वर्तमान पूरा पता _______________________</h4>
					<h4>मोबाइल/फ़ोन नंबर ______________________</h4>
					<h4>सदस्य खाता क्रमांक ____________________</h4>
				</div>
				_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _<br /><br />

				<h3 class="text-center"><b>|| पावती ||</b></h3>
				<h4><?php echo nbs(15); ?>उपरोक्त अनुसार कर्ज राशि रूपये <u><?php echo number_format($memData['amount_of_loan'],2); ?></u> अक्षरी रूपये <u><?php echo convertToIndianCurrency($memData['amount_of_loan']); ?></u> संस्था से नगद प्राप्त हुए।</h4>
				<div class="col-md-6 col-md-offset-6">
					<h4>हस्ताक्षर प्राप्त करता _____________</h4>
					<h4>(पूरा नाम ______________________)</h4>
				</div>
			</div>
		</div>
	</div>
</body>
</html>