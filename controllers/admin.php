<?php

/**
 * Created by PhpStorm.
 * User: Necirvan
 * Date: 2017-02-09
 * Time: 13:45
 */

include_once "./models/ProductModel.php";

class admin


{
    public function login()
    {
        include_once './views/login.php';
    }

    public function addProduct($para)
    {

    }

    public function deleteProduct($para)
    {

    }

    public function updateProduct($para)
    {

    }

    public function authUser()
    {
        $model = new ProductModel();

        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $model->checkUser($username, $password);

        if ($result[0][0] == '1') {
            header("Location: ./views/login.php");
        } else {
            $this->login();

        }

    }
}
