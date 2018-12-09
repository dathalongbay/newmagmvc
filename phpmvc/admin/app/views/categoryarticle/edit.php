<?php require ADMIN_VIEW_PATH . '/partial/header.php';  ?>
<body>

<div class="page-container">
    <div class="left-content">
        <div class="mother-grid-inner">
            <?php require ADMIN_VIEW_PATH . '/partial/header-main.php';  ?>
            <div class="inner-block">
                <h1>Sửa danh mục</h1>

                <form name="article" method="post" action="<?php echo ADMIN_URL . '?controller=categoryarticle&action=store'?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $category['id'] ?>">
                    <div class="form-group">
                        <label for="title">Tiêu đề:</label>
                        <input type="text" name="category_name" value="<?php echo $category['category_name'] ?>" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="name">Chọn danh mục cha:</label>
                        <select name="parent_id">
                            <?php $selected = (0 == $category['parent_id']) ? 'selected' : '' ?>
                            <option value="0" <?php echo $selected ?>>None</option>
                            <?php if ($categories) : ?>
                                <?php foreach($categories as $cat) : ?>
                                    <?php $selected = ($cat['id'] == $category['parent_id']) ? 'selected' : '' ?>
                                    <option value="<?php echo $cat['id'] ?>" <?php echo $selected ?>>
                                        <?php echo str_repeat('-',$cat['level']) . $cat['category_name'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="content">Nội dung ngắn:</label>
                        <p>
                            <textarea name="category_intro" class="lara-mce" style="width: 80%"><?php echo $category['category_intro'] ?></textarea>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="content">Nội dung:</label>
                        <p>
                            <textarea name="category_desc" class="lara-mce" style="width: 80%"><?php echo $category['category_desc'] ?></textarea>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="content">Thời gian tạo:</label>
                        <p>
                            <input type="text" name="created" value="<?php echo $category['created'] ?>" class="form-control datetime" id="created">
                        </p>
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <?php require ADMIN_VIEW_PATH . '/partial/sidebar.php';  ?>

</div>

<script type="text/javascript">
    $(document).ready(function() {

        var editor_config = {
            path_absolute : "/",
            selector: "textarea.lara-mce",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    });
</script>

<!--slide bar menu end here-->
<?php require ADMIN_VIEW_PATH . '/partial/footer.php';  ?>
</body>
</html>

<?php
echo '<pre>';
print_r($category);
echo '</pre>';
?>