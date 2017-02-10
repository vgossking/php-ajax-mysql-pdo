<?php
/**
 * Created by PhpStorm.
 * User: vu.vuong
 * Date: 2/9/2017
 * Time: 4:00 PM
 */

$basePath = $_SERVER['DOCUMENT_ROOT'];
include_once $basePath."/Config/Database.php";
include_once $basePath."/Model/User.php";

Class UserController{
    function getUserIdLogIn(User $user){
        $conn = Database::getInstancce()->getConnection();
        $sql = "SELECT id FROM users WHERE username =:username AND password =:password";
        $stmt = $conn->prepare($sql);
        $username = $user->getUsername();
        $password = $user->getPassword();
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() == 1){
            return $row['id'];
        }
        return 0;
    }

    function checkPassword($id, $oldPassword){
        $conn = Database::getInstancce()->getConnection();
        $sql = 'SELECT password from users WHERE id =:id';
        $stmt =$conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['password'] == $oldPassword){
            return true;
        }
        return false;
    }

    function changePassword(User $user){
        $userId = $user->getId();
        $userPwd = $user->getPassword();
        $conn = Database::getInstancce()->getConnection();
        $sql = "UPDATE users SET password =:password WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":password", $userPwd);
        $stmt->bindParam(":id", $userId);
        $stmt->execute();
    }
}