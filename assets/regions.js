let map = L.map('map');

$( document ).ready(function() {
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    if (JSON.parse($('#polygon')) === null){
        setBelMap();
    }else {
        setMap(JSON.parse($('#map_corners')));
    }

    setMarkers(JSON.parse($('#region_obj')));
});

function setBelMap() {
    let southWest = new L.LatLng(56.14, 32.7),
        northEast = new L.LatLng(51.3, 23.6),
        bounds = new L.LatLngBounds(southWest, northEast);

    map.fitBounds(bounds);
}

function setMap(polygon) {
    let southWest = new L.LatLng(polygon.getTop(), polygon.getRight()),
        northEast = new L.LatLng(polygon.getBottom(), polygon.getleft()),
        bounds = new L.LatLngBounds(southWest, northEast);

    map.fitBounds(bounds);
}

function setMarkers(region) {
    for (let place in region.getPlaces()) {
        let lat = place.getLat(),
            lon = place.getLon();

        if (lat && lon){
            L.marker([lat, lon]).addTo(map);
        }
    }
}