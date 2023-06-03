let sourceLat;
let sourceLon;


function getCurrentLocation() {
  return new Promise((resolve, reject) => {
    navigator.geolocation.getCurrentPosition(
      function (position) {
        sourceLat = position.coords.latitude;
        sourceLon = position.coords.longitude;
        console.log("Distance:", sourceLat);
        console.log("Distance:", sourceLon);
        resolve();
      },
      function (error) {
        console.error("Error retrieving current location:", error.message);
        // alert('')
        reject(error);
      }
    );
  });
}

async function updateLocationTemplate() {
  try {
    await getCurrentLocation();
    const locationHeader = document.getElementById("routes");
    
    // Make an AJAX request to the PHP file
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        // Handle the response from the PHP file
        const response = xhttp.responseText;
        console.log(response);

        // Decode the JSON string into a JavaScript object
        const decodedData = JSON.parse(response);

        var inhtml='';
        // Iterate over the decoded object
        if(decodedData.length < 1) {
          inhtml +=`No bussiness registered against your search query.`;
        }
        for (const key in decodedData) {
          if (decodedData.hasOwnProperty(key)) {
            const item = decodedData[key];
            inhtml +=`
            <div class="venues-item">
              <div class="venue-photo">
                <img src="uploads/${item.photo}" alt="Photo">
              </div>
              <div class="venue-info">
                <h3>${item.name}</h3>
                <p class="info"><b>Adress:</b> ${item.address}</p>
                <fieldset>
                  <legend>Pets Instructions</legend>

                  <input type="radio" id="sDogs"  ${item.sDogs} disabled>
                  <label for="sDogs">Small dogs allowed</label><br>

                  <input type="radio" id="bDogs" ${item.bDogs} disabled>
                  <label for="bDogs">Big dogs allowed</label><br>

                  <input type="radio" id="water" ${item.waterr} disabled>
                  <label for="water">Water for dogs</label><br>

                  <input type="radio" id="snacks" ${item.snacks} disabled>
                  <label for="snacks">Snacks for dogs</label>
                </fieldset>
                </br>
                
                <a href="${item.url}" class="ratingBtn feedback-button" target="_blank" style="float-right"> Open In Maps</a>
              </div>
            </div>`;
          }
        }

        const locationHeader = document.getElementById("eroutes");
          locationHeader.innerHTML =inhtml;
      }
    };

    // console.log
    xhttp.open("GET", "php_script/get-routes.php?type="+ where_clause +"&lat=" + sourceLat + "&lon=" + sourceLon, true);
    xhttp.send();


    // Continue updating the rest of your HTML template based on the location
    // ...
  } catch (error) {
    // alert("please enable browser's location");
     // document. location. reload();
    console.error("Failed to get current location:", error);
  }
}

// Call the function to update the location in the template
updateLocationTemplate();
