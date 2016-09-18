<!-- BEGIN PAGE CONTENT-->
<div class="row">
        <div class="col-md-12">

            <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-sticky-note-o"></i>Data Pages
                                </div>
                                <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="javascript:;" class="remove"></a>
                                </div>
                        </div>
                        <div class="portlet-body">
           <div id="navbar-guru" class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">
                                Toggle navigation
                        </span>
                        <span class="fa fa-bar">
                        </span>
                        <span class="fa fa-bar">
                        </span>
                        <span class="fa fa-bar">
                        </span>
                        </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <form class="navbar-form navbar-left form-inline" role="form" method="post" action="<?php print base_url(); ?>admin/konten/pages/search">
                                <div class="form-group">
                                        <div class="input-medium">
                                                <input type="text" class="form-control" name="data_pages" placeholder="Cari judul atau isi" autocomplete="off">
                                        </div>
                                </div>
                                <button type="submit" class="btn default blue-stripe"><i class="fa fa-search"></i> Cari</button>
                                <!--<a href="<?php print base_url(); ?>admin/konten/pages/tambah" class="btn default blue-stripe"><i class="fa fa-plus"></i> Tambah</a>-->
                        </form>
                </div>
                <!-- /.navbar-collapse -->
        </div>
                                <div class="table-responsive">
                                        <?php print $data_pages; ?>
                                        <?php print $paging; ?>
                                </div>
                        </div>
                </div>
        </div>
</div>
<!-- END PAGE CONTENT-->
