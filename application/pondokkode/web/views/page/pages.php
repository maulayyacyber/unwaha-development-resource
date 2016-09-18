<?php foreach ($data_page->result() as $h) { ?>   
<!--=== Breadcrumbs ===-->
<div class="breadcrumbs">
    <div class="container">
        <ul class="pull-left breadcrumb">
            <li><a href="<?php print base_url()?>">Home</a></li>
            <li class="active"><?php print $h->judul_pages ?></li>
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
                      <h2><?php print $h->judul_pages ?></h2>
                      <div class="headline headline-md"></div>
					  <ul class="list-inline posted-info">
                        <li><i class="fa fa-calendar"></i> <?php print $this->pondokkode_model_admin->tgl_indo_no_hari($h->last_data_update) ?></li>
                        <li><i class="fa fa-clock-o"></i> <?php print $this->pondokkode_model_admin->jam_format($h->last_data_update) ?></li>
                        <li><i class="fa fa-user"></i> <?php print $h->nama_user ?></li>	
					  </ul>
					  <div class="headline headline-md"></div>
                        <p><?php print $h->isi_pages ?></p>
                        <ul class="list-unstyled list-inline blog-tags">
                        <i class="fa fa-tags"></i>
                        <li>
                          <?php
                          $tags = explode(",", $h->tags_pages);
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
	  <?php } ?> 