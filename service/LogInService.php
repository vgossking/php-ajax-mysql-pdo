<?php
/**
 * Created by PhpStorm.
 * User: vu.vuong
 * Date: 2/9/2017
 * Time: 4:10 PM
 */

$username = $_POST['username'];
$password = $_POST['password'];

$basePath = $_SERVER['DOCUMENT_ROOT'];
include_once $basePath."/Model/User.php";
include_once $basePath."/Controller/UserController.php";

$userController = new UserController();
$user = new User();
$password = md5($password);
$user->setUsername($username);
$user->setPassword($password);
$userId = $userController->getUserIdLogIn($user);
if($userId > 0){
    session_start();
    $_SESSION['userId'] = $userId;
    $_SESSION['username'] = $username;
    echo "1";
    header("location: http://".$_SERVER['HTTP_HOST']);
}
else{
    ?>
    0
    <?php
}
