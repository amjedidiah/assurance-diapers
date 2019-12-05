function initMap() {
  let uluru = { lat: 6.4666, lng: 3.2533 },
    map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: uluru
    }),
    marker = new google.maps.Marker({ position: uluru, map: map });
}
