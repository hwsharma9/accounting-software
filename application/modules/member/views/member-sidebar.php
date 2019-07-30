        <!-- Left Panel -->
        <aside id="left-panel" class="left-panel">
            <nav class="navbar navbar-expand-sm navbar-default">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="javascript:void(0)"><img src="<?php echo base_url("assets/front/images/logo.png"); ?>" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="javascript:void(0)"><img src="<?php echo base_url("assets/front/images/logo2.png"); ?>" alt="Logo"></a>
                </div>
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo profileImage(session("member_profile_pic")); ?>" class="rounded-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p class="text-white text-uppercase"><?php echo session("name"); ?></p>
                        <a href="<?php echo base_url(); ?>"><?php echo session("member_address"); ?></a>
                    </div>
                </div>
                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="<?php echo base_url("member"); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        </li>
                        <!-- <li class="menu-item-has-children dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users" aria-hidden="true"></i>Members</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><a href=""><i class="menu-icon fa fa-user-plus" aria-hidden="true"></i>Add Members</a></li>
                                <li><a href=""><i class="menu-icon  fa fa-file-text" aria-hidden="true"></i>Members list</a></li>
                            </ul>
                        </li> -->
                        <li><a href="<?php echo base_url("member/member-account/1"); ?>"> <i class="menu-icon fa fa-money" aria-hidden="true"></i>Member Account </a></li>
                        <li><a href="<?php echo base_url("member/member-loan-list"); ?>"> <i class="menu-icon fa fa-money" aria-hidden="true"></i>Loans </a></li>
                        <li><a href="<?php echo base_url("member-logout"); ?>"><i class="fa fa-sign-out menu-icon" aria-hidden="true"></i>logout </a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </aside>
        <!-- /#left-panel -->
        <!-- Left Panel -->
        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <!-- Header-->
            <header id="header" class="header">
                <div class="header-menu">
                    <div class="col-sm-12">
                        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa-bars"></i></a>
                        <div class="text-center top-heading">
                            <h4 class="text-uppercase text-white">Shri koshti kshatriy sahayak sangh</h4>
                            <p>103, new dewas road, Indore (M.P.)</p>
                        </div>
                    </div>
                </div>
            </header>
            <!-- /header -->
            <!-- Header-->
            <!-- <div class="breadcrumbs menu-top">
                <nav class="navbar navbar-expand-lg mb-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars text-white"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto w-100">
                            <li class="nav-item"><a class="nav-link" href="javascript:void(0)">File</a></li>
                            <li class="nav-item"><a class="nav-link" href="javascript:void(0)">Transaction</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Convertor</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:void(0)">Link 01</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Link 02</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Link 03</a>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="javascript:void(0)">Process</a></li>
                            <li class="nav-item"><a class="nav-link" href="javascript:void(0)">Reports</a></li>
                            <li class="nav-item"><a class="nav-link" href="javascript:void(0)">Administration</a></li>
                            <li class="nav-item"><a class="nav-link" href="javascript:void(0)">Utilities</a></li>
                            <li class="nav-item"><a class="nav-link" href="javascript:void(0)">Hello</a></li>
                        </ul>
                    </div>
                </nav>
            </div> -->
            <!-- <div class="icon-menu clearfix">
                <ul class="clearfix text-center">
                    <li><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-file-text" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-cloud-download" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-money" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-id-card-o" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-map-marker" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-trophy" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-print" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-flag" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-cog" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                </ul>
            </div> -->