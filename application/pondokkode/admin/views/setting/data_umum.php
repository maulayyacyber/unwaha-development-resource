<!-- BEGIN PAGE CONTENT-->
<div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-globe"></i>Pengaturan Umum
                                </div>
                                <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="javascript:;" class="remove"></a>
                                </div>
                        </div>
                        <div class="portlet-body">
                                <div class="tabbable-custom ">
                                        <ul class="nav nav-tabs ">
                                                <li class="active">
                                                        <a href="#tab_umum" data-toggle="tab"><i class="fa fa-globe"></i> Umum</a>
                                                </li>
                                                <li>
                                                        <a href="#tab_email" data-toggle="tab"><i class="fa fa-envelope"></i> Email</a>
                                                </li>
                                                <li>
                                                        <a href="#tab_logo" data-toggle="tab"><i class="icon-picture"></i> Header</a>
                                                </li>
                                        </ul>
                                        <div class="tab-content">
                                                <div class="tab-pane active" id="tab_umum">
                                                        <div class="table-responsive">
                                                            <form method="POST" action="<?php print base_url() ?>admin/setting/umum/simpan" id="form_umum" class="form-horizontal form-bordered">
                                                                <?php print $data_umum; ?>
                                                                <div class="form-actions fluid">
                                                                        <div class="col-md-offset-1 col-md-9">
                                                                                <button type="submit" class="btn blue-stripe"><i class="fa fa-save"></i> Simpan</button>
                                                                                <button type="button" class="btn blue-stripe" onclick="javascript:goBack()"><i class="fa fa-arrow-left"></i>  Kembali</button>
                                                                        </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                </div>
                                                <div class="tab-pane" id="tab_email">
                                                        <div class="portlet-body">
                                                                <div class="panel-group accordion" id="accordion1">
                                                                        <div class="panel panel-default">
                                                                                <div class="panel-heading">
                                                                                        <h4 class="panel-title">
                                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
                                                                                        Konfigurasi Email Yahoo </a>
                                                                                        </h4>
                                                                                </div>
                                                                                <div id="collapse_1" class="panel-collapse collapse">
                                                                                        <div class="panel-body">
                                                                                                <p>
                                                                                                <div class="note note-danger">
                                                                                                        <h4 class="block">Yahoo! Mail</h4>
                                                                                                        <table class="table table-bordered table-striped">
                                                                                                            <thead>
                                                                                                            <tr>
                                                                                                                    <th>
                                                                                                                            Parameter
                                                                                                                    </th>
                                                                                                                    <th>
                                                                                                                            Nilai Parameter
                                                                                                                    </th>
                                                                                                            </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                            <tr>
                                                                                                                    <td>
                                                                                                                             Protocol
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <i>smtp</i>
                                                                                                                    </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                    <td>
                                                                                                                             SMTP Host
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <i>ssl://smtp.mail.yahoo.com</i>
                                                                                                                    </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                    <td>
                                                                                                                             SMTP User
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <i>Email Anda</i>
                                                                                                                    </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                    <td>
                                                                                                                             SMTP Password
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <i>Password Email Anda</i>
                                                                                                                    </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                    <td>
                                                                                                                             SMTP Port
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <i>465</i>
                                                                                                                    </td>
                                                                                                            </tr>
                                                                                                            </tbody>
                                                                                                            </table>
                                                                                                </div>
                                                                                                </p>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="panel panel-default">
                                                                                <div class="panel-heading">
                                                                                        <h4 class="panel-title">
                                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2">
                                                                                        Konfigurasi Email Google </a>
                                                                                        </h4>
                                                                                </div>
                                                                                <div id="collapse_2" class="panel-collapse collapse">
                                                                                        <div class="panel-body">
                                                                                            <p>
                                                                                                <div class="note note-success">
                                                                                                        <h4 class="block">Google Mail</h4>
                                                                                                        <table class="table table-bordered table-striped">
                                                                                                            <thead>
                                                                                                            <tr>
                                                                                                                    <th>
                                                                                                                            Parameter
                                                                                                                    </th>
                                                                                                                    <th>
                                                                                                                            Nilai Parameter
                                                                                                                    </th>
                                                                                                            </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                            <tr>
                                                                                                                    <td>
                                                                                                                             Protocol
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <i>smtp</i>
                                                                                                                    </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                    <td>
                                                                                                                             SMTP Host
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <i>ssl://smtp.googlemail.com</i> or <i>ssl://smtp.gmail.com</i>
                                                                                                                    </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                    <td>
                                                                                                                             SMTP User
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <i>Email Anda</i>
                                                                                                                    </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                    <td>
                                                                                                                             SMTP Password
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <i>Password Email Anda</i>
                                                                                                                    </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                    <td>
                                                                                                                             SMTP Port
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <i>465</i>
                                                                                                                    </td>
                                                                                                            </tr>
                                                                                                            </tbody>
                                                                                                            </table>
                                                                                                </div>
                                                                                            </p>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div><br/>
                                                        <div class="table-responsive">
                                                            <form method="POST" action="<?php print base_url() ?>admin/setting/umum/simpan_email" class="form-horizontal form-bordered">
                                                                <?php print $data_email; ?>
                                                                <div class="form-actions fluid">
                                                                        <div class="col-md-offset-1 col-md-9">
                                                                                <button type="submit" class="btn blue-stripe"><i class="fa fa-save"></i> Simpan</button>
                                                                                <button type="button" class="btn blue-stripe" onclick="javascript:goBack()"><i class="fa fa-arrow-left"></i>  Kembali</button>
                                                                        </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                </div>
                                                <div class="tab-pane" id="tab_logo">
                                                        <div class="table-responsive">
                                                          <div class="portlet box blue">
                                                                          <div class="portlet-title">
                                                                                  <div class="caption">
                                                                                          <i class="icon-picture"></i> Form Logo
                                                                                  </div>
                                                                                  <div class="tools">
                                                                                          <a href="javascript:;" class="collapse"></a>
                                                                                          <a href="javascript:;" class="remove"></a>
                                                                                  </div>
                                                                          </div>
                                                          <div class="portlet-body">
                                                          <div class="alert alert-info text-center">
                                                          Ukuran Logo harus <strong>230X50</strong> pixels.
                                                          </div>
                                                            <form method="POST" action="<?php print base_url() ?>admin/setting/umum/upload" id="form_banner" enctype="multipart/form-data" class="form-horizontal form-bordered">
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
                                                                                                              <input type="hidden" name="id_setting" value="14">
                                                                                                          </span>
                                                                                                          <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                                                                                  </div>
                                                                                          </div>
                                                                                  </div>
                                                                          </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                                  <div class="portlet box blue">
                                                                                  <div class="portlet-title">
                                                                                          <div class="caption">
                                                                                                  <i class="icon-picture"></i>Gambar Logo
                                                                                          </div>
                                                                                          <div class="tools">
                                                                                                  <a href="javascript:;" class="collapse"></a>
                                                                                                  <a href="javascript:;" class="remove"></a>
                                                                                          </div>
                                                                                  </div>
                                                                                  <div class="portlet-body">
                                                                                      <!-- BEGIN FORM-->
                                                                                                  <div class="table-responsive">
                                                                                                   <?php  print $data_logo;?>
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
                                                                            <div class="form-actions fluid">
                                                                        <div class="col-md-offset-1 col-md-9">
                                                                                <button type="submit" class="btn blue-stripe"><i class="fa fa-save"></i> Simpan</button>
                                                                                <button type="button" class="btn blue-stripe" onclick="javascript:goBack()"><i class="fa fa-arrow-left"></i>  Kembali</button>
                                                                        </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<!-- END PAGE CONTENT-->
