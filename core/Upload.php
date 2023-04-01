<?php

namespace App\Core;

class Upload
{

    private $file;
    private $target_directory;
    private $target_file;
    private $valid_extensions = ["jpg", "jpeg", "png", "gif"];
    private $max_file_size = 10485760; // 10MB
    private $errors = [];

    private $file_info = [];

    public function __construct($file, $target_directory = '')
    {
        $this->file = $file;
        // var_dump($this->file);
        // die;
        if (empty($target_directory)) {
            $current_month_year     = date('Y_m');
            $this->target_directory = 'uploads/' . $current_month_year . '/';
            
            if (!is_dir($this->target_directory)) {
                mkdir($this->target_directory, 0755, true);
            }
        } else {
            $this->target_directory = $target_directory;
        }

    }

    /**
     * @return bool
     */
    public function uploadFile()
    {
        $this->validateFile();

        if (!empty($this->errors)) {
            return false;
        }
    
        $file_extension = strtolower(pathinfo($this->file['name'], PATHINFO_EXTENSION));
        $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
        $new_file_path = $this->target_directory . $new_file_name;
    
        while (file_exists($new_file_path)) {
            $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
            $new_file_path = $this->target_directory . $new_file_name;
        }
    
        if (move_uploaded_file($this->file['tmp_name'], $new_file_path)) {
            $this->target_file = $new_file_path;
            return true;
        } else {
            $this->errors[] = 'Đã xảy ra lỗi khi tải tệp lên máy chủ.';
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getTargetFile()
    {
        return $this->target_file;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return void
     */
    private function validateFile()
    {
        if ($this->file["size"] > $this->max_file_size) {
            $this->errors[] = "Kích thước tệp quá lớn, tối đa là " . $this->max_file_size / 1048576 . "MB.";
        }
        $file_type = strtolower(pathinfo($this->file["name"], PATHINFO_EXTENSION));
        if (!in_array($file_type, $this->valid_extensions)) {
            $this->errors[] = 
            "Định dạng tệp không hợp lệ, chỉ chấp nhận " . implode(
                ", ",
                $this->valid_extensions
            ) . ".";
        }
    }
}