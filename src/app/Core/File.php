<?php 

namespace App\Core;

class File {

    private $file;
    private $_SIZE = 1000000;
    private $target_dir;
    private $target_file;
    private $imageFileType;

    public function __construct($FILE){
        $this->file = $FILE;
        $this->target_dir = "uploads/";
        $this->target_file = $this->target_dir . basename($FILE["name"]);
        $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
    }

    public function getFileUrl(){
        return $this->target_file;
    }

    public function upload(){
        $isExit = $this->isExist();
        $chkFile = $this->checkFileSize($this->_SIZE);
        $chkType = $this->checkFileType();
        $isImage = $this->isImage();

        // Check if $uploadOk is set to 0 by an error
        if (!$isExit || !$chkFile || !$chkType || !$isImage) {
            echo "Sorry, your file was not uploaded.";
            //if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($this->file["tmp_name"], $this->target_file)) {
                echo "The file ". htmlspecialchars( basename( $this->file["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function isExist(){
        if (file_exists($this->target_file)) {
            echo "Sorry, file already exists.";
            return false;
        }
        return true;
    }

    public function isImage(){
        $imageFileType  = $this->imageFileType;
        if($imageFileType == "png" || $imageFileType == "jpg" || $imageFileType == "jpeg") {
            $check = getimagesize($this->file["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                return true;
            } else {
                echo "File is not an image.";
                return false;
            }
        }
        return true;
    }

    public function checkFileSize($size){
        if ($this->file["size"] > $size) {
            echo "Sorry, your file is too large.";
            return false;
        }
        return true;
    }

    public function checkFileType(){
        $imageFileType = $this->imageFileType;
        if($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            return false;
        }
        return true;
    }   
}