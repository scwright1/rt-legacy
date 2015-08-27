//create the marker location via autocomplete
function createAutocomplete() {

    //define the infowindow for this run
    infowindow = new google.maps.InfoWindow();

    //add a listener to set a marker if a new place is selected (which it always will be by definition)
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        //get the place information
        var place = autocomplete.getPlace();
        var locationName = place.formatted_address;
        var latlong = place.geometry.location;
        var uid = document.getElementById("user_id").value;
        var arraySend = locationName + "#" + latlong + "@" + uid;
        sessionLocations[locationIndex] = arraySend;
        //create the marker to be added, and the position, within the map bounds
        marker[markerIndex] = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });
        //set the content (this will be changed later)
        infowindow.setContent(place.name);
        //open the infowindow for the place we just created
        infowindow.open(map, marker[markerIndex]);
        //attach a listener for this marker for next time it is clicked
        attachListener(marker[markerIndex], place);
        //increment the markerIndex for the next run
        markerIndex++;
        locationIndex++;
    });
}

//attach a click listener to the pins so we can click any of the active locations (not the function for saving out the locations
function attachListener(mark, place) {
      google.maps.event.addListener(mark, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
      });
}
