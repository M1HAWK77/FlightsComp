<?php
    class Connection{

        private static  $connection;
        private static $host = "localhost";
        private static $dbname = "compiflights";
        private static $username = "root";
        private static $password = "";

        private static $preferences = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

        private function __construct(){
            
        }

        public static function getConnection(){
            if(self::$connection == null){
                try{
                    return self::$connection = new PDO('mysql:host=' . self::$host.';dbname=' . self::$dbname, 
                        self::$username, self::$password,self::$preferences);
                }catch(Exception $e){
                    return die("Could not to connect to the database " . self::$dbname . ": " . $e->getMessage());
                }
            }
            return self::$connection;
        }
    }

?>