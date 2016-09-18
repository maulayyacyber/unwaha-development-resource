<!--=== Breadcrumbs ===-->
<div class="breadcrumbs">
    <div class="container">
        <ul class="pull-left breadcrumb">
            <li><a href="<?php print base_url()?>">Home</a></li>
            <li><a href="<?php print base_url()?>berita/">Berita</a></li>
        </ul>
    </div>
</div><!--/breadcrumbs-->
<!--=== Content Part ===-->
<div class="container content">
  <form action="<?php print base_url()?>web/berita/search" method="POST">
    <div class="input-group margin-bottom-40">
        <input type="text" name="cari_berita" autocomplete="off" class="form-control" placeholder="Cari Berita FTI UNWAHA">
        <span class="input-group-btn">
            <button class="btn-u btn-u-lg btn-u" type="submit"><i class="fa fa-search"></i> Search</button>
        </span>
    </div>
  </form>
  <div class="row blog-page">
        <!-- Left Sidebar -->
      <div class="col-md-9">
        <!--Blog Post-->
          <div class="headline headline-md"><h2><i class="fa fa fa-newspaper-o"></i> Berita Terbaru</h2></div>
          <?php print $data_berita ?>
    <!--Pagination-->
    <div class="text-left">
        <?php print $paging ?>
    </div>
     <!--End Pagination-->
      </div>
        <!-- End Left Sidebar -->

<!-- Right Sidebar -->
<div class="col-md-3 magazine-page">
    <div class="posts margin-bottom-40">
        <div class="headline headline-md"><h2><i class="fa fa-newspaper-o"></i> Berita Populer</h2></div>
        
          <?php print $berita_populer ?>
        
    </div><!--/posts-->
    <div class="posts margin-bottom-40">
        <div class="headline headline-md"><h2><i class="fa fa-book"></i> Artikel Populer</h2></div>
        
          <?php print $artikel_populer ?>
       
    </div><!--/posts-->
    <!--Datepicker-->
    <div class="headline headline-md"><h2><i class="fa fa-calendar-o"></i> Kalender <?php print date('Y') ?></h2></div>
    <form action="#" id="sky-form2" class="sky-form">
        <div id="inline-start"></div>
    </form>
    <!--End Datepicker-->
  </div>
</div>
</div>
