<?php

$ROOT = [
		"User" => [
			"login" => [
				"view" 		=> null,
				"method" 	=> "isConnect",				 	
			],
			"loginView" => [
				"view" 		=> "login.php",
				"method" 	=> null,				 	
			],
			"create" => [
				"view" 		=> null,
				"method" 	=> "create",
			],
			"createView" => [
				"view" 		=> "subscribe.php",
				"method" 	=> null,
			],
			"update" => [
				"view" 		=> "update.php",
				"method" 	=> "update",
			],
			"disconnect" => [
				"view" 		=> null,
				"method" 	=> "destruct",				
			],
		],
		"Car" => [
			"predictAll" => [
				"view" 		=> "result.php",
				"method" 	=> "predictAll",				 	
			],
			"predictAllView" => [
				"view" 		=> "predict_all.php",
				"method" 	=> null,				 	
			],
			"predictLite" => [
				"view" 		=> "result.php",
				"method" 	=> "predictLite",				 	
			],
			"predictLiteView" => [
				"view" 		=> "predict_lite.php",
				"method" 	=> null,				 	
			],
			"update" => [
				"view" 		=> "result.php",
				"method" 	=> "update",
			],
			"updateView" => [
				"view" 		=> "update.php",
				"method" 	=> "getCarById",
			],
			"delete" => [
				"view" 		=> null,
				"method" 	=> "delete",				
			],
			"list" => [
				"view"		=> "home.php",
				"method" 	=> "getCarsByUsername",
			],
		],
		"default" => [ "model" => "Car", "method" => "list" ]
];

?>
