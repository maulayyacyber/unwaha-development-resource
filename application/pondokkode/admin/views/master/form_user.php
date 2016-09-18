<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-user"></i>Form User
                                </div>
                                <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="javascript:;" class="remove"></a>
                                </div>
                        </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form id="<?php print $nama_form; ?>" action="<?php print base_url() ?>admin/master/user/simpan" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <i class="fa fa-exclamation-circle"></i> Lengkapi data-data user sesuai form dibawah ini.
                            </div>
                                <div class="form-group">
                                        <label for="foto_user" class="control-label col-md-3">Foto</label>
                                        <div class="col-md-9">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="<?php print $frame_foto_user ?>" alt=""/>
                                                        </div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                                        </div>
                                                        <div>
                                                                <span class="btn default btn-file">
                                                                        <span class="fileupload-new">
                                                                                <i class="fa fa-paper-clip"></i> Pilih foto
                                                                        </span>
                                                                        <span class="fileupload-exists">
                                                                                <i class="fa fa-undo"></i> Ganti
                                                                        </span>
                                                                        <input type="file" id="foto_user" autofocus="on" name="<?php print $foto_user ?>" value="<?php print $foto_user_value ?>" class="default"/>
                                                                        <input type="hidden" name="foto_user_value" value="<?php print $foto_user_value ?>">
                                                                </span>
                                                                <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                                        </div>
                                                </div>
                                                <span class="label label-danger">
                                                        NOTE!
                                                </span>
                                                <span>
                                                         Lampiran gambar thumbnail didukung Firefox, Chrome, Opera, Safari dan hanya Internet Explorer 10
                                                </span>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="nama_user" class="col-md-3 control-label">Nama
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" id="nama_user" name="nama_user" autocomplete="off" autofocus="on" value="<?php print $nama_user ?>" class="form-control" placeholder="Nama User">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="email_user" class="col-md-3 control-label">Email
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                             <input type="email" id="email_user" name="email_user" autocomplete="off" value="<?php print $email_user ?>" class="form-control" placeholder="Email Yang Aktif">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="user_name" class="col-md-3 control-label">Username
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" id="user_name" name="user_name" autocomplete="off" value="<?php print $user_name ?>" class="form-control" placeholder="Username">
                                        </div>
                                </div>
                                <div class="form-group last password-strength">
                                        <label for="pass_user" class="col-md-3 control-label">Password
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                             <input type="password" id="pass_user" name="pass_user" autocomplete="off" class="form-control" placeholder="Password">
                                             <?php print $help_pass; ?>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="re_pass_user" class="col-md-3 control-label">Konfirmasi Password
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                             <input type="password" id="re_pass_user" name="re_pass_user" autocomplete="off" class="form-control" placeholder="Konfirmasi Password">
                                        </div>
                                </div>
                                <input type="hidden" name="tipe" value="<?php print $tipe ?>">
                                <input type="hidden" name="id" value="<?php print $id ?>">
                        </div>
                        <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn blue-stripe"><i class="fa fa-save"></i> <?php print $valu_submit ?></button>
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
