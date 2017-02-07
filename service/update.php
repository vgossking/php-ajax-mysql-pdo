<?php
$basePath = $_SERVER['DOCUMENT_ROOT'];
include_once $basePath."/Model/Book.php";
include_once $basePath."/Controller/BookController.php";
$bookID = isset($_GET['id']) ? $_GET['id']: die("<strong>ERROR</strong>");

$bookController = new BookController();
$book = $bookController->getBookByID($bookID);
?>
<form id='update-book-form'  method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Tên Sách</td>
            <td><input type='text' name='title' class='form-control' value = "<?php echo $book->getTitle() ?>" required /></td>
        </tr>
        <tr>
            <td>Tác giả</td>
            <td><input type="text" name='author' class='form-control' value = "<?php echo $book->getAuthor() ?>" required/></td>
        </tr>
        <tr>
            <td>Nhà xuất bản</td>
            <td><input type='text' min='1' name='publisher' class='form-control' value = "<?php echo $book->getPublisher() ?>" required /></td>

        <tr>
            <td>Số lượng</td>
            <td><input type='number' min='1' name='quantity' value = "<?php echo $book->getQuantity() ?>" class='form-control' required /></td>
        </tr>
        <tr>
            <td>Thể loaị</td>
            <td>
                <select class='form-control' name='category'>
                    <?php
                    include_once $basePath."/Controller/CategoryController.php";
                    $categoryController = new CategoryController();
                    $categories = $categoryController->listCategory();
                    foreach($categories as $category) {
                        $id = $category->getId();
                        $name = $category->getName();
                        if($id == $book->getCategoryID()) {
                            echo "<option value='".$id."' selected>".$name."</option>";
                        }else{
                            echo "<option value='".$id."'>".$name."</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <!-- hidden ID field so that we could identify what record is to be updated -->
                <input type='hidden' name='id' value='<?php echo $bookID; ?>' />
            </td>
            <td>
                <button type='submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-pencil'></span> Edit Book
            </td>
        </tr>
    </table>
</form>