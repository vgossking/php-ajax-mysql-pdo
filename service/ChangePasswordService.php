<?php
/**
 * Created by PhpStorm.
 * User: vu.vuong
 * Date: 2/10/2017
 * Time: 10:52 AM
 */
session_start();
if(!isset($_SESSION['userId'])){
    die();
}
$basePath = $_SERVER['DOCUMENT_ROOT'];
include_once $basePath."/Model/User.php";
include_once $basePath."/Controller/UserController.php";
$oldPwd = $_POST['oldPwd'];
$newPwd = $_POST['newPwd'];
$userId = $_SESSION['userId'];
$userController = new UserController();
$oldPwd = md5($oldPwd);
$newPwd = md5($newPwd);

if($userController->checkPassword($userId, $oldPwd)){
    $user = new User();
    $user->setId($userId);
    $user->setPassword($newPwd);

    $userController->changePassword($user);
}else{
    echo "1";
}

