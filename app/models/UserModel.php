<?php
use App\Core\Query as DB;

class UserModel
{
    public function insertUser($data) {
        DB::table('users')->insert($data);
    }

    public function checkEmailExist($email) {
        $result = DB::table('users')->where('email', '=', "'$email'")->getOne();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsers($email, $pass) {
        $result = DB::table('users')->where('email', '=', "'$email'")->getOne();
        if ($result) {
            if (password_verify($pass, $result['password'])) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>