<?php
/*
Template Name: Accessories Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="igel-page accessories">

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
	jQuery(document).ready(function($){
		$('#accessories-tabs-accordion').on('shown.bs.collapse', function (e) {
	        var offset = $('.panel.panel-default > .panel-collapse.in').offset();
	        if(offset) {
	            $('html,body').animate({
	                scrollTop: $('.panel-title a').offset().top -20
	            }, 500);
	        }
    	}); 
	   
	});

</script>
<?php get_footer(); ?>