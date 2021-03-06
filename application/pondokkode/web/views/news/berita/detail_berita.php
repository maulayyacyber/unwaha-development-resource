<?php
if($data_berita != NULL):
 ?>
<!--=== Breadcrumbs ===-->
<div class="breadcrumbs">
    <div class="container">
        <ul class="pull-left breadcrumb">
            <li><a href="<?php print base_url()?>">Home</a></li>
            <li><a href="<?php print base_url()?>berita/">Berita</a></li>
            <li class="active"><?php print $judul ?></li>
        </ul>
    </div>
</div><!--/breadcrumbs-->

<!--=== Blog Posts ===-->
    <div class="container content-sm">
        <div class="row">
            <!-- Blog All Posts -->
            <div class="col-md-9">
                <!-- News v3 -->
                <div class="news-v3 bg-color-white margin-bottom-30">
                    <div class="news-v2-in">
                      <h2><a href="<?php print base_url()?>berita/<?php print $data_berita->url ?>/"><?php print $data_berita->judul_berita ?></a></h2>
                      <div class="headline headline-md"></div>
                        <ul class="list-inline posted-info">
                            <li><i class="fa fa-calendar"></i> <?php print $this->pondokkode_model_admin->tgl_indo_no_hari($data_berita->tgl_publish) ?></li>
                            <li><i class="fa fa-clock-o"></i> <?php print $this->pondokkode_model_admin->jam_format($data_berita->tgl_publish) ?></li>
                            <li><i class="fa fa-user"></i> <?php print $data_berita->nama_user ?></li>
                            <li><i class="fa fa-eye"></i> Dilihat <?php print $data_berita->dilihat ?> Kali</li>
                        </ul>
                        <div class="headline headline-md"></div>
                        <p><?php print $data_berita->isi_berita ?></p>
                        <ul class="list-unstyled list-inline blog-tags">
                        <i class="fa fa-tags"></i>
                        <li>
                          <?php
                          $tags = explode(",", $data_berita->tags_berita);
                            foreach($tags as $k => $v):
                            ?>
                              <a href="#"><?php echo $v;?></a>
                            <?php
                            endforeach;
                            ?>
                        </li>
                      </ul>
                    </div>
                </div>
                <!-- End News v3 -->
                <div class="headline headline-md"></div>
                <!-- Blog Post Author -->
                <div class="blog-author margin-bottom-30">
                  <div class="tag-box tag-box-v2 margin-bottom-40">
                    <img class="rounded-x" src="<?php print base_url()?>assets/admin/foto_user/200/<?php print $data_berita->foto_user ?>" alt="">
                    <div class="blog-author-desc">
                        <div class="overflow-h">
                            <h4><?php print $data_berita->nama_user ?></h4>
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                        <p><?php print $_SESSION['about'] ?></p>
                    </div>
                </div>
              </div>
                <!-- End Blog Post Author -->
                <hr>
                <h2 class="margin-bottom-20">Post a Comment</h2>
                <!-- Form -->
                <?php print $disqus ?>
                <!-- End Form -->
            </div>
            <!-- End Blog All Posts -->

            <!-- Blog Sidebar -->
            <div class="col-md-3">
              <!-- Posts -->
              <div class="posts margin-bottom-40">
                  <div class="headline headline-md"><h2><i class="fa fa-newspaper-o"></i> Berita Populer</h2></div>
                  
                    <?php print $berita_populer ?>
                  
              </div><!--/posts-->
              <div class="posts margin-bottom-40">
                  <div class="headline headline-md"><h2><i class="fa fa-book"></i> Artikel Populer</h2></div>
                  
                    <?php print $artikel_populer ?>
                  
              </div><!--/posts-->
            <!-- End Posts -->
            <!--Datepicker-->
            <div class="headline headline-md"><h2><i class="fa fa-calendar-o"></i> Kalender <?php print date('Y') ?></h2></div>
            <form action="#" id="sky-form2" class="sky-form">
                <div id="inline-start"></div>
            </form>
                <!-- End Blog Newsletter -->
            </div>
            <!-- End Blog Sidebar -->
        </div>
    </div><!--/end container-->
    <?php
    else:
    ?>
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <ul class="pull-left breadcrumb">
                <li><a href="<?php print base_url() ?>">Home</a></li>
                <li class="active">404 Error</li>
            </ul>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
    <div class="container content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="error-v1">
                <span class="error-v1-title">404</span>
                <span>That's an error!</span>
                <p>The requested URL was not found on this server. That's all we know.</p>
                <a class="btn-u btn-bordered" href="<?php print base_url() ?>"><i class="fa fa-home"></i> Back Home</a>
            </div>
        </div>
    </div>
  </div>
    <?php endif; ?>
<!--=== End Blog Posts ===-->
