<?php require ADMIN_VIEW_PATH . '/partial/header.php';  ?>


<body>



<div class="page-container">
    <div class="left-content">
        <div class="mother-grid-inner">
            <?php require ADMIN_VIEW_PATH . '/partial/header-main.php';  ?>
            <div class="inner-block">
                <h1 style="text-align: center">Quản lý danh mục</h1>
                <div style="margin: 30px 0;">
                    <a href="<?php echo ADMIN_URL.'?controller=categoryarticle&action=submit' ?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới danh mục</a>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên</th>
                        <th>Parent ID</th>
                        <th>Parent</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    if ($categories) :

                        ?>
                        <?php foreach ($categories as $category) :
                            $parent_id = (int) $category['parent_id'];
                            if (isset($parents[$parent_id])) {
                                $parent = $parents[$parent_id];
                            } else {
                                $parent = null;
                            }

                        ?>
                            <tr>
                                <td><?php echo $category['id'] ?></td>
                                <td><?php echo str_repeat('-', $category['level']) . $category['category_name'] ?></td>
                                <td><?php echo $category['parent_id'] ?></td>

                                <td><?php echo $parent['category_name'] ?></td>
                                <td><?php echo $category['level'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="<?php echo ADMIN_URL.'?controller=categoryarticle&action=edit&id='.$category['id'] ?>"> <i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
                                    <a class="btn btn-danger remove" href="<?php echo ADMIN_URL.'?controller=categoryarticle&action=delete&id='.$category['id'] ?>"> <i class="fa fa-ban" aria-hidden="true"></i> Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <?php require ADMIN_VIEW_PATH . '/partial/sidebar.php';  ?>

</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("a.remove").on('click', function (e) {
            e.preventDefault();

            var r = confirm("Bạn có chắc chắn muốn xóa bản ghi này không ?");
            if (r == true) {
                var target = $(this).attr('href');
                console.log(target);
                window.location.href = target;
            } else {

            }
        });
    });

</script>
<!--slide bar menu end here-->
<?php require ADMIN_VIEW_PATH . '/partial/footer.php';  ?>
</body>
</html>