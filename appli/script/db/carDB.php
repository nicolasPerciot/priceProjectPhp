<?php

    class CarDB{
        
        static protected $_instance = null;
        static protected $_db;

        function __construct(){}
        

        //Get the instance and do the connection wit the db
        static protected function getInstance()
        {
            if(is_null(self::$_instance))
            {    
                $instance = new CarDB();                    
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


        //----CRUD Car----//

        //Get all the cars in the db
        static public function getAll()
        {
            self::getInstance();
            $db = self::$_db;
            $stmt = $db -> query("SELECT * FROM ".TABLE_CAR);
            $rows = $stmt -> fetchAll();
            return $rows;
        }

        //Get all the cars by passing the username of the user
        static public function getCarsByUsername($username)
        {
            self::getInstance();
            $db = self::$_db;
            $req = $db -> prepare("SELECT ".TABLE_CAR.".* FROM ".TABLE_CAR." INNER JOIN ".TABLE_USER." ON ".TABLE_CAR.".userID = ".TABLE_USER.".userID 
                                    WHERE ".TABLE_USER.".username = :username ORDER BY ".TABLE_CAR.".carID");
            $req -> execute(array("username" => $username));
            $rows = $req -> fetchAll();
            return $rows;
        }

        //Get the Car by his id
        static public function getcarById($carID)
        {
            self::getInstance();
            $db = self::$_db;
            $req = $db -> prepare("SELECT * FROM ".TABLE_CAR." WHERE carID = :carID");
            $req -> execute(array("carID" => $carID));
            $row = $req -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }

        //Create a Car
        static public function create($car)
        {
            self::getInstance();
            $db = self::$_db;
            $stmt = $db -> prepare("INSERT INTO ".TABLE_CAR."(brand, year, kilometersDriven, ownerType, fuelType, 
                                                                transmission, mileage, engine, power, seats, newPrice, price, userID) 
                                    VALUES(:brand, :year, :kilometersDriven, :ownerType, :fuelType, 
                                            :transmission, :mileage, :engine, :power, :seats, :newPrice, :price, :userID)");

            $var = array("brand" => $car::getBrand(), "year" => $car::getYear(), "kilometersDriven" => $car::getKilometersDriven(), 
                        "ownerType" => $car::getOwnerType(), "fuelType" => $car::getFuelType(), "transmission" => $car::getTransmission(), "mileage" => $car::getMileage(), 
                        "engine" => $car::getEngine(), "power" => $car::getPower(), "seats" => $car::getSeats(), "newPrice" => $car::getNewPrice(), "price" => $car::getPrice(), 
                        "userID" => $car::getUserID());

            $stmt -> execute($var);
        }

        //Update a Car
        static public function update($carID, $car)
        {
            if(!empty($carID))
            {
                self::getInstance();
                $db = self::$_db;
                $stmt = $db -> prepare("UPDATE ".TABLE_CAR." SET brand = :brand, year = :year, kilometersDriven = :kilometersDriven, 
                ownerType = :ownerType, fuelType = :fuelType, transmission = :transmission, mileage = :mileage, engine = :engine, power = :power, seats = :seats, 
                newPrice = :newPrice, price = :price, userID = :userID WHERE carID = :carID");

                $var = array("brand" => $car::getBrand(), "year" => $car::getYear(), "kilometersDriven" => $car::getKilometersDriven(), 
                        "ownerType" => $car::getOwnerType(), "fuelType" => $car::getFuelType(), "transmission" => $car::getTransmission(), "mileage" => $car::getMileage(), 
                        "engine" => $car::getEngine(), "power" => $car::getPower(), "seats" => $car::getSeats(), "newPrice" => $car::getNewPrice(), "price" => $car::getPrice(), 
                        "userID" => $car::getUserID(), "carID" => $carID);

                $stmt -> execute($var);
            }
        }

        
        //Delete a Car
        static public function delete($carID)
        {
            self::getInstance();
            $db = self::$_db;
            $stmt = $db -> prepare("DELETE FROM ".TABLE_CAR." WHERE carID = :carID");
            $var = array(":carID" => $carID);
            $stmt -> execute($var);
        }
    }
?>