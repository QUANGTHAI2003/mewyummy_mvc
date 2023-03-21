<?php

use App\Core\Query as DB;

class AccountModel {

    public function getUserInfo() {
        $result = DB::table('users')->where('id', '=', $_SESSION['id'])->getOne();
        return $result;
    }
}

?>