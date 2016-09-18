<!DOCTYPE html>
<!--
Project Name : Website FTI - UNWAHA
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
<meta content="Pondok Kode - Web Project Development" name="description"/>
<meta content="Pondok Kode" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>assets/admin/plugins/bootstrap-toastr/toastr.min.css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php print base_url()?>assets/admin/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php print base_url()?>assets/admin/plugins/select2/select2-metronic.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php print base_url()?>assets/admin/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php print base_url()?>assets/admin/css/pages/login.css" rel="stylesheet" type="text/css"/>
<link href="<?php print base_url()?>assets/admin/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="<?php print base_url() ?>">
		<img src="<?php print base_url()?>assets/admin/img/admin.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="<?php print base_url()?>admin/auth" method="post">
		<h3 class="form-title">Silahkan Login</h3>
    <?php print $this->session->flashdata('login_info'); ?>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
				Masukan Username dan Password Anda.
			</span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Ingatkan Saya </label>
			<button type="submit" class="btn green pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		<div class="forget-password">
			<h4>Lupa password anda?</h4>
			<p>
				 Klik
				<a href="javascript:;" id="forget-password">
					 Disini
				</a>
				 untuk mereset password Anda.
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="<?php print base_url(); ?>admin/send_reset_password" method="post">
		<h3>Lupas Password ?</h3>
		<p>
			 Masukan Email Anda Untuk Melakukan Reset Password.
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" id="email-user" name="email_user"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> Back </button>
			<button type="submit" class="btn green pull-right">
			Submit <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	<?php print $_SESSION['admin_footer'] ?></br>
  Developed By PONDOK KODE.
</div>
<!-- END COPYRIGHT -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php print base_url()?>assets/admin/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php print base_url()?>assets/admin/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/admin/plugins/select2/select2.min.js"></script>
<script src="<?php print base_url(); ?>assets/admin/plugins/bootstrap-toastr/toastr.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php print base_url()?>assets/admin/scripts/core/app.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/scripts/fungsi.js"></script>
<script src="<?php print base_url()?>assets/admin/scripts/custom/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
		jQuery(document).ready(function() {
		  App.init();
		  Login.init();
			<?php print $this->session->flashdata("pesan_notif"); ?>
			window.base_url = <?php echo json_encode(base_url()); ?>;
		});
	</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
