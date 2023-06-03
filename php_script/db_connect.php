<?php

    // for live server
	// $host="localhost";  
	// $user="mudaixmr_dogfriendly";
	// $pass="dogfriendly";
	// $db="mudaixmr_dogfriendly";

    // for localhost
    $host="localhost";  
	$user="root";
	$pass="";
	$db="dogfriendly";

	//create connection
	$conn=new mysqli($host,$user,$pass,$db);

	//check the connection
	if ($conn->connect_error){
	    die("Connection failed: ".$conn->connect_error);
	}

?>