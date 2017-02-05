<?php
$basePath = $_SERVER['DOCUMENT_ROOT'];
include_once $basePath."/Model/Book.php";
include_once $basePath."/Controller/BookController.php";
 $book = new Book();
 $book->setTitle($_POST['title']);
 $book->setAuthor($_POST['author']);
 $book->setPublisher($_POST['publisher']);
 $book->setQuantity($_POST['quantity']);
 $book->setCategoryID($_POST['category']);

 $bookController = new BookController();
 $bookController->addBook($book);

