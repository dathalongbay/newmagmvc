<!--slider menu-->
<div class="sidebar-menu">
    <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
            <!--<img id="logo" src="" alt="Logo"/>-->
        </a> </div>
    <div class="menu">
        <ul id="menu" >
            <li id="menu-home" ><a href="<?php echo ADMIN_URL . 'index.php?controller=index&action=index'; ?>"><i class="fa fa-cogs"></i><span>Bảng điều khiển</span></a></li>
            <li id="menu-home" ><a href="<?php echo ADMIN_URL . 'index.php?controller=admin&action=index'; ?>"><i class="fa fa-cogs"></i><span>Quản trị viên</span></a></li>
            <li id="menu-home" ><a href="<?php echo ADMIN_URL . 'index.php?controller=index&action=mediamanager'; ?>"><i class="fa fa-cogs"></i><span>Đa phương tiện</span></a></li>
            <li id="menu-home" ><a href="<?php echo ADMIN_URL . 'index.php?controller=config&action=index'; ?>"><i class="fa fa-cogs"></i><span>Cấu hình</span></a></li>
            <li><a href="<?php echo ADMIN_URL . 'index.php?controller=article&action=index'; ?>"><i class="fa fa-cogs"></i><span>News</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul>
                    <li><a href="<?php echo ADMIN_URL . 'index.php?controller=categoryArticle&action=index'; ?>">Danh mục</a></li>
                    <li><a href="<?php echo ADMIN_URL . 'index.php?controller=article&action=index'; ?>">Tin tức</a></li>
                    <li><a href="<?php echo ADMIN_URL . 'index.php?controller=tagArticle&action=index'; ?>">Tag</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<div class="clearfix"> </div>