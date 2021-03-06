<!-- BEGIN PAGE CONTENT-->
<div class="row">
        <div class="col-md-12">

            <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-user"></i>Data Siswa
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
                        <form class="navbar-form navbar-left form-inline" role="form" method="post" action="<?php print base_url(); ?>admin/akademik/siswa/search">
                                <div class="form-group">
                                        <div class="input-medium">
                                                <input type="text" class="form-control" name="data_siswa" placeholder="Cari NISN Siswa" autocomplete="off">
                                        </div>
                                </div>
                                <button type="submit" class="btn default blue-stripe"><i class="fa fa-search"></i> Cari</button>
                                <a href="<?php print base_url(); ?>admin/akademik/siswa/tambah" class="btn default blue-stripe"><i class="fa fa-plus"></i> Tambah</a>
                        </form>
                </div>
                <!-- /.navbar-collapse -->
        </div>
                                <div class="table-responsive">
                                  <div id="ModalDeleteSiswa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                                          <div class="modal-dialog">
                                                  <div class="modal-content">
                                                          <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                  <h4 class="modal-title"><i class="fa fa-info"></i> Konfirmasi Hapus</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                  <p>
                                                                      Apakah Anda yakin akan menghapus data siswa <b id="nama"></b> ?
                                                                  </p>
                                                                  <input type="hidden" name="id_siswa_modal" id="id_siswa_modal">
                                                          </div>
                                                          <div class="modal-footer">
                                                                  <button onclick="javascript:DeleteSiswa($('#id_siswa_modal').val())" class="btn blue-stripe"><i class="fa fa-check"></i> OK</button>
                                                                  <button class="btn blue-stripe" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Batal</button>
                                                          </div>
                                                  </div>
                                          </div>
                                  </div>
                                        <?php print $data_siswa; ?>
                                        <?php print $paging; ?>
                                </div>
                        </div>
                </div>
        </div>
</div>
<!-- END PAGE CONTENT-->
