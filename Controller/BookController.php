<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 2/4/2017
 * Time: 1:47 PM
 */
$basePath = $_SERVER['DOCUMENT_ROOT'];
include_once $basePath."/Config/Database.php";
include_once $basePath."/Model/Book.php";

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

    function listAllBook($recordStart, $recordPerPage)
    {
        $conn = Database::getInstancce()->getConnection();
        $sql = "SELECT books.id, books.title, books.author, books.publisher, books.quantity, categories.name FROM " . $this->tableName . " INNER JOIN categories 
        ON books.categoryId = categories.id ORDER BY books.title 
        LIMIT ?, ?";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(1, $recordStart, PDO::PARAM_INT);
        $stmt->bindParam(2, $recordPerPage, PDO::PARAM_INT);
        $stmt->execute();
        $books = array();
        while($book = $stmt->fetchObject('Book')){
                $books[] = $book;
        }
        return $books;
    }

    function searchBook($keyWord){
        $conn = Database::getInstancce()->getConnection();
        $sql = "SELECT books.id, books.title, books.author, books.publisher, books.quantity, categories.name FROM " . $this->tableName . " INNER JOIN categories 
        ON books.categoryId = categories.id  WHERE books.title LIKE '%".$keyWord."%' ORDER BY books.title";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        //$stmt->bindParam(":keyword", $keyWord);
        $books = array();
        while($book = $stmt->fetchObject('Book')){
                $books[] = $book;
        }
        return $books;
    }

    function getBookByID($id){
        $conn = Database::getInstancce()->getConnection();
        $sql = 'SELECT * FROM books WHERE books.id =:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $book = $stmt->fetchObject('Book');
        return $book;
    }
    function updateBook(Book $book){
        $conn = Database::getInstancce()->getConnection();
        $sql = "UPDATE " . $this->tableName . " SET title =:title, author =:author, publisher =:publisher, quantity =:quantity, categoryId =:categoryId WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $title = $book->getTitle();
        $author = $book->getAuthor();
        $publisher = $book->getPublisher();
        $quantity = $book->getQuantity();
        $catId = $book->getCategoryID();
        $id = $book->getId();

        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":author", $author);
        $stmt->bindParam(":publisher", $publisher);
        $stmt->bindParam(":quantity", $quantity);
        $stmt->bindParam(":categoryId", $catId);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    function deleteBook($id){
        $conn = Database::getInstancce()->getConnection();
        $sql = "DELETE FROM ".$this->tableName." WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    }

    public function countAll()
    {
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->tableName . "";
        $conn = Database::getInstancce()->getConnection();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_rows'];
    }
}
