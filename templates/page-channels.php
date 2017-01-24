<?php
/*
Template Name: Channel Contact Page
*/
?>

<?php get_header(); ?>

<div id="content" class="igel-page channel-contact">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>

				<?php
					$channels = get_field('channels');
					$c_mobile = '';
					echo '<section class="channel-contacts">
							<div class="container"><div class="table-wrap hidden-xs">
							<table class="col-xs-12" cellpadding="0" cellspacing="0">
							<thead><tr><th>COUNTRY</th><th></th><th>INSIDE SALES</th></tr></thead>
							<tbody>';
					foreach ($channels as $channel) {
						echo '<tr><td>'.$channel['country'].'</td><td class="names">'.$channel['sales'].'</td><td class="names">'.$channel['inside_sales'].'</td>';

						$c_mobile .='<div class="div-row col-xs-12"><h4>'.$channel['country'].'</h4>';
						$c_mobile .='<div class="channel-item">'.$channel['sales'].'</div>';
						if($channel['inside_sales'] != ''){
							$c_mobile .='<div class="channel-item">'.$channel['inside_sales'].'</div>';
						}
						$c_mobile .='</div>';

					}
					echo '</tbody>
							</table>
							</div>';

					//Mobile
					echo '<div class="table-mobile-wrap visible-xs">';
					echo $c_mobile;
					echo '</div>';


					echo '</div>
							</section>';
				?>

			<?php endwhile; ?>		
		
		<?php else : ?>
		
		<article id="post-not-found" class="block">
		    <p><?php _e("No pages found.", "simple-bootstrap"); ?></p>
		</article>
		
		<?php endif; ?>

		
	<?php get_template_part( './templates/top-link' ); ?>
	</div>

</div>
<script type="text/javascript">
jQuery(document).ready(function ($) {

	 if(location.hash != null && location.hash != ""){

    	var idElement = location.hash;
    	
    	var top = $(idElement).offset().top;
		$('html, body').animate({scrollTop:top-60}, 500 );

    	};
});
</script>

<?php get_footer(); ?>