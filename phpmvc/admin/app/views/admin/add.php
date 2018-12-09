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

                    <form name="" action="<?php echo ADMIN_URL . 'index.php?controller=admin&action=store'; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="text" name="email" class="form-control" value="">
                            <input type="hidden" name="id" class="form-control" value="0">
                        </div>
                        <div class="form-group">
                            <label>Password :</label>
                            <input type="text" name="password" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label>Username :</label>
                            <input type="text" name="username" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện :</label>
                            <input type="file" name="avatar">
                        </div>
                        <div class="form-group">
                            <label>Tên :</label>
                            <input type="text" name="name" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ :</label>
                            <input type="text" name="address" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại :</label>
                            <input type="text" name="phone" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label>Note :</label>
                            <textarea name="note" class="form-control lara-mce" rows="10"></textarea>
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
<?php require ADMIN_VIEW_PATH.'/partial/footer.php'; ?>