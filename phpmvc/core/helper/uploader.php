<?php
class Uploader {

    public $target_dir;

    public $statusUpload;

    public $message;

    public $max_size = 500000;

    public $target_file_name = '';


    public function __construct()
    {
        $this->target_dir = SITE_PATH . '/uploads/';
    }


    public function multiUpload() {


    }


    public function upload($file_name) {

        $this->target_file_name = uniqid() . '_' . basename($_FILES[$file_name]["name"]);
        $target_file = $this->target_dir . $this->target_file_name;
        $this->statusUpload = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES[$file_name]["tmp_name"]);
        if($check === false) {
            $this->message = "File is not an image.";
            $this->statusUpload = 0;
            return array('status' => $this->statusUpload, 'message' => $this->message);
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $this->message = "Sorry, file already exists.";
            $this->statusUpload = 0;
            return array('status' => $this->statusUpload, 'message' => $this->message);
        }

        // Check file size
        if ($_FILES[$file_name]["size"] > $this->max_size) {
            $this->message = "Sorry, your file is too large.";
            $this->statusUpload = 0;
            return array('status' => $this->statusUpload, 'message' => $this->message);
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $this->message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $this->statusUpload = 0;
            return array('status' => $this->statusUpload, 'message' => $this->message);
        }

        // Check if $statusUpload is set to 0 by an error
        if ($this->statusUpload == 1) {
            if (move_uploaded_file($_FILES[$file_name]["tmp_name"], $target_file)) {
                $this->message = "The file ". basename( $_FILES[$file_name]["name"]). " has been uploaded.";
                return array('status' => $this->statusUpload, 'message' => $this->message, 'new_file' => $this->target_file_name);

            } else {
                $this->message = "Sorry, there was an error uploading your file.";
            }
        }

        return array('status' => $this->statusUpload, 'message' => $this->message);
    }


}