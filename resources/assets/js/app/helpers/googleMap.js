module.exports = function() {
var map;

var initialize = function() {
    // mapCenter bettween Parque 21 de Mayo and Catedral del Sagrario de la Inmaculada or set the retrieved coordinates
    var latitude = ($('#latitude').val() === "") ? 18.892679 : $('#latitude').val();
    var longitude = ($('#longitude').val() === "") ? -96.947475 : $('#longitude').val();
    var mapCenter = new google.maps.LatLng(latitude, longitude);
    var mapOptions = {
        zoom: 17,
        center: mapCenter,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map'), mapOptions);

    var setLocation = function(latLng) {
        map.setCenter(latLng);
    };

    var logCenter = function() {
        ///console.log(map.getCenter().toUrlValue()); // for debug purpose
        $('#latitude').val(map.getCenter().lat());
        $('#longitude').val(map.getCenter().lng());
    };

    $('#buttonGetGeolocation').click(function(){
        // Check for geolocation support
         if (navigator.geolocation) {
             // Get current position
             navigator.geolocation.getCurrentPosition(function(position) {
                 // Geolocation Success!
                 setLocation(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
             },function(){ sweetAlertNotTimer('error', 'No se tienen permisos para obtener su ubicación, recargue la página para permitir o active la geolocalización'); });
         } else {
             //No geolocation fallback: Defaults mapCenter
            sweetAlertNotTimer('error', 'Su navegador no soporta geolocalización'); });
        }
    });

    // Check for geolocation support
    // if (navigator.geolocation) {
    //     // Get current position
    //     navigator.geolocation.getCurrentPosition(function(position) {
    //         // Geolocation Success!
    //         setLocation(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
    //     }, function() {
    //         // Gelocation fallback: Defaults mapCenter
    //         setLocation(mapCenter);
    //     }
    //     );
    // } else {
        // No geolocation fallback: Defaults mapCenter
        setLocation(mapCenter);
    //}

    // log initial center
    logCenter();

    // log when center changed
    google.maps.event.addListener(map, "center_changed", function() {
        logCenter();
    });
};

google.maps.event.addDomListener(window, 'load', initialize);

$("a[href='#geolocation']").on('shown.bs.tab', function() {
    // Trigger map resize event because is in a tab
    var lastCenter = map.getCenter();
    google.maps.event.trigger(map, 'resize');
    map.setCenter(lastCenter);
});
};