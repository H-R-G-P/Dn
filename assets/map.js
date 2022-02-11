let map = L.map('map').setView([53.900372, 27.558951], 6);
let mapProperties = JSON.parse(document.getElementById('map_json').innerText);

$( document ).ready(function() {
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    if (mapProperties.polygon === null){
        setBelMap();
    }else {
        setMap(mapProperties.polygon);
    }

    setMarkers(mapProperties.markers);
});

function setBelMap() {
    let southWest = new L.LatLng(56.14, 32.7),
        northEast = new L.LatLng(51.3, 23.6),
        bounds = new L.LatLngBounds(southWest, northEast);

    map.fitBounds(bounds);
}

function setMap(polygon) {
    let southWest = new L.LatLng(polygon.top, polygon.right),
        northEast = new L.LatLng(polygon.bottom, polygon.left),
        bounds = new L.LatLngBounds(southWest, northEast);

    map.fitBounds(bounds);
}

function setMarkers(markers) {
    let defIcon = L.icon({
        iconUrl: "/build/images/marker-icon.2b3e1faf.png",
        iconSize:     [20, 35],
        iconAnchor:   [10,35]
    });

    markers.forEach(function (mapMarker) {
        let lat = mapMarker.lat,
            lon = mapMarker.lon;

        if (lat && lon){
            L.marker([lat, lon], {icon: defIcon})
                .bindPopup('<pre>'+mapMarker.popup+'</pre>')
                .addTo(map);
        }
    });
}