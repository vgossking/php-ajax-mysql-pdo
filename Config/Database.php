<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 2/3/2017
 * Time: 9:02 PM
 */

    class Database{
        private static $instance;
        private $host = "localhost";
        private $db_name = "library";
        private $username = "root";
        private $password = "";


        public static function getInstancce(){
            if(self::$instance == null){
                self::$instance = new Database();
            }
            return self::$instance;
        }

        public function getConnection(){
            try {
                $conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            }
            catch (PDOException $e){
                echo $e->getMessage();
            }
            return $conn;
        }
    }