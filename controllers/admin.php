<?php

/**
 * Created by PhpStorm.
 * User: Necirvan
 * Date: 2017-02-09
 * Time: 13:45
 */
include_once './models/adminModel.php';
include_once './models/ProductModel.php';
include_once './views/ViewHelper.php';
include_once './models/Product.php';

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

    public function addProduct() {
        if ($this->user['loggedin'] === 1) {

            $product = new Product();
            $model = new adminModel();

            $product->name = $_POST['name'];
            $product->desc = $_POST['desc'];
            $product->price = $_POST['price'];
            $product->category = $_POST['category'];
            $product->stock = $_POST['stock'];
            $product->imgurl = $_POST['imgurl'];

            $model->addProduct($product);

            $this->all();
        } else {
            echo 'Fuck off, du har inte access noob.';
        }
    }

    public function deleteProduct($id) {
        $model = new adminModel();

        $model->deleteProduct($id);
        $this->all();
    }

    public function updateProduct() {
        if ($this->user['loggedin'] === 1) {

            $product = new Product();
            $model = new adminModel();

            $product->id = $_POST['id'];
            $product->name = $_POST['name'];
            $product->desc = $_POST['desc'];
            $product->price = $_POST['price'];
            $product->category = $_POST['category'];
            $product->stock = $_POST['stock'];
            $product->imgurl = $_POST['imgurl'];

            $model->updateProduct($product);

            $this->all();
        } else {
            echo 'Fuck off, du har inte access noob.';
        }
    }

    public function add() {
        if ($this->user['loggedin'] === 1) {

            $viewhelper = new ViewHelper();
            $viewhelper->display("addproductpage.php");
        } else {
            echo 'Fuck off, du har inte access noob.';
        }
    }

    public function logout() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            header("Location: index.php");
        }
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

    public function edit($id) {
        if ($this->user['loggedin'] === 1) {
            $prodModel = new ProductModel();
            $data = $prodModel->getGameById($id);
            $product = new Product();


            $product->id = $data[0]['id'];
            $product->name = $data[0]['name'];
            $product->desc = $data[0]['description'];
            $product->price = $data[0]['price'];
            $product->category = $data[0]['category'];
            $product->stock = $data[0]['stock'];
            $product->imgurl = $data[0]['imgurl'];

            $viewhelper = new ViewHelper();
            $viewhelper->assign('game', $product);
            $viewhelper->display("editproductpage.php");
        } else {
            echo 'Fuck off, du har inte access noob.';
        }
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
        if ($this->user['loggedin'] === 0) {
            include_once'./views/login.php';
        } else {
            $this->all();
        }
    }

}
