<?php

//include_once './models/ProductModel.php';
//echo 'ProductController initiated </br>';

class login {

    public function __construct() {
        if (!isset($_SESSION['user'])) {
            $this->user = array(
                "username" => "",
                "loggedin" => 0,
                "access" => 0);
        } else {
            $this->user = $_SESSION['user'];
        }
        
        if ($this->user['loggedin'] === 0) {
            include_once'./views/login.php';
        } else {
            $this->all();
        }
    }

}
