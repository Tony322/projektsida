<?php

/**
 * Created by PhpStorm.
 * User: Necirvan
 * Date: 2017-02-09
 * Time: 13:45
 */

include_once './models/adminModel.php';
include_once './views/ViewHelper.php';

class admin {

public function addProduct($para) {

}

public function deleteProduct($id) {
    $model = new adminModel();

    $model->deleteProduct($id);
    $this->all();
}

    public function all() {
        $model = new adminModel();
        $games = $model->getAllGames();

        $viewhelper = new ViewHelper();
        $viewhelper->assign('games', $games);
        $viewhelper->display("admin.php");
    }

public function updateProduct($para) {

}

public function authUser() {
     $model = new ProductModel();

     $username = $_POST['username'];
     $password = $_POST['password'];

     $result = $model->checkUser($username, $password);

     if($result[0][0] == '1') {
        header("Location: login.php");
     } else {
         $this->login();

     }

 }

 public function login() {
    include_once'./views/login.php';
}
}