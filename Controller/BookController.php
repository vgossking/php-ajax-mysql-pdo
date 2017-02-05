<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 2/4/2017
 * Time: 1:47 PM
 */
$basePath = $_SERVER['DOCUMENT_ROOT'];
include_once $basePath."/Config/Database.php";

class BookController
{

    private $tableName = "books";

    function addBook(Book $book)
    {
        $conn = Database::getInstancce()->getConnection();
        $sql = "INSERT INTO " . $this->tableName . " SET title =:title, author =:author, publisher =:publisher, quantity =:quantity, categoryId =:categoryId";
        $stmt = $conn->prepare($sql);

        $title = $book->getTitle();
        $author = $book->getAuthor();
        $publisher = $book->getPublisher();
        $quantity = $book->getQuantity();
        $catId = $book->getCategoryID();

        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":author", $author);
        $stmt->bindParam(":publisher", $publisher);
        $stmt->bindParam(":quantity", $quantity);
        $stmt->bindParam(":categoryId", $catId);

        $stmt->execute();
    }

    function listAllBook()
    {
        $conn = Database::getInstancce()->getConnection();
        $sql = "SELECT books.id, books.title, books.author, books.publisher, books.quantity, categories.name FROM " . $this->tableName . " INNER JOIN categories ON books.categoryId = categories.id ORDER BY books.title";

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        return $stmt;
    }
}
