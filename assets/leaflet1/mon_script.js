
  var map = L.map('map').setView([-3.3561905516096346,29.385031508258635], 14);


L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="#">AZ TECH-GROUP</a>',
    maxZoom: 50
   
}).addTo(map);

var marker = L.marker([-3.3561905516096346,29.385031508258635]).addTo(map);
marker.bindPopup("<b>CENTRE HOSPITALO-UNIVERSITAIRE DE KAMENGE</b><br><img src='uploads/r.jpg' width='100%' height='200px'><br>localisation." ).openPopup();
var circle = L.circle([-3.3561905516096346,29.385031508258635], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 50
}).addTo(map);