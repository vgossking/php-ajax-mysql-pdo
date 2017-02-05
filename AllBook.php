<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 2/4/2017
 * Time: 7:33 PM
 */

include_once 'Controller/BookController.php';

$bookController = new BookController();
$stmt = $bookController->listAllBook();

if($stmt->rowCount() > 0){
    echo "<table class='table table-bordered table-hover'>";

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
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        // creating new table row per record
        echo "<tr>";
        echo "<td>{$title}</td>";
        echo "<td>{$author}</td>";
        echo "<td>{$publisher}</td>";
        echo "<td>{$quantity}</td>";
        echo "<td>{$name}</td>";
        echo "<td style='text-align:center;'>";
        // add the record id here, it is used for editing and deleting products
        echo "<div class='product-id display-none'>{$id}</div>";

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
    echo "<div class='alert alert-info'>No records found.</div>";
}