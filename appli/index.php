<?php


session_start();


include("./conf/root.php");


// Import all the managed files 
$phpDir = "./script/managed";
foreach (glob("$phpDir/*.php") as $phpFile) {
    include($phpFile);
}

$dict_object = [
    "Car"       => "CarManaged",
    "User"      => "UserManaged",
];


// Get all the parameters from the GET
$REQ_CLIENT = [
    "model"	    => (!empty($_GET["model"])) 	? $_GET["model"] 	: $ROOT["default"]["model"],
    "method" 	=> (!empty($_GET["method"])) 	? $_GET["method"] 	: $ROOT["default"]["method"],
    "post"		=> [],
];



$model  = $REQ_CLIENT["model"];
$method = $REQ_CLIENT["method"];


//Create the object
$object = new $dict_object[$model]();
    


//Get all the parameters in the POST
if(!empty($_POST)) {
    foreach($_POST as $key => $value) {
        $REQ_CLIENT["post"][$key] = addslashes($value);
    }
}

// Get the method in the Root
$m     = $ROOT[$model][$method]['method'];

// Get the view in the Root
$view  = $ROOT[$model][$method]['view'];


// Do the method 
if($m != null){
    if( !empty($REQ_CLIENT["post"]) ){
        $_SESSION['data'] = $object->$m($REQ_CLIENT["post"]);
        if( $model == "User" ){
            $_SESSION['userID']     = $object::getUserID($object::$user::getUsername());
            $_SESSION['username']   = $object::$user::getUsername();
        }
    }
    else{        
        $_SESSION['data'] = $object->$m();
    }
}


//Make all values to default
if($view == null){
    $model  = $ROOT["default"]["model"];
    $method = $ROOT["default"]["method"];
    $object = new $dict_object[$model]();
    $m      = $ROOT[$model][$method]['method'];
    $view   = $ROOT[$model][$method]['view'];
    $_SESSION['data'] = $object->$m();
} 




// Display
require("./front/header.php");
require("./front/".strtolower($model)."/$view");
require("./front/footer.html");


?>