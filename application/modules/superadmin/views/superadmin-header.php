<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $head_title; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url("assets/admin/") ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url("assets/admin/") ?>bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url("assets/admin/") ?>bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url("assets/admin/") ?>dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url("assets/admin/") ?>dist/css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?php echo base_url("assets/admin/") ?>bower_components/morris.js/morris.css">
        <link rel="stylesheet" href="<?php echo base_url("assets/admin/bower_components/sweet-alert/sweetalert2.min.css"); ?>">
        <link href="<?php echo base_url("assets/admin/bower_components/contextmanu/dist/jquery.contextMenu.css"); ?>" rel="stylesheet" type="text/css" />
        <!-- jQuery 3 -->
        <script src="<?php echo base_url("assets/admin/") ?>bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url("assets/admin/") ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url("assets/admin/") ?>bower_components/contextmanu/src/jquery.contextMenu.js" type="text/javascript"></script>
        <script src="<?php echo base_url("assets/admin/") ?>bower_components/contextmanu/dist/jquery.ui.position.min.js" type="text/javascript"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url("assets/admin/") ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
        <link rel="stylesheet" href="<?php echo base_url("assets/admin/fonts/fonts.css"); ?>">
        <script type="text/javascript" src="<?php echo base_url("assets/admin/bower_components/sweet-alert/sweetalert2.all.min.js"); ?>"></script>
        <script type="text/javascript">
            var site_url = '<?php echo base_url(); ?>';
        </script>
        <style>
            /*right click*/
            .context-menu ul{ 
                z-index: 1000;
                position: absolute;
                overflow: hidden;
                border: 1px solid #CCC;
                white-space: nowrap;
                font-family: sans-serif;
                background: #FFF;
                color: #333;
                border-radius: 5px;
                padding: 0;
            }
            /* Each of the items in the list */
            .context-menu ul li {
                padding: 8px 12px;
                cursor: pointer;
                list-style-type: none;
            }
            .context-menu ul li:hover {
                background-color: #DEF;
            }
        </style>
    </head>