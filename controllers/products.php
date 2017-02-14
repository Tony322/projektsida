<?php

include_once './models/ProductModel.php';
include_once './views/ViewHelper.php';

//echo 'ProductController initiated </br>';

class products {
        
    public function __construct(){
        $this->viewhelper = new ViewHelper();
    }

    public function category($para) {
        //echo 'kör category';
        $model = new ProductModel();
        //Hämta spel via kategorinamn
        $games = $model->getGamesByCategoryName($para);
        
        $viewhelper = new ViewHelper();        
        $viewhelper->assign('games', $games);
        $viewhelper->display("productview.php");
    }

    public function name($para) {
        $model = new ProductModel();
        //Hämta spel via namn
        $para = str_replace('%20', ' ', $para);

        $games = $model->getGameByName($para);
        
        $viewhelper = new ViewHelper();        
        $viewhelper->assign('games', $games);
        $viewhelper->display("productdetails.php");
    }

    public function searchname($para) {
        $model = new ProductModel();
        //Hämta spel via namn
        $para = str_replace('%20', ' ', $para);

        $games = $model->getGameByName($para);
        
        $viewhelper = new ViewHelper();        
        $viewhelper->assign('games', $games);
        $viewhelper->display("searchresult.php");

    }

    public function categories() {
        
        include_once './views/konsoler.php';
    }

    public function all() {
        $model = new ProductModel();
        $games = $model->getAllGames();
        
        $viewhelper = new ViewHelper();        
        $viewhelper->assign('games', $games);
        $viewhelper->display("productview.php");
    }

}
