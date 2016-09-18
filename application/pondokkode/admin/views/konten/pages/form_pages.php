<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-sticky-note-o"></i>Form Pages
                                </div>
                                <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="javascript:;" class="remove"></a>
                                </div>
                        </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form id="form_pages" action="<?php print base_url() ?>admin/konten/pages/simpan" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <i class="fa fa-exclamation-circle"></i> Lengkapi data-data pages sesuai form dibawah ini.
                            </div>
                                <div class="form-group">
                                        <label for="judul_pages" class="col-md-2 control-label">Judul Pages
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" id="judul_pages" name="judul" autocomplete="off" autofocus="on" value="<?php print $judul_pages ?>" class="form-control" placeholder="Judul">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="isi_pages" class="col-md-2 control-label">Isi Pages
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="ckeditor" id="isi_pages" name="isi" data-error-container="#editor_pages"><?php print $isi_pages; ?></textarea>
                                            <div id="editor_pages">
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="tags_pages" class="control-label col-md-2">Tags Pages
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input id="tags_pages" type="text" autocomplete="off" name="tags" class="form-control tags" data-error-container="#tags_pages_error" value="<?php print $tags_pages ?>"/>
                                            <div id="tags_pages_error">
                                            </div>
                                        </div>
                                </div>
                                <input type="hidden" name="tipe" value="<?php print $tipe ?>">
                                <input type="hidden" name="id" value="<?php print $id_pages ?>">
                        </div>
                        <div class="form-actions fluid">
                                <div class="col-md-offset-2 col-md-10">
                                        <button type="submit" class="btn blue-stripe"><i class="fa fa-save"></i> <?php print $button; ?></button>
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
