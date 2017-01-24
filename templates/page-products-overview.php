<?php
/*
Template Name: Product Overview - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="product-overview">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs">
				<div class="container">
					<?php wp_nav_menu( array('menu' => 'Products Overview Menu' )); ?>
				</div>
			</div>

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
<?php get_footer(); ?>