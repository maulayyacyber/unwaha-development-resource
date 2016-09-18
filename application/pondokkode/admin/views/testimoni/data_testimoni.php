<!-- BEGIN PAGE CONTENT-->
<div class="row mix-grid">
    <div class="col-md-12">
        <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-comments"></i>Data Testimoni
                                </div>
                                <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="javascript:;" class="remove"></a>
                                </div>
                        </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                            <div class="table-responsive">
                             <?php  print $data_testimoni;?>
                            </div>
                            <div id="ModalDeleteTestimoni" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                                    <div class="modal-dialog">
                                            <div class="modal-content">
                                                    <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title"><i class="fa fa-info"></i> Konfirmasi Hapus</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                            <p>
                                                                Apakah Anda yakin akan menghapus testimoninya <b id="nama_testimoni"></b> ?
                                                            </p>
                                                            <input type="hidden" name="id_testimoni" id="id_testimoni">
                                                    </div>
                                                    <div class="modal-footer">
                                                            <button onclick="javascript:DeleteTestimoni($('#id_testimoni').val())" class="btn blue-stripe"><i class="fa fa-check"></i> OK</button>
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
