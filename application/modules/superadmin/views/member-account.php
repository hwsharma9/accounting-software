<div class="content-wrapper">
    <link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/css/bootstrapValidator.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <?php echo breadcrumb(lang("members_account")); ?>
    <section class="content">
        <?php echo flashAlertMessage(); ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3><?php echo $member['member_name'] ?></h3>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs nav-justified" id="myTab">
                            <?php $fee_submission_type = config_item('fee_submission_type'); ?>
                            <?php if ($fee_submission_type): ?>
                                <?php foreach ($fee_submission_type as $key => $value): ?>
                                    <li class="<?php echo ($key == $pay_type)?'active':''; ?>"><a href="<?php echo base_url("members/member-account/".$member_id."/".$key); ?>"><?php echo $value ?></a></li>
                                <?php endforeach ?>
                            <?php endif ?>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo lang("members_account")." => ".$pay_type; ?></h3>
                                    <?php if ($pay_type != 1): ?>
                                        <div class="box-tools">
                                            <a href="javascript:void(0)" class="addAmount">
                                                <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                            </a>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>R. No.</th>
                                                <th>Amount</th>
                                                <th>Description</th>
                                                <?php if ($pay_type == 4): ?>
                                                    <th>Transection Type</th>
                                                <?php endif ?>
                                                <th>Total Amount</th>
                                                <?php if (authenticate("3_0")): ?>
                                                    <th><?php echo lang("action"); ?></th>
                                                <?php endif ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($share): ?>
                                                <?php $total = 0; foreach ($share as $key => $value): $total += $value['amount']; ?>
                                                    <tr>
                                                        <td><?php echo $value['paid_date']; ?></td>
                                                        <td><?php echo $value['id']; ?></td>
                                                        <td><?php echo $value['amount']; ?></td>
                                                        <td><?php echo $value['description']; ?></td>
                                                        <?php if ($pay_type == 4): ?>
                                                            <td><?php echo $value['transection_type']==1?'Diposit':'Withdrawal'; ?></td>
                                                        <?php endif ?>
                                                        <td><?php echo $total; ?></td>
                                                        <?php if (authenticate("3_0")): ?>
                                                            <td>
                                                                <a href="<?php echo base_url("members/download-account-receipt/".base64_encode($value['id']."_".$value['member_id'])."/".$pay_type); ?>" class="btn btn-success downloadReceipt" data-value='<?php echo json_encode($value); ?>'><i class="fa fa fa-ticket"></i></a>
                                                            </td>
                                                        <?php endif ?>
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
    <div class="modal fade" id="addAmountPopup">
        <div class="modal-dialog modal-sm">
            <?php echo form_open(base_url(uri_string()),array("id"=>"addAmountForm"),array("member_id"=>$member['member_id'],"fee_submission_type"=>$pay_type)); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add <?php echo $fee_submission_type[$pay_type]; ?> Amount</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <?php if ($pay_type == 4): ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Transection Type</label>
                                        <select name="transection_type" class="form-control">
                                            <option value="1" selected>Deposit</option>
                                            <option value="2">Withdrawal</option>
                                        </select>
                                    </div>
                                </div>
                            <?php endif ?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="text" name="amount" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            <?php form_close(); ?>
        </div>
    </div>
    <script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/admin/"); ?>bower_components/formvalidation/js/bootstrapValidator.js"></script>
    <script type="text/javascript">
        $('.example1').DataTable();
        $(".addAmount").on("click",function(){
            $("#addAmountPopup").modal("show");
        });
        $('#addAmountForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                amount: {
                    validators: {
                        notEmpty: {
                            message: 'The Amount field is required.'
                        },
                        regexp: {
                            regexp: /^\d+(\.\d{1,2})?$/i,
                            message: 'The Amount field must contain a 2 digit decimal number.'
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