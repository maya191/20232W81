<?php
	require_once "db_connect.php";
	if (isset($_POST['saveReview'])) {

		// print_r($_POST);
		// die;
		$name=trim($_POST['name']);
		echo '<br> cRating '.$rating=trim($_POST['rating']);
		$feedback=trim($_POST['feedback']);
		$businessId=trim($_POST['businessId']);
		$email=trim($_POST['email']);
		echo '<br> cCount '.$count=trim($_POST['countId']);
		$average=trim($_POST['averageId']);
		echo '<br> pRatingAvg'.$average=(trim($_POST['averageId'])=='Not rated yet') ? 0 : trim($_POST['averageId']);
		// echo '<br> nCount'.$newAverage=$rating + $average;
		echo '<br> nAverage '.$newAverage=($rating + ($count * $average)) / ++$count;

		// die;

		$sql="insert into reviews
		    (customer_name,rating,feedback,business_key,email) values 
		    ('".$name."','".$rating."','".$feedback."','".$businessId."','".$email."')";
		mysqli_query($conn,$sql);

		$sql="UPDATE  businesses SET review_count='".$count."', average_review='".$newAverage."' WHERE business_id='".$businessId."'";

		if(mysqli_query($conn,$sql)){
			echo '<script>alert("Data saved"); window.location.href = "../reviews.php";</script>'; 
	    	// header('location: ../reviews.php');
	    }else{
			echo '<script>alert("Data not saved"); window.location.href = "../reviews.php";</script>'; 
	    	// header('location: ../reviews.php');
	    }
	    mysqli_close($conn);
	}
?>