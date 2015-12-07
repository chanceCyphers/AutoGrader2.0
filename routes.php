<?php

## Controllers and actions are routed here. Based on the action taken by the user,  ##
## the appropriate controller calls the action and then manages the information     ##
## the database and displays it for the user. Each controller is defined in its     ##
## own file in the format <controller_name>_controller.php, which are stored in     ##
## the controllers directory                                                        ##

function call($controller, $action)
{
    //the controller has to be in the right spot
    require_once('controllers/' . $controller . '_controller.php');

    switch ($controller) {
        case 'login':
            $controller = new LoginController();
            break;
        case 'home':
            $controller = new HomeController();
            break;
        case 'account':
            require_once('models/account_manager.php');
            $controller = new AccountController();
            break;
        case 'category':
            require_once("models/category_manager.php");
            $controller = new CategoryController();
            break;
        case 'questions':
            require_once("models/question_manager.php");
        	$controller = new QuestionsController();
        	break;
        case 'admin':
            require_once("models/admin_manager.php");
            $controller = new AdminController();
            break;
        case 'tests':
            $controller = new TestsController();
            break;
        case 'error':
            $controller = new ErrorController();
            break;
    }

    $controller->{$action}();
}

## The actions allowed to be taken by each different user role is defined here. If a    ##
## user is not supposed to be doing an action (like a student creating a test) then it  ##
## will redirect the user to an error page. This prevents users from manipulating the   ##
## URL of the page to get places they are not supposed to be.                           ##

if (isset($_SESSION) && array_key_exists('role', $_SESSION)) {
    // If User is an admin of the site
    if ($_SESSION['role'] == 1) {
        $allowedActions = array('login' => ['login', 'validateLogin', 'logout'],
                        'home' => ['index', 'howToUse'],

                        'account' => ['newAccount', 'regNewUser', 'forgotPass', 'viewInfo', 'changeInfo'],
                        'category' => ['index', 'load', 'create', 'delete', 'change'],
                        'questions' => ['index', 'create', 'createTrueFalse', 'createShortAnswer', 
                                        'createMultipleChoice', 'createEssay', 'viewQuestion'],
                        'admin' => ['index', 'changeInfo', 'setUserGroup', 'setUserPermission', 'manageGroups'],
                        'tests' => ['index', 'create','createTest','viewTest','takeTest','submitTest'],
                        'error' => ['notFound']
                        );

    // If User is a professor
    } else if ($_SESSION['role'] == 2) {
        $allowedActions = array('login' => ['login', 'validateLogin', 'logout'],
                        'home' => ['index'],
                        'account' => ['newAccount', 'regNewUser', 'forgotPass', 'viewInfo', 'changeInfo'],
                        'category' => ['index', 'create', 'load', 'delete', 'change'],
                        'questions' => ['index', 'create', 'createTrueFalse', 'createShortAnswer', 
                                        'createMultipleChoice', 'createEssay', 'viewQuestion'],
                        'tests' => ['index', 'create','createTest','viewTest','takeTest','submitTest'],
                        'error' => ['not_found']
                        );

    // If User is a student
    } else if ($_SESSION['role'] == 3) {
        $allowedActions = array('login' => ['login', 'validateLogin', 'logout'],
                        'home' => ['index'],
                        'account' => ['newAccount', 'regNewUser', 'forgotPass', 'viewInfo', 'changeInfo'],
                        'tests' => ['index', 'takeTest','submitTest'],
                        'error' => ['not_found']
                         );

    } else {
        $allowedActions = array( 'login' => ['login', 'validateLogin', 'logout'], 'home' => ['index'], 
                            'account' => ['newAccount', 'regNewUser', 'forgotPass', 'viewInfo', 'changeInfo'],
                            'error' => ['not_found']
                           );

    }
} else {
    $allowedActions = array( 'login' => ['login', 'validateLogin', 'logout'], 'home' => ['index'], 
                            'account' => ['newAccount', 'regNewUser', 'forgotPass', 'viewInfo', 'changeInfo'],
                            'error' => ['not_found']
                           );
}

// Calls error by default if the action does not exist
if (array_key_exists($controller, $allowedActions)) {
    if (in_array($action, $allowedActions[$controller])) {
        call($controller, $action);
    } else {
        call('error', 'not_found');
    }
} else {
    call('error', 'not_found');
}

?>