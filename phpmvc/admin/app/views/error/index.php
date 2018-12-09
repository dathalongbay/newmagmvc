<?php require ADMIN_VIEW_PATH.'/partial/header.php'; ?>


    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">

                <?php require ADMIN_VIEW_PATH.'/partial/header-main.php'; ?>
                <!--inner block start here-->

                <div class="inner-block">

                    <div class="error-404">
                        <div class="error-page-left">
                            <img src="<?php echo ADMIN_URL_ASSETS ?>images/404.png" alt="">
                        </div>
                        <div class="error-right">
                            <h2>Oops! Page Not Open</h2>
                            <h4>Nothing Is Found Here!!</h4>
                            <a href="index.html">Go Back</a>
                        </div>
                    </div>

                </div>
                <!--inner block end here-->
                <!--copy rights start here-->
                <div class="copyrights">
                    <p>© 2016 Shoppy. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
                </div>
                <!--COPY rights end here-->
            </div>
        </div>
        <?php require ADMIN_VIEW_PATH.'/partial/sidebar.php'; ?>
    </div>

<?php require ADMIN_VIEW_PATH.'/partial/footer.php'; ?>