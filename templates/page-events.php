<?php
/*
Template Name: Events - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="events">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


		<?php
			$event = get_field('event');
		
			if($event){

				$background = get_field('background_image', $event[0]->ID);
				$styles_background = '';
				if($background != ''){
					$styles_background = 'style="background: url('.$background.') no-repeat center center transparent; background-size: cover;"';
				}
		?>
			<section class="highlight-event" <?php echo $styles_background; ?>>
				<div class="container"><div class="row">

					<?php

							$title= get_field('event_title', $event[0]->ID);
							$day_not_confirmed = get_field('date_not_confirmed');
							$date_start = get_field('date_start', $event[0]->ID);
							$date_end = get_field('date_end', $event[0]->ID);



							$date_text = '';
							if($date_end == ''){
								if($day_not_confirmed){
									$date_text = date('F, Y', strtotime($date_start));
								}else{
									$date_text = date('F j, Y', strtotime($date_start));
								}
							}else{
								if (date("F Y", strtotime($date_start)) == date("F Y", strtotime($date_end))){
									//same month and year
									$date_text = date('F j-', strtotime($date_start)).''.date('j, Y', strtotime($date_end));
								}else if(date("Y", strtotime($date_start)) == date("Y", strtotime($date_end))){
									//different month, same year
									$date_text = date('F j -', strtotime($date_start)).''.date('F j, Y', strtotime($date_end));
								}else{
									//different month and year
									$date_text = date('F j, Y -', strtotime($date_start)).''.date('F j, Y', strtotime($date_end));
								}
							}
							echo '<div class="col-xs-12 col-sm-7 col-sm-offset-1"><div class="date">'.$date_text.'</div><h4>Join us at '.$title.'</h4></div>';
							echo '<div class="col-xs-12 col-sm-4"><a href="'.get_the_permalink($event[0]->ID).'" title="'.$title.'" class="button white">MORE INFO</a></div>';
						

					?>


					</div></div>
			</section>
			<?php }php ?>
			<section class="events-webinars-lists">
				<div class="container"><div class="row">
					<div class="col-xs-12"><h1 class="border-gold"><?php echo __('Events, Webinars & Trainings', 'igel'); ?></h1></div>
					<div class="col-xs-12">
					<?php
						$today = current_time('Ymd');
						$date_today = $today;

						$events = get_events($date_today);
						$countries = get_events_countries();
						$webinars = get_webinars($date_today);
						$trainings = get_trainings();


						if($events)
						{
							echo '<table class="table-events table-filters"><thead class="filters">

							<tr><th class="col-xs-2 hidden-xs"><div class="filter-title">'.__('DATE', 'igel').'</div></th>
							<th class="col-xs-4 hidden-xs"><div class="filter-title">'.__('EVENT', 'igel').'</div></th>
							<th class="col-xs-2 hidden-xs"><div class="filter-title">'.__('CITY', 'igel').'</div></th>
							<th class="col-xs-12 col-sm-2"><div class="filter-title"><select id="select-country"><option value="all">'.__("COUNTRY", "igel").'</option><option value="all">'.__("All Countries", "igel").'</option>';
							foreach($countries as $country){
								echo '<option value="'.$country->ID.'">'.get_the_title($country).'</option>';
							}
							echo '</select></div></th>
							<th class="col-xs-12 col-sm-2"><div class="filter-title"><select id="select-host"><option value="all">'.__('HOSTED BY', 'igel').'</option><option value="all">'.__("All", "igel").'</option><option value="IGEL">IGEL</option><option value="Third Party">'.__("Third Party", "igel").'</option></select></div></th>
							</tr>
							</thead></table>';

							echo '<table class="table-events"><tbody id="content-table-events">';

							foreach ($events as $event) {
								$title = get_field('event_title', $event->ID);
								$country = get_field('country', $event->ID );
								$country_name = get_the_title($country[0]->ID);

								echo '<tr class="element-row">';
								//Date 
								$date_start = get_field('date_start', $event->ID);
								$day_not_confirmed = get_field('date_not_confirmed', $event->ID);
								$date_end = get_field('date_end', $event->ID);

								if($date_end == ''){
									if($day_not_confirmed){
										$date_text = date('M, Y', strtotime($date_start));
									}else{
										$date_text = date('M j, Y', strtotime($date_start));
									}
								}else{
									if (date("M Y", strtotime($date_start)) == date("M Y", strtotime($date_end))){
										//same month and year
										$date_text = date('M j-', strtotime($date_start)).''.date('j, Y', strtotime($date_end));
									}else if(date("Y", strtotime($date_start)) == date("Y", strtotime($date_end))){
										//different month, same year
										$date_text = date('M j -', strtotime($date_start)).''.date('M j, Y', strtotime($date_end));
									}else{
										//different month and year
										$date_text = date('M j, Y -', strtotime($date_start)).''.date('M j, Y', strtotime($date_end));
									}
								}
								echo '<td class="col-xs-12 col-sm-2 column">';
								echo '<a href="'.get_the_permalink($event->ID).'" title="'.$title.'"><span class="date hidden-xs">'.$date_text.'</span></a>';
								echo '<div class="visible-xs event-info">';
								echo '<a href="'.get_the_permalink($event->ID).'" title="'.$title.'"><span class="name">'.$title.'</span>';
								echo '<div class="col-1">'.$date_text.'<br />'.__('Hosted by ', 'igel').get_field('hosted', $event->ID ).'</div>';
								echo '<div class="col-2">'.get_field('city', $event->ID ).'<br />'.$country_name.'</div></a>';
								echo '</div>';
								echo '</td>';

								echo '<td class="col-sm-4 hidden-xs column"><a href="'.get_the_permalink($event->ID).'" title="'.$title.'"><span class="name">'.$title.'</span></a></td>';
								echo '<td class="col-sm-2 hidden-xs column"><a href="'.get_the_permalink($event->ID).'" title="'.$title.'"><span class="element">'.get_field('city', $event->ID ).'</span></a></td>';
								echo '<td class="col-sm-2 hidden-xs column"><a href="'.get_the_permalink($event->ID).'" title="'.$title.'"><span class="element">'.$country_name.'</span></a></td>';
								echo '<td class="col-sm-2 hidden-xs column"><a href="'.get_the_permalink($event->ID).'" title="'.$title.'"><span class="element">'.get_field('hosted', $event->ID ).'</span></a></td>';

								echo '</tr>';
							}

							echo '</tbody></table>';

						}else{
							echo '<div class="no-events">There are no Events scheduled.</div>';
						}

						/* Webinars */
						

						if($webinars)
						{
							echo '<table class="table-events table-filters-webinars"><thead class="filters">

								<tr><th class="col-xs-2 hidden-xs"><div class="filter-title">'.__('DATE', 'igel').'</div></th>
								<th class="col-xs-4 hidden-xs"><div class="filter-title">'.__('WEBINAR', 'igel').'</div></th>';

								$languages_name = "language";
								if($webinars){
									$languages = get_field_object($languages_name, $webinars[0]->ID);
								}else{
									$languages = array('choices'=> null, 'key' => 'no_webinars_langs');
								}
								
								echo '<th class="col-xs-6 col-sm-2"><div class="filter-title">';
								if( $languages )
								{
									echo '<select name="' . $languages['key'] . '" id="select-language">
										<option value="all">'.__("LANGUAGES", "igel").'</option>
										<option value="all">'.__("All Languages", "igel").'</option>';
										foreach( $languages['choices'] as $k => $v )
										{
											echo '<option value="' . $k . '">' . $v . '</option>';
										}
									echo '</select></div></th>';
								}
								echo '
								<th class="col-xs-2 hidden-xs"><div class="filter-title">'.__('LENGTH', 'igel').'</div></th>
								<th class="col-xs-2 hidden-xs"><div class="filter-title">'.__('WATCH', 'igel').'</div></th>
								</tr>
								</thead></table>';
							echo '<table class="table-events table-webinars"><tbody id="content-table-webinars">';

							foreach ($webinars as $webinar) {
								$title = get_field('webinar_title', $webinar->ID);
								$language = get_field('language', $webinar->ID );
								$length = get_field('length', $webinar->ID);
								$watch = get_field('watch', $webinar->ID);

								echo '<tr class="element-row">';
								//Date 
								$date = get_field('date', $webinar->ID);

								$date_text = date('M j, Y', strtotime($date));
								
								echo '<td class="col-xs-12 col-sm-2 column">';
								echo '<a href="'.get_the_permalink($webinar->ID).'" title="'.$title.'"><span class="date hidden-xs">'.$date_text.'</span></a>';
								echo '<div class="visible-xs webinar-info">';
								echo '<a href="'.get_the_permalink($webinar->ID).'" title="'.$title.'"><span class="name">'.$title.'</span>';
								echo '<div class="col-1">'.$date_text.'<br />'.__('Language: ', 'igel').$language.'</div>';
								echo '<div class="col-2">'.$length.'<br />'.$watch.'</div></a>';
								echo '</div>';
								echo '</td>';

								echo '<td class="col-sm-4 hidden-xs column"><a href="'.get_the_permalink($webinar->ID).'" title="'.$title.'"><span class="name">'.$title.'</span></a></td>';
								echo '<td class="col-sm-2 hidden-xs column"><a href="'.get_the_permalink($webinar->ID).'" title="'.$title.'"><span class="element">'.$language.'</span></a></td>';
								echo '<td class="col-sm-2 hidden-xs column"><a href="'.get_the_permalink($webinar->ID).'" title="'.$title.'"><span class="element">'.$length.'</span></a></td>';
								echo '<td class="col-sm-2 hidden-xs column"><a href="'.get_the_permalink($webinar->ID).'" title="'.$title.'"><span class="element">'.$watch.'</span></a></td>';

								echo '</tr>';
							}

							echo '</tbody></table>';

						}else{
							echo '<div class="no-events">There are no Webinars scheduled.</div>';
						}

						/* Trainings */

						

						if($trainings){
							echo '<table class="table-events table-filters"><thead class="filters">

							<tr><th class="col-xs-2 hidden-xs"><div class="filter-title">'.__('DATE', 'igel').'</div></th>
							<th class="col-xs-8 hidden-xs"><div class="filter-title">'.__('TRAINING', 'igel').'</div></th>';
							echo '
							<th class="col-xs-2 hidden-xs"><div class="filter-title">'.__('LENGTH', 'igel').'</div></th>
							</tr>
							</thead></table>';
							
							echo '<table class="table-events table-trainings"><tbody id="content-table-trainings">';

							foreach ($trainings as $training) {
								$title = get_field('training_title', $training->ID);
								$length = get_field('length', $training->ID);
								
								echo '<tr class="element-row">';
								//Date 
								$date = get_field('date', $training->ID);
								if($date != ''){
									$date_text = date('M j, Y', strtotime($date));
								}else{
									$date_text = get_field('date_tbd', $training->ID);
								}
								
								echo '<td class="col-xs-12 col-sm-2 column">';
								echo '<a href="'.get_the_permalink($training->ID).'" title="'.$title.'"><span class="date hidden-xs">'.$date_text.'</span></a>';
								echo '<div class="visible-xs training-info">';
								echo '<a href="'.get_the_permalink($training->ID).'" title="'.$title.'"><span class="name">'.$title.'</span>';
								echo '<div class="col-1">'.$date_text.'</div>';
								echo '<div class="col-2">'.$length.'</div></a>';
								echo '</div>';
								echo '</td>';

								echo '<td class="col-sm-8 hidden-xs column"><a href="'.get_the_permalink($training->ID).'" title="'.$title.'"><span class="name">'.$title.'</span></a></td>';
								echo '<td class="col-sm-2 hidden-xs column"><a href="'.get_the_permalink($training->ID).'" title="'.$title.'"><span class="element">'.$length.'</span></a></td>';

								echo '</tr>';
							}

							echo '</tbody></table>';
						}else{
							echo '<div class="no-events">There are no Trainings scheduled.</div>';
						}
					?>

					</div>
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