<?php
/*
 * Template Name: Contact
 */
?>
<?php get_header(); ?>
<?php while (have_posts()):the_post()?>

<?php 
	$contact		=	get_field('contact_form');
	$general		=	get_field('general_contact');
	$banner_img		=	get_field('banner_image');
	$banner_top		=	get_field('banner_top');
	$content_top	=	get_field('content_top');
	$banner_center	=	get_field('banner_center');
	$content_center	=	get_field('content_center');
	$banner_bot		=	get_field('banner_bottom');
	$content_bot	=	get_field('content_bottom');
?>
<div class="page-one">
<div class="contact-banner" style="background:url('<?php echo $banner_img['url'];?>')no-repeat">
	<div class="container">
		<div class="top">
			<h1><?php the_field('title_banner');?></h1>
			<span><?php the_field('description_banner');?></span>
		</div>
		<div class="bot">
			<div class="col-md-8">
				<?php 					
					echo do_shortcode($contact);
				?>
			</div>
			<div class="col-md-4">
				<div class="general-contact">
					<h3><?php the_field('title_general');?></h3>
					<ul>
					<?php 
						if($general):
						foreach ($general as $gene){
					?>
						<li>
							<span><?php echo $gene['title'];?></span>
							<p><a href="tel:<?php echo $gene['phone'];?>"><?php echo $gene['phone'];?></a></p>
						</li>
					<?php }endif;?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div><!-- banner -->
<div class="list-more">
	<div>
		<ul>
			<li><a href="#emea">EMEA LOCATIONS</a></li>
			<li><a href="#america">AMERICA LOCATIONS</a></li>
			<li><a href="#asia_oceania">ASIA OCEANIA LOCATIONS</a></li>
		</ul>
	</div>
</div><!-- list-more -->
<div class="contact-main" id="emea">
	<div class="banner-main" style="background:url('<?php echo $banner_top['url'];?>')no-repeat">
		<h2><?php the_field('title_top');?></h2>
	</div>
	<div class="container">
		<table>
			<tr class="first-tr">
				<td class="col-md-4">OFFICE</td>
				<td class="col-md-4">ADDRESS</td>
				<td class="col-md-4">CONTACT INFORMATION</td>
			</tr>
			<?php 
				if($content_top):
				foreach ($content_top as $con_top){
			?>
			<tr class="dud-tr">
				<td class="col-md-4"><h4><?php echo $con_top['office'];?></h4></td>
				<td class="col-md-4"><a target="_blank" href="https://www.google.com/maps/place/<?php echo $con_top['address_for_map'];?>"><?php echo $con_top['address'];?></a></td>
				<td class="col-md-4">
				<?php 
					$custom_top		=	$con_top['information'];
					if($custom_top):
					foreach ($custom_top as $cus_top){	
				?>
					<?php if($cus_top['phone']) { ?>
						<p><a href="tel:<?php echo $cus_top['phone'];?>">P: <?php echo $cus_top['phone'];?></a></p>
					<? }
					if ($cus_top['fax']) { ?>
					<p>F: <?php echo $cus_top['fax'];?></p>
						<? }
					if ($cus_top['mail']) { ?>
					<span class="sp-mail"><a href="mailto:<?php echo $cus_top['mail'];?>"><?php echo $cus_top['mail'];?></a></span>
						 <? } 
					}endif;?>
				</td> 
			</tr>
			<?php }endif;?>
		</table>
	</div>
</div><!-- main-top -->
<div class="contact-main" id="america">
	<div class="banner-main" style="background:url('<?php echo $banner_center['url'];?>')no-repeat">
		<h2><?php the_field('title_center');?></h2>
	</div>
	<div class="container">
		<table>
			<tr class="first-tr">
				<td class="col-md-4">OFFICE</td>
				<td class="col-md-4">ADDRESS</td>
				<td class="col-md-4">CONTACT INFORMATION</td>
			</tr>
			<?php 
				if($content_center):
				foreach ($content_center as $con_center){
			?>
			<tr class="dud-tr">
				<td class="col-md-4"><h4><?php echo $con_center['office'];?></h4></td>
				<td class="col-md-4"><a target="_blank" href="https://www.google.com/maps/place/<?php echo $con_center['address_for_map'];?>"><?php echo $con_center['address'];?></a></td>
				<td class="col-md-4">
				<?php 
					$custom_center		=	$con_center['information'];
					if($custom_center):
					foreach ($custom_center as $cus_center){	
				?>
					<?php if($cus_top['phone']) { ?>
					<p><a href="tel:<?php echo $cus_center['phone'];?>">P: <?php echo $cus_center['phone'];?></a></p>
					<?php } 

					if ($cus_center['fax']) { ?>
					<p>F: <?php echo $cus_center['fax'];?></p>
					<?php } 

					if ($cus_center['mail']) { ?>
					<span class="sp-mail"><a href="mailto:<?php echo $cus_center['mail'];?>"><?php echo $cus_center['mail'];?></a></span>
					<?php }

				 }endif;?>
				</td>
			</tr>
			<?php }endif;?>
		</table>
	</div>
</div><!-- main-center -->
<div class="contact-main" id="asia_oceania">
	<div class="banner-main" style="background:url('<?php echo $banner_bot['url'];?>')no-repeat">
		<h2><?php the_field('title_bottom');?></h2>
	</div>
	<div class="container">
		<table>
			<tr class="first-tr">
				<td class="col-md-4">OFFICE</td>
				<td class="col-md-4">ADDRESS</td>
				<td class="col-md-4">CONTACT INFORMATION</td>
			</tr>
			<?php 
				if($content_bot):
				foreach ($content_bot as $con_bot){
			?>
			<tr class="dud-tr">
				<td class="col-md-4"><h4><?php echo $con_bot['office'];?></h4></td>
				<td class="col-md-4"><a target="_blank" href="https://www.google.com/maps/place/<?php echo $con_bot['address_for_map'];?>"><?php echo $con_bot['address'];?></a></td>
				<td class="col-md-4">
				<?php 
					$custom_bot	=	$con_bot['information'];
					if($custom_bot):
					foreach ($custom_bot as $cus_bot){	
				?>
					<?php if($cus_bot['phone']) { ?>
					<p><a href="tel:<?php echo $cus_bot['phone'];?>">P: <?php echo $cus_bot['phone'];?></a></p>
					<?php } 

					if($cus_bot['fax']) { ?>
					<p>F: <?php echo $cus_bot['fax'];?></p>
					<?php }

					if($cus_bot['mail']) { ?>
					<span class="sp-mail"><a href="mailto:<?php echo $cus_bot['mail'];?>"><?php echo $cus_bot['mail'];?></a></span>
					<?php }

					}endif;?>
				</td>
			</tr>
			<?php }endif;?>
		</table>
	</div>
	<?php get_template_part( './templates/top-link' ); ?>
</div><!-- main-bot -->
<?php require_once (get_stylesheet_directory() . '/inc/country.php');?>
<script type="text/javascript">
(function($) {
	$(document).ready(function(){
		var html;
		$("#country option").each(function(index, element) {
			html += '<option>'+$(this).attr("value")+'</option>';
	    });
		$(".wpcf7-select").append( html );
	
    
	});
})(jQuery);
</script>
</div>
<?php endwhile;?>
<?php get_footer(); ?>