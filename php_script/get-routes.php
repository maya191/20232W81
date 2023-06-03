<?php
require_once 'db_connect.php';
$distances = array();
$businesses=array();
function calculateShortestDistance($userLat, $userLon, $type) {
    // Connect to your database (replace with your database credentials)
    global $conn;

    // Retrieve destination coordinates from the database
    $query = "SELECT * FROM businesses WHERE ".$type."";
    $result = mysqli_query($conn, $query);
// die;
    // Create an array to store the distances
    global $distances;
    global $businesses;

    // Loop through the destination coordinates
    while ($row = mysqli_fetch_assoc($result)) {
        // print_r($row);
        $cord=explode(',', $row['geo_coordinates']);
        $destLat = $cord[0];
        $destLon = $cord[1];

        // Calculate the distance between the user location and destination
        $distance = calculateDistance($userLat, $userLon, $destLat, $destLon);
        $source=$userLat.','.$userLon;
        $encodedSource = urlencode($source);
        $destinations = array(
            trim($row['geo_coordinates']),
        );

        $encodedDestinations = array_map('urlencode', $destinations);
        $url = 'https://www.google.com/maps/dir/' . $encodedSource . '/' . implode('/', $encodedDestinations);

        $destinationAddress = $row['full_address']; // Destination address
      

        $encodedAddress = urlencode($destinationAddress);
        $googleMapsUrl = "https://www.google.com/maps/dir/?api=1&destination=" . $encodedAddress;


        // echo $googleMapsUrl;


        // Store the distance in the array with the destination ID
        $distances[$row['business_id']] = $distance;
        $businesses[''.$distance.'']=array(
            'type'=>$row['business_type'],
            'name'=>$row['business_name'],
            'number'=>$row['bn_number'],
            'email'=>$row['business_email'],
            'cords'=>$row['geo_coordinates'],
            'address'=>$row['full_address'],

            'sDogs'=>($row['small_dogs']==1) ? 'checked' : '',
            'bDogs'=>($row['big_dogs']==1) ? 'checked' : '',
            'water'=>($row['water']==1) ? 'checked' : '',
            'snacks'=>($row['snacks']==1) ? 'checked' : '',
            'url'=>$googleMapsUrl,
            'photo'=>$row['business_picture']
        );
    }

    // Sort the distances array in ascending order

    asort($distances);
    

    // Close the database connection
    mysqli_close($conn);

    // Return the sorted distances array
    return $distances;
}

function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $R = 6371; // Radius of the Earth in kilometers
    $dLat = toRadians($lat2 - $lat1);
    $dLon = toRadians($lon2 - $lon1);
    $a = sin($dLat / 2) * sin($dLat / 2) + cos(toRadians($lat1)) * cos(toRadians($lat2)) * sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $distance = $R * $c;

    return $distance;
}

function toRadians($degrees) {
    return $degrees * (pi() / 180);
}

// Example usage
$userLat = $_GET['lat']; // User's latitude
$userLon = $_GET['lon']; // User's longitude
$type = $_GET['type']; // User's longitude

$distances = calculateShortestDistance($userLat, $userLon, $type);

ksort($businesses);
echo json_encode($businesses);
?>