<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 2/5/2017
 * Time: 9:46 PM
 */
$basePath = $_SERVER['DOCUMENT_ROOT'];
include_once $basePath."/Model/Book.php";
include_once $basePath."/Controller/BookController.php";
$book = new Book();
$book->setId($_POST['id']);
$book->setTitle($_POST['title']);
$book->setAuthor($_POST['author']);
$book->setPublisher($_POST['publisher']);
$book->setQuantity($_POST['quantity']);
$book->setCategoryID($_POST['category']);

$bookController = new BookController();
$bookController->updateBook($book);