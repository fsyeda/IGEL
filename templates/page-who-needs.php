<?php
/*
Template Name: Who Needs it - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="why-igel">

	<div id="main" role="main" class="who-needs-it">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs black">
				<div class="container">
					<?php wp_nav_menu( array('menu' => 'Why Igel Menu' )); ?>
				</div>
			</div>

			<?php the_content(); ?>
			
			<section class="cta-section">
					<div class="container"><div class="row">
					<?php
						echo get_field('cta');
					?>
					</div>
				</div>
			</section>

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
	jQuery(document).ready(function($){
	    $('.wrap-img').each(function(i, obj){
	    	var testimonial = $(this);
	    	setTimeout(function() {
		    	testimonial.addClass('in-view');
		    	var current = testimonial.attr("id");
		    	$('.customers').find("[data-testimonial='" + current + "']").addClass('in-view');
	    	}, 500*i);
	    });
	});
</script>
<?php get_footer(); ?>