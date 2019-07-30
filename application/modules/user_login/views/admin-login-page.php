<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url("assets/admin/"); ?>"><b><?php echo PNAME; ?></b> Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php if (form_error('error')): ?>
      <div class="alert alert-danger" role="alert">
        <strong>Oh snap!</strong>
        <?php echo form_error('error'); ?>
      </div>
    <?php endif ?>
    <p class="login-box-msg">Sign in to start your session</p>
      <?php echo form_open(base_url('superadmin-login')); ?>
      <div class="form-group has-feedback">
        <?php echo form_input(array("type"=>"email","name"=>"email","class"=>"form-control","placeholder"=>"Email","value"=>set_value('email'),"autofocus"=>"")); ?>
        <?php echo form_error('email'); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php echo form_input(array("type"=>"password","name"=>"password","class"=>"form-control","placeholder"=>"Password","value"=>set_value('password'))); ?>
        <?php echo form_error('password'); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    <?php echo form_close(); ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url("assets/admin/"); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
