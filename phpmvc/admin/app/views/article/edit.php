<?php require ADMIN_VIEW_PATH.'/partial/header.php';
?>


    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">

                <?php require ADMIN_VIEW_PATH.'/partial/header-main.php'; ?>
                <!--inner block start here-->
                <div class="inner-block">

                    <div style="margin-bottom: 30px;">
                        <a class="btn btn-success" href="<?php echo ADMIN_URL . 'index.php?controller=article'; ?>">Bài viết</a>
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

                    <form name="article" action="<?php echo ADMIN_URL . 'index.php?controller=article&action=store'; ?>" method="post">
                        <div class="form-group">
                            <label>Tiêu đề:</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $article['post_title'] ?>">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $article['post_id'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Chọn danh mục cha:</label>
                            <select name="post_parent_id" style="padding: 10px">
                                <option value="0">Mặc định</option>
                                <?php if ($categories) : ?>
                                    <?php foreach($categories as $cat) :
                                        $selected = ($article['post_parent_id'] == $cat['_id']) ? 'selected' : '';
                                        ?>
                                        <option value="<?php echo $cat['id'] ?>" <?php echo $selected ?>><?php echo str_repeat('-',$cat['level']) . $cat['category_name'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nội dung:</label>
                            <textarea name="post_content" class="form-control lara-mce" rows="10"><?php echo $article['post_content'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <select name="post_status" class="form-control">
                                <option value="0" <?php echo ($article['post_status'] == 0) ? 'selected' : '' ?>>Không xuất bản</option>
                                <option value="1" <?php echo ($article['post_status'] == 1) ? 'selected' : '' ?>>Xuất bản</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thời gian tạo:</label>
                            <input type="text" name="post_created" class="form-control datetime" value="<?php echo $article['post_created'] ?>">
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

                $('form[name="article"]').submit();

            });
            $('#saveandexit').on('click', function(e) {
                e.preventDefault();
                $('input[name="save"]').val(1);
                $('form[name="article"]').submit();
            });

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

            $('.datetime').datetimepicker({
                format:'Y-m-d H:i:s',
            });



        });
    </script>

<?php require ADMIN_VIEW_PATH.'/partial/footer.php'; ?>