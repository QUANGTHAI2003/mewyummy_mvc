<?php

use App\Core\Query as DB;

class AccountModel {

    public function getUserInfo($id) {
        $result = DB::table('users')->where('id', '=', $id)->getOne();
        return $result;
    }

    public function updateUserInfo($id, $data) : void {
        DB::table('users')->where('id', '=', $id)->update($data);
    }
}
