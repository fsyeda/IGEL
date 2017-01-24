<?php
/*
Template Name: Software Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="software-page">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs sub-nav no-click software-breadcrumbs ">
				<div class="container">
					<?php wp_nav_menu( array('menu' => 'Software Overview Menu' )); ?>
				</div>
			</div>

			<?php the_content(); ?>

			<section class="how-works-software">
				<div class="container">
				<div class="row">
				<?php
					echo get_field('how_works');
				?>

				<div class="video-software">
					<div class="col-xs-12 col-sm-6 col-sm-push-6 text-video">
					<h2><?php echo get_field('video_text');?></h2>
					</div>
					<div class="col-xs-12 col-sm-6 col-sm-pull-6 background-video">
						<a href="<?php echo get_field('video_url'); ?>" class="fancybox_youtube fancybox.iframe"><img src="/wp-content/themes/igel/img/play-big-button.png" class="video-link"/></a>
					</div>
					
				</div>

				</div>
				</div>
			</section>
			<section class="software-benefits">
				<div class="container"><div class="row">
					<?php echo get_field('benefits'); ?>
				</div></div>
			</section>
			<?php
				$resources = get_field('resources');
				$resources_text = get_field('resources_text');
				if(count($resources) > 0){

					echo '<section class="resources-section">
							<div class="container"><div class="row">
							<div class="col-xs-12"><h1>'.$resources_text.'</h1></div>';

							echo '<div class="rs-content more-resources"><div class="resources-container">';

							$first = true;
							foreach ($resources as $resource) {
								 $modal_view	=	get_field('modal_view', $resource->ID);
								 $term_type		=	get_the_terms($resource,'content_type');
								 $add_file		=	get_field('add_file', $resource->ID);
								 $content		=	apply_filters('the_title', get_the_title($resource->ID));
								 if(strlen($content) >47){
									$sub = substr($content,0,47)."...";
								}else{
									$sub = $content;
								}

								 if($term_type){
									foreach ($term_type as $cat){
										$name=$cat->name;					
										$icon	=	get_field('icon_img','content_type_'.$cat->term_id);
									}	
								 }
								 $class_first = '';
								 if($first){ $class_first = ' col-md-offset-1';}
								 ?>
								 <div class="col-md-3 col-sm-4 <?php echo $class_first; ?>">
									<?php if($modal_view==true){?>
										<div class="img">				
											<a class="fancybox_video" rel="group" href="#ex<?php echo $resource->ID;?>">
												<?php echo get_the_post_thumbnail( $resource, 'img-resources');?>
											</a>
											<a class="btn-filter fancybox_video" href="#ex<?php echo $resource->ID;?>">
												<img src="<?php echo $icon['url'];?>"/>
												<?php echo $name;?>
											</a>
											<div class="dud-fulldiv">
											 	<a class="fancybox_video"  href="#ex<?php echo $resource->ID;?>">
												 	<div class="dud-divicon">
													 	<div class="dud-icon">
													 		<span></span>
													 	</div>
													 	<p class="first">WATCH</p>
													 	<p><?php echo $name;?></p>
													 </div>
											 	</a>
										 	</div>		
										</div>
										<div class="excerpt">
											<?php echo $sub;?>
										</div>
										<div id="ex<?php echo $resource->ID;?>" style="display:none;">
										    <video controls id="video-id" >
										    	<source src="<?php echo $add_file['url'];?>" type="video/mp4">
										    </video>
										 </div>
									<?php }else {?>
										<div class="img">				
											<a href="<?php echo $add_file['url'];?>" target="_blank">
												<?php echo get_the_post_thumbnail($resource, 'img-resources' );?>
											</a>
											<a class="btn-filter" href="<?php echo $add_file['url'];?>" target="_blank">
												<img src="<?php echo $icon['url'];?>"/>
												<?php echo $name;?>
											</a>
											<div class="dud-fulldiv">
										 	<a href="<?php echo $add_file['url'];?>" target="_blank">
											 	<div class="dud-divicon">
												 	<div class="dud-icon">
												 		<span></span>
												 	</div>
												 	<p class="first">READ</p>
												 	<p><?php echo $name;?></p>
												 </div>
										 	</a>
										 	</div>		
										</div>
										<div class="excerpt">
											<?php echo $sub;?>
										</div>
									<?php }?>
								</div>
							<?php
								$first = false;
							}

							echo '</div></div>';

					echo '</div></div></section>';		

					}
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
<script type="text/javascript">
	jQuery(document).ready(function($){
		/*var startWindowScroll = 0;
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
	    });*/

	     $(".fancybox_youtube").fancybox({
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