<?php

namespace App\Core;

use PDO;
use App\App;
use Exception;

class Database {

    private PDO $__conn;

    //Kết nối database
    function __construct() {
        $conn         = Connection::getInstance()->getConnection();
        $this->__conn = $conn;
    }

    //Thêm dữ liệu
    protected function insertData($table, $data)
    : bool {

        if(!empty($data)) {
            $fieldStr = '';
            $valueStr = '';

            foreach ($data as $key => $value) {
                $fieldStr .= "$key,";
                $valueStr .= "'$value',";
            }

            $fieldStr = rtrim($fieldStr, ',');
            $valueStr = rtrim($valueStr, ',');

            $sql = "INSERT INTO $table($fieldStr) VALUES($valueStr)";
            echo $sql;
            $status = $this->query($sql);

            if($status) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }

    //Sửa dữ liệu

    protected function query($sql) {

        try {
            $stmt = $this->__conn->prepare($sql);
            $stmt->execute();

            return $stmt;
        } catch (Exception $e) {
            $mess            = $e->getMessage();
            $data['message'] = $mess;
            App::$app->loadError('database', $data);
            die();
        }
    }

    //Xoá dữ liệu

    protected function updateData($table, $data, $condition = '')
    : bool {

        if(!empty($data)) {
            $updateStr = '';
            foreach ($data as $key => $value) {
                $updateStr .= "$key='$value',";
            }

            $updateStr = rtrim($updateStr, ',');

            if(!empty($condition)) {
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            } else {
                $sql = "UPDATE $table SET $updateStr";
            }

            $status = $this->query($sql);

            if($status) {
                return true;
            }
        }

        return false;
    }

    //Truy vấn câu lệnh SQL

    protected function deleteData($table, $condition = '')
    : bool {

        if(!empty($condition)) {
            $sql = 'DELETE FROM ' . $table . ' WHERE ' . $condition;
        } else {
            $sql = 'DELETE FROM ' . $table;
        }

        $status = $this->query($sql);

        if($status) {
            return true;
        }

        return false;
    }

    //Trả về id mới nhất sau khi đã insert

    protected function lastInsertId()
    : bool|string {
        return $this->__conn->lastInsertId();
    }
}
