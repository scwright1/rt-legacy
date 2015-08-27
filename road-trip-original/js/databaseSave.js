function saveToDatabase() {
    //do some stuff here
    //need to serialize the array of marker points to pass through to the PHP
    var serializedLocations = serialize(sessionLocations);
    //console.log(serializedLocations);
    var serialized = document.getElementById("serialized").value = serializedLocations;
    console.log(serialized);
    //$.post("php/saveToDb.php", serializedLocations);
}
