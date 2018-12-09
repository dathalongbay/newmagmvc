<?php require ADMIN_VIEW_PATH.'/partial/header.php'; ?>


    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">

                <?php require ADMIN_VIEW_PATH.'/partial/header-main.php'; ?>
                <!--inner block start here-->
                <div class="inner-block">

                    <div style="margin-bottom: 30px;">
                        <a class="btn btn-success" href="<?php echo ADMIN_URL . 'index.php?controller=admin'; ?>">Danh sách quản trị viên</a>
                    </div>

                    <form name="" action="<?php echo ADMIN_URL . 'index.php?controller=admin&action=store'; ?>" method="post">
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $admin['email'] ?>">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $admin['id'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Username :</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $admin['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Tên :</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $admin['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ :</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $admin['address'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại :</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $admin['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Note :</label>
                            <textarea name="note" class="form-control" rows="10"><?php echo $admin['note'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <select name="status" class="form-control">
                                <option value="0" <?php echo ($admin['status'] == 0) ? 'selected' : '' ?>>Không xuất bản</option>
                                <option value="1" <?php echo ($admin['status'] == 1) ? 'selected' : '' ?>>Xuất bản</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Lưu lại</button>
                    </form>
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