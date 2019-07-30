<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url(); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b><?php echo wordInitials(PNAME); ?></b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b><?php echo PNAME; ?></b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown notifications-menu">
                            <?php 
                                $installment = $this->db->get("installments_notification");
                            ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="<?php echo lang('installment_notifications'); ?>">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning"><?php echo $installment->num_rows(); ?></span>
                            </a>
                            <?php if ($installment->num_rows() >= 1): ?>
                                <ul class="dropdown-menu">
                                    <li class="header"><?php echo lang('installment_notifications'); ?></li>
                                    <li>
                                        <ul class="menu">
                                            <?php foreach ($installment->result_array() as $key => $value): ?>
                                                <li>
                                                    <a href="<?php echo base_url("loan/loan-installments-list/".base64_encode($value['loan_id']."_".$value['member_id'])); ?>">
                                                        <i class="fa fa-credit-card text-aqua"></i><?php echo $value['member_name']." (".$value['payment_date'].")"; ?><br />
                                                        Last Date: <?php echo $value['payment_end_date']; ?>
                                                    </a>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php endif ?>
                        </li>
                        <li class="dropdown notifications-menu">
                            <?php 
                                $installment = $this->db->get("pending_installments_notification");
                            ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="<?php echo lang('pending_installments_notification'); ?>">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning"><?php echo $installment->num_rows(); ?></span>
                            </a>
                            <?php if ($installment->num_rows() >= 1): ?>
                                <ul class="dropdown-menu">
                                    <li class="header"><?php echo lang('pending_installments_notification'); ?></li>
                                    <li>
                                        <ul class="menu">
                                            <?php foreach ($installment->result_array() as $key => $value): ?>
                                                <li>
                                                    <a href="<?php echo base_url("loan/loan-installments-list/".base64_encode($value['loan_id']."_".$value['member_id'])); ?>">
                                                        <i class="fa fa-credit-card text-aqua"></i><?php echo $value['member_name']; ?><br />
                                                        Payment Date: <?php echo $value['payment_date']; ?>
                                                    </a>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php endif ?>
                        </li>
                        <li class="dropdown tasks-menu">
                            <div style="padding:10px 15px">
                                <?php $language = (session("lang")?session("lang"):$this->language); ?>
                                <select name="lang" id="language" class="form-control">
                                    <option value="english" <?php echo ($language == "english")?'selected':'' ?>>English</option>
                                    <option value="hindi" <?php echo ($language == "hindi")?'selected':''; ?>>Hindi</option>
                                </select>
                            </div>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo profileImage($this->session->userdata('profile_pic')); ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo session("name"); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo profileImage($this->session->userdata('profile_pic')); ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo session("name"); ?>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <?php if ($this->user_type === "Superadmin"): ?>
                                        <div class="pull-left">
                                            <a href="<?php echo base_url("user_auth/admin-list"); ?>" class="btn btn-default btn-flat">Admin List</a>
                                            <a href="<?php echo base_url("user_auth/edit-admin/".$this->session->userdata('id')); ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                    <?php endif ?>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url("superadmin-logout"); ?>" class="btn btn-default btn-flat"><?php echo lang('superadmin_logout') ?></a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo profileImage($this->session->userdata('profile_pic')); ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo session("name"); ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"><?php echo lang('main_navigation'); ?></li>
                    <?php if (foption("sidebar","dashboard")): ?>
                        <li><a href="<?php echo base_url("superadmin"); ?>"><i class="fa fa-dashboard"></i> <span><?php echo lang('dashboard') ?></span></a></li>
                    <?php endif ?>
                    <?php if (foption("sidebar","members") && authenticate("0")): ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span><?php echo lang('members') ?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <?php if (foption("sidebar","addmembers") && authenticate("0_0")): ?>
                                    <li><a href="<?php echo base_url("members/add-members"); ?>"><i class="fa fa-circle-o"></i> <?php echo lang('add_members') ?></a></li>
                                <?php endif ?>
                                <?php if (foption("sidebar","memberslist") && authenticate("0_1")): ?>
                                    <li><a href="<?php echo base_url("members/members-list"); ?>"><i class="fa fa-circle-o"></i> <?php echo lang('members_list') ?></a></li>
                                <?php endif ?>
                            </ul>
                        </li>
                    <?php endif ?>
                    <?php if (foption("sidebar","loans") && authenticate("1")): ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-money"></i>
                            <span><?php echo lang('loans') ?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <!-- <li><a href="<?php //echo base_url("members/add-members"); ?>"><i class="fa fa-circle-o"></i> Add Members</a></li> -->
                            <?php if (foption("sidebar","pendingloanrequest") && authenticate("1_0")): ?>
                                <li><a href="<?php echo base_url("loan/loan-providers-list/1"); ?>"><i class="fa fa-circle-o"></i> <?php echo lang('pending_loans_request') ?></a></li>
                            <?php endif ?>
                            <?php if (foption("sidebar","liveloan") && authenticate("1_1")): ?>
                                <li><a href="<?php echo base_url("loan/loan-providers-list/2"); ?>"><i class="fa fa-circle-o"></i> <?php echo lang('live_loans') ?></a></li>
                            <?php endif ?>
                            <?php if (foption("sidebar","completeloan") && authenticate("1_2")): ?>
                                <li><a href="<?php echo base_url("loan/loan-providers-list/3"); ?>"><i class="fa fa-circle-o"></i> <?php echo lang('complete_loans') ?></a></li>
                            <?php endif ?>
                        </ul>
                    </li>
                    <?php endif ?>
                    <?php if (foption("sidebar","reports") && authenticate("2")): ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span><?php echo lang('reports') ?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <?php if (foption("sidebar","collectionreports") && authenticate("2_0")): ?>
                                <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url("report/collection-report"); ?>"><i class="fa fa-circle-o"></i> <?php echo lang('collection_reports') ?></a></li>
                                </ul>
                            <?php endif ?>
                        </li>
                    <?php endif ?>
                    <?php if (foption("sidebar","logout")): ?>
                        <li><a href="<?php echo base_url("superadmin-logout"); ?>"><i class="fa fa-sign-out"></i> <span><?php echo lang('superadmin_logout') ?></span></a></li>
                    <?php endif ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>