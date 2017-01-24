<?php
/*
 * Template Name: Search Partners - Template
 */
?>
<?php get_header(); ?>
<div id="content" class="partners-page">

	<div id="main" role="main">
<?php while (have_posts()):the_post()?>
<div class="breadcrumbs long-list gray">
			<div class="container">
				<?php wp_nav_menu( array('menu' => 'Partners Menu' )); ?>
			</div>
		</div>
<div class="page-one">
	<div class="search_partners">
		<div class="top">
			<div class="container">
				<div class="title">
					<h2><?php the_field('title');?></h2>
					<span><?php the_field('description');?></span>
				</div>
				<div class="form">
					<form id="form-partners">
						<div class="col-form">
							<div class="col-form-1">
								<p>CITY</p>
								<input type="text" name="city" id="tx_city" value="" required>
							</div>
							<div class="col-form-2">
								<p>COUNTRY</p>
								<?php require_once (get_stylesheet_directory() . '/inc/igel-country.php');?>
							</div>
						</div>
						<div class="col-form">
							<div class="col-form-1">
								<p>RADIUS</p>
								<select id="sl_radius" name="radius">
									<option value="25">25 km/15 mi</option>
									<option value="50">50 km/30 mi</option>
									<option value="100">100 km/60 mi</option>
									<option value="250">250 km/150 mi</option>
									<option value="500">500 km/300 mi</option>
									<option value="1000">1000 km/600 mi</option>
								</select>
							</div>
							<div class="col-form-2">
								<input type="submit" value="SEARCH" name="">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div><!-- top -->
		<div id="map"></div>
		<div class="bot partner-bot">
			<div class="container">
				<h5><?php the_field('country_error');?></h5>
			</div>
		</div><!-- bot -->			

	</div>
</div><!-- page-one -->

<script>
(function($){
	$(document).ready(function(){
		function ajax_partner(){
			var data = $('#form-partners').serialize(); 
			 $.ajax({
				 type : 'POST',
				 dataType: 'json',
				 data : {
					 'action' : 'dvd_actionpartners',
					 'data' : data					 
				 },
				 url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
				 beforeSend: function(){
					 $('#map').css('height','0');
					 $('.partner-bot').html('<img src="<?php echo get_stylesheet_directory_uri() . '/img/ajax-loading.gif' ;?>" class="load_img" />');
				 },
				 success : function (resp){
					if(resp.success){
						$('#map').css('height','500px');
						var latbot	=	resp.data.latbot;
						var lngbot	=	resp.data.lngbot;
						var i		=	resp.data.i;
						var lat		=	resp.data.lat;
						var	lng		=	resp.data.lng;
						var title	= 	resp.data.title;
						var phone	= 	resp.data.phone;
						var address	= 	resp.data.address;
						function myMap() {
							  var mapCanvas = document.getElementById("map");
							  var mapOptions = {
							    center: new google.maps.LatLng(parseFloat(latbot), parseFloat(lngbot)), 
							    zoom: 10,							  
						        scrollwheel: false,
							  }
							  var map = new google.maps.Map(mapCanvas, mapOptions);			
							  var bounds = new google.maps.LatLngBounds();
							  var contentString = [];
							  for(j=0;j<i;j++){	
								  var myLatlng = {lat:parseFloat(lat[j]),lng:parseFloat(lng[j])};
								  var marker = new google.maps.Marker({
									    position: myLatlng,
									    map: map,
									    title: title[j]
								});
									var ltextent = new google.maps.LatLng(parseFloat(lat[j]),parseFloat(lng[j]));
								  bounds.extend(ltextent);
								  map.fitBounds(bounds);
								contentString.push(
										"<div class='dud-info'>"+
										"<h3>"+title[j]+"</h3>"+
										"<p>"+address[j]+"</p>"+
										"<p>"+phone[j]+"</p>"+
										"</div>");						  
								var infowindow = new google.maps.InfoWindow();
								 google.maps.event.addListener(marker, 'click', (function(marker, j) {
								        return function() {
								          infowindow.setContent(contentString[j]);
								          infowindow.open(map, marker);
								        }
								  })(marker, j));
								}		  		  			
							}
						myMap();
						$('.partner-bot').html(resp.data.html);
					}else{
						$('.partner-bot').html(resp.data);
					}
				 },
				 error: function(dataE){
					 $('.partner-bot').html(dataE.statusText);
				}
			 });
		 }		 
		 $('#form-partners').bind('submit',function(){
			 ajax_partner();
			 return false;
		 });
	});		 
})(jQuery);
</script>
<?php endwhile;?>
	<?php get_template_part( './templates/top-link' ); ?>
	</div>

</div>
<?php get_footer(); ?>