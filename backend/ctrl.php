<?php
header('Access-Control-Allow-Origin: *');
if (!isset($_SESSION)) {
    @session_start();
}

require_once(realpath(dirname( __FILE__ )) . "/api.php");
require_once(realpath(dirname( __FILE__ )) . "/classes/db.php");

$api = new Api();

$output = array();

$first_name = ($_POST["first_name"] && $_POST["first_name"] != "null" ? $_POST["first_name"] : null);
$last_name = ($_POST["last_name"] && $_POST["last_name"] != "null" ? $_POST["last_name"] : null);
$email = ($_POST["email"] && $_POST["email"] != "null" ? $_POST["email"] : null);
$code = intval($_POST["code"]);

$valid = true;
//1 validation
if (!$first_name || !$last_name || !$email || !$code) {
    $valid = false;
} else if (strlen($code) !== 6) {
    $valid = false;
}

//2 Check Unique Code


if ($valid) {
    $uc_output = Api::check_unique_code($code);

    if (!$uc_output["success"]){
        $output["success"] = true;
        $output["message"] = $uc_output["message"];
    } else {
    
        $inputs = array(
            "first_name" 	    => $first_name,
            "last_name"         => $last_name,
            "email" 	        => $email,
            "unique_code_id"    => $uc_output["unique_code_id"]
        );
        
        $output = Api::register($inputs); 

        if ($output["success"]) {
            $output["success"] = $output["success"];
            $output["message"] = $output["message"];
        } 
    }    
 
} else{
    $output["success"] = false;
    $output["message"] = "Some Data is Invalid!!";
}


header('Content-Type: application/json; charset=utf-8');
echo (json_encode($output));