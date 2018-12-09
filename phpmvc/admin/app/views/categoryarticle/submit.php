<?php require ADMIN_VIEW_PATH . '/partial/header.php';  ?>
<body>
<div class="page-container">
    <div class="left-content">
        <div class="mother-grid-inner">
            <?php require ADMIN_VIEW_PATH . '/partial/header-main.php';  ?>
            <div class="inner-block">
                <h1>Thêm mới danh mục</h1>

                <form name="category" method="post" action="<?php echo ADMIN_URL . '?controller=categoryarticle&action=store'?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên danh mục:</label>
                        <input type="text" name="category_name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Chọn danh mục cha:</label>
                        <select name="parent_id">
                            <option value="0">None</option>
                            <?php if ($categories) : ?>
                                <?php foreach($categories as $cat) : ?>
                                <option value="<?php echo $cat['id'] ?>"><?php echo str_repeat('-',$cat['level']) . $cat['category_name'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung ngắn:</label>
                        <p>
                            <textarea name="category_intro" class="lara-mce" style="width: 80%"></textarea>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung:</label>
                        <p>
                            <textarea name="category_desc" class="lara-mce" style="width: 80%"></textarea>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="content">Thời gian tạo:</label>
                        <p>
                            <input type="text" name="created" value="" class="form-control datetime" id="created">
                        </p>
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <?php require ADMIN_VIEW_PATH . '/partial/sidebar.php';  ?>

    <script type="text/javascript">
        $(document).ready(function() {

            function elFinderBrowser (callback, value, meta) {
                tinymce.activeEditor.windowManager.open({
                    file: 'http://localhost/PHPMVCBYME-master_lastest/PHPMVCBYME-master_lastest/phpmvc/admin/index.php?controller=index&action=media',// use an absolute path!
                    title: 'elFinder 2.1',
                    width: 900,
                    height: 450,
                    resizable: 'yes'
                }, {
                    oninsert: function (file, fm) {
                        var url, reg, info;

                        // URL normalization
                        url = fm.convAbsUrl(file.url);

                        // Make file info
                        info = file.name + ' (' + fm.formatSize(file.size) + ')';

                        // Provide file and text for the link dialog
                        if (meta.filetype == 'file') {
                            callback(url, {text: info, title: info});
                        }

                        // Provide image and alt text for the image dialog
                        if (meta.filetype == 'image') {
                            callback(url, {alt: info});
                        }

                        // Provide alternative source and posted for the media dialog
                        if (meta.filetype == 'media') {
                            callback(url);
                        }
                    }
                });
                return false;
            }

            var editor_config = {
                path_absolute : "http://localhost/PHPMVCBYME-master_lastest/PHPMVCBYME-master_lastest/phpmvc/admin/",
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

                    var cmsURL = editor_config.path_absolute + 'index.php?controller=index&action=media&field_name=' + field_name;
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
                },
                file_picker_callback : elFinderBrowser
            };

            tinymce.init(editor_config);
        });
    </script>
</div>
<!--slide bar menu end here-->
<?php require ADMIN_VIEW_PATH . '/partial/footer.php';  ?>
</body>
</html>