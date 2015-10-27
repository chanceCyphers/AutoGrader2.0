<?php

function call($controller, $action)
{
    //the controller has to be in the right spot
    require_once('controllers/' . $controller . '_controller.php');

    switch ($controller) {
        case 'login':
            require_once('models/login_validator.php');
            $controller = new LoginController();
            break;
        case 'home':
            $controller = new HomeController();
            break;
    }

    $controller->{$action}();
}

//eventually we will need to figure out one's allowed actions based on their role
$allowedActions = array('login' => ['login', 'validateLogin'],
                        'home' => ['index'],
                        'reg' => ['newUser', 'forgotPass']);

if (array_key_exists($controller, $allowedActions)) {
    if (in_array($action, $allowedActions[$controller])) {
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}

?>