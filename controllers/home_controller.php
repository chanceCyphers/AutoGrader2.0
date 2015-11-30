<?php

class HomeController {
    public function index() {
        require_once('views/home/index.php');
    }

    public function howToUse() {
    		require_once('views/home/about.php');
    }

    
}

?>