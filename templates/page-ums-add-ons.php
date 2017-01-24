<?php
/*
Template Name: UMS Add Ons Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="software-page ums-add-page">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs sub-nav no-click software-breadcrumbs ">
				<div class="container">
					<?php wp_nav_menu( array('menu' => 'Software Overview Menu' )); ?>
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