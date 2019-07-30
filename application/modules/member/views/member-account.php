        <div class="content mt-3">
            <h3 class="main-heading"><?php echo $member['member_name'] ?></h3>
            <div class="inner-container bg-white">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <div class="default-tab tab-inner">
                                    <nav>
                                        <div class="nav nav-tabs text-uppercase" id="nav-tab" role="tablist">
                                            <?php $fee_submission_type = config_item('fee_submission_type'); ?>
                                            <?php if ($fee_submission_type): ?>
                                                <?php foreach ($fee_submission_type as $key => $value): ?>
                                                    <a class="nav-item nav-link <?php echo ($key == $pay_type)?'active':''; ?>" href="<?php echo base_url("member/member-account/".$key); ?>"><?php echo $value ?></a>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </div>
                                    </nav>


                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="row form-group">
                                                <div class="inner-container bg-white dashbaord-table">
                                                    <div class="inner-box clearfix pl-0">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Date</th>
                                                                        <th scope="col">R. No.</th>
                                                                        <th scope="col">Amount</th>
                                                                        <th scope="col">Description</th>
                                                                        <th scope="col">Total Amount</th>
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
                                                                            <td><?php echo $total; ?></td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>