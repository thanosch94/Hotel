function initMap() {
  // Specify the latitude and longitude of the location
  var location = { lat: $lat, lng: $lon };

  // Create a new map centered at the specified location
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 13,
    center: location,
  });

  // Create a marker at the specified location
  var marker = new google.maps.Marker({
    position: location,
    map: map,
    title: "My Location",
  });
}
