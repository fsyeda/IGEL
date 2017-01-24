<?php
/*
Template Name: Industry Considering Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="considering-virtualization industry-considering-virtual industry virtualization-page">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="breadcrumbs">
					<div class="container">
						<?php wp_nav_menu( array('menu' => 'Solutions Menu' )); ?>
					</div>
				</div>

				<?php
					the_content();


						//social proof
						$social_proof_logos = get_field('social_proof_logos');
						$social_proof_text = get_field('social_proof_text');

						echo '<section class="socialproof-section">
								<div class="container"><div class="row">
								<div class="col-xs-12"><h1>'.$social_proof_text.'</h1></div>';
							echo '<div class="logos-list">';
						foreach ($social_proof_logos as $logo) {
							echo '<div class="col-xs-6 col-sm-4 col-md-3 logo-wrapper">';

							$url = get_field('url', $logo->ID);
							$img = get_field('logo', $logo->ID);
							if($url != ''){
								echo '<a href="'.$url.'" title="'.get_the_title($logo->ID).'" target="_blank"><img src="'.$img.'" alt="'.get_the_title($logo->ID).'" class="social-proof-logo" /></a>';
							}else{
								echo '<img src="'.$img.'" alt="'.get_the_title($logo->ID).'" class="social-proof-logo" />';
							}

							echo '</div>';
						}
						echo '</div>';


						echo '</div></div></section>';		

					
				?>

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