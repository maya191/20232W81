<?php

$grocessaryArr=array();
$restaurantArr=array();
$laundromatArr=array();
$coffeeArr=array();
$supermarketArr=array();
$postalArr=array();
$bankArr=array();
$hairArr=array();
$museumArr=array();
$subArray=array();
$ssubArray=array();
$arrayType=array();

  $query = "SELECT business_id, business_type, business_name, full_address, review_count, average_review,business_picture  FROM businesses";
 // echo "<pre>";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      // print_r($row);
      $arrayType['business_id'] = $row['business_id'];
      $arrayType['business_type'] = $row['business_type'];
      $arrayType['business_name'] = $row['business_name'];
      $arrayType['full_address'] = $row['full_address'];
      $arrayType['review_count'] = $row['review_count'];
      $arrayType['average_review'] = number_format(round($row['average_review'],1),1);
      $arrayType['business_picture'] = $row['business_picture'];

      $queryReviews = "SELECT review_id, customer_name, email, rating, feedback, date_created FROM reviews WHERE business_key='".$row['business_id']."' ORDER BY review_id DESC";

      $resultReviews = mysqli_query($conn, $queryReviews);
      while ($rowReview = mysqli_fetch_assoc($resultReviews)) {
        $subArray[$rowReview['review_id']]=array(
          'review_id' => $rowReview['review_id'],
          'customer_name'=>$rowReview['customer_name'],
          'email'=>$rowReview['email'],
          'rating'=>$rowReview['rating'],
          'feedback'=>$rowReview['feedback'],
          'date'=>$rowReview['date_created'],
        );
        
      }
      // print_r($subArray);
      $arrayType['reviews']=$subArray;

      // array_push($ssubArray, $arrayType);



      if($row['business_type'] =='grocessary-store'){
        array_push($grocessaryArr, $arrayType);
        // $grocessaryArr=$ssubArray;
      }elseif($row['business_type'] == 'restaurant'){
        // $restaurantArr=$ssubArray;
        array_push($restaurantArr, $arrayType);

      }elseif($row['business_type'] == 'coffee-shop'){
        // $coffeeArr=$ssubArray;
        array_push($coffeeArr, $arrayType);


      }elseif($row['business_type'] == 'laundromat'){
        // $laundromatArr=$ssubArray;
        array_push($laundromatArr, $arrayType);

      }elseif($row['business_type'] == 'supermarket'){
        // $supermarketArr=$ssubArray;
        array_push($supermarketArr, $arrayType);

      }elseif($row['business_type'] == 'postal-office'){
        // $postalArr=$ssubArray;
        array_push($postalArr, $arrayType);

      }elseif($row['business_type'] == 'Bank'){
        // $bankArr=$ssubArray;
        array_push($bankArr, $arrayType);

      }elseif($row['business_type'] == 'hair-saloon'){
        // $hairArr=$ssubArray;
        array_push($hairArr, $arrayType);

      }elseif($row['business_type'] == 'museum'){
        // $museumArr=$ssubArray;
        array_push($museumArr, $arrayType);
      }  
    }
  }else{
    echo 'No registered business';
  }
?>