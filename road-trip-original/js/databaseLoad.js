//load the existing points from our database
function databaseLoad() {
    $.getJSON("php/loadFromDb.php",{}, function(data){
        var service;
        var ne = new google.maps.LatLng(45.6339, -67.4780);
        var sw = new google.maps.LatLng(27.9612, -124.3652);
        latlngbounds = new google.maps.LatLngBounds();
        for(var i=0; i<data.length; i++) {
            var address = data[i].value;
            address = "'" + address + "'";
            console.log("reading: " + address);
            var request = {
                bounds: latlngbounds,
                keyword: address
            }
            //for some reason the search service stopped working...
            //service = new google.maps.places.PlacesService(map);
            //service.search(request, callback);
            codeAddress(address);
        }
    });
}

function codeAddress(address) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address': address}, function(results, status) {
        if(status == google.maps.GeocoderStatus.OK) {
        for(var i = 0; i < results.length; i++) {
            console.log(results[i].name + " " + i);
        }
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
                //  icon: image 
            });
            attachExistingListener(marker, results[0]);
        }
        else{
            alert(status + " on " + address);
        }
    });
}

function callback(results, status) {
    if(status == google.maps.places.PlacesServiceStatus.OK) {
        console.log("in callback");
        for(var i = 0; i < results.length; i++) {
            console.log(results[i].name + " " + i);
        }
        // var image = "http://www.google.com/intl/en_us/mapfiles/ms/micons/green-dot.png";
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
          //  icon: image 
        });
        attachExistingListener(marker, results[0]);
    }
    else{
        alert("There was a problem: " + status);
    }
}

function attachExistingListener(mark, place) {
      google.maps.event.addListener(mark, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
      });
}
