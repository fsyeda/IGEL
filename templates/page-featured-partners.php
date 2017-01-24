<?php
/*
Template Name: Featured Partners Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="partners-page featured-partners">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="breadcrumbs long-list">
					<div class="container">
						<?php wp_nav_menu( array('menu' => 'Partners Menu' )); ?>
					</div>
				</div>
				<?php the_content(); ?>

				<section class="featured-partners-list">
					<div class="container"><div class="row">
					<?php
						$partners = get_featured_partners();

						foreach ($partners as $partner) {
							$partner_info = get_post($partner->ID);
							$content = $partner_info->post_content;
							echo '<div class="col-xs-12 col-sm-6 col-md-4 featured-partner">';
							echo '<div class="profile"><img class="partner-img" src="'.get_field('logo', $partner->ID).'" alt="'.get_the_title($partner->ID).'" />
							<div class="partner-hover">';
							echo '<p class="description">'.$content.'</p>';

							$address = get_field('address', $partner->ID);
							if($address != ''){
								echo '<p class="address">'.$address.'</p>';
							}
							$email = get_field('email', $partner->ID);
							if($email != ''){
								echo '<a class="email" href="mailto:'.$email.'">'.$email.'</a>';
							}
							$phone = get_field('phone', $partner->ID);
							if($phone != ''){
								echo '<div class="last-row"><p class="phone">'.$phone.'</p>';
							}else{
								echo '<div class="last-row">';
							}

							$url = get_field( 'website', $partner->ID );
							if($url != ''){
								//$http = stripos($url, 'http')? '': 'http://';

								echo '<a href="'.$url.'" target="_blank">'.__('VISIT SITE', 'igel').'</a></div>';	
							}else{
								echo '</div>';
							}

							echo '</div></div>';
							echo '</div>';

						}
					?>
					</div></div>
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