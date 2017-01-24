<?php
/*
Template Name: How We Compare - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="why-igel">

	<div id="main" role="main" class="how-we-compare">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs gray">
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
<?php get_footer(); ?>