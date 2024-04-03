var map = L.map('map').setView([20.5937, 78.9629], 4); // Center map on India
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

var marker = L.marker([20.5937, 78.9629], {draggable: true}).addTo(map);
marker.on('dragend', function() {
    document.getElementById('lat').value = marker.getLatLng().lat;
    document.getElementById('lng').value = marker.getLatLng().lng;
});

function fetchAddress() {
    var lat = marker.getLatLng().lat;
    var lng = marker.getLatLng().lng;
    var url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`;

    fetch(url)
    .then(response => response.json())
    .then(data => {
        console.log(data);
        document.getElementById('state').value = data.address.state;
        document.getElementById('city').value = data.address.city || data.address.town;
        document.getElementById('zipcode').value = data.address.postcode;
        document.getElementById('address').value = data.display_name;
    })
    .catch(error => console.log('Error fetching address:', error));
}
