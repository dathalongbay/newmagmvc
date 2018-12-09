<!--header start here-->
<div class="header-main">
    <div class="header-left">
        <div class="logo-name">
            <a href="index.php"> <h1>Newmag</h1>
                <!--<img id="logo" src="" alt="Logo"/>-->
            </a>
        </div>
        <!--search-box-->
        <div class="search-box">
            <form action="<?php echo 'index.php?controller=index&action=search' ?>" method="post">
                <input type="text" name="search" placeholder="Search..." required="">
                <input type="submit" value="">
            </form>
        </div><!--//end-search-box-->
        <div class="clearfix"> </div>
    </div>
    <div class="header-right">
        <div class="profile_details_left"><!--notifications of menu start -->

            <div class="clearfix"> </div>
        </div>
        <!--notification menu end -->
        <div class="profile_details">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_img">
                            <span class="prfil-img"><img src="<?php echo URL_UPLOAD.$_SESSION["login_user"]['avatar'] ?>" width="50px" alt=""> </span>
                            <div class="user-name">
                                <p><?php echo $_SESSION["login_user"]['username']; ?></p>
                                <span>Administrator</span>
                            </div>
                            <i class="fa fa-angle-down lnr"></i>
                            <i class="fa fa-angle-up lnr"></i>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <ul class="dropdown-menu drp-mnu">
                        <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                        <li> <a href="<?php echo ADMIN_URL . 'index.php?controller=admin&action=edit&id='.$_SESSION["login_user"]['id'] ?>"><i class="fa fa-user"></i> Profile</a> </li>
                        <li> <a href="<?php echo ADMIN_URL . 'index.php?controller=login&action=logout' ?>"><i class="fa fa-sign-out"></i> Logout</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function() {
        var navoffeset=$(".header-main").offset().top;
        $(window).scroll(function(){
            var scrollpos=$(window).scrollTop();
            if(scrollpos >=navoffeset){
                $(".header-main").addClass("fixed");
            }else{
                $(".header-main").removeClass("fixed");
            }
        });

    });
</script>
<!-- /script-for sticky-nav -->
<!--inner block start here-->