<?php

    class User
    {

        static protected $name;
        static protected $firstName;
        static protected $username;
        static protected $password;


        public function __construct(){}
        
        static public function getName()
        {
            return self::$name;
        }
        static public function setName($name)
        {
            self::$name = $name;
        }

        static public function getfirstName()
        {
            return self::$firstName;
        }
        static public function setfirstName($firstName)
        {
            self::$firstName = $firstName;
        }

        static public function getUsername()
        {
            return self::$username;
        }
        static public function setUsername($username)
        {
            self::$username = $username;
        }

        static public function getPassword()
        {
            return self::$password;
        }
        static public function setPassword($password)
        {
            self::$password = $password;
        }
    }


?>