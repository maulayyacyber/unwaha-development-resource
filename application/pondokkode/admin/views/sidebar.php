<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
        <br/>
        <li class="<?php print $dashboard ?>">
					<a href="<?php print base_url()?>admin/dashboard">
						<i class="fa fa-home"></i>
						<span class="title">
							DASHBOARD
						</span>
						<span <?php if(isset($dashboard)){ echo 'class="selected"'; }?>>
						</span>
					</a>
				</li>
        <li class="<?php print $posting ?>">
					<a href="javascript:;">
						<i class="fa fa-clipboard"></i>
						<span class="title">
							POSTING
						</span>
					<span <?php if(isset($posting)){ echo 'class="selected"'; }?>></span>
					<span <?php if(isset($posting)){ echo 'class="arrow open"'; }else{ echo 'class="arrow"';}?>>
					</span>
					</a>
					<ul class="sub-menu">
						<li class="<?php print $berita ?>">
							<a href="<?php print base_url()?>admin/posting/berita">
								<i class="fa fa fa-newspaper-o"></i> Berita
							</a>
					 </li>
						<li class="<?php print $artikel ?>">
							<a href="<?php print base_url()?>admin/posting/artikel">
								<i class="fa fa-book"></i> Artikel
							</a>
				   </li>
           <li class="<?php print $kategori ?>">
             <a href="<?php print base_url()?>admin/posting/kategori">
               <i class="fa fa-folder-open-o"></i> Kategori Artikel
             </a>
          </li>
        </ul>
      </li>
      <li class="<?php print $info_agenda ?>">
        <a href="javascript:;">
          <i class="fa fa-bell"></i>
          <span class="title">
            INFO & AGENDA
          </span>
		  <span <?php if(isset($info_agenda)){ echo 'class="selected"'; }?>></span>
		  <span <?php if(isset($info_agenda)){ echo 'class="arrow open"'; }else{ echo 'class="arrow"';}?>>
		  </span>
        </a>
        <ul class="sub-menu">
          <li class="<?php print $agenda ?>">
            <a href="<?php print base_url()?>admin/info/agenda">
              <i class="fa fa-calendar"></i> Agenda
            </a>
         </li>
          <li class="<?php print $pengumuman ?>">
            <a href="<?php print base_url()?>admin/info/pengumuman">
              <i class="icon-pin"></i> Pengumuman
            </a>
         </li>
      </ul>
    </li>
  <li class="<?php print $konten ?>">
    <a href="javascript:;">
      <i class="fa fa-clone"></i>
      <span class="title">
        KONTEN
      </span>
	  <span <?php if(isset($konten)){ echo 'class="selected"'; }?>></span>
	  <span <?php if(isset($konten)){ echo 'class="arrow open"'; }else{ echo 'class="arrow"';}?>>
	  </span>
    </a>
    <ul class="sub-menu">
      <li class="<?php print $pages ?>">
        <a href="<?php print base_url()?>admin/konten/pages">
          <i class="fa fa-sticky-note-o"></i> Pages
        </a>
     </li>
      <li class="<?php print $menu ?>">
        <a href="<?php print base_url()?>admin/konten/menu">
          <i class="fa fa-bookmark-o"></i> Menu
        </a>
     </li>
  </ul>
</li>
<li class="<?php print $file ?>">
  <a href="<?php print base_url()?>admin/file">
    <i class="fa fa-file-pdf-o"></i>
    <span class="title">
      FILE
    </span>
	<span <?php if(isset($file)){ echo 'class="selected"'; }?>>
	</span>
  </a>
</li>
<li class="<?php print $galeri ?>">
  <a href="<?php print base_url()?>admin/galeri">
    <i class="fa fa-picture-o"></i>
    <span class="title">
      GALERI
    </span>
	<span <?php if(isset($galeri)){ echo 'class="selected"'; }?>>
	</span>
  </a>
</li>
<li class="<?php print $testimoni ?>">
  <a href="<?php print base_url()?>admin/testimoni">
    <i class="fa fa-comments-o"></i>
    <span class="title">
      TESTIMONI
    </span>
	<span <?php if(isset($testimoni)){ echo 'class="selected"'; }?>>
	</span>
  </a>
</li>
<li class="<?php print $master ?>">
  <a href="javascript:;">
    <i class="fa fa-shield"></i>
    <span class="title">
      MASTER
    </span>
	<span <?php if(isset($master)){ echo 'class="selected"'; }?>></span>
	<span <?php if(isset($master)){ echo 'class="arrow open"'; }else{ echo 'class="arrow"';}?>>
	</span>
  </a>
  <ul class="sub-menu">
    <li class="<?php print $user ?>">
      <a href="<?php print base_url()?>admin/master/user">
        <i class="fa fa-user"></i> User
      </a>
   </li>
    <li class="<?php print $log_session ?>">
      <a href="<?php print base_url()?>admin/master/session">
        <i class="fa fa-exchange"></i> Log Session
      </a>
   </li>
</ul>
</li>
<li class="<?php print $setting ?>">
  <a href="javascript:;">
    <i class="fa fa-cogs"></i>
    <span class="title">
      SETTING
    </span>
	<span <?php if(isset($setting)){ echo 'class="selected"'; }?>></span>
	<span <?php if(isset($setting)){ echo 'class="arrow open"'; }else{ echo 'class="arrow"';}?>>
	</span>

  </a>
  <ul class="sub-menu">
    <li class="<?php print $umum ?>">
      <a href="<?php print base_url()?>admin/setting/umum">
        <i class="fa fa-globe"></i> Umum
      </a>
   </li>
    <li class="<?php print $banner ?>">
      <a href="<?php print base_url()?>admin/setting/banner">
        <i class="fa fa-desktop"></i> Banner
      </a>
   </li>
</ul>
</li>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
