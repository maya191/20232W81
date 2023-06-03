<?php
$reviewsArr=array();
$subArray=array();
$arrayType=array();

  $query = "SELECT business_id, business_type, business_name, full_address, review_count, average_review,business_picture  FROM businesses WHERE business_id='$busness_key'";

  // $query = "SELECT * FROM businesses LEFT JOIN reviews ON businesses.business_id=reviews.business_key WHERE businesses.business_type='restaurant'";
 // echo "<pre>";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      $reviewsArr['business_id'] = $row['business_id'];
      $reviewsArr['business_type'] = $row['business_type'];
      $reviewsArr['business_name'] = $row['business_name'];
      $reviewsArr['full_address'] = $row['full_address'];
      $reviewsArr['review_count'] = $row['review_count'];
      $reviewsArr['average_review'] = $row['average_review'];
      $reviewsArr['business_picture'] = $row['business_picture'];

      $queryReviews = "SELECT review_id, customer_name, email, rating, feedback, date_created FROM reviews WHERE business_key='".$row['business_id']."' ORDER BY review_id ASC";

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
      $reviewsArr['reviews']=$subArray;
    }
  }else{
    echo 'No registered business';
  }
?>