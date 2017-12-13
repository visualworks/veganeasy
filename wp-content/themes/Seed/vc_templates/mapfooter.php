<?php
$latitude_map = $longitude_map = '';
extract(shortcode_atts(array(
    'latitude_map' => '',
    'longitude_map' => '',
), $atts));
$img = shortcode_atts(array(
            'icon_map' => 'icon_map',
        ), $atts);
  $img = wp_get_attachment_image_src($img["icon_map"], "large");
  $bg_img = $img[0];
?>
<div class="row">
	<div id="map-agency" class="map-detail" style="width: 100%;height: 600px;z-index:1;  margin-top: -95px;"></div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOeGmyX-gl-BqGDrCvYd1qeEWstO9553Y&sensor=false"></script>
        
<script type="text/javascript">
(function($) {  
"use strict";
    function initialize() {
      // Map variable
      var lat = <?php print $latitude_map; ?>;
      var lon = <?php print $longitude_map; ?>;
      var beauMapType, beauStylez, map, mapOptions, marker, markerOptions, position, styledMapOptions, centermap;
      position = new google.maps.LatLng(lat, lon);
      centermap = new google.maps.LatLng(lat, lon);
      // Setup maps
      mapOptions = {
        center: centermap,
        zoom: 16,
        navigationControl: false,
        disableDefaultUI: true,
        navigationControlOptions: {
          style: google.maps.NavigationControlStyle.SMALL
        },
        mapTypeControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        streetViewControl: false,
        scrollwheel: false
      };
      // Load to id, map name, icon
      map = new google.maps.Map(document.getElementById("map-agency"), mapOptions);
      markerOptions = {
        position: position,
        map: map,
        icon: "<?php echo esc_attr($bg_img); ?>",
        title: "Title map"
      };
      // var map = new google.maps.Map(document.getElementById("map-canvas"),
      //     mapOptions);
      // Create new style for this map
      marker = new google.maps.Marker(markerOptions);
      google.maps.event.addListener(marker, 'click', function() {
        jQuery('.origanic-address').toggle();
      });

      beauStylez = [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"simplified"},{"hue":"#0066ff"},{"saturation":74},{"lightness":100}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"off"},{"weight":0.6},{"saturation":-85},{"lightness":61}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#5f94ff"},{"lightness":26},{"gamma":5.86}]}];
      styledMapOptions = {
        name: "TMap name"
      };
      beauMapType = new google.maps.StyledMapType(beauStylez, styledMapOptions);
      map.mapTypes.set("map-agency", beauMapType);
      map.setMapTypeId("map-agency");
    }
    google.maps.event.addDomListener(window, 'load', initialize);

  $(".logo-map").click(function(){
      $(".origanic-address").hide();
  });
})(jQuery); 
</script>