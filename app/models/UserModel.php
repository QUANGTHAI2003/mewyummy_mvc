<?php

use App\Core\Query as DB;

class UserModel {

    public function insertUser($data)
    : void {
        DB::table('users')->insert($data);
    }

    public function updateUser($data, $id)
    : void {
        DB::table('users')->where('id', '=', $id)->update($data);
    }

    public function checkEmailExist($email)
    : bool {
        $result = DB::table('users')->where('email', '=', "'$email'")->getOne();
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCode($code, $email)
    : void {
        DB::table('users')->where('email', '=', "'$email'")->update(['code' => $code]);
    }

    public function updatePass($pass, $code)
    : void {
        $data = [
            'password' => password_hash($pass, PASSWORD_DEFAULT),
            'code'     => null
        ];
        DB::table('users')->where('code', '=', "'$code'")->update($data);
    }

    public function checkCode($code)
    : bool {
        $result = DB::table('users')->where('code', '=', "'$code'")->getOne();
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsers($email, $pass) {
        $result = DB::table('users')->where('email', '=', "'$email'")->getOne();
        if($result) {
            if(password_verify($pass, $result['password'])) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // upload avatar
    public function uploadAvatar($id, $avatar)
    : void {
        $data = [
            'avatar' => $avatar
        ];
        DB::table('users')->where('id', '=', $id)->update($data);
    }
}
