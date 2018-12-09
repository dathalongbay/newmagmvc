<?php
class Upload {
    
    public $target_dir = UPLOAD_PATH;
    
    public $upload_ok = 1;   
    
    public $max_filesize = 500000;
    

    public function __construct()
    {

    }

    public function upload($files) {

        $target_dir = $this->target_dir."/article/";
        $target_file = $target_dir . basename($files["image"]["name"]);
        $this->upload_ok = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($files["image"]["tmp_name"]);

        if($check === false) {
            $message = "File is an image - " . $check["mime"] . ".";
            $this->upload_ok = 0;
            return array('message' => $message, 'uploadOK' => 0);
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $message = "Sorry, file already exists.";
            $this->upload_ok = 0;
            return array('message' => $message, 'uploadOK' => 0);
        }

        // Check file size
        if ($files["image"]["size"] > $this->max_filesize) {
            $message = "Sorry, your file is too large.";
            $this->upload_ok = 0;
            return array('message' => $message, 'uploadOK' => 0);
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $this->upload_ok = 0;
            return array('message' => $message, 'uploadOK' => 0);
        }

        // Check if $uploadOk is set to 0 by an error
        if ($this->upload_ok == 0) {
            $message = "Sorry, your file was not uploaded.";
            return array('message' => $message, 'uploadOK' => 0);
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($files["image"]["tmp_name"], $target_file)) {
                $message = "The file ". basename( $files["image"]["name"]). " has been uploaded.";
                return array('message' => $message, 'uploadOK' => 1);
            } else {
                $message = "Sorry, there was an error uploading your file.";
                return array('message' => $message, 'uploadOK' => 0);
            }
        }

    }

}