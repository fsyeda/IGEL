<?php
/*
Template Name: Press Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="press-page articles-page">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>

				<section class="press-section articles-list">
					<div class="container"><div class="row">
						<div class="col-xs-12"><h1><?php echo __('IGEL in the Press', 'igel'); ?></h1></div>
						<?php
							$press_list = get_press(-1);

							if(count($press_list) > 0){
								foreach ($press_list as $press) {
									$title = get_the_title($press->ID);
									$url = get_the_permalink($press->ID);
									$date = get_field('press_date', $press->ID);
									$date = date('F j, Y', strtotime($date));
									if(strlen($title) >50){
										$short_title = substr($title,0,50)."...";
									}else{
										$short_title = $title;
									}
									
									echo '<div class="col-xs-12 col-sm-6 col-md-3">';
									echo '<div class="article"><a href='.$url.' title="'.$title.'" target="_blank"><div class="img-wrap">
												<img src="'.get_field('image', $press->ID).'" title="'.$title.'" />
											</div></a>
											<div class="text-wrap">
												<span class="date">'.$date.'</span>
												<p>'.$short_title.'</p>
												<a href='.$url.' class="read_article" title="'.$title.'" target="_blank">'.__('READ ARTICLE', 'igel').'</a>
											</div>
										  </div>';
									echo '</div>';
								}
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