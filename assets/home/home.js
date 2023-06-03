function changeButtonColor(button) {
  if(button.style.backgroundColor!="black"){
    button.style.backgroundColor = "black";
  }
  else{
    button.style.backgroundColor = "rgb(210, 161, 255)";
  }
}


function initMap() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      var map = new google.maps.Map(document.getElementById('map'), {
        center: pos,
        zoom: 14
      });

      var marker = new google.maps.Marker({
        position: pos,
        map: map,
        title: 'Your current location'
      });
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    handleLocationError(false, infoWindow, map.getCenter());
  }
}


function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
}



// const navbarToggle = document.querySelector(".navbar-toggle");
// const navbarMenu = document.querySelector(".navbar-menu");

// navbarToggle.addEventListener("click", () => {
//   navbarMenu.classList.toggle("show");
// });

/*Route Code*/
// Get user's current location using Geolocation API
navigator.geolocation.getCurrentPosition(function(position) {
  const userLat = position.coords.latitude;
  const userLng = position.coords.longitude;

  // Query the table of local businesses that allow dogs
  const businesses = [
    { name: 'Business A', streetName: 'Main St', streetNumber: '123', cityName: 'City A', postalCode: '12345', lat: 37.7749, lng: -122.4194 },
    { name: 'Business B', streetName: 'Broadway', streetNumber: '456', cityName: 'City B', postalCode: '67890', lat: 37.7914, lng: -122.4085 },
    { name: 'Business C', streetName: 'Market St', streetNumber: '789', cityName: 'City C', postalCode: '11111', lat: 37.7749, lng: -122.4194 },
  ];

  // Calculate the distance between the user and each business using the Haversine formula
  function calculateDistance(lat1, lng1, lat2, lng2) {
    const earthRadius = 6371; // km
    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLng = (lng2 - lng1) * Math.PI / 180;
    const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
              Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
              Math.sin(dLng/2) * Math.sin(dLng/2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    const distance = earthRadius * c;
    return distance;
  }

  // Find the nearest businesses that allow dogs
  const maxDistance = 10; // km
  const businessesWithDistance = businesses.map(business => {
    const distance = calculateDistance(userLat, userLng, business.lat, business.lng);
    return { ...business, distance };
  }).filter(business => business.distance <= maxDistance);

  // Sort the businesses by distance
  businessesWithDistance.sort((a, b) => a.distance - b.distance);

  // Display the list of nearest businesses that allow dogs
  businessesWithDistance.forEach(business => {
    console.log(`${business.name} (${business.distance.toFixed(2)} km)`);
  });
}, function(error) {
  console.log(error);
});
