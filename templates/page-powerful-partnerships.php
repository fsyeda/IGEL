<?php
/*
Template Name: Powerful Partnerships Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="partnerships-page">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs">
				<div class="container">
					<?php wp_nav_menu( array('menu' => 'Why Igel Menu' )); ?>
				</div>
			</div>

				<?php the_content(); ?>

				<section class="partners-list">
				<div class="container">
				<div class="row">
				<div class="partners">
				<?php

					$partners = get_partners_list();

					foreach ($partners as $partner) {
						 echo '<div class="col-xs-6 col-sm-3 partner-item">
						 	<div class="wrap-img">
						 	';

						 $terms = wp_get_post_terms($partner->ID,'partner_category');  
						 $term_class='';
						 if(count($terms)> 1){
						 	$term_class = 'two-cat';
						 }
						 echo '<div class="hover-categories '.$term_class.'"><span class="name">';
							foreach ($terms as $term) {  
							    echo $term->name.'<br />';  
							}  
							echo '</span>';

						 echo '</div>
						 	<img src="'.get_field('image', $partner->ID).'" alt="partner" class="partner-img"/>
						 	</div></div>';
						
					}

				?>
				</div>
				</div>
				</div>
				</section>
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