<form id='add-book-form' action='' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Tên Sách</td>
            <td><input type='text' name='title' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Tác giả</td>
            <td><input type="text" name='author' class='form-control' required/></td>
        </tr>
        <tr>
            <td>Nhà xuất bản</td>
            <td><input type='text' min='1' name='publisher' class='form-control' required /></td>

        <tr>
            <td>Số lượng</td>
            <td><input type='number' min='1' name='quantity' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Thể loaị</td>
            <td>
                <select class='form-control' name='category'>
                    <?php
                        include_once "Controller/CategoryController.php";
                        $categoryController = new CategoryController();  
                        $categories = $categoryController->listCategory();                     
                        foreach($categories as $category) {   
                            $id = $category->getId();     
                            $name = $category->getName();                   
                            echo "<option value='".$id."'>".$name."</option>";
                        }

                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type='submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-plus'></span> Add Book
              </td>
        </tr>
    </table>
</form>
