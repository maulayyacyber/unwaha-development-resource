<!--=== Call To Action ===-->
<div class="call-action-v1 bg-color-light">
    <div class="container">
        <div class="call-action-v1-box">
        </div>
    </div>
</div>
<!--=== End Call To Action ===-->
<!--=== Footer v1 ===-->
<div id="footer-v1" class="footer-v1">
    <div class="footer">
        <div class="container">
            <div class="row">
                <!-- About -->
                <div class="col-md-3 md-margin-bottom-40">
                    <div class="headline"><h2><i class="fa fa-user"></i> About FTI UNWAHA</h2></div>
                    <p><?php print $_SESSION['about'] ?></p>
                </div>
                <!-- End About -->

                <!-- Link List -->
                <div class="col-md-3 md-margin-bottom-40">
                    <div class="headline"><h2><i class="fa fa-clone"></i> Other Pages</h2></div>
                    <ul class="list-unstyled link-list">
                        <li><a href="<?php print base_url() ?>about-us/">About Us</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="<?php print base_url() ?>disclaimer/">Disclaimer</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="<?php print base_url() ?>privacy-policy/">Privacy Policy</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="<?php print base_url() ?>terms-of-service/">Terms Of Service </a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
                <!-- End Link List -->
                <!-- Latest -->
                <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2><i class="fa fa-bar-chart-o"></i> Statistic Visitor</h2></div>
                              <h6 style="color:#fff"><i class="fa fa-globe"></i> Browser : <strong><?php print $this->agent->browser(); print $this->agent->version(); ?></strong></h6>
                              <div class="headline headline-md"></div>
                              <h6 style="color:#fff"><i class="fa fa-windows"></i> OS : <strong><?php print $this->agent->platform(); ?></strong></h6>
                              <div class="headline headline-md"></div>
                              <h6 style="color:#fff"><i class="fa fa-server"></i>Server process time: <strong>{elapsed_time}</strong> secs.
                </div>
                <!-- End Latest -->

                <!-- Address -->
                <div class="col-md-3 map-img md-margin-bottom-40">
                    <div class="headline"><h2><i class="fa fa-comments-o"></i> Contact Us</h2></div>
                      <h6 style="color:#fff"><i class="fa fa-map-marker"></i> Alamat : <?php print $_SESSION['alamat'] ?> </h6>
                      <div class="headline headline-md"></div>
                      <h6 style="color:#fff"><i class="fa fa-phone"></i> Telephone : <?php print $_SESSION['telp'] ?> </h6>
                      <div class="headline headline-md"></div>
                      <h6 style="color:#fff"><i class="fa fa-envelope"></i> Email : <?php print $_SESSION['email'] ?> </h6>
                </div>
                <!-- End Address -->
            </div>
        </div>
    </div><!--/footer-->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        <?php echo $_SESSION['web_footer']; ?>
                    </p>
                </div>

                <!-- Social Links -->
                <div class="col-md-6">
                    <ul class="footer-socials list-inline">
                        <li>
                            <a href="<?php print $_SESSION['facebook'] ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
                                <i class="fa fa-skype"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php print $_SESSION['google+'] ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
                                <i class="fa fa-pinterest"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php print $_SESSION['twitter'] ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble">
                                <i class="fa fa-dribbble"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Social Links -->
            </div>
        </div>
    </div><!--/copyright-->
</div>
<!--=== End Footer v1 ===-->
</div><!--/wrapper-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/back-to-top.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/smoothScroll.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/counter/waypoints.min.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/counter/jquery.counterup.min.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/jquery.parallax.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/gmap/gmap.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/plugins/modernizr.js"></script>
<!-- plugin core js -->
<script src="<?php print base_url(); ?>assets/admin/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="<?php print base_url()?>assets/web/plugins/master-slider/masterslider/masterslider.min.js"></script>
<script src="<?php print base_url()?>assets/web/plugins/master-slider/masterslider/jquery.easing.min.js"></script>
<script src="<?php print base_url()?>assets/web/plugins/login-signup-modal-window/js/main.js"></script>
<!-- JS Customization -->
 <script type="text/javascript" src="<?php print base_url()?>assets/web/js/custom.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="<?php print base_url()?>assets/web/js/jquery.highlight.js?ver=2.0.8"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/js/app.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/js/plugins/fancy-box.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/js/forms/contact.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/js/pages/page_contacts.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/js/plugins/cube-portfolio/cube-portfolio-4.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/js/plugins/style-switcher.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/js/plugins/master-slider-fw.js"></script>
<script type="text/javascript" src="<?php print base_url()?>assets/web/js/plugins/datepicker.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    App.init();
    App.initScrollBar();
    ContactPage.initMap();
    FancyBox.initFancybox();
    Datepicker.initDatepicker();
    MSfullWidth.initMSfullWidth();
    ContactForm.initContactForm();
    StyleSwitcher.initStyleSwitcher();
    <?php print $this->session->flashdata("pesan_notif"); ?>
    NProgress.done();
	$('pre.code').highlight({source:1, zebra:1, indent:'space', list:'ol',attribute: 'data-language'});
});
</script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582ECSaLdwqSpnsPGESm8w27tWu3GRMA%2buxPWfT2OZB3ylSyYyXwezvTsa8QXq6J3WCua5VTujUDf33oFa5bNesCrKvRV%2fd5viqfFIDQdu9UPpsNyBgSiM8jwQfnTFiR1bT2k6w1C9QqPF49u%2fg%2fcF7mholZZcK7X9ET8Goz7VvUxaPPDF7Iz4rPcz2Y4UbHovloi6CDBINdILyFeAtF1dIGf9rj4vVfgET98V4Egh5FSvogLF2lBNHJw7bh%2fWVnkWjQZ8ZWN%2f9ehHb5kay2b9jREIEEoQaR4npFKIH8KuIc1Gkgd92k33gQVskIocGWObxyCVYUQQ8xLPTy4CcubyKXbEezu2HEXL%2f%2bewNFv8Ah2tfHHEcxUD%2b4MvFE4FvllKalYNnD7O52%2bJ4VQJU8MdSQ1HLhjE8kgR44lrbrtOCQ7AVJjlDcHIxPXeVuA%2bUbzds9Wb0mRn2Axa1Q2S6OI1QP%2fgH7oNIcMz9unvd9bIGTGH0Dy7e59mKS0T1lYKJLIaIby805Z4r4lz" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>
<script>
</script>
