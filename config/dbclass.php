<?php
error_reporting(E_ALL);
    class dbclass {
        private $host = "localhost",
                $username = "root",
                $password = "",
                $database = "aktivitas";
        
        public $connection;
        
        public function getConnection(){
            
            $this->connection = null;
            
            try {
                $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
                $this->connection->exec("set names utf8");
            }
            catch(PDOException $exception) {
                echo "Error: " . $exception->getMessage();
            }
            return $this->connection;
        }
    }

?>