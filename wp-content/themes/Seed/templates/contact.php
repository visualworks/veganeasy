<?php
/*
 Template Name: Contact
 */
get_header(); 
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
get_template_part( 'header-border-bottom', 'index' ); 
?>
	<section id="main-page">
		<div class="row">
			<article id="organic-contact">
			<div class="row">
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="contact-left">
                <div class="title-small-contact">
                  <?php 
                    echo rwmb_meta( 'origanic_subtitle-contact' );
                  ?>
                </div>
              <div class="title-contact">
                <?php 
                    echo rwmb_meta( 'origanic_title-contact' );
                  ?>
              </div>
              <div class="desciption-contact">
                <?php 
                    echo rwmb_meta( 'origanic_description-contact' );
                  ?>
              </div>
              
              <?php 
              if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
                if (!rwmb_meta( 'origanic_id-contact' )=='') {
                  echo do_shortcode( '[contact-form-7 id="'.rwmb_meta( 'origanic_id-contact' ).'" title="Contact form 1"]' ); 
                }
              }
              ?>
              <div class="phone">
                <div class="title-phone"><?php _e("Let's have a chat!","beautheme") ;?></div>
                <?php echo rwmb_meta( 'origanic_have-a-chat' ); ?>
                
              </div>
              <div class="career">
                <div class="title-phone"><?php _e("Looking for a career?","beautheme") ;?></div>
                <?php echo rwmb_meta( 'origanic_for-career' ); ?>
              </div>
              <ul class="organic-social">
                <?php 
                  if (!rwmb_meta( 'origanic_facebook' )=='') {
                ?>
                  <li><a href="<?php echo rwmb_meta( 'origanic_facebook' ); ?>"><i class="fa fa-facebook"></i></a></li>
                <?php
                  }
                ?>

                <?php 
                  if (!rwmb_meta( 'origanic_twitter' )=='') {
                ?>
                  <li><a href="<?php echo rwmb_meta( 'origanic_twitter' ); ?>"><i class="fa fa-twitter"></i></a></li>
                <?php
                  }
                ?>

                <?php 
                  if (!rwmb_meta( 'origanic_instagram' )=='') {
                ?>
                  <li><a href="<?php echo rwmb_meta( 'origanic_instagram' ); ?>"><i class="fa fa-instagram"></i></a></li>
                <?php
                  }
                ?>

                <?php 
                  if (!rwmb_meta( 'origanic_dribbble' )=='') {
                ?>
                  <li><a href="<?php echo rwmb_meta( 'origanic_dribbble' ); ?>"><i class="fa fa-dribbble"></i></a></li>
                <?php
                  }
                ?>

                <?php 
                  if (!rwmb_meta( 'origanic_youtube' )=='') {
                ?>
                  <li><a href="<?php echo rwmb_meta( 'origanic_youtube' ); ?>"><i class="fa fa-youtube-play"></i></a></li>
                <?php
                  }
                ?>
              </ul>      
            </div>
          </div>
          <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
          <div id="map-agency" class="map-detail" ></div>
          <div class="origanic-address">
                  <div class="img-map">
                  <?php
                          $files = rwmb_meta( 'origanic_image-map', 'type=file' );
                  foreach ( $files as $info )
                  {
                    ?>
                  <img src="<?php echo esc_attr($info['url']); ?>">
                  <?php
                  }
                  ?></div>
                  <div class="logo-map">
                       <?php
                          $logo = rwmb_meta( 'origanic_icon-map', 'type=file' );
                  foreach ( $logo as $lg )
                  {
                    ?>
                  <img src="<?php echo esc_attr($lg['url']); ?>">
                  <?php
                  }
                  ?>
                  </div>
            <div class="address-map">
              <?php
                          $logo = rwmb_meta( 'origanic_logo-map', 'type=file' );
                  foreach ( $logo as $lg )
                  {
                    ?>
                  <img src="<?php echo esc_attr($lg['url']); ?>">
                  <?php
                  }
                  ?>
              <span><?php echo rwmb_meta( 'origanic_address-map' ); ?></span>
              <span><?php echo rwmb_meta( 'origanic_phone-map' ); ?></span>
            </div>
          </div>
          <ul class="organic-menu-map">
            <?php origanic_menu( 'contact-menu' ); ?>
          </ul>
          </div>   
      </div>
			</article>
		</div>
    
    <div class="margin-footer-contact">
      <?php get_footer(); ?>
    </div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOeGmyX-gl-BqGDrCvYd1qeEWstO9553Y&sensor=false&extension=.js"></script> 
        <script type="text/javascript">
            function initialize() {
              // Map variable
              var lat = <?php echo rwmb_meta( 'origanic_latitude-map' ); ?>;
              var lon = <?php echo rwmb_meta( 'origanic_longitude-map' ); ?>;
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
                icon: "<?php echo esc_attr($lg['url']); ?>",
                title: "Title map"
              };
              // var map = new google.maps.Map(document.getElementById("map-canvas"),
              //     mapOptions);
              // Create new style for this map
              marker = new google.maps.Marker(markerOptions);
              google.maps.event.addListener(marker, 'click', function() {
                jQuery('.origanic-address').fadeIn('9000');
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
          </script>
    <script type="text/javascript">
    (function($) {  
    "use strict";
		$(".logo-map").click(function(){
		    $(".origanic-address").fadeOut('9000');

		});
	 })(jQuery); 
	</script>