<!DOCTYPE html>
<!--
Project Name : Website MA - IHSANNIAT
Programmer   : Fika Ridaul Maulayya
More info visit :
FB           : https://www.facebook.com/fikaridaulmaulayya
Twitter      : https://twitter.com/fikacyber
Email/ Tlp   : ridaulmaulayya@gmail.com / 085785852224
-->
<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php print $_SESSION['admin_title'] ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN PACE PLUGIN FILES -->
<link href="<?php print base_url()?>assets/admin/plugins/pace/themes/pace-theme-flash.css" rel="stylesheet" type="text/css"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php print base_url()?>assets/web/plugins/line-icons/line-icons.css">
<link href="<?php print base_url()?>assets/admin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>assets/admin/plugins/select2/select2_metro.css"/>
<link href="<?php print base_url()?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>assets/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.css"/>
<link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>assets/admin/plugins/jquery-tags-input/jquery.tagsinput.css"/>
<link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>

<!-- BEGIN THEME STYLES -->
<link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>assets/admin/plugins/bootstrap-toastr/toastr.min.css"/>
<link href="<?php print base_url()?>assets/admin/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php print base_url()?>assets/admin/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php print base_url()?>assets/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.css"/>
<link href="<?php print base_url()?>assets/admin/css/pages/portfolio.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<!-- core jQuery -->
<script src="<?php print base_url()?>assets/admin/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<!-- end core jQuery -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="<?php print base_url()?>admin/dashboard">
			<img src="<?php print base_url()?>assets/admin/img/daksbor.png" alt="logo" class="img-responsive"/>
		</a>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="<?php print base_url()?>assets/admin/img/menu-toggler.png" alt=""/>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" width="29" height="29" src="<?php print base_url(); ?>assets/admin/foto_user/200/<?php print $this->session->userdata("foto_user") ?>"/>
					<span class="username">
						 <?php print $this->session->userdata('nama_user') ?>
					</span>
					<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php print base_url()?>admin/master/user/edit/<?php print $this->encryption->encode($this->session->userdata('user_id'))?>">
							<i class="fa fa-user"></i> My Account
						</a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;" id="trigger_fullscreen">
							<i class="fa fa-arrows"></i> Full Screen
						</a>
					</li>
					<li>
						<a href="<?php print base_url()?>admin/dashboard/logout">
							<i class="fa fa-sign-out"></i> Log Out
						</a>
					</li>
				</ul>
			</li>
			<!-- END USER LOGIN DROPDOWN -->
		</ul>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
