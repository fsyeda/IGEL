<?php
/*
Template Name: GPL Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="gpl-page">

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
<?php require_once (get_stylesheet_directory() . '/inc/country.php');
require_once (get_stylesheet_directory() . '/inc/state.php');
?>
<script type="text/javascript">
(function($) {
	$(document).ready(function(){
		var html = '';
		$("#country option").each(function(index, element) {
			html += '<option>'+$(this).attr("value")+'</option>';
	    });
		$("#country-cf7").find('.wpcf7-select').append( html );
	
		var html_state = '';
		$("#state_select option").each(function(index, element) {
			html_state += '<option>'+$(this).attr("value")+'</option>';
	    });
		$("#state-cf7").find('.wpcf7-select').append( html_state );
    
	});
})(jQuery);
</script>
<?php get_footer(); ?>