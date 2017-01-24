<?php
/*
Template Name: All Forms Thank you
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="main" class="col-lg-12 thank-you-template" role="main">
		<div class="container">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php the_content();?>
			
			<?php endwhile; ?>	
			
			<?php else : ?>
			
			<article id="post-not-found" class="block">
			    <p><?php _e("No pages found.", "simple-bootstrap"); ?></p>
			</article>
			
			<?php endif; ?>
		</div>
	</div>

</div>

<?php get_footer(); ?>