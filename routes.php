<?php

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
        	$controller = new QuestionsController();
        	break;
        case 'admin':
            require_once("models/admin_manager.php");
            $controller = new AdminController();
            break;
        case 'tests':
           $controller = new TestsController();
    }

    $controller->{$action}();
}

//eventually we will need to figure out one's allowed actions based on their role
$allowedActions = array('login' => ['login', 'validateLogin', 'logout'],
                        'home' => ['index', 'howToUse'],
                        'account' => ['newAccount', 'regNewUser', 'forgotPass', 'viewInfo', 'changeInfo'],
                        'category' => ['index', 'create', 'delete', 'change'],
                        'questions' => ['index', 'create', 'createTrueFalse', 'createShortAnswer', 
                                        'createMultipleChoice', 'createEssay', 'viewQuestion'],
                        'admin' => ['index', 'manageGroups', 'changeInfo', 'setUserGroup', 'setUserPermission'],
                        'tests' => ['index', 'create','createTest','viewTest','takeTest','submitTest']);

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


<?php       # comments
            # This is the page that calls the controllers and actions that those controllers take.
            # Controllers are responsible for getting information from the user, and the models, and
            # changing the view based the action taken by the user.
?>
