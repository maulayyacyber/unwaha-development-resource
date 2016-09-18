<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-male"></i>Form Guru
                                </div>
                                <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="javascript:;" class="remove"></a>
                                </div>
                        </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form id="<?php print $nama_form ?>" action="<?php print base_url() ?>admin/akademik/guru/simpan" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <i class="fa fa-exclamation-circle"></i> Lengkapi data-data guru sesuai form dibawah ini.
                            </div>
                                <div class="form-group">
                                        <label for="foto" class="control-label col-md-3">Foto</label>
                                        <div class="col-md-9">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="<?php print $frame_foto ?>" alt=""/>
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
                                                                        <input type="file" id="foto" autofocus="on" name="<?php print $foto ?>" value="<?php print $foto_guru_value ?>" class="default"/>
                                                                        <input type="hidden" name="foto_guru_value" value="<?php print $foto_guru_value ?>">
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
                                        <label for="nip" class="col-md-3 control-label">NIP
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" id="nip" name="nip" autocomplete="off" autofocus="on" value="<?php print $nip ?>" <?php print $readonly ?> class="form-control" placeholder="NIP">
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="nama" class="col-md-3 control-label">Nama
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" id="nama" name="nama" autocomplete="off" autofocus="on" value="<?php print $nama ?>" class="form-control" placeholder="Nama Guru">
                                        </div>
                                </div>
                                <div class="form-group last password-strength">
                                        <label for="password" class="col-md-3 control-label">Password
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                             <input type="password" id="password" name="password" autocomplete="off" class="form-control" placeholder="Password">
                                             <?php print $help_pass; ?>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="re_password" class="col-md-3 control-label">Konfirmasi Password
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                             <input type="password" id="re_password" name="re_password" autocomplete="off" class="form-control" placeholder="Konfirmasi Password">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="jenis_kelamin" class="col-md-3 control-label">Jenis Kelamin
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                          <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                          <option value="" selected="selected">- - Pilih Jenis Kelamin - -</option>
                                             <option value="laki-Laki">Laki - Laki</option>
                                             <option value="Perempuan">Perempuan</option>
                                          </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="tempat_tanggal_lahir" class="col-md-3 control-label">Tempat Tanggal Lahir
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" autocomplete="off" value="<?php print $tempat_tanggal_lahir ?>" class="form-control" placeholder="Tempat Tanggal Lahir">
                                        </div>
                                </div>
                                <div class="form-group last password-strength">
                                        <label for="alamat" class="col-md-3 control-label">Alamat
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                             <textarea id="alamat" name="alamat" rows="6" autocomplete="off" value="<?php print $alamat ?>" class="form-control" placeholder="Alamat"><?php print $alamat ?></textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="jabatan" class="col-md-3 control-label">Jabatan
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                             <input type="text" id="jabatan" name="jabatan" autocomplete="off" value="<?php print $jabatan?>"  class="form-control" placeholder="Jabatan">
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="email" class="col-md-3 control-label">Email
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                             <input type="text" id="email" name="email" autocomplete="off" value="<?php print $email?>"  class="form-control" placeholder="Email">
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="no_telp" class="col-md-3 control-label">No Telephone
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                             <input type="text" id="no_telp" name="no_telp" autocomplete="off" value="<?php print $no_telp?>"  class="form-control" placeholder="No Telephone">
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="agama" class="col-md-3 control-label">Agama
                                        <span class="required">
                                                *
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                          <select class="form-control" name="agama" id="agama">
                                          <option value="" selected="selected">- - Pilih Agama - -</option>
                                             <option value="Islam">Islam</option>
                                             <option value="Kristen">Kristen</option>
                                             <option value="Hindu">Hindu</option>
                                             <option value="Budha">Budha</option>
                                          </select>
                                        </div>
                                </div>
                                <input type="hidden" name="tipe" value="<?php print $tipe ?>">
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
