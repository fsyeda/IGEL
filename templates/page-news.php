<?php
/*
Template Name: News Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="news-page articles-page">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>

				<section class="news-section articles-list">
					<div class="container"><div class="row">
						<div class="col-xs-12"><h1><?php echo __('IGEL in the news', 'igel'); ?></h1></div>
						<?php
							$news_list = get_news(-1);
							if(count($news_list) > 0){
								foreach ($news_list as $news) {
									$title = get_the_title($news->ID);
									$url = get_field('url', $news->ID);
									$date = get_field('news_date', $news->ID);
									//echo $date;
									$date = date('F j, Y', strtotime($date));
									$short_title = substr($title,0,50)."...";;
									if($url == ''){
										$url = get_field('pdf', $news->ID);
									}
									echo '<div class="col-xs-12 col-sm-6 col-md-3">';
									echo '<div class="article"><a href='.$url.' target="_blank" title="'.$title.'"><div class="img-wrap">
												<img src="'.get_field('logo', $news->ID).'" title="'.$title.'" />
											</div></a>
											<div class="text-wrap">
												<span class="date">'.$date.'</span>
												<p>'.$short_title.'</p>
												<a href='.$url.' class="read_article" target="_blank" title="'.$title.'">'.__('READ ARTICLE', 'igel').'</a>
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