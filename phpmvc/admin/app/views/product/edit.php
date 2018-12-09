<?php require ADMIN_VIEW_PATH.'/partial/header.php'; ?>


    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">

                <?php require ADMIN_VIEW_PATH.'/partial/header-main.php'; ?>
                <!--inner block start here-->
                <div class="inner-block">

                    <div style="margin-bottom: 30px;">
                        <a class="btn btn-success" href="<?php echo ADMIN_URL . 'index.php?controller=product'; ?>">Sản phẩm</a>
                    </div>

                    <?php if (isset($_SESSION['store_record']) && $_SESSION['store_record'] == 1) : ?>
                        <div class="alert alert-success">
                            Đã lưu sản phẩm thành công
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['store_record']) && $_SESSION['store_record'] == 0) : ?>
                        <div class="alert alert-danger">
                            Không lưu được thông tin
                        </div>
                    <?php endif; ?>
                    <?php unset($_SESSION['store_record']); ?>

                    <form name="product" action="<?php echo ADMIN_URL . 'index.php?controller=product&action=store'; ?>" method="post">
                        <div class="form-group">
                            <label>Tên sản phẩm:</label>
                            <input type="text" name="product_name" class="form-control" value="<?php echo $row['product_name'] ?>">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $row['id'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Slug:</label>
                            <input type="text" name="product_slug" class="form-control" value="<?php echo $row['product_slug'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Giá gốc:</label>
                            <input type="text" name="product_price" class="form-control" value="<?php echo $row['product_price'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Giá bán:</label>
                            <input type="text" name="product_price_sell" class="form-control" value="<?php echo $row['product_price_sell'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Nội dung:</label>
                            <textarea name="product_desc" class="form-control" rows="10"><?php echo $row['product_desc'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <select name="status" class="form-control">
                                <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : '' ?>>Không xuất bản</option>
                                <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : '' ?>>Xuất bản</option>
                            </select>
                        </div>
                        <button type="submit" id="save" class="btn btn-success">Lưu lại</button>
                        <button type="submit" id="saveandexit" class="btn btn-success">Lưu và thoát</button>

                        <input type="hidden" name="save" value="0">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#save').on('click', function(e) {
                e.preventDefault();
                $('input[name="save"]').val(0);

                $('form[name="product"]').submit();

            });
            $('#saveandexit').on('click', function(e) {
                e.preventDefault();
                $('input[name="save"]').val(1);
                $('form[name="product"]').submit();
            });
        });
    </script>

<?php require ADMIN_VIEW_PATH.'/partial/footer.php'; ?>