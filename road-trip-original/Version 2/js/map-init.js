function initialize() {
    //initialise the map
    latlng = new google.maps.LatLng(38.9815, -96.8555);

    //move the standard panorama components as the Journee menu interferes with them
    var streetViewOptions = {
        panControl: true,
        panControlOptions: {
        position: google.maps.ControlPosition.LEFT_CENTER
        },
        addressControl: true,
        addressControlOptions: {
            position: google.maps.ControlPosition.BOTTOM_CENTER
        },
        zoomControl: true,
        zoomControlOptions: {
            position: google.maps.ControlPosition.LEFT_CENTER
        },
        //important that this is false
        visible: false
    };
    //create the streetview object to pass to the map options
    var street = new google.maps.StreetViewPanorama(document.getElementById('map-wrapper'), streetViewOptions);
    
    var panoramaCloseButton = document.getElementById('panoramaClose');

    //add the custom close control
    street.controls[google.maps.ControlPosition.LEFT_CENTER].push(panoramaCloseButton);

    //add the custom close control listener
    google.maps.event.addDomListener(panoramaCloseButton, 'click', function() {
        var panorama = map.getStreetView();
        panorama.setVisible(false);
    });

    //create the map options for first run of the map (moving around the default map controls
    mapOptions = {
        zoom: 5,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        streetView: street,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
            position: google.maps.ControlPosition.LEFT_CENTER
        },
        panControl: true,
        panControlOptions: {
            position: google.maps.ControlPosition.LEFT_CENTER
        },
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.LEFT_CENTER
        },
        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.LEFT_CENTER
        }

    };

    map = new google.maps.Map(document.getElementById("map-wrapper"), mapOptions);
    latlngbounds = map.getBounds();

    //initialise references to the autocomplete window
    markerIndex = 0;
    locationIndex = 0;
    var searchBox = document.getElementById("searchInput");
    autocomplete = new google.maps.places.Autocomplete(searchBox);

    autocomplete.bindTo('bounds', map);
}
