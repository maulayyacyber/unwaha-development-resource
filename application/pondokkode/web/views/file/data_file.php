<!--=== Breadcrumbs ===-->
<div class="breadcrumbs">
    <div class="container">
        <ul class="pull-left breadcrumb">
            <li><a href="<?php print base_url()?>">Home</a></li>
            <li><a href="#">Unduhan</a></li>
            <li class="active">File</li>
        </ul>
    </div>
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container content">
  <div class="panel panel-green margin-bottom-40">
      <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-file-pdf-o"></i> File Download</h3>
      </div>
        <div class="panel-body">
          <form action="<?php print base_url()?>web/file/search" method="POST">
          <div class="input-group">
              <input type="text" name="data_file" autocomplete="off" class="form-control" placeholder="Cari File Download FTI UNWAHA">
              <span class="input-group-btn">
                  <button class="btn-u btn-u-lg btn-u" type="submit"><i class="fa fa-search"></i> Search</button>
              </span>
          </div>
        </form>
          <br>
          <div class="table-responsive">
            <?php print $file ?>
          </div>
        </div>
    </div>
  </div>
</div><!--/container-->
<!--=== End Content Part ===-->
