<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 2/4/2017
 * Time: 10:09 AM
 */
    $basePath = $_SERVER['DOCUMENT_ROOT'];
    include_once $basePath."/Config/Database.php";
    include_once $basePath."/Model/Category.php";
    class CategoryController{
        private $tableName = "categories";
        function listCategory()
        {
            $conn = Database::getInstancce()->getConnection();
            $sql = "SELECT id,name FROM " . $this->tableName . " ORDER BY name";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $categories = array();
            while($category = $stmt->fetchObject('Category')){
                $categories[] = $category;
            }
            return $categories;
        }
    }