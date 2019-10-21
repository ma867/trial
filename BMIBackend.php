#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

session_start();
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

$username = $_SESSION["username"];
$age = $_POST["age"];
$weight = $_POST["weight"];
$height = ($_POST["feet"] * 12) + $_POST["inches"] ;
$gender = $_POST["gender"];
$lifestyle = $_POST["lifestyle"];
$preferences = $_POST["preferences"];
if(isset($_POST["gluten"])){
    $gluten = 1;
}
else{
    $gluten = 0;
}
if(isset($_POST["dairy"])){
    $dairy = 1;
}
else{
    $dairy = 0;
}
if(isset($_POST["peanut"])){
    $peanut = 1;
}
else{
    $peanut = 0;
}
if(isset($_POST["seafood"])){
    $seafood = 1;
}
else{
    $seafood = 0;
}

switch($preferences){
    case "vegetarian":
        return $preferences = "vegetarian";
    case "vegan":
        return $preferences = "vegan";
    case "nonvegetarian":
        return $preferences = "nonvegetarian";
    case "pescetarian":
        return $preferences = "pescetarian";
    default:
        return $preferences = "nonvegetarian";
}


    

$request = array();
$request['type'] = "insertinfo";
$request['username'] = $username;
$request['age'] = $age;
$request['weight'] = $weight;
$request['height'] = $height;
$request['gender'] = $gender;
$request['lifestyle'] = $lifestyle;
$request['preferences'] = $preferences;
$request['gluten'] = $gluten;
$request['dairy'] = $dairy;
$request['peanut'] = $peanut;
$request['seafood'] = $seafood;
$response = $client->send_request($request);
/*$request['vegetarian'] = $vegetarian;
$request['nonvegetarian'] = $nonvegetarian;
$request['vegan'] = $vegan;
$request['pescetarian'] = $pescetarian;
$request['anything'] = $anything;
$response = $client->send_request($request);
//$response = $client->publish($request);*/

if($response == 1)
{
echo "request not received";
//header("Location: runsuccessful.php");
//exit;
}
else{

echo "request received";
//header("Location: rsuccessful.php");
//exit;
}
?>
