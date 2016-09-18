<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-folder-open-o"></i>Form Kategori
                                </div>
                                <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="javascript:;" class="remove"></a>
                                </div>
                        </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form id="form_kategori" action="<?php print base_url() ?>admin/posting/kategori/simpan" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                  <i class="fa fa-exclamation-circle"></i> Lengkapi data-data kategori sesuai form dibawah ini.
                            </div>
                                <div class="form-group">
                                        <label for="nama_kategori" class="col-md-3 control-label">Nama
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" id="nama_kategori" name="nama_kategori" autocomplete="off" autofocus="on" value="<?php print $nama_kategori ?>" class="form-control" placeholder="Nama Kategori">
                                        </div>
                                </div>
                                <input type="hidden" name="tipe" value="<?php print $tipe ?>">
                                <input type="hidden" name="id" value="<?php print $id_kategori ?>">
                        </div>
                        <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn blue-stripe"><i class="fa fa-save"></i> <?php print $button ?></button>
                                        <button type="reset" class="btn blue-stripe"><i class="fa fa-undo"></i> Reset</button>
                                        <button type="button" class="btn blue-stripe" onclick="javascript:goBack()"><i class="fa fa-arrow-left"></i>  Kembali</button>
                                </div>
                        </div>
                </form>
                <!-- END FORM-->
        </div>
        </div>
    </div>
</div>
