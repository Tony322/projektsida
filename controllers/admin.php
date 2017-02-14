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

    private $user;

    function __construct() {
        if (!isset($_SESSION['user'])) {
            $this->user = array(
                "username" => "",
                "loggedin" => 0,
                "access" => 0);
        } else {
            $this->user = $_SESSION['user'];
        }
    }

    public function addProduct($para) {
        
    }

    public function deleteProduct($id) {
        $model = new adminModel();

        $model->deleteProduct($id);
        $this->all();
    }

    public function temp() {
        unset($_SESSION['user']);
        echo 'tömde user session';
    }

    public function all() {
        if ($this->user['loggedin'] === 1) {

            $model = new adminModel();
            $games = $model->getAllGames();

            $viewhelper = new ViewHelper();
            $viewhelper->assign('games', $games);
            $viewhelper->display("admin.php");
        } else {
            echo 'Fuck off, du har inte access noob.';
        }
    }

    public function updateProduct($para) {
        
    }

    public function authUser() {
        $model = new adminModel();

        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $model->checkUser($username, $password);

        //Har en rad retunerats? Om ja, inloggning lyckades.
        if ($result[0][0] == '1') {
            //Gö skit med session och redirecta till admin kontrollpanel...
            //Sätt värdena i sessionen
            $this->user = array(
                "username" => $username,
                "loggedin" => 1,
                "access" => 0);

            //Sätt nya datan till sessionen
            $_SESSION['user'] = $this->user;

            //Visa adminproduktsida.
            $this->all();
        }
        //Inloggning misslyckad.
        else {
            $this->user = array(
                "username" => "",
                "loggedin" => 0,
                "access" => 0);

            //Sätt nya datan på sessionen
            $_SESSION['user'] = $this->user;

            //Gå tillbaka till loginsidan.
            $this->login();
        }
    }

    public function login() {
        include_once'./views/login.php';
    }

}
