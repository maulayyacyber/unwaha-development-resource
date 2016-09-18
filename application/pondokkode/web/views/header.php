<!DOCTYPE html>
<!--
Project Name : Website FTI - UNWAHA
Programmer   : Fika Ridaul Maulayya
More info visit :
FB           : https://www.facebook.com/fikaridaulmaulayya
Twitter      : https://twitter.com/fikacyber
Email/ Tlp   : ridaulmaulayya@gmail.com / 085785852224
-->
<html lang="en">
<head>

	<title><?php print $title ?> <?php echo $_SESSION['web_title']; ?></title>

	<!-- Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="product" content="Fakultas Teknologi Informasi - UNWAHA">
	<meta name="description" content="<?php print $description ?>">
	<meta name="author" content="Fika Ridaul Maulayya">
	<meta name="keywords" content="<?php print $keywords ?>">
	<meta property="og:url" content="http://www.ma-ihsanniat.sch.id">
	<meta property="og:site_name" content="Fakultas Teknologi Informasi - UNWAHA">
	<meta property="og:description" content="<?php print $description ?>">
	<meta property="og:image" content="">
	<meta property="twitter:site" content="Fakultas Teknologi Informasi - UNWAHA">
	<meta property="twitter:site:id" content="">
	<meta property="twitter:card" content="summary">
	<meta property="twitter:description" content="<?php print $description ?>">
	<meta property="twitter:image:src" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/css/style.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/css/custom.css">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/css/headers/header-default.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/css/footers/footer-v1.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" type="text/css" href="<?php print base_url()?>assets/web/css/jquery.highlight.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/plugins/fancybox/source/jquery.fancybox.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/plugins/owl-carousel/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/plugins/master-slider/masterslider/style/masterslider.css">
	<link rel='stylesheet' href="<?php print base_url()?>assets/web/plugins/master-slider/masterslider/skins/black-2/style.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">
  <link rel="stylesheet" href="<?php print base_url()?>assets/web/css/pages/page_contact.css">
	<link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>assets/admin/plugins/bootstrap-toastr/toastr.min.css"/>
	<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/jquery/jquery.min.js"></script>
	<script src="<?php print base_url()?>assets/web/js/nprogress.js"></script>

	<!-- CSS Theme -->
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/css/theme-colors/default.css" id="style_color">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/css/theme-skins/dark.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/css/pages/page_404_error.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/plugins/login-signup-modal-window/css/style.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/css/nprogress.css">
	<!-- CSS Customization -->
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/css/custom.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="<?php print base_url()?>assets/web/css/pages/profile.css">

</head>
<script>
		NProgress.start();
</script>

<body class="header-fixed header-fixed-space-default">

<div class="wrapper">
	<!--=== Header ===-->
	<div class="header header-sticky">
		<div class="container">
			<!-- Logo -->
			<a class="logo" href="<?php print base_url()?>">
				<img src="<?php print base_url()?>assets/images/<?php print $_SESSION['logo'] ?>" alt="Logo">
			</a>
			<!-- End Logo -->

			<!-- Topbar -->
			<div class="topbar">
				<ul class="loginbar pull-right">
					<li><i class="fa fa-phone"></i> <?php print $_SESSION['telp'] ?></li>
					<li class="topbar-devider"></li>
					<li><i class="fa fa-envelope"></i> <?php print $_SESSION['email'] ?></li>
				</ul>
			</div>
			<!-- End Topbar -->

			<!-- Toggle get grouped for better mobile display -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="fa fa-bars"></span>
			</button>
			<!-- End Toggle -->
		</div><!--/end container-->

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
			<div class="container">
				<ul class="nav navbar-nav">
					<!-- Home -->
					<li class="<?php print $active_home ?>">
						<a href="<?php print base_url() ?>">
							<i class="icon-home"></i> Home
						</a>
					</li>
					<!-- End Home -->

					<!-- Pages -->
          <li class="dropdown <?php print $active_tentang ?>">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i> Tentang
              </a>
              <ul class="dropdown-menu">
                  <li class="<?php print $active_profil ?>"><a href="<?php print base_url() ?>profil/"><i class="icon-arrow-right"></i> Profil </a></li>
                  <li class="<?php print $active_visi_misi ?>"><a href="<?php print base_url() ?>visi-dan-misi/"><i class="icon-arrow-right"></i> Visi dan Misi</a></li>
                  <li class="<?php print $active_struktur_organisasi ?>"><a href="<?php print base_url() ?>struktur-organisasi/"><i class="icon-arrow-right"></i> Struktur Organisasi</a></li>
				  <li class="dropdown-submenu">
					  <a href="javascript:void(0);"><i class="icon-arrow-right"></i> Progam Studi</a>
					  <ul class="dropdown-menu">
						 <li><a href="<?php print base_url() ?>progam-studi/teknik-informatika/">Teknik Informatika</a></li>
						 <li><a href="<?php print base_url() ?>progam-studi/sistem-informasi/">Sistem Informasi</a></li>
					  </ul>
                  </li>
              </ul>
          </li>
					<!-- End Pages -->

          <!-- Pages -->
          <li class="dropdown <?php print $active_news ?>">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa fa-newspaper-o"></i> News
              </a>
              <ul class="dropdown-menu">
                  <li class="<?php print $active_berita ?>"><a href="<?php print base_url() ?>berita/"><i class="fa fa-newspaper-o"></i> Berita</a></li>
                  <li class="<?php print $active_artikel ?>"><a href="<?php print base_url() ?>artikel/"><i class="fa fa-book"></i> Artikel</a></li>
              </ul>
          </li>
					<!-- End Pages -->

          <!-- Pages -->
          <li class="dropdown <?php print $active_info ?>">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell"></i> Info
              </a>
              <ul class="dropdown-menu">
                  <li class="<?php print $active_agenda ?>"><a href="<?php print base_url() ?>agenda/"><i class="fa fa-calendar-check-o"></i> Agenda</a></li>
                  <li class="<?php print $active_pengumuman ?>"><a href="<?php print base_url() ?>pengumuman/"><i class="icon-pin"></i> Pengumuman</a></li>
              </ul>
          </li>
					<!-- End Pages -->

          <!-- Pages -->
          <li class="dropdown <?php print $active_unduhan ?>">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-cube"></i> Unduhan
              </a>
              <ul class="dropdown-menu">
                  <li class="<?php print $active_file ?>"><a href="<?php print base_url()?>file/"><i class="fa fa-file-pdf-o"></i> File</a></li>
                  <li class="<?php print $active_galeri ?>"><a href="<?php print base_url() ?>galeri/"><i class="fa fa-picture-o"></i> Galeri</a></li>
              </ul>
          </li>
					<!-- End Pages -->

          <!-- Pages -->
					<li class="<?php print $active_kontak ?>">
						<a href="<?php print base_url() ?>kontak/">
							<i class="fa fa-comments-o"></i> Kontak
						</a>
					</li>
					<!-- End Pages -->
				</ul>
			</div><!--/end container-->
		</div><!--/navbar-collapse-->
	</div>
	<!--=== End Header ===-->
