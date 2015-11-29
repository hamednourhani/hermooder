var map;
var markers = [];
var infoWindow;
var locationSelect;

function loadMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(40, -100),
    zoom: 4,
    mapTypeId: 'roadmap',
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
  });
  infoWindow = new google.maps.InfoWindow();

  locationSelect = document.getElementById("locationSelect");
  locationSelect.onchange = function() {
    var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
    if (markerNum != "none"){
      google.maps.event.trigger(markers[markerNum], 'click');
    }
  };
}

function searchLocations() {
 var address = document.getElementById("addressInput").value;
 var geocoder = new google.maps.Geocoder();
 geocoder.geocode({address: address}, function(results, status) {
   if (status == google.maps.GeocoderStatus.OK) {
    searchLocationsNear(results[0].geometry.location);
   } else {
     alert(address + ' not found');
   }
 });
}

function clearLocations() {
 infoWindow.close();
 for (var i = 0; i < markers.length; i++) {
   markers[i].setMap(null);
 }
 markers.length = 0;

 locationSelect.innerHTML = "";
 var option = document.createElement("option");
 option.value = "none";
 option.innerHTML = "See all results:";
 locationSelect.appendChild(option);
}

function searchLocationsNear(center) {
 clearLocations();

 var radius = document.getElementById('radiusSelect').value;
 var searchOptions = {
                      'lat' : center.lat(),
                      'lng' : center.lng(),
                      'radius' : radius,
                    };
 


 when(downloadUrl(searchOptions)).done(function(data) {
   var xml = parseXml(data);
   var markerNodes = xml.documentElement.getElementsByTagName("marker");
   var bounds = new google.maps.LatLngBounds();
   
   //---------- comparator -------------------
   // var children = [];
   // for (var i = 0; i < markerNodes.length; i++) {
   //    chidlren.push(markerNodes[i]);
   //  }
   //  function compare(a,b) {
   //    if (parseFloat(a.getAttribute("distance")) < parseFloat(b.getAttribute("distance"))
   //       return -1;
   //    if (parseFloat(a.getAttribute("distance")) > parseFloat(b.getAttribute("distance"))
   //      return 1;
   //    return 0;
   //  }
   // children.sort(compare);
   // markerNodes = children;

   for (var i = 0; i < markerNodes.length; i++) {
     var name = markerNodes[i].getAttribute("name");
     var address = markerNodes[i].getAttribute("address");
     var distance = parseFloat(markerNodes[i].getAttribute("distance"));
     var latlng = new google.maps.LatLng(
          parseFloat(markerNodes[i].getAttribute("lat")),
          parseFloat(markerNodes[i].getAttribute("lng")));

     createOption(name, distance, i);
     createMarker(latlng, name, address);
     bounds.extend(latlng);
   }
   map.fitBounds(bounds);
   locationSelect.style.visibility = "visible";
   locationSelect.onchange = function() {
     var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
     google.maps.event.trigger(markers[markerNum], 'click');
   };
  });
}

function createMarker(latlng, name, address) {
  var html = "<b>" + name + "</b> <br/>" + address;
  var marker = new google.maps.Marker({
    map: map,
    position: latlng
  });
  google.maps.event.addListener(marker, 'click', function() {
    infoWindow.setContent(html);
    infoWindow.open(map, marker);
  });
  markers.push(marker);
}

function createOption(name, distance, num) {
  var option = document.createElement("option");
  option.value = num;
  option.innerHTML = name + "(" + distance.toFixed(1) + ")";
  locationSelect.appendChild(option);
}

function downloadUrl(searchOptions) {
    var ajax_defer = $.Deferred();
    var ajax_err = {};
    var ajaxurl = $('#ajax-pharmacy_search').attr('data-url');
    var ajaxnonce = $('#ajax-pharmacy_search').attr('data-nonce');
    
    var center_lat = searchOptions.lat;
    var center_lng = searchOptions.lng;
    var radius = searchOptions.radius;
   
      


    $.ajax({
             method: "post",
             dataType:"xml",
             url: ajaxurl,
             //success: UrlHelper.renderData,
             //error : UrlHelper.logError,
             data : {
                   action: "hermooder_request_pharmacies",
                   lat : center_lat,
                   lng : center_lng,
                   radius : radius,
                   nonce: ajaxnonce
             }
       
    }).done(function(response){
        
        if(response.error === '404') {
        
            console.log('url was not found',response);
            ajax_err['notfound'] = '404';
            ajax_defer.reject(ajax_err);
        
        } else {
            console.log('response : ' + JSON.stringify(response));
            ajax_defer.resolve(response);

        }
                    
      }).fail(function(XMLHttpRequest, textStatus, errorThrown) { 
              console.log("Status: " + textStatus + " Error: " + errorThrown); 
              ajax_err = {
                textStatus : textStatus,
                errorThrown : errorThrown
              };
              ajax_defer.reject(ajax_err);
              
      });
    
    return ajax_defer.promise();
  
}

function parseXml(str) {
  if (window.ActiveXObject) {
    var doc = new ActiveXObject('Microsoft.XMLDOM');
    doc.loadXML(str);
    return doc;
  } else if (window.DOMParser) {
    return (new DOMParser).parseFromString(str, 'text/xml');
  }
}

function doNothing() {}