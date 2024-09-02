	<footer id="footer" role="contentinfo">

		<div class="wrap">

			<?php if( get_field('social_twitter', 'option') || get_field('social_facebook', 'option') || get_field('social_pinterest', 'option') || get_field('social_instagram', 'option') ): ?>

				<div class="connect">

					<ul>

						<?php if( get_field('social_twitter', 'option') ): ?>

							<li class="twitter">

								<a href="<?php the_field('social_twitter', 'option'); ?>" rel="external">Twitter</a>

							</li>

						<?php endif; ?>

						<?php if( get_field('social_facebook', 'option') ): ?>

							<li class="facebook">

								<a href="<?php the_field('social_facebook', 'option'); ?>" rel="external">Facebook</a>

							</li>

						<?php endif; ?>

						<?php if( get_field('social_pinterest', 'option') ): ?>

							<li class="pinterest">

								<a href="<?php the_field('social_pinterest', 'option'); ?>" rel="external">Pinterest</a>

							</li>

						<?php endif; ?>

						<?php if( get_field('social_instagram', 'option') ): ?>

							<li class="instagram">

								<a href="<?php the_field('social_instagram', 'option'); ?>" rel="external">Instagram</a>

							</li>

						<?php endif; ?>

					</ul>

				</div>

			<?php endif; ?>

			<?php if( get_field('contact_street', 'option') || get_field('contact_city', 'option') || get_field('contact_state', 'option') || get_field('contact_zipcode', 'option') ): ?>


				<div class="vcard">

					<div class="fn n org"><?php bloginfo( 'name' ); ?></div>

					<?php if( get_field('contact_street', 'option') || get_field('contact_city', 'option') || get_field('contact_state', 'option') || get_field('contact_zipcode', 'option') ): ?>

						<div class="adr">

							<?php if( get_field('contact_street', 'option') ): ?>

								<div class="street-address"><?php the_field('contact_street', 'option'); ?></div>

							<?php endif; ?>

							<?php if( get_field('contact_city', 'option') ): ?>

								<span class="locality"><?php the_field('contact_city', 'option'); ?></span>,

							<?php endif; ?>

							<?php if( get_field('contact_state', 'option') ): ?>

								<span class="region"><?php the_field('contact_state', 'option'); ?></span>

							<?php endif; ?>

							<?php if( get_field('contact_zipcode', 'option') ): ?>

								<span class="postal-code"><?php the_field('contact_zipcode', 'option'); ?></span>

							<?php endif; ?>

						</div>

					<?php endif; ?>

				</div>

			<?php endif; ?>

			<p id="copyright">Copyright <?php echo date("Y"); echo " "; bloginfo( 'name' ); ?>, All rights reserved.</p>

		</div>

	</footer>

	<?php wp_footer(); ?>

	<?php

		/* Plugins */

	?>

	<script src="<?php bloginfo('template_directory'); ?>/a/js/picturefill.js"></script>

	<?php if ( ! is_page( 'about') && ! is_page( 'destinations') && ! is_page( 'contact') ) { ?>

		<script src="<?php bloginfo('template_directory'); ?>/a/js/flexslider.js"></script>

	<?php } ?>

	<?php

		/* Functions */

	?>

	<script src="<?php bloginfo('template_directory'); ?>/a/js/functions.js"></script>

	<?php if ( is_page( 'home' ) ) { ?>

		<script>

			/*-------------------------------------------
				Featured Slideshow
			-------------------------------------------*/

			// Displayed on home page.


			$("#featured").find(".flexslider").flexslider({

				animation: "fade",
				slideshowSpeed: 5000,
				useCSS: false,
				controlNav: true,
				directionNav: true,
				start: function(slider){

					$("body").removeClass("loading");

				}

			});

		</script>

	<?php } ?>

	<?php if ( ! is_page( 'home' ) && ! is_page( 'about') && ! is_page( 'destinations') && ! is_page( 'contact') ) { ?>

		<script>


			/*-------------------------------------------
				Project Samples
			-------------------------------------------*/

			// Displayed on home page.


			$("#samples").find(".flexslider").flexslider({

				animation: "fade",
				slideshow: false,
				slideshowSpeed: 5000,
				useCSS: false,
				controlNav: "thumbnails",
				directionNav: true,
				start: function(slider){

					$("body").removeClass("loading");

				}

			});

		</script>


		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

		<script type="text/javascript">

			/*-------------------------------------------
				Project Map
			-------------------------------------------*/

			// Notes...

		(function($) {

		/*
		*  render_map
		*
		*  This function will render a Google Map onto the selected jQuery element
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	4.3.0
		*
		*  @param	$el (jQuery element)
		*  @return	n/a
		*/

		function render_map( $el ) {

			// var
			var $markers = $el.find('.marker');

			// vars
			var args = {
				zoom		: 16,
				center		: new google.maps.LatLng(0, 0),
				mapTypeId	: google.maps.MapTypeId.ROADMAP
			};

			// create map
			var map = new google.maps.Map( $el[0], args);

			// add a markers reference
			map.markers = [];

			// add markers
			$markers.each(function(){

		    	add_marker( $(this), map );

			});

			// center map
			center_map( map );

		}

		/*
		*  add_marker
		*
		*  This function will add a marker to the selected Google Map
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	4.3.0
		*
		*  @param	$marker (jQuery element)
		*  @param	map (Google Map object)
		*  @return	n/a
		*/

		function add_marker( $marker, map ) {

			// var
			var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

			// create marker
			var marker = new google.maps.Marker({
				position	: latlng,
				map			: map
			});

			// add to array
			map.markers.push( marker );

			// if marker contains HTML, add it to an infoWindow
			if( $marker.html() )
			{
				// create info window
				var infowindow = new google.maps.InfoWindow({
					content		: $marker.html()
				});

				// show info window when marker is clicked
				google.maps.event.addListener(marker, 'click', function() {

					infowindow.open( map, marker );

				});
			}

		}

		/*
		*  center_map
		*
		*  This function will center the map, showing all markers attached to this map
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	4.3.0
		*
		*  @param	map (Google Map object)
		*  @return	n/a
		*/

		function center_map( map ) {

			// vars
			var bounds = new google.maps.LatLngBounds();

			// loop through all markers and create bounds
			$.each( map.markers, function( i, marker ){

				var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

				bounds.extend( latlng );

			});

			// only 1 marker?
			if( map.markers.length == 1 )
			{
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			}
			else
			{
				// fit to bounds
				map.fitBounds( bounds );
			}

		}

		/*
		*  document ready
		*
		*  This function will render each map when the document is ready (page has loaded)
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	5.0.0
		*
		*  @param	n/a
		*  @return	n/a
		*/

		$(document).ready(function(){

			$('.acf-map').each(function(){

				render_map( $(this) );

			});

		});

		})(jQuery);
		</script>

	<?php } ?>

	<?php

		/* Analytics */

	?>

	<?php if( the_field( 'google_analytics', 'option' ) ): ?>

		<!--

		Asynchronous google analytics; this is the official snippet.

		Replace UA-XXXXXX-XX with your site's ID and domainname.com with your domain, then uncomment to enable.

		-->

		<script>

			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', '<?php the_field( 'google_analytics', 'option'); ?>', 'domainname.com');

			ga('send', 'pageview');

		</script>

	<?php endif; ?>

</body>

</html>