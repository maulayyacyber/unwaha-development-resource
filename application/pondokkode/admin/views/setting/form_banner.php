<!-- BEGIN PAGE CONTENT-->
<div class="row mix-grid">
    <div class="col-md-12">
        <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-desktop"></i>Form Banner
                                </div>
                                <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="javascript:;" class="remove"></a>
                                </div>
                        </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
               <div class="alert alert-info text-center">
               Ukuran gambar harus <strong>1024x500</strong> pixels.
               </div>
                <form id="form_banner" action="<?php print base_url() ?>admin/setting/banner/upload" method="POST" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    Silahkan pilih gambar terlebih dahulu.
                            </div>
                                <div class="form-group">
                                        <label for="files" class="control-label col-md-3">Gambar
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-9">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="input-group">
                                                                <span class="input-group-btn">
                                                                        <span class="uneditable-input">
                                                                                <i class="fa fa-file fileupload-exists"></i>
                                                                                <span class="fileupload-preview">
                                                                                </span>
                                                                        </span>
                                                                </span>
                                                                <span class="btn default btn-file">
                                                                        <span class="fileupload-new">
                                                                                <i class="fa fa-paper-clip"></i> Select file
                                                                        </span>
                                                                        <span class="fileupload-exists">
                                                                                <i class="fa fa-undo"></i> Change
                                                                        </span>
                                                                    <input type="file" id="files" name="banners[]" multiple="" class="default"/>
                                                                </span>
                                                                <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn blue-stripe"><i class="fa fa-upload"></i> Upload</button>
                                        <button type="button" class="btn blue-stripe" onclick="javascript:goBack()"><i class="fa fa-arrow-left"></i>  Kembali</button>
                                </div>
                        </div>
            </form>
                <!-- END FORM-->
        </div>
        </div>

        <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-desktop"></i>Data Banner
                                </div>
                                <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="javascript:;" class="remove"></a>
                                </div>
                        </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                            <div class="table-responsive">
                             <?php  print $data_banner;?>
                            </div>
                            <div id="ModalDeleteBanner" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                                    <div class="modal-dialog">
                                            <div class="modal-content">
                                                    <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title"><i class="fa fa-info"></i> Konfirmasi Hapus</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                            <p>
                                                                Apakah Anda yakin akan menghapus data banner <b id="nama_banner"></b> ?
                                                            </p>
                                                            <input type="hidden" name="id_banner" id="id_banner">
                                                    </div>
                                                    <div class="modal-footer">
                                                            <button onclick="javascript:DeleteBanner($('#id_banner').val())" class="btn blue-stripe"><i class="fa fa-check"></i> OK</button>
                                                            <button class="btn blue-stripe" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Batal</button>
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                <!-- END FORM-->
              </div>
        </div>
    </div>
</div>
