<?php
use App\Core\Query as DB;

class UserModel
{
    public function insertUser($data) {
        DB::table('users')->insert($data);
    }

    public function updateUser($data, $id) {
        DB::table('users')->where('id', '=', $id)->update($data);
    }

    public function checkEmailExist($email) {
        $result = DB::table('users')->where('email', '=', "'$email'")->getOne();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCode($code, $email) {
        DB::table('users')->where('email', '=', "'$email'")->update(['code' => $code]);
    }

    public function updatePass($pass, $code) {
        $data = [
            'password' => password_hash($pass, PASSWORD_DEFAULT),
            'code' => null
        ];
        DB::table('users')->where('code', '=', "'$code'")->update($data);
    }

    public function checkCode($code) {
        $result = DB::table('users')->where('code', '=', "'$code'")->getOne();
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