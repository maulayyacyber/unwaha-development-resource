<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-file-pdf-o"></i>Form File
                                </div>
                                <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="javascript:;" class="remove"></a>
                                </div>
                        </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form id="<?php print $nama_form ?>" action="<?php print base_url() ?>admin/file/simpan" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                  <i class="fa fa-exclamation-circle"></i> Lengkapi data-data file sesuai form dibawah ini.
                            </div>
                                <div class="form-group">
                                        <label for="judul_file" class="col-md-3 control-label">Judul File
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" id="judul_file" name="judul_file" autocomplete="off" autofocus="on" value="<?php print $judul_file ?>" class="form-control" placeholder="Judul File">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="file" class="control-label col-md-3">Pilih File
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
                                                                    <input type="file" id="file" name="userfile" size="20" multiple="" class="default"/>
                                                                </span>
                                                                <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                                        </div>
                                                </div>
                                                <span class="label label-danger">
                                                        NOTE!
                                                </span>
                                                <span>
                                                         Hanya file dengan format <strong>.pdf</strong> & <strong>.doc</strong> yang diperbolehkan.
                                                </span>
                                        </div>
                                </div>
                                <input type="hidden" name="namafile" value="<?php print $namafile; ?>" />
                                <input type="hidden" name="tipe" value="<?php print $tipe ?>">
                                <input type="hidden" name="id" value="<?php print $id_file ?>">
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
