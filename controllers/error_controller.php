<?php

class ErrorController {

    public function pageNotFound() {
        require_once('views/errors/pageNotFound.php');
    }
    
    public function accessDenied() {
    	require_once('views/errors/accessDenied.php');
    }
    
}

?>