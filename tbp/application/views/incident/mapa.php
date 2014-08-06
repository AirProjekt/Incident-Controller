<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwc7n1Pgo2pw2p2SJJuezHRQXJna06K74&sensor=false">
</script>
<script type="text/javascript">
  var geocoder;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var mapOptions = {
      center: new google.maps.LatLng(45.812813,15.960664),
      zoom: 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map-canvas"),
        mapOptions);
    $.getJSON('<?php echo base_url() ?>index.php/incident/loadData', function(data) {
        $.each(data, function(key, val) {
              var value = val['pozicija'].replace(/[\(\)]/g,'').split(',');
              var vrsta = val['vrsta'];
              var myLatLng = new google.maps.LatLng(value[0], value[1]);
              if(vrsta === "bolnica"){
                  var beachMarker = new google.maps.Marker({
                      position: myLatLng,
                      map: map,
                      title: 'centar : '+vrsta,
                      icon: '../../res/icons/hospital-building.png'
                  });
              }
              else if(vrsta === "policija"){
                  var beachMarker = new google.maps.Marker({
                      position: myLatLng,
                      map: map,
                      title: 'centar : '+vrsta,
                      icon: '../../res/icons/police.png'
                  });
              }
              else{
                  var beachMarker = new google.maps.Marker({
                      position: myLatLng,
                      map: map,
                      title: 'centar : '+vrsta,
                      icon: '../../res/icons/firemen.png'
                  });
              }
        });
    });
    
    $.getJSON('<?php echo base_url() ?>index.php/incident/loadIncidentData', function(data) {
        $.each(data, function(key, val) {
              var address = val['adresa']+" "+val['kucni_broj']+", "+val['grad'];
              var vrsta = val['vrsta'];
              var status_incidenta = val['otvoren'];
              geocoder.geocode( { 'address': address}, function(results, status) {
                  if (status === google.maps.GeocoderStatus.OK) {
                    if(vrsta === "policijska_intervencija" && status_incidenta === "t"){
                          var beachMarker = new google.maps.Marker({
                              position: results[0].geometry.location,
                              map: map,
                              title: 'Incident za policiju',
                              icon: '../../res/icons/crimescene.png'
                          });
                    }
                    else if(vrsta === "medicinska_intervencija" && status_incidenta === "t"){
                          var beachMarker = new google.maps.Marker({
                              position: results[0].geometry.location,
                              map: map,
                              title: 'Incident za bolnicu',
                              icon: '../../res/icons/ambulance.png'
                          });
                    }
                    else if(vrsta === "poplava" && status_incidenta === "t"){
                          var beachMarker = new google.maps.Marker({
                              position: results[0].geometry.location,
                              map: map,
                              title: 'Incident poplava',
                              icon: '../../res/icons/flood.png'
                          });
                    }
                    else if(vrsta === "požar" && status_incidenta === "t"){
                          var beachMarker = new google.maps.Marker({
                              position: results[0].geometry.location,
                              map: map,
                              title: 'Incident požar',
                              icon: '../../res/icons/fire.png'
                          });
                    }
                  } else {
                    alert("Geocode was not successful for the following reason: " + status);
                  }
                });
        });
    });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<ul class="nav nav-pills nav-stacked pull-right">
  <li><a href="<?php echo base_url() ?>index.php/incident/index">List incidents</a></li>
  <li class="active"><a href="<?php echo base_url() ?>index.php/incident/showMap">Show map</a></li>
</ul>
<div id="map-canvas" style="width: 700px;height: 600px"></div>
