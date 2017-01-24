<?php

get_header();

?>

<div id="content" class="detail-event detail-webinar detail-training">

	<div id="main" role="main">

	<div class="container-wrapper">
			<div class="clearfix">
				
		        <div id="main" role="main">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php
							$background = get_field('background_image');
							$title = get_field('training_title');
							$styles_background = '';
							$class_background = '';
							if($background != ''){
								echo '<section class="event-detail-banner" style="background: url('.$background.') no-repeat center center transparent; background-size: cover;"></section>';
								$class_background = ' event-with-background';
							}else{
								echo '<section class="event-detail-no-banner"></section>';
							}

							echo '<section class="event-info '.$class_background.'"><div class="container"><div class="row"><div class="col-xs-12 col-md-8">';
							echo '<article class="event-webinar">';
							echo '<div class="link-back"><a href="/events" class="back-link">'.__('< back to all events', 'igel').'</a></div>';
							echo '<h1>'.$title.'</h1>';

							//$hosted_by_text = get_field('hosted');
							$date = get_field('date');
							$date_text = ($date != '')? date('M j, Y', strtotime($date)) : get_field('date_tbd');
							$length = get_field('length');
							
							if(get_field('date_tbd')){
								$date_text = '<span class="date-1"><a href="'.get_field('rsvp_link').'" target="_blank">'.$date_text.'</a></span>';
							}else{
								$date_text = '<span class="date-1">'.$date_text.'</span>';
							}
							
							echo '<div class="date-event"><div class="date-row">'.$date_text.'</div></div>';
							echo '<div class="length-event"><div class="length-row">'.$length.'</div></div>';

							echo '<div class="description">'.apply_filters('the_content', $post->post_content).'</div>';


							echo '</article>';
							echo '</div>';

							//Sidebar
							echo '<div class="col-xs-12 col-md-4">';
							echo '<div class="rsvp"><h2>'.get_field('rsvp_title').'</h2><div class="cost">'.get_field('cost').'</div><a href="'.get_field('rsvp_link').'" target="_blank" class="button">'.__('CONTACT US', 'igel').'</a></div>';
							echo '<div class="sharing">
								<div class="share-icons">
									<span class="text">'.__('Share this training', 'igel').'</span>'; 
								?>
									<ul class="share-list">
										<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php echo $title ?>&source=igel.com" target="_blank" title="Linkedin Share" alt="Linkedin Share"><span class="share-icons ln"></span></a></li>
										<li><a href="http://twitter.com/intent/tweet?status=<?php echo $title ?>+<?php the_permalink(); ?>" target="_blank" title="Twitter Share" alt="Twitter Share"><span class="share-icons tw"></span></a></li>
										<li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&title=<?php echo $title ?>" target="_blank" title="Facebook Share" alt="Facebook Share"><span class="share-icons fb"></span></a></li>
										<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" title="Google Plus Share" alt="Google Plus Share"><span class="share-icons gplus"></span></a></li>
										<li><a href="mailto:?subject=<?php echo $title ?>&amp;body=<?php the_permalink(); ?>" title="Mail Share" alt="Mail Share"><span class="share-icons mail"></span></a></li>
										
									</ul>
								</div>
								</div>
								<div class="link-back"><a href="/events" class="back-link"><?php echo __('< back to all events', 'igel');?></a></div>
							<?php	
							echo '</div>';
							
							echo '</div></div></section>';

						?>
						<?php endwhile; ?>
						
					<?php endif; ?>
				</div> <!-- end #main -->
			</div> <!-- end #content -->
		</div>
	<?php get_template_part( '/templates/top-link' ); ?>
	</div>

</div>

<?php get_footer(); ?>