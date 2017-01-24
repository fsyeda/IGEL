<?php
/*
Template Name: Company Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="company-page">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="breadcrumbs in-page" id='company-subnav'>
					<div class="container">
						<ul>
							<li class="active"><a href="#overview" title="Overview">OVERVIEW</a></li>
							<li><a href="#awards" title="Awards">AWARDS</a></li>
							<li><a href="#executives-team" title="Executives Team">EXECUTIVE TEAM</a></li>
							<li><a href="#news" title="News">NEWS</a></li>
							<li><a href="#press" title="Press">PRESS</a></li>
						</ul>
					</div>
				</div>

				<?php the_content(); ?>


				<section class="company-customers">
					<div class="container">
						<div class="row social-proof">
								<?php
								$customers_text = get_field('customers_text');

								$customers = get_field('social_proof_logos');

								echo $customers_text;


								echo '<div class="customers-logos">';
								foreach ($customers as $logo) {
									echo '<div class="col-xs-6 col-sm-2 logo-wrapper">';

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

								?>
						</div>
					</div>
				</section>
				<section class="awards-section" id="awards">
				<div class="container"><div class="row">
					<div class="col-xs-12 awards-overview"><h1>Recent Awards</h1></div>
					<div class="awards-list">
					<?php
						echo get_field('awards');
					?>
					</div>
				</div>
				</div>
				</section>
				<section class="executive-team" id="executives-team">
					<div class="container"><div class="row">
					<div class="col-xs-12"><h1><?php echo __('Executive Team', 'igel'); ?></h1></div>
					</div></div>
					<?php
						//executives
					$executives = get_field('executive_team');

					$executives_first_row = array_slice($executives, 0, 4);
					$executives_second_row = array_slice($executives, 4);
					$lightbox = '';


					//First Section
					echo '<section class="executives-images first-row"><div class="container"><div class="row">';


						foreach ($executives_first_row as $executive) {
						
							$name = get_the_title($executive->ID);
					?>
						
						<div class="wrap-img col-xs-12 col-sm-3">
							<?php echo '<a href="#" class="open-popup-link" data-mfp-src="#lightbox-'.$executive->ID.'" title="'.$name.'">';?><img src="<?php echo get_field('image', $executive->ID); ?>" class="executive-picture" alt="<?php echo $name;?>" /><?php echo '</a>' ;?>
						</div>
						<div class="executive-info visible-xs">
							<div class="wrap-info col-xs-12">
								<?php echo '<a href="#" class="open-popup-link" data-mfp-src="#lightbox-'.$executive->ID.'" title="'.$name.'">';?><span class="name"><?php echo $name; ?></span><?php echo '</a>' ;?>
								<span class="title"><?php echo get_field('title', $executive->ID); ?></span>
								<?php 
									echo '<a href="#" class="bio-link open-popup-link" data-mfp-src="#lightbox-'.$executive->ID.'" title="'.$name.'">'.__('READ BIO', 'igel').'</a>';
								?>

								<?php
									
								?>
							</div>
						</div>
							<?php
								//prepare lightbox 
								$lightbox .='<div id="lightbox-'.$executive->ID.'" class="white-popup close-out mfp-hide">
											<div class="container-lightbox profile-lightbox">
											
											<div class="image-column">
												<div class="img-wrap"><img src="'.get_field('image', $executive->ID).'" alt="'.$name.'" class="executive-picture" />
												<span class="name">'.$name.'</span>
												<span class="title">'.get_field('title', $executive->ID).'</span>
											</div>


											</div>
											<div class="text-column">
												<article>'.get_post_field('post_content', $executive->ID).'</article>
												<quote>'.get_field('quote', $executive->ID).'</quote>
											';
											$linkedin = get_field('linkedin', $executive->ID);
											if($linkedin != ''){
												$lightbox .='<a href="'.$linkedin.'" target="_blank" class="linkedin-btn" title="'.get_the_title($executive->ID).'"><img src="/wp-content/uploads/2016/11/linkedin.png" class="linkedin" /></a>';
											}
								
								$lightbox .='</div></div>
											</div>';
								?>
						<?php } ?>
						</div></div>
						</section>

						<section class="executives-text hidden-xs first-row">
							<div class="container"><div class="row">
						<?php 
							
							foreach ($executives_first_row as $executive) {
						?>
						
								<div class="executive-info">
									<div class="wrap-info col-sm-3">
										<?php
											$name = get_the_title($executive->ID);
										?>
										<?php echo '<a href="#" class="open-popup-link" data-mfp-src="#lightbox-'.$executive->ID.'" title="'.$name.'">';?><span class="name"><?php echo $name; ?></span>
										<span class="title"><?php echo get_field('title', $executive->ID); ?></span><?php echo '</a>' ;?>
										<?php 
											echo '<a href="#" class="bio-link open-popup-link" data-mfp-src="#lightbox-'.$executive->ID.'" title="'.$name.'">'.__('READ BIO', 'igel').'</a>';
										?>

										<?php
											
										?>
									</div>
								</div>


					<?php 
						}
					?>
							</div></div>
						</section>

					<?php
					//Second Section
						echo '<section class="executives-images second-row"><div class="container"><div class="row">';


						foreach ($executives_second_row as $executive) {
						# code...
					?>
						<?php
							$name = get_the_title($executive->ID);
						?>

						<div class="wrap-img col-xs-12 col-sm-3">
							<?php echo '<a href="#" class="open-popup-link" data-mfp-src="#lightbox-'.$executive->ID.'" title="'.$name.'">';?><img src="<?php echo get_field('image', $executive->ID); ?>" alt="<?php echo $name;?>" class="executive-picture" /><?php echo '</a>' ;?>
						</div>
						<div class="executive-info visible-xs">
							<div class="wrap-info col-xs-12">
								
								<span class="name"><?php echo $name; ?></span>
								<span class="title"><?php echo get_field('title', $executive->ID); ?></span>
								<?php 
									echo '<a href="#" class="bio-link open-popup-link" data-mfp-src="#lightbox-'.$executive->ID.'" title="'.$name.'">'.__('READ BIO', 'igel').'</a>';
								?>

								<?php
									
								?>
							</div>
						</div>
						<?php } ?>
						</div></div>
						</section>

						<section class="executives-text hidden-xs second-row">
							<div class="container"><div class="row">
						<?php 
							
							foreach ($executives_second_row as $executive) {
						?>
						
								<div class="executive-info">
									<div class="wrap-info col-sm-3">
										<?php
											$name = get_the_title($executive->ID);
										?>
										<span class="name"><?php echo $name; ?></span>
										<span class="title"><?php echo get_field('title', $executive->ID); ?></span>
										<?php 
											echo '<a href="#" class="bio-link open-popup-link" data-mfp-src="#lightbox-'.$executive->ID.'" title="'.$name.'">'.__('READ BIO', 'igel').'</a>';
										?>

										<?php
											
										?>
									</div>
								</div>

								<?php
								//prepare lightbox 
								$lightbox .='<div id="lightbox-'.$executive->ID.'" class="white-popup close-out mfp-hide">
											<div class="container-lightbox profile-lightbox">
											
											<div class="image-column">
												<div class="img-wrap"><img src="'.get_field('image', $executive->ID).'" class="executive-picture" alt="'.$name.'" />
												<span class="name">'.$name.'</span>
												<span class="title">'.get_field('title', $executive->ID).'</span>
											</div>


											</div>
											<div class="text-column">
												<article>'.get_post_field('post_content', $executive->ID).'</article>
												<quote>'.get_field('quote', $executive->ID).'</quote>
											';
											$linkedin = get_field('linkedin', $executive->ID);
											if($linkedin != ''){
												$lightbox .='<a href="'.$linkedin.'" target="_blank" class="linkedin-btn" title="'.get_the_title($executive->ID).'"><img src="/wp-content/uploads/2016/11/linkedin.png" class="linkedin" /></a>';
											}
								
								$lightbox .='</div></div>
											</div>';
								?>
					<?php 
						}

						
					?>
							</div></div>

							<?php
								//all the lightbox code
								echo $lightbox;

							?>
						</section>


				</section>
				<section class="news-section articles-list" id="news">
					<div class="container"><div class="row">
						<div class="col-xs-12"><h1><?php echo __('IGEL in the News', 'igel'); ?></h1></div>
						<?php
							$news_list = get_news(4);

							if(count($news_list) > 0){
								foreach ($news_list as $news) {
									$title = get_the_title($news->ID);
									$url = get_field('url', $news->ID);
									$date = get_field('news_date', $news->ID);
									$date = date('F j, Y', strtotime($date));
									if(strlen($title) >50){
										$short_title = substr($title,0,50)."...";
									}else{
										$short_title = $title;
									}
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

							echo '<div class="col-xs-12"><a href="/news/" class="button" title="IGEL News">'.__('SEE ALL IGEL NEWS ARTICLES', 'igel').'</a></div>';
						?>
					</div></div>
				</section>
				<section class="press-section articles-list" id="press">
					<div class="container"><div class="row">
						<div class="col-xs-12"><h1><?php echo __('IGEL in the Press', 'igel'); ?></h1></div>
						<?php
							$press_list = get_press(4);

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

							echo '<div class="col-xs-12"><a href="/press/" class="button" title="IGEL News">'.__('SEE ALL IGEL PRESS ARTICLES', 'igel').'</a></div>';
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
<script type="text/javascript">
	jQuery(document).ready(function($){

		 $('#company-subnav li > a').on('click', function(){
	    	$('#company-subnav').find('li').removeClass('active');
	    	$(this).parent().addClass('active');

	    	return false;
	    });


		var about_hidden=true;
		$('#read-about').on('click', function(e){
			e.preventDefault();
			var height = $('.overview').outerHeight(),
				about_height = $('#about').height() + 100;

			if(about_hidden){
				$('#about').css({'bottom': 0});
			
				$('.overview').css({
					'height':height+about_height 
				});
				about_hidden = false;
			}else{
				$('#about').css({'bottom': '-65px'});
				$('.overview').css({
					'height': '450px'
				})
				about_hidden = true;
			}
		});

		//Open Popup
		var startWindowScroll = 0;
		
		$('.open-popup-link').magnificPopup({
	      type:'inline',
	      midClick: true,
	      mainClass: 'mfp-swipe',
	      fixedContentPos:true,
	       callbacks: {
		      beforeOpen: function() {
		        startWindowScroll = $(window).scrollTop();
		        $('html').addClass('mfp-helper');
		      },
		      close: function() {
		        $('html').removeClass('mfp-helper');
		        $(window).scrollTop(startWindowScroll);
		      }
		    }
	    });
	
	});
</script>
<?php get_footer(); ?>