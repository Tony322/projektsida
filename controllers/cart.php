<?php

include_once './models/ProductModel.php';

class cart {

    private $cart;

    function __construct() {
        if (!$_SESSION['cart']) {
            $this->cart = array();
        } else {
            $this->cart = $_SESSION['cart'];
        }
    }

    public function view()
    {
        $this->cart = $_SESSION['cart'];
        $model = new ProductModel();
        $games = array();
        
        foreach($this->cart as $x){
            $game = $model->getGameById($x);
            $games = array_merge($games, $game);
        }
        include_once './views/cartview.php';
    }
    
    public function add($para) {
        if(!is_numeric($para)){
            
        }
        
        //Pusha till cart
        array_push($this->cart, $para);
        
        echo 'Pushar till cart <br/>';
        //Uppdatera session efter den nya pushen.
        $_SESSION['cart'] = $this->cart;
        echo 'Uppdaterade session <br/>';
    }
    
}
