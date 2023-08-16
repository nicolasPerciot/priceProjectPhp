<?php


class Car{
	static protected $carID;
	static protected $brand;
	static protected $year;
	static protected $kilometersDriven;
	static protected $ownerType;
	static protected $fuelType;
	static protected $transmission;
	static protected $mileage;
	static protected $engine;
	static protected $power;
	static protected $seats;
	static protected $newPrice;
	static protected $price;
	static protected $userID;

	public function __construct(){}

	public static function getCarID() {
		return self::$carID;
	}
	public static function setCarID($carID) {
		self::$carID = $carID;
	}
    

	public static function getBrand() {
		return self::$brand;
	}
	public static function setBrand($brand) {
		self::$brand = $brand;
	}


	public static function getYear() {
		return self::$year;
	}
	public static function setYear($year) {
		self::$year = $year;
	}


	public static function getKilometersDriven() {
		return self::$kilometersDriven;
	}
	public static function setKilometersDriven($kilometersDriven) {
		self::$kilometersDriven = $kilometersDriven;
	}


	public static function getOwnerType() {
		return self::$ownerType;
	}
	public static function setOwnerType($ownerType) {
		self::$ownerType = $ownerType;
	}


	public static function getFuelType() {
		return self::$fuelType;
	}
	public static function setFuelType($fuelType) {
		self::$fuelType = $fuelType;
	}


	public static function getTransmission() {
		return self::$transmission;
	}
	public static function setTransmission($transmission) {
		self::$transmission = $transmission;
	}


	public static function getMileage() {
		return self::$mileage;
	}
	public static function setMileage($mileage) {
		self::$mileage = $mileage;
	}


	public static function getEngine() {
		return self::$engine;
	}
	public static function setEngine($engine) {
		self::$engine = $engine;
	}


	public static function getPower() {
		return self::$power;
	}
	public static function setPower($power) {
		self::$power = $power;
	}


	public static function getSeats() {
		return self::$seats;
	}
	public static function setSeats($seats) {
		self::$seats = $seats;
	}


	public static function getNewPrice() {
		return self::$newPrice;
	}
	public static function setNewPrice($newPrice) {
		self::$newPrice = $newPrice;
	}


	public static function getPrice() {
		return self::$price;
	}
	public static function setPrice($price) {
		self::$price = $price;
	}

	public static function getUserID() {
		return self::$userID;
	}
	public static function setUserID($userID) {
		self::$userID = $userID;
	}
}
?>