#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once ('BMRFormulas.php');


function doLogin($username,$password)
{
    $logindb = new mysqli("192.168.2.4","testUser","12345","testdb");
	if(mysqli_connect_errno())
	{
		echo "failed to connect to MYSQL:" . mysqli_connect_error();
		exit();
	}
	print "connected";

	mysqli_select_db($logindb, "testdb");
	$query = "select * from users where username = '$username' and password = '$password'";
	$runQuery = mysqli_query($logindb, $query) or die(mysqli_error($logindb));
	$row = mysqli_num_rows($runQuery);
	if ($row > 0)
	{
		echo "user exists logged in!";	
		return 1;
		}
	else
	{
		echo "user doesn't exist";	
		return 0;}

}

function doRegister($username, $password, $email, $firstname, $lastname){
	$logindb = new mysqli("192.168.2.4","testUser","12345","testdb");
	if(mysqli_connect_errno())
	{
		echo "failed to connect to MYSQL:" . mysqli_connect_error();
		exit();
	}
	else{
		print "connected";

		mysqli_select_db($logindb, "testdb");
		$query = "select * from users where username = '$username' or email = '$email'";
		$runQuery = mysqli_query($logindb, $query) or die(mysqli_error($logindb));
		$row = mysqli_num_rows($runQuery);
		if ($row >= 1){
			echo "user already exists. please use a different email/username";
			return 1;
		}
		else
		{
			$query = "insert into users (username, password, email, firstname, lastname) values ('$username', '$password', '$email', '$firstname', '$lastname')";
			$runQuery = mysqli_query($logindb, $query) or die(mysqli_error($logindb));
			echo "your account has been created!";
			return 0;
        }
	}
		
}
function registerUserIntolerances($username, $gluten, $dairy, $peanut, $seafood){

    $logindb = new mysqli("192.168.2.4","testUser","12345","testdb");
    if(mysqli_connect_errno())
    {
        echo "failed to connect to MYSQL:" . mysqli_connect_error();
        exit();
    }
    else {
        mysqli_select_db($logindb, "testdb");
        //get userid from users table using username
        $query = "select * from users where username = '$username'";
        $runQuery = mysqli_query($logindb, $query) or die(mysqli_error($logindb));
        while ($result = mysqli_fetch_array($runQuery, MYSQLI_ASSOC)) {
            $userid = $result["userid"];
        }
        //insert user info using the userid
        $query = "insert into intolerances(userid, gluten, dairy, peanut, seafood) values ('$userid', '$gluten', '$dairy', '$peanut', '$seafood')";
        $runQuery = mysqli_query($logindb, $query) or die(mysqli_error($logindb));
        return 0;

    }
}

function registerUserPreferences($username, $preferences){
    //check what dietary preference the user chose and define which is "true"
    if($preferences = "vegetarian"){
        $vegetarian = 1;
        $vegan = 0;
        $nonvegetarian= 0;
        $pescetarian = 0;
    }
    if($preferences = "vegan"){
        $vegetarian = 0;
        $vegan = 1;
        $nonvegetarian= 0;
        $pescetarian = 0;
    }
    if($preferences = "nonvegetarian"){
        $vegetarian = 0;
        $vegan = 0;
        $nonvegetarian= 1;
        $pescetarian = 0;
    }
    if($preferences = "pescetarian"){
        $vegetarian = 0;
        $vegan = 0;
        $nonvegetarian= 0;
        $pescetarian = 1;
    }
    $logindb = new mysqli("192.168.2.4","testUser","12345","testdb");
    if(mysqli_connect_errno())
    {
        echo "failed to connect to MYSQL:" . mysqli_connect_error();
        exit();
    }
    else {
        mysqli_select_db($logindb, "testdb");
        //get userid from users table using username
        $query = "select * from users where username = '$username'";
        $runQuery = mysqli_query($logindb, $query) or die(mysqli_error($logindb));
        while ($result = mysqli_fetch_array($runQuery, MYSQLI_ASSOC)) {
            $userid = $result["userid"];
        }
        //insert user info using the userid
        $query = "insert into preferences(userid, vegetarian, nonvegetarian, vegan, pescetarian) values ('$userid', '$vegetarian', '$nonvegetarian', '$vegan', '$pescetarian')";
        $runQuery = mysqli_query($logindb, $query) or die(mysqli_error($logindb));
        return 0;

}
}
function registerUserBMI($username, $age, $weight, $height, $gender, $lifestyle){
   $logindb = new mysqli("192.168.2.4","testUser","12345","testdb");
    if(mysqli_connect_errno())
    {
        echo "failed to connect to MYSQL:" . mysqli_connect_error();
        exit();
    }
    else {
        mysqli_select_db($logindb, "testdb");
        //get userid from users table using username
        $query = "select * from users where username = '$username'";
        $runQuery = mysqli_query($logindb, $query) or die(mysqli_error($logindb));
        while ($result = mysqli_fetch_array($runQuery, MYSQLI_ASSOC)) {
            $userid = $result["userid"];
        }
        //insert user info using the userid
        $query = "insert into bmi(userid, weight, height, age, gender, lifestyle) values ('$userid', '$weight', '$height', '$age', '$gender', '$lifestyle')";
        $runQuery = mysqli_query($logindb, $query) or die(mysqli_error($logindb));
        //calculate recommended calories
        $recommendedCalories = BMRFormulas::calculateCalories($age, $weight, $height, $gender, $lifestyle);
        //insert recommended calories into bmi table
        $query = "update bmi set reccalories = '$recommendedCalories' where userid = '$userid'";
        $runQuery = mysqli_query($logindb, $query) or die(mysqli_error($logindb));
        return 0;
    }

}

function registerUserInfo($username, $age, $weight, $height, $gender, $lifestyle, $preferences, $gluten, $dairy, $peanut, $seafood){
    registerUserBMI($username, $age, $weight, $height, $gender, $lifestyle);
    registerUserPreferences($username, $preferences);
    registerUserIntolerances($username, $gluten, $dairy, $peanut, $seafood);
    return 0;
}

function requestProcessor($request)
{
    echo "received request".PHP_EOL;
    var_dump($request);
    if(!isset($request['type']))
    {
        return "ERROR: unsupported message type";
    }
    switch ($request['type'])
    {
        case "login":
            return doLogin($request['username'],$request['password']);
        case "register":
            return doRegister($request['username'],$request['password'],$request['email'],$request['firstname'], $request['lastname']);
        case "insertinfo":
            return registerUserInfo($request['username'],$request['age'],$request['weight'],$request['height'], $request['gender'], $request['lifestyle'], $request['preferences'],$request['gluten'],$request['dairy'], $request['peanut'], $request['seafood']);

    }
    return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>

