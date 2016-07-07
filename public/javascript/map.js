var myCenter = new google.maps.LatLng(28.6139,77.2090);

$.getJSON( "json/mapData.json", function( data ) {
    var items = [];
    $.each( data, function( key, val ) {
        $.each(val, function(index, detail){
            items.push(detail.location);
        });
    });

    initialize(items);
});

function initialize($locations)
{

    console.log($locations);

    var mapProp = {
        center:myCenter,
        zoom:7,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker=new google.maps.Marker({
        position:myCenter,
    });

    marker.setMap(map);

    var infowindow = new google.maps.InfoWindow({
        content:"Hello World!"
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker);
    });

}

// google.maps.event.addDomListener(window, 'load', initialize);