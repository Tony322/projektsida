<?php

include_once './models/ProductModel.php';

//echo 'ProductController initiated </br>';

class products {

    public function category($para) {
        //echo 'kör category';
        $model = new ProductModel();
        //Hämta spel via kategorinamn
        $games = $model->getGamesByCategoryName($para);
        //print_r($games);    
        include_once './views/productview.php';
    }

    public function name($para) {
        $model = new ProductModel();
        //Hämta spel via namn
        $para = str_replace('%20', ' ', $para);

        $games = $model->getGameByName($para);
        include_once './views/productdetails.php';
    }

    public function categories() {
        include_once './views/konsoler.php';
    }

    public function all() {
        $games = $model->getAllGames();
        include_once './views/Productview.php';
    }

}
