
<!--=== Content Part ===-->
<div class="container content">
  <div class="row blog-page">
        <!-- Left Sidebar -->
      <div class="col-md-9">
            <!--Blog Post-->
          <div class="headline headline-md"><h2><i class="fa fa fa-newspaper-o"></i> Berita Terbaru</h2></div>
          <?php print $berita ?>
        </div>
        <!-- End Left Sidebar -->

        <!-- Right Sidebar -->
      <div class="col-md-3 magazine-page">
            <!-- Posts -->
            <div class="posts margin-bottom-40">
                <div class="headline headline-md"><h2><i class="icon-pin"></i> Pengumuman</h2></div>
                  <?php print $pengumuman ?>

            </div><!--/posts-->
            <!-- End Posts -->

          <!-- Tabs Widget -->
          <!-- Posts -->
          <div class="posts margin-bottom-40">
              <div class="headline headline-md"><h2><i class="fa fa-calendar-check-o"></i> Agenda</h2></div>
                <?php //print $agenda_terbaru ?>
              
                  <?php print $agenda ?>
              
          </div><!--/posts-->
          <!-- End Posts -->
          <!--Datepicker-->
          <div class="headline headline-md"><h2><i class="fa fa-calendar-o"></i> Kalender <?php print date('Y') ?></h2></div>
          <form action="#" id="sky-form2" class="sky-form">
              <div id="inline-start"></div>
          </form>
          <!--End Datepicker-->
        </div>
        <!-- End Right Sidebar -->
    </div><!--/row-->
</div><!--/container-->
<!--=== End Content Part ===-->
