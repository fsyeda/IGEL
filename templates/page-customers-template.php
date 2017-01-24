<?php
/*
Template Name: Customers - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="customers">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs black in-page">
				<div class="container">
					<ul>
						<li class="active"><a href="#customers-say" title="What Our Customers Say">WHAT OUR CUSTOMERS SAY</a></li>
						<li><a href="#customers-case-studies" title="Case Studies">CASE STUDIES</a></li>
					</ul>
				</div>
			</div>

			<section class="customers-section" id="customers-say">

			<?php
				$testimonials = get_field('testimonials');

			?>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
					<?php the_content(); ?>
					</div>

					<?php
						//customers
					foreach ($testimonials as $testimonial) {
						# code...
				
						$video = get_field('video_url', $testimonial->ID);
					?>
						<div class="wrap-img col-xs-12 col-sm-4" id="testimonial-<?php echo $testimonial->ID; ?>">
							<?php
								if($video != ''){ 
								//open-popup-video
							?>
									<a href="<?php echo $video; ?>" class="video-play fancybox_youtube fancybox.iframe"><img alt="video" src="<?php echo get_field('picture', $testimonial->ID); ?>" class="testimonial-picture" /></a>
							<?php
								}else{
							?>
									<img src="<?php echo get_field('picture', $testimonial->ID); ?>" alt="testimonial" class="testimonial-picture" />
							<?php 
								}
							?>

							<div class="testimonials-info wrap-info" data-testimonial="testimonial-<?php echo $testimonial->ID; ?>">
								<?php
									$name = get_the_title($testimonial->ID);
									$video = get_field('video_url', $testimonial->ID);
									$industry = get_field('industry', $testimonial->ID);
								?>
								<div class="industry-testimonial"><?php echo get_the_title($industry[0]->ID); ?></div>
								<div class="quote"><?php echo get_field('quote',  $testimonial->ID); ?></div>
								<span class="name"><?php echo $name; ?></span>
								<span class="company"><?php echo get_field('company', $testimonial->ID); ?></span>
								<?php 
									
									if($video != ''){
										echo '<a href="'.$video.'" class="video-link fancybox_youtube fancybox.iframe" title="'.$name.'">WATCH VIDEO</a>';
									}
								?>
							</div>
						</div>
					<?php 
						}
					?>
				</div>
				</div>
			</section>

			<section class="customers-case-studies" id="customers-case-studies">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="centered"><?php echo get_field('case_studies_intro'); ?></div>

							<section class="customers-c-s">
								<div id="list-ccs">
									<?php
										$customers_casestud = get_field('case_studies');
										
										$term_slug = 'industry';
										
										$taxonomy_terms = get_terms( array(
										    'taxonomy' => $term_slug,
				    						'hide_empty' => false,
										));
										

										$industries = get_industries();

										echo '<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4"><select id="customers-mixer-select" class="blue-select">
												<option value="all">Filter by Industry</option>';

										?>
										<?php if($taxonomy_terms && is_array($taxonomy_terms) && !is_wp_error($taxonomy_terms)):?>
										<?php foreach ($taxonomy_terms as $terms):?>
											<option data-taxonomy="<?php echo $term_slug;?>" value=".class-<?php echo $terms->term_id;?>"><?php echo $terms->name;?></option>
										<?php endforeach;?>
										<?php endif;
										echo '</select></div>';

										echo '<ul class="list-cs row col-sm-10 col-sm-offset-1 col-md-12 col-md-offset-0" id="customers-mixer">';
										$t=0;
										foreach($customers_casestud as $casestudy){
											$modal_view	= get_field('modal_view', $casestudy->ID);
 											$add_file =	get_field('add_file', $casestudy->ID);
											$industry = wp_get_post_terms($casestudy->ID, 'industry');
											
											$class = 'class-'.$industry[0]->term_id;

											echo '<li class="col-xs-12 col-sm-6 col-md-3 mix '.$class.'" data-order="'.$t.'" >';
												
												if($modal_view==true){
													echo '<a href="'.$add_file['url'].'" class="open-popup-video video" target="_blank" id="'.$casestudy->ID.'">
															<div class="logo-casestudy">
																<div class="img-wrap"><img src="'.get_field('logo', $casestudy->ID).'" alt="'.get_the_title($casestudy->ID).'" title="'.get_the_title($casestudy->ID).'" /></div>
															</div>
														</a>';

												}else{
													echo '<a href="'.$add_file['url'].'" target="_blank" id="'.$casestudy->ID.'">
															<div class="logo-casestudy">
																<div class="img-wrap"><img src="'.get_field('logo', $casestudy->ID).'" alt="'.get_the_title($casestudy->ID).'" title="'.get_the_title($casestudy->ID).'" /></div>
															</div>
														</a>';
												}
												
												echo '</li>';
											$t++;
										}
										echo '</ul>';
									?>
								</div>
						</section>
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
<script type="text/javascript">
	jQuery(document).ready(function($){
		var startWindowScroll = 0;
    	$('.open-popup-video').magnificPopup({
	        type: 'iframe',
	        mainClass: 'mfp-fade',
	        removalDelay: 160,
	        preloader: false,

	        fixedContentPos: false,
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

	    $('.wrap-img').each(function(i, obj){
	    	var testimonial = $(this);
	    	setTimeout(function() {
		    	testimonial.addClass('in-view');
		    	var current = testimonial.attr("id");
		    	$('.customers').find("[data-testimonial='" + current + "']").addClass('in-view');
	    	}, 500*i);
	    });

	     $(".fancybox_youtube").fancybox({
            /*maxWidth    : 800,
	        maxHeight    : 600,
	        fitToView    : false,
	        width        : '70%',
	        height        : '50%',
	        autoSize    : false,*/
	        closeClick    : false,
	        openEffect    : 'none',
	        closeEffect    : 'none',
             helpers: {
                overlay: {
                  locked: false
                }
            }
         });
	});
</script>
<?php get_footer(); ?>