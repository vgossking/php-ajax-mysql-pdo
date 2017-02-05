<?php
$basePath = $_SERVER['DOCUMENT_ROOT'];
include_once $basePath."/Model/Book.php";
include_once $basePath."/Controller/BookController.php";

$id = $_POST['id'];
$bookController = new BookController();
$bookController->deleteBook($id);