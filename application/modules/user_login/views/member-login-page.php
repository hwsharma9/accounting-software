<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo base_url("assets/front/"); ?>apple-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url("assets/front/"); ?>favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/front/"); ?>assets/css/custom.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container inner-container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="<?php echo base_url("assets/front/"); ?>index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <?php echo form_open(base_url(uri_string())); ?>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile_no" class="form-control form-input" placeholder="Mobile Number">
                            <?php echo form_error('mobile_no'); ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control form-input" placeholder="Password">
                            <?php echo form_error('password'); ?>
                        </div>
                        <div class="checkbox">
                            <!-- <label>
                                <input type="checkbox"> Remember Me
                            </label> -->
                            <label class="pull-right">
                                <a href="<?php echo base_url("assets/front/"); ?>">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <!-- <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p class="sign-up-text">Don't have account ? <a href="<?php //echo base_url("assets/front/"); ?>"> Sign Up Here</a></p>
                        </div> -->
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url("assets/front/"); ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url("assets/front/"); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url("assets/front/"); ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url("assets/front/"); ?>assets/js/main.js"></script>


</body>
</html>