<?php require ADMIN_VIEW_PATH.'/partial/header.php'; ?>


    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">

                <?php require ADMIN_VIEW_PATH.'/partial/header-main.php'; ?>
                <!--inner block start here-->

                <div class="inner-block">

                    <h1 style="text-align: center">Quản lý tin tức</h1>

                    <div style="margin: 30px 0;">
                        <a class="btn btn-success" href="<?php echo ADMIN_URL . 'index.php?controller=article&action=add'; ?>">Thêm bài viết</a>
                    </div>

                    <?php if (isset($_SESSION['store_record']) && $_SESSION['store_record'] == 1) : ?>
                        <div class="alert alert-success">
                            Đã lưu bài viết thành công
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['store_record']) && $_SESSION['store_record'] == 0) : ?>
                        <div class="alert alert-danger">
                            Không lưu được thông tin
                        </div>
                    <?php endif; ?>
                    <?php unset($_SESSION['store_record']); ?>

                    <table class="table table-striped">
                        <thead>
                            <td>Id</td>
                            <td>Tiêu đề</td>
                            <td>Thời gian tạo</td>
                            <td>Hành động</td>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($rows as $post) {
                                    ?>
                                    <tr>
                                        <td><?php echo $post['post_id'] ?></td>
                                        <td><?php echo $post['post_title'] ?></td>
                                        <td><?php echo $post['post_created'] ?></td>
                                        <td> <a href="<?php echo ADMIN_URL . 'index.php?controller=article&action=edit&id='.$post['post_id']; ?>" class="btn btn-warning">SỬA</a>
                                        <a href="<?php echo ADMIN_URL . 'index.php?controller=article&action=delete&id='.$post['post_id']; ?>" class="btn btn-danger">XÓA</a> </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>

                    <?php
                    $totalItems = 1000;
                    $itemsPerPage = 50;
                    $currentPage = 8;
                    $uri = explode('?', $_SERVER['REQUEST_URI']);
                    $urlPattern = 'index.php?'.$uri[1].'&page=(:num)';

                    $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
                    echo $paginator;
                    ?>
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