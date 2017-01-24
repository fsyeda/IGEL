<?php
/*
Template Name: IGEL Default Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="igel-page">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
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