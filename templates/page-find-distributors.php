<?php
/*
Template Name: Distributors - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="distributors" x-ms-format-detection="none">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<section class="distributors-list">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 centered">
						<?php the_content(); ?>
					</div>
					<?php
						$regions = get_regions();

						echo '<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4"><select id="distributors-regions-select" class="blue-select">
								<option value="all">'.__('Choose a Region', 'igel').'</option>';

						foreach ($regions as $region) {
							
							echo '<option value="#'.str_replace(' ', '-', strtolower(get_the_title($region->ID))).'">'.get_the_title($region->ID).'</option>';
						}
						echo '</select></div>';
					?>

					<div class="regions-section col-xs-12">
						<?php

							foreach ($regions as $region) {
								
								echo '<div class="region" id='.str_replace(' ', '-', strtolower(get_the_title($region->ID))).'>';

								echo '<div class="col-xs-12 title"><h2>'.get_the_title($region->ID).'</h2></div>';
								$distributors = get_distributors_by_region($region->ID);
								
								if( $distributors ):
									echo '<table class="distributors-table">';	
									foreach ($distributors as $distributor) {
										$dist_id = $distributor->ID;
										$logo = get_field('logo', $dist_id);
										$name = get_field('name', $dist_id);
										$address = get_field('address', $dist_id);
										$phone = get_field('telephone', $dist_id);
										$fax = get_field('fax', $dist_id);
										$email = get_field('email', $dist_id);
										$website = get_field('website', $dist_id);

										$contact_info = '<div class="phones">';
										if($phone != ''){
												$contact_info .='<span>'.$phone.'</span>';
											}
											if($fax != ''){
												$contact_info .='<span>'.$fax.'</span>';
											}
										$contact_info .='</div>';

										$contact_info .='<div class="contact-info">';
										if($email != ''){
											$contact_info .='<a href="mailto:'.$email.'" title="email">'.$email.'</a>';
										}
										if($website != ''){
											$website_url = (preg_match("#https?://#", $website) === 0) ? 'http://'.$website : $website;
											$contact_info .='<a href="'.$website_url.'" title="website" target="_blank">'.$website.'</a>';
										}
										$contact_info .='</div>';



										
										/*Mobile table*/
										echo '<tr class="visible-xs">';
										echo '<td class="col-xs-12"><div class="wrapper-logo"><img src="'.$logo.'" alt="IGEL Distributors" class="distributor-img" /></div>';
										echo '<div class="wrapper-text"><div class="name">'.$name.'</div>';
										echo '<div class="address">'.$address.'</div>';
										echo $contact_info;
										echo '</div></td><td class="hidden-xs"></td><td class="hidden-xs"></td><td class="hidden-xs"></td></tr>';
									
										/*Desktop table*/
										echo '<tr><td class="col-sm-2 wrapper-logo hidden-xs"><img src="'.$logo.'" alt="IGEL Distributors" class="distributor-img" /></td>';
										echo '<td class="col-sm-3 hidden-xs"><div class="name">'.$name.'</div></td>';
										echo '<td class="col-sm-3 hidden-xs"><div class="address">'.$address.'</div></td>';
										echo '<td class="col-sm-3 hidden-xs">';
										echo $contact_info;
										echo '</td>';


										echo '</tr>';
									}
									echo '</table>';
								 endif;

								echo '</div>';
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