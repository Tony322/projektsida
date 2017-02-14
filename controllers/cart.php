<?php

include_once './models/ProductModel.php';
include_once './views/ViewHelper.php';

class cart {

    private $cart;

    function __construct() {
        if (!$_SESSION['cart']) {
            $this->cart = array();
        } else {
            $this->cart = $_SESSION['cart'];
        }
    }

    public function view() {
        $this->cart = $_SESSION['cart'];
        $model = new ProductModel();
        $games = array();

        foreach ($this->cart as $x) {
            $game = $model->getGameById($x);
            $games = array_merge($games, $game);
        }

        $viewhelper = new ViewHelper();
        $viewhelper->assign('games', $games);
        $viewhelper->display("cartview.php");
    }

    //Adda till cart utan att refresha cartview
    public function add($para) {
        if (!is_numeric($para)) {
            
        }

        //Pusha till cart
        array_push($this->cart, $para);

        //Uppdatera session efter den nya pushen.
        $_SESSION['cart'] = $this->cart;
    }

    //Adda till cart inifrån cart å refresha
    public function addincart($para) {
        if (!is_numeric($para)) {
            
        }

        //Pusha till cart
        array_push($this->cart, $para);

        //Uppdatera session efter den nya pushen.
        $_SESSION['cart'] = $this->cart;

        $this->view();
    }

    public function remove($para) {
        //echo "kör remove";
        //För att hålla koll på index i arrayen
        $i = 0;

        //Loopa igenom cartitems
        foreach ($this->cart as $cartItem) {
            //Kolla om det sökta idt i cart finns..
            if ($cartItem == $para) {
                //Ta bort ur array och hoppa ur loopen.
                unset($this->cart[$i]);
                break;
            }
            //Plussa index med 1 för varje iteration
            $i++;
        }

        //Rättar till indexplatserna i arrayen, så att de blir 0,1,2,3.. ist för 0,3,4,7...
        $this->cart = array_values($this->cart);

        //Uppdatera session efter borttagningen.
        $_SESSION['cart'] = $this->cart;
        //Visa kundvagn
        $this->view();
    }

    public function purge($para) {
        //För att hålla koll på index i arrayen
        $i = 0;
        //Loopa igenom cartitems
        foreach ($this->cart as $cartItem) {
            //Kolla om det sökta idt i cart finns..
            if ($cartItem == $para) {
                //Ta bort ur array
                unset($this->cart[$i]);
            }
            //Plussa index med 1 för varje iteration
            $i++;
        }

        //Rättar till indexplatserna i arrayen, så att de blir 0,1,2,3.. ist för 0,3,4,7...
        $this->cart = array_values($this->cart);

        //Uppdatera session efter borttagningen.
        $_SESSION['cart'] = $this->cart;
        //Visa kundvagn
        $this->view();
    }

    public function dumpcart() {
        $_SESSION['cart'] = NULL;
        $this->view();
    }

}
