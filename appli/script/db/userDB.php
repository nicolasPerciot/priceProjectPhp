<?php

    class UserDB{
        
        static protected $_instance = null;
        static protected $_db;

        function __construct(){}
        
        //Get the instance and do the connection wit the db
        static protected function getInstance()
        {
            if(is_null(self::$_instance))
            {    
                $instance = new UserDB();                    
                $instance -> connect();
                self::$_instance = $instance;                        
            }
            return self::$_instance;
        }


        protected function connect()
        {
            include_once('./script/common/conf.php');
            self::$_db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', USER, PASS);
        }


        //----CRUD User----//

        //Get all the users in the db
        static public function getAll()
        {
            self::getInstance();
            $db = self::$_db;
            $stmt = $db -> query("SELECT * FROM ".TABLE_USER);
            $rows = $stmt -> fetchAll();
            return $rows;
        }

        //Get the ID with his username (username is unique)
        static public function getUserID($username){
            self::getInstance();
            $db = self::$_db;
            $req = $db -> prepare("SELECT userID FROM ".TABLE_USER." WHERE username = :username");
            $req -> execute(array("username" => $username));
            $row = $req -> fetch(PDO::FETCH_ASSOC);
            return $row['userID'];
        }

        //Get User by his ID
        static public function getUserById($userID)
        {
            self::getInstance();
            $db = self::$_db;
            $req = $db -> prepare("SELECT * FROM ".TABLE_USER." WHERE userID = :userID");
            $req -> execute(array("userID" => $userID));
            $row = $req -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }

        //Get User by his username
        static public function getUserByUsername($username)
        {
            self::getInstance();
            $db = self::$_db;
            $req = $db -> prepare("SELECT * FROM ".TABLE_USER." WHERE username = :username");
            $req -> execute(array("username" => $username));
            $row = $req -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }

        //Create one user
        static public function create($user)
        {
            self::getInstance();
            $db = self::$_db;
            $stmt = $db -> prepare("INSERT INTO ".TABLE_USER."(name, firstName, username, password) VALUES(:name,:firstName,:username,:password)");
            $var = array("name" => $user::getName(), "firstName" => $user::getfirstName(),"username" => $user::getUsername(),"password" => $user::getPassword());
            $stmt -> execute($var);
        }

        //Update one user
        static public function update($userID, $user)
        {
            if(!empty($userID))
            {
                self::getInstance();
                $db = self::$_db;
                $stmt = $db -> prepare("UPDATE ".TABLE_USER." SET name = :name, firstName = :firstName, username = :username, password = :password WHERE userID = :userID");
                $var = array("name" => $user::getName(), "firstName" => $user::getfirstName(),"username" => $user::getUsername(),"password" => $user::getPassword(), "userID" => $userID);
                $stmt -> execute($var);
            }
        }

        //Delete one user
        static public function delete($userID)
        {
            self::getInstance();
            $db = self::$_db;
            $stmt = $db -> prepare("DELETE FROM ".TABLE_USER." WHERE userID = :userID");
            $var = array(":userID" => $userID);
            $stmt -> execute($var);
        }
    }
?>