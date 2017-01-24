<?php
/*
Template Name: Industry Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="industry">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php

					the_content();


					$link_virtual = get_field('virtualization_link');
					$virtual_path = get_page_by_title( 'virtualization stage links' );

					$stages = get_field('stages', $virtual_path->ID);

						echo '<section class="virtualization-path">
									<div class="container">
									<div class="row">
									<div class="col-xs-12 centered">
									<h1>'.wp_strip_all_tags(apply_filters( 'the_content', $virtual_path->post_content )).'</h1>
									</div>';

						$i = 1;
						foreach ($stages as $stage) {
						

							echo '<div class="col-xs-12 col-sm-6 col-md-3 virtualization-element in-view" data-appear-top-offset="-250">
									<div class="wrap-img '.$stage['class'].'">';
							if($i == 1){
								echo '<a href="'.$link_virtual.'" title="'.strip_tags($stage['title']).'"><img src="'.$stage['icon'].'" alt="'.strip_tags($stage['title']).'" class="v-image"></a>';
							}else{
								echo '<a href="'.$stage['link'].'" title="'.strip_tags($stage['title']).'"><img src="'.$stage['icon'].'" alt="'.strip_tags($stage['title']).'" class="v-image"></a>';
							}
							echo '</div><div class="wrap-text '.$stage['class'].'-text">
									<h4>'.$stage['title'].'</h4>
									<p class="text">'.$stage['text'].'</p>';

							if($i == 1){
								echo '<p><a href="'.$link_virtual.'" title="'.strip_tags($stage['title']).'" class="learn-more">LEARN MORE</a></p>';
							}else{
								echo '<p><a href="'.$stage['link'].'" title="'.strip_tags($stage['title']).'" class="learn-more">LEARN MORE</a></p>';
							}
								echo '</div></div>';

								$i++;


						}

						echo '</div></div></section>';


						//resources
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
									 <div class="col-md-3 col-sm-6 <?php echo $class_first; ?>">
										<?php if($modal_view==true){?>
											<div class="img">				
												<a class="fancybox_video" rel="group" href="#ex<?php echo $resource->ID;?>">
													<?php echo get_the_post_thumbnail( $resource, 'img-resources');?>
												</a>
												<a class="btn-filter fancybox_video" href="#ex<?php echo $resource->ID;?>">
													<img src="<?php echo $icon['url'];?>" alt="Resource"/>
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
													<img src="<?php echo $icon['url'];?>" alt="Resource"/>
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

						//social proof
						$social_proof_logos = get_field('social_proof_logos');
						$social_proof_text = get_field('social_proof_text');

						echo '<section class="socialproof-section">
								<div class="container"><div class="row">
								<div class="col-xs-12"><h1>'.$social_proof_text.'</h1></div>';
							echo '<div class="logos-list">';
						foreach ($social_proof_logos as $logo) {
							echo '<div class="col-xs-6 col-sm-3 logo-wrapper">';

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


						echo '</div></div></section>';		

					
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
<?php get_footer(); ?>