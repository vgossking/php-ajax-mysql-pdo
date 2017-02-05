<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 2/4/2017
 * Time: 10:09 AM
 */
    include_once "/Config/Database.php";
    class CategoryController{
        private $tableName = "categories";
        function listCategory()
        {
            $conn = Database::getInstancce()->getConnection();
            $sql = "SELECT id,name FROM " . $this->tableName . " ORDER BY name";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
    }