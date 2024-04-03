let map;
let marker;

function initMap() {
    const initialLocation = { lat: -34.397, lng: 150.644 };
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: initialLocation,
    });

    marker = new google.maps.Marker({
        position: initialLocation,
        map: map,
        draggable: true,
    });

    google.maps.event.addListener(marker, 'dragend', function() {
        document.getElementById('location').value = `${marker.getPosition().lat()},${marker.getPosition().lng()}`;
    });
}

window.initMap = initMap;

function submitForm() {
    const location = document.getElementById('location').value;
    // Here you'd typically make an AJAX request to your server to submit the form data,
    // including the 'location' value which contains the latitude and longitude.
    console.log(location); // For demonstration, we're just logging the value.
    // You'll replace this part with your actual form submission logic.
}
