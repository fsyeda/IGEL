<?php
/*
Template Name: Considering Virtualization - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="considering-virtualization virtualization-path-page">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs">
				<div class="container">
					<?php wp_nav_menu( array('menu' => 'Solutions Menu' )); ?>
				</div>
			</div>
				
				<?php the_content(); ?>

				<section class="virtualization-industries">
					<div class="container"><div class="row">
					<?php
						$industries = get_field('industries');

						foreach ($industries as $industry) {
							
							echo '<div class="col-xs-12 col-sm-6 col-md-3"><a href="'.$industry['url'].'" title="'.strip_tags($industry['text']).'"><div class="industry-item">
							<div class="wrap-img"><img src="'.$industry['icon'].'" alt="industry" /></div>
							<h4>'.$industry['text'].'</h4>
							</div></a></div>';
						}
					?>
					</div></div>
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