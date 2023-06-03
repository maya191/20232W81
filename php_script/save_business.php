<?php
	require_once "db_connect.php";

	if (isset($_POST['saveBusiness'])) {
		$type=$_POST['businessType'];
		$name =$_POST['businessName'];
		$bnNumber=$_POST['bnNumber'];
		$email =$_POST['businessEmail'];
		$coordinates =$_POST['coordinates'];
		$address =$_POST['businessAddress'];
		$smallDogs =(isset($_POST['smallDogs'])) ? 1 : 0;
		$bigDogs =(isset($_POST['bigDogs'])) ? 1 : 0;
		$water =(isset($_POST['water'])) ? 1 : 0;
	    $snacks =(isset($_POST['snacks'])) ? 1 : 0;

        if (!file_exists('../uploads/')) {
		    mkdir('../uploads/', 0777, true);
		}
	    $targetDirectory = '../uploads/'; // Specify the directory where you want to save the file
		$originalFileName = $_FILES['businessPicture']['name']; // Get the original file name from the $_FILES array
		$temporaryFilePath = $_FILES['businessPicture']['tmp_name']; // Get the temporary file path

		// Generate a unique file name to avoid conflicts
		$newFileName = uniqid() . '_' . $originalFileName;

		$targetFilePath = $targetDirectory . $newFileName; // Set the target file path including the new file name

		if (move_uploaded_file($temporaryFilePath, $targetFilePath)) {
		    $sql="insert into businesses
		    (business_type,business_name,bn_number,business_email,geo_coordinates,full_address,small_dogs,big_dogs,water,snacks,business_picture) values 
		    ('".$type."','".$name."','".$bnNumber."','".$email."','".$coordinates."','".$address."','".$smallDogs."','".$bigDogs."','".$water."','".$snacks."', '".$newFileName."')";
		    if(mysqli_query($conn,$sql)){
		    	echo '<script>alert("Data saved"); window.location.href = "../business-register.php";</script>'; 
		    	// header('location: ../business-register.php');
		    }else{
		    	echo '<script>alert("Data not saved"); window.location.href = "../business-register.php";</script>'; 
		    	// header('location: ../business-register.php');
		    }
		} else {
		    echo '<script>alert("Data not saved"); window.location.href = "../business-register.php";</script>'; 
	    	// header('location: ../business-register.php');
		}



		// $sql="insert into businesses
		//     (business_type,business_name,bn_number,business_email,geo_coordinates,full_address,small_dogs,big_dogs,water,snacks) values 
		//     ('".$type."','".$name."','".$bnNumber."','".$email."','".$coordinates."','".$address."','".$smallDogs."','".$bigDogs."','".$water."','".$snacks."')";
	    // if(mysqli_query($conn,$sql)){
	    	
	    // 	echo '<script>alert("Data saved")</script>'; 
	    // 	header('location: ../business-register.php');
	    // }else{
	    // 	echo '<script>alert("Data not saved")</script>'; 
	    // 	header('location: ../business-register.php');
	    // }
	    mysqli_close($conn);
	}
?>