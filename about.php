﻿<h1>Om Speldalen</h1>

<p>Speldalen är ett företag lokaliserat i Borlänge, vi säljer spel till konsoler.
Vi anser att du som konsument inte ska behöva leta efter spel, tag kontakt med oss så hjälper vi dig att finna det du söker.



</p>

<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>



<body>
<div id="googleMap" style="width:500px;height:380px;"></div>
</body>