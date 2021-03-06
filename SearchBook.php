<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 2/5/2017
 * Time: 3:48 PM
 */


include_once 'Controller/BookController.php';

$bookController = new BookController();
$keyWord = $_REQUEST['keyword'];
$books = $bookController->searchBook($keyWord);

if(!empty($books)){
    echo "<table id='list-book' class='table table-bordered table-hover'>";

    // creating our table heading
    echo "<tr>";
    echo "<th class='width-30-pct'>Title</th>";
    echo "<th class='width-30-pct'>Author</th>";
    echo "<th>Publisher</th>";
    echo "<th>Quantity</th>";
    echo "<th>Category</th>";
    echo "<th style='text-align:center;'>Action</th>";
    echo "</tr>";

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    foreach ($books as $book){
        $id = $book->getId();
        $title = $book->getTitle();
        $author = $book->getAuthor();
        $publisher = $book->getPublisher();
        $quantity = $book->getQuantity();
        $category = $book->name;
        // creating new table row per record
        echo "<tr>";
        echo "<td>".$title."</td>";
        echo "<td>".$author."</td>";
        echo "<td>".$publisher."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$category."</td>";
        echo "<td style='text-align:center;'>";
        // add the record id here, it is used for editing and deleting products
        echo "<div class='book-id display-none'>".$id."</div>";

        // edit button
        echo "<div class='btn btn-info edit-btn margin-right-1em'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
        echo "</div>";

        // delete button
        echo "<div class='btn btn-danger delete-btn'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
    }

    //end table
    echo "</table>";
}
else{
    echo "<div id='alert' class='alert alert-info'>No records found.</div>";
}