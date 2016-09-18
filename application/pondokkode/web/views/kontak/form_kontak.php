
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <ul class="pull-left breadcrumb">
                <li><a href="<?php print base_url()?>">Home</a></li>
                <li class="active">Kontak</li>
            </ul>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!-- Google Map -->
    <div id="map" class="map">
    </div><!---/map-->
    <!-- End Google Map -->

    <!--=== Content Part ===-->
    <div class="container content">
    	<div class="row margin-bottom-30">
    		<div class="col-md-9 mb-margin-bottom-30">
          <div class="headline"><h2><i class="fa fa-commenting-o"></i>Form Kirim Pesan</h2></div>
    			<form action="<?php print base_url() ?>web/kirim_pesan" method="post" id="sky-form3" class="sky-form contact-style">
                    <fieldset class="no-padding">

                        <label>Name <span class="color-red">*</span></label>
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            <input type="text" name="name" placeholder="Masukan nama Anda">
                        </label>

                        <label>Email <span class="color-red">*</span></label>
                        <label class="input">
                            <i class="icon-append fa fa-envelope"></i>
                            <input type="text" name="email" placeholder="Masukan email Anda">
                        </label>

                        <label>Message <span class="color-red">*</span></label>
                        <label class="textarea">
                            <i class="icon-append fa fa-comment"></i>
                            <textarea rows="3" name="message" placeholder="Masukan pesan Anda"></textarea>
                        </label>
                        <br>
                            <button type="submit" class="btn-u">Kirim Pesan <i class="fa  fa-paper-plane"></i></button>
                            <button type="button" class="btn-u" onclick="window.history.back();">Back <i class="icon-arrow-left"></i></button>

                    </fieldset>
                </form>
            </div><!--/col-md-9-->

    		<div class="col-md-3">
            	<!-- Contacts -->
                <div class="headline"><h2><i class="fa fa-comments-o"></i> Contacts</h2></div>
                <ul class="list-unstyled latest-list">
                  <i class="fa fa-map-marker"></i> Alamat : <?php print $_SESSION['alamat'] ?> <br>
                  <div class="headline headline-md"></div>
                  <i class="fa fa-phone"></i> Telephone : <?php print $_SESSION['telp'] ?> <br>
                  <div class="headline headline-md"></div>
                  <i class="fa fa-envelope"></i> Email : <?php print $_SESSION['email'] ?> <br>
                </ul>
            </div><!--/col-md-3-->
        </div><!--/row-->

    </div><!--/container-->
    <!--=== End Content Part ===-->
