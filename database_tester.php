<?php
session_start();
require_once('connection.php');

$email = "dev@emich.edu";
$password = "123456";

$db = Db::getInstance();

$userQuery = $db->prepare('SELECT * FROM users WHERE email = :email AND pwd = :password');
$userQuery->execute(array('email' => $email, 'password' => $password));

$user = $userQuery->fetch(PDO::FETCH_ASSOC);

print_r($user);



?>