       
<?php

require('./script/db/carDB.php');
require ('./script/model/car.php');
require ('./script/common/conf.php');

//Controller for Car model
class CarManaged {   


    static protected $car;

    public function __construct(){
        self::$car = new Car();
    }
    

    //Set Car instance with the post
    static protected function formCar($post) 
    {
        $brand              = (!empty($post['brand']))              ? $post['brand'] : null;
        $year               = (!empty($post['year']))               ? $post['year'] : null;
        $kilometersDriven   = (!empty($post['kilometersDriven']))   ? $post['kilometersDriven'] : null;
        $ownerType          = (!empty($post['ownerType']))          ? $post['ownerType'] : null;
        $fuelType           = (!empty($post['fuelType']))           ? $post['fuelType'] : null;
        $transmission       = (!empty($post['transmission']))       ? $post['transmission'] : null;
        $mileage            = (!empty($post['mileage']))            ? $post['mileage'] : null;
        $power              = (!empty($post['power']))              ? $post['power'] : null;
        $engine             = (!empty($post['engine']))             ? $post['engine'] : null;
        $seats              = (!empty($post['seats']))              ? $post['seats'] : null;
        $newPrice           = (!empty($post['newPrice']))           ? $post['newPrice'] : null;
        $price              = $post['price'];
        $userID             = $post['userID'];

        self::$car = new Car();
        self::$car::setBrand($brand);
        self::$car::setYear($year);
        self::$car::setKilometersDriven($kilometersDriven);
        self::$car::setOwnerType($ownerType);
        self::$car::setFuelType($fuelType);
        self::$car::setTransmission($transmission );
        self::$car::setMileage($mileage);
        self::$car::setPower($power);
        self::$car::setEngine($engine);
        self::$car::setSeats($seats);
        self::$car::setNewPrice($newPrice);
        self::$car::setPrice($price);
        self::$car::setUserID($userID);
        
        return self::$car;
    }
    

    //Destruct the instance of Car
    static protected function destructCar() {

        self::$car = new Car();
        self::$car::setBrand(null);
        self::$car::setYear(null);
        self::$car::setKilometersDriven(null);
        self::$car::setOwnerType(null);
        self::$car::setFuelType(null);
        self::$car::setTransmission(null);
        self::$car::setMileage(null);
        self::$car::setPower(null);
        self::$car::setEngine(null);
        self::$car::setSeats(null);
        self::$car::setNewPrice(null);
        self::$car::setPrice(null);
        self::$car::setUserID(null);
        
        return self::$car;
    }


    //----CRUD for the Car----//
    //Get all the Car and make a list of Car object
    static public function getAll()
    {
        $cars_list = [];
        foreach (CarDB::getAll() as $car){
            $car = self::formCar($car);
            array_push($cars_list, $car);
        }
        return $cars_list;
    }

    //Get all Car by the username
    static public function getCarsByUsername()
    {
        try{
            $username   = (!empty($_SESSION['username'])) ? $_SESSION['username'] : "";
            $cars       = CarDB::getCarsByUsername($username);       
            return $cars;
        }
        catch (Exception $e){
            return false;
        }
    }

    //Get one Car by his ID
    static public function getCarById($car)
    {
        $carID  =  $car['carID'];
        $car    = CarDB::getCarById($carID);
        $car    = self::formCar($car);
        return $car;
    }

    //Create one Car
    static public function create($car='')
    {
        $car = ($car != '') ? $car : self::$car;        
        CarDB::create($car);
    }

    //Update one Car
    static public function update($car)
    {
        $carID      = $car['carID'];
        $predict    = self::predictUpdate($car);
        $car        = self::formCar($car);

        $car::setPrice($predict);
        CarDB::update($carID, $car);

        return $predict;
    }


    //Delete one Car with his ID
    static public function delete($car)
    {
        $carID = $car['carID'];
        CarDB::delete($carID);
        self::destructCar();
    }

    //Make a prediction with all the 11 features
    static public function predictAll($post){
        $data = ['brand' => ucfirst($post['brand']), 'year' => $post['year'], 'kilometers_driven' => $post['kilometersDriven'], 'owner_type' => $post['ownerType'], 
                'fuel_type' => $post['fuelType'], 'transmission' => $post['transmission'], 'mileage' => $post['mileage'], 'engine' => $post['engine'], 
                'power' => $post['power'], 'seats' => $post['seats'], 'new_price' => $post['newPrice']];

        $predict = self::sendApi($data, URL_ALL);
        $predict = json_decode($predict, true)['prediction'];

        $post['price'] = $predict;
        $car = self::formCar($post);
        self::create($car);

        return $predict;
    }


    //Make a prediction with only 5 features
    static public function predictLite($post) {
        $data = ['brand' => ucfirst($post['brand']), 'year' => $post['year'], 'engine' => $post['engine'], 
                'power' => $post['power'], 'new_price' => $post['newPrice']];

        $predict = self::sendApi($data, URL_LITE);
        $predict = json_decode($predict, true)['prediction'];

        $post['price'] = $predict;
        $car = self::formCar($post);
        self::create($car);

        return $predict;
    }

    //Make a prediction with the Update
    static public function predictUpdate($post){
        $data = ['brand' => ucfirst($post['brand']), 'year' => $post['year'], 'kilometers_driven' => $post['kilometersDriven'], 'owner_type' => $post['ownerType'], 
                'fuel_type' => $post['fuelType'], 'transmission' => $post['transmission'], 'mileage' => $post['mileage'], 'engine' => $post['engine'], 
                'power' => $post['power'], 'seats' => $post['seats'], 'new_price' => $post['newPrice']];

        $predict = self::sendApi($data, URL_ALL);
        $predict = json_decode($predict, true)['prediction'];

        return $predict;
    }

    
    //Call to the API
    static protected function sendApi($data, $url){
        $options = array(
            'http' => array(
                'header'  => "Content-Type: application/json",
                'method'  => 'POST',
                'content' => json_encode($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result;
    }
}

?>