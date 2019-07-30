<div class="content-wrapper">
	<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
	<?php echo breadcrumb(lang("report_search_page")); ?>
    <section class="content">
		<div class="box box-primary">
			<?php echo form_open(base_url(uri_string()),array("method"=>"GET")); ?>
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo lang("report_search_page"); ?></h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Select Amount Type</label>
							<?php $pay_type = config_item('fee_submission_type'); ?>
							<select class="form-control" name="fee_submission_type">
								<?php if(isset($pay_type) && !empty($pay_type)){ foreach($pay_type as $key=>$value) : ?>
									<option value="<?php echo $key; ?>" <?php echo (isset($_GET['fee_submission_type']) && $_GET['fee_submission_type'] == $key)?'selected':''; ?>><?php echo $value; ?></option>
								<?php endforeach; } ?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Date Range</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" name="paid_date" class="form-control pull-right" value="<?php echo (isset($_GET['paid_date']) && !empty($_GET['paid_date']))?$_GET['paid_date']:''; ?>" id="reservationtime" autocomplete="off">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary" type="submit">Search</button>
			</div>
		</div>
		<div class="box">
            <div class="box-header">
                <h3 class="box-title">Report Search Result</h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Member Name</th>
                            <th>Amount</th>
                            <th>Pay Type</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                    		$sum_amount = array();
                    		if ($result):
                    	?>
                    		<?php foreach ($result as $key => $value): array_push($sum_amount, $value['sum_amount']); ?>
		                        <tr>
		                            <td><?php echo $key+1; ?></td>
		                            <td>
		                            	<a href="<?php echo base_url("members/member-account/".$value['member_id']."/".$value['fee_submission_type']); ?>" target="_blank">
		                            		<?php echo $value['member_name']." (".$value['member_id'].")" ?>
		                            	</a>
		                            </td>
		                            <td><?php echo $value['sum_amount'] ?></td>
		                            <td><?php echo $pay_type[$value['fee_submission_type']] ?></td>
		                        </tr>
                    		<?php endforeach ?>
                    	<?php endif ?>
                    </tbody>
                    <tr>
                    	<td>Total</td>
                    	<td></td>
                    	<td><?php echo number_format(array_sum($sum_amount),2); ?></td>
                    	<td></td>
                    </tr>
                </table>
            </div>
        </div>
	</section>
	<script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>bower_components/moment/min/moment.min.js"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
	<script type="text/javascript">
	    $('#example1').DataTable({
	        dom: 'Bfrtip',
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf'
	        ]
	    });
	    $(function() {
            $('#reservationtime').daterangepicker({
                "showDropdowns": true,
                "showWeekNumbers": true,
                "showISOWeekNumbers": true,
                "timePicker24Hour": true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                "locale": {
                    "format": "MM/DD/YYYY",
                    "separator": " - ",
                    "applyLabel": "Apply",
                    "cancelLabel": "Cancel",
                    "fromLabel": "From",
                    "toLabel": "To",
                    "customRangeLabel": "Custom",
                    "weekLabel": "W",
                    "daysOfWeek": [
                        "Su",
                        "Mo",
                        "Tu",
                        "We",
                        "Th",
                        "Fr",
                        "Sa"
                    ],
                    "monthNames": [
                        "January",
                        "February",
                        "March",
                        "April",
                        "May",
                        "June",
                        "July",
                        "August",
                        "September",
                        "October",
                        "November",
                        "December"
                    ],
                    "firstDay": 1
                },
                autoUpdateInput: false,
                locale: {
                    format: 'YYYY-MM-DD',
                },
            }, function(start, end, label) {
              console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            }).on('apply.daterangepicker', function(ev, picker) {
                  $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
            });
        });
	</script>
</div>