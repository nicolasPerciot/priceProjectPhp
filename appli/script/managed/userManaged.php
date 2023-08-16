       
<?php

require('./script/db/userDB.php');
require ('./script/model/user.php');


//Controller for User model
class UserManaged {   
    static public $user;

    public function __construct(){
        self::$user = new User();
    }


    //Getter for User
    static public function getUser(){
        return self::$user;
    }

    //Setter for User
    static protected function setUser($name, $firstName, $username, $password) {
        self::$user::setName($name);
        self::$user::setfirstName($firstName);
        self::$user::setUsername($username);
        self::$user::setPassword($password);
        return self::$user;
    } 

    //Make a User with the post
    static protected function formUser($user) {
        self::$user::setName($user['name']);
        self::$user::setfirstName($user['firstName']);
        self::$user::setUsername($user['username']);
        self::$user::setPassword($user['password']);
        return self::$user;
    }

    //Destruct the User
    static public function destruct() {
        self::$user::setName(null);
        self::$user::setfirstName(null);
        self::$user::setUsername(null);
        self::$user::setPassword(null);
        $_SESSION['userID']     = null;
        $_SESSION['username']   = null;
        session_destroy();
    }

    //Connect the User
    static public function isConnect($post){
        $username = strtolower($post['username']);
        $password = strtolower($post['password']);

        $user = UserDB::getUserByUsername($username);
        if(strtolower($user['username']) == $username && strtolower($user['password']) == $password){
            self::formUser($user);
            return true;
        }
        else{
            return false;
        }
    }


    //----CRUD User----//

    //Get all users
    static public function getAll()
    {
        $users_list = [];
        foreach (UserDB::getAll() as $user){
            $user = self::formUser($user);
            array_push($users_list, $user);
        }
        return $users_list;
    }

    //Get the user ID
    static public function getUserID($username){
        return UserDB::getUserID($username);
    }

    //Get user by ID
    static public function getUserById($userID)
    {
        $user = UserDB::getUserById($userID);
        $user = self::formUser($user);
        return $user;
    }

    //Get user by username
    static public function getUserByUsername($username)
    {
        $user = UserDB::getUserByUsername($username);
        $user = self::formUser($user);
        return $user;
    }

    //Create one user
    static public function create($post){
        $name       = ucfirst($post["name"]);
        $firstName  = ucfirst($post["firstName"]);
        $username   = ucfirst($post["username"]);
        $password   = $post["password"];

        if( !UserDB::getUserByUsername($username)){
            self::setUser($name, $firstName, $username, $password);
            UserDB::create(self::$user);
        }
        else{
            return false;
        }
    }

    //Update one user
    static public function update($post){
        $id         = $post["id"];
        $name       = ucfirst($post["name"]);
        $firstName  = ucfirst($post["firstName"]);
        $username   = ucfirst($post["username"]);
        $password   = $post["password"];

        if( !UserDB::getUserByUsername($username)){
            self::setUser($name, $firstName, $username, $password);
            UserDB::update($id, self::$user);
        }
        else{
            return false;
        }
    }

    //Delete one user
    static public function delete($id)
    {
        userDB::delete($id);
        self::destruct();
    }
}

?>