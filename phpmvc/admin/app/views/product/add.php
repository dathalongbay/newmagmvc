<?php require ADMIN_VIEW_PATH.'/partial/header.php'; ?>


    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">
                <?php require ADMIN_VIEW_PATH.'/partial/header-main.php'; ?>

                <!--inner block start here-->
                <div class="inner-block">

                    <div style="margin-bottom: 30px;">
                        <a class="btn btn-success" href="<?php echo ADMIN_URL . 'index.php?controller=article'; ?>">Sản phẩm</a>
                    </div>

                    <form name="" action="<?php echo ADMIN_URL . 'index.php?controller=product&action=store'; ?>" method="post">
                        <div class="form-group">
                            <label>Tên sản phẩm:</label>
                            <input type="text" name="product_name" class="form-control" value="">
                            <input type="hidden" name="id" class="form-control" value="0">
                        </div>

                        <div class="form-group">
                            <label>Slug:</label>
                            <input type="text" name="product_slug" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label>Giá gốc:</label>
                            <input type="text" name="product_price" class="form-control" value="0">
                        </div>

                        <div class="form-group">
                            <label>Giá bán:</label>
                            <input type="text" name="product_price_sell" class="form-control" value="0">
                        </div>

                        <div class="form-group">
                            <label>Nội dung:</label>
                            <textarea name="product_desc" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <select name="status" class="form-control">
                                <option value="0">Không xuất bản</option>
                                <option value="1">Xuất bản</option>
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