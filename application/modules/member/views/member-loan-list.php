<div class="content mt-3">
    <h3 class="main-heading">Loan List:</h3>
    <div class="inner-container bg-white dashbaord-table">
        <div class="inner-box clearfix pl-0">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Loan id</th>
                            <th scope="col">Amount of Loan</th>
                            <th scope="col">Loan Approved</th>
                            <th scope="col">Loan Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($loan_detail): ?>
                            <?php foreach ($loan_detail as $key => $value): ?>
                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo number_format($value['amount_of_loan'],2); ?> <i class="fa fa-inr"></i></td>
                                    <td><?php echo $value['loan_status_description']; ?></td>
                                    <td><?php echo $value['loan_approve_date']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url("member/member-loan-installment-list/".base64_encode($value['id']."_".$value['member_id'])); ?>" class="btn btn-primary">Installments</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- .content -->
