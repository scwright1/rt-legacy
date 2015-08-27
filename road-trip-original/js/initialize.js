function initialize() {
    //initialise the map
    latlng = new google.maps.LatLng(38.9815, -96.8555);
    mapOptions = {
        zoom: 5,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.TERRAIN
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    latlngbounds = map.getBounds();

    //initialise references to the autocomplete window
    markerIndex = 0;
    locationIndex = 0;
    var searchBox = document.getElementById("search-input");
    autocomplete = new google.maps.places.Autocomplete(searchBox);

    autocomplete.bindTo('bounds', map);
}

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
        var arraySend = locationName + "#" + latlong + "@";
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


function attachListener(mark, place) {
      google.maps.event.addListener(mark, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
      });
}
