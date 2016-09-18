</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
<div class="footer-inner">
 <?php print $_SESSION['admin_footer'] ?> Developed By PONDOK KODE
</div>
<div class="footer-tools">
<span class="go-top">
  <i class="fa fa-angle-up"></i>
</span>
</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script>
<![endif]-->

<script src="<?php print base_url()?>assets/admin/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script type="text/javascript" src="<?php print base_url(); ?>assets/admin/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/admin/plugins/jquery-validation/dist/additional-methods.min.js"></script>
<script src="<?php print base_url()?>assets/admin/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php print base_url(); ?>assets/admin/plugins/jquery.pwstrength.bootstrap/src/pwstrength.js" type="text/javascript"></script>
<script src="<?php print base_url()?>assets/admin/plugins/pace/pace.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script src="<?php print base_url(); ?>assets/admin/plugins/bootstrap-toastr/toastr.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/admin/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php print base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<!-- END CORE PLUGINS -->
<?php print $data_js; ?>
<script src="<?php print base_url()?>assets/admin/scripts/core/app.js"></script>
<script src="<?php print base_url()?>assets/admin/scripts/fungsi.js"></script>
<script src="<?php print base_url()?>assets/admin/scripts/form-components.js"></script>
<script src="<?php print base_url()?>assets/admin/scripts/form-validation.js"></script>
<!--<script src="<?php print base_url()?>assets/admin/scripts/idle-timeout.js"></script>-->
<script>
jQuery(document).ready(function() {
   <?php print $this->session->flashdata("pesan_notif"); ?>
   App.init();
   FormValidation.init();
   //IdleTimeout.init();
   window.base_url = <?php echo json_encode(base_url()); ?>;
   <?php print $js_ready; ?>
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
