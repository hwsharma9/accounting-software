<div class="content mt-3">
    <h3 class="main-heading">Loan Installment List:</h3>
    <div class="inner-container bg-white dashbaord-table">
        <div class="inner-box clearfix pl-0">
            <div class="table-responsive">
                <table class="table table-bordered">
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
                            </tr>
                          <?php } ?>
                        <?php endforeach ?>
                        <?php endif; ?>
                    </tbody>
                    <?php if($loan_amount-array_sum($total_paid) == 0){ ?>
                        <tr class="text-center">
                            <td><strong><h1><?php echo lang('loan_completed') ?></h1></strong></td>
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
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div> <!-- .content -->
