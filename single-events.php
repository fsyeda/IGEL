<?php

get_header();

?>

<div id="content" class="detail-event">

	<div id="main" role="main">

	<div class="container-wrapper">
			<div class="clearfix">
				
		        <div id="main" role="main">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php
							$background = get_field('background_image');
							$title = get_field('event_title');
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
							echo '<div class="link-back"><a href="/events" class="back-link" title="Events">'.__('< back to all events', 'igel').'</a></div>';
							echo '<h1>'.$title.'</h1>';

							$hosted_by_text = get_field('hosted_by_text');
							$day_not_confirmed = get_field('date_not_confirmed');
							$date_start = get_field('date_start');
							$date_end = get_field('date_end');
							$address = get_field('address');
							$presenters = get_field('presenters');
							$hosted_by_logos = get_field('hosted_by_logos');
							$hour_start = get_field('hour_start');
							$hour_end = get_field('hour_end');

							if($hosted_by_text != ''){
								echo '<div class="hosted-by">'.$hosted_by_text.'</div>';
							}
							echo '<div class="visible-sm visible-xs rsvp_link_top"><a href="'.get_field('rsvp_link').'" target="_blank" class="button">'.__('RSVP', 'igel').'</a></div>';


							if($hour_start != ''){
								$hour_text = $hour_start;

								if($hour_end != ''){
									$hour_text .=' - '.$hour_end;
								}
							}
							if($day_not_confirmed){
								$date_text = '<span class="date-1">'.date('M, Y', strtotime($date_start)).'</span>';
							}else{
								$date_text = '<span class="date-1">'.date('M j, Y', strtotime($date_start)).'</span>';
							}
							if($date_end != ''){
								$date_text .='<span class="until">'.__('-', 'igel').'</span><span class="date-2">'.date('M j, Y', strtotime($date_end)).'</span>';
							}
							echo '<div class="date-event"><div class="date-row">'.$date_text.'</div><div class="hour-row">'.$hour_text.'</div></div>';

							echo '<div class="date-address"><span class="address-text">'.$address.'</span></div>';

							echo '<div class="description">'.apply_filters('the_content', $post->post_content).'</div>';

							if($presenters){
								echo '<div class="presenters">';
								echo '<h4>'.__('Presenters', 'igel').'</h4><div class="row">';
								foreach ($presenters as $presenter) {
									echo '<div class="col-xs-6 col-sm-3 presenter">';
									$img = $presenter['image'];
									$name =  $presenter['name'];
									$title =  $presenter['title'];
									if($img != ''){
										echo '<div class="img-wrap"><img alt="'.$name.'" src="'.$img.'" class="presenter-img" /></div>';
									}
										echo '<h4>'.$name.'</h4>';
									if($title != ''){
										echo '<span class="title">'.$title.'</span>'; 
									}
									echo '</div>';
								}
								echo '</div></div>';
							}

							if($hosted_by_logos){
								echo '<div class="hosted-logos">';
								echo '<h4>'.__('Hosted With', 'igel').'</h4><div class="row">';
								foreach ($hosted_by_logos as $logo) {
									echo '<div class="col-xs-6 col-sm-3 logos"><img alt="hosts" src="'.$logo['logo'].'" /></div>';
								}
								echo '</div></div>';
							}

							echo '</article>';
							echo '</div>';

							//Sidebar
							echo '<div class="col-xs-12 col-md-4">';
							echo '<div class="rsvp"><h2>'.get_field('rsvp_title').'</h2>';
							
							if(get_field('cost') != ''){
								echo '<div class="cost">'.get_field('cost').'</div>';
							}
							echo '<a href="'.get_field('rsvp_link').'" target="_blank" class="button">'.__('RSVP', 'igel').'</a></div>';
							echo '<div class="sharing">
								<div class="share-icons">
									<span class="text">'.__('Share this event', 'igel').'</span>'; 
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