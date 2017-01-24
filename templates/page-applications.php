<?php
/*
Template Name: Applications Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="partnerships-page applications-page">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php the_content(); 

				$apps = get_field('applications_categories');

				?>

				<section class="diagram">
					<div class="container"><div class="row">
						<div class="col-xs-12 col-md-10 col-md-offset-1">

						<div class="hidden-xs">
						<?php
							$options = '';
							foreach ($apps as $category) {
								$category_id = $category['category_name'];
								$term = get_term( $category_id );
								echo '<div class="partner-category"><a href="#'.$term->slug.'" class="targets link-category" title="'.$term->name.'">'.$term->name.'</a></div>';

								$options .= '<option value="#'.$term->slug.'">'.$term->name.'</option>';
							}

							echo '</div>';

							echo '<div class="mobile-select visible-xs"><select id="partner-category-select" class="blue-select">';
							echo '<option value="#">'.__('Select a Category', 'igel').'</option>';
							echo $options;

							echo '</select></div>';

						?>
						</div>

					</div></div>
				</section>

				<section class="partners-list">

				<?php
					foreach ($apps as $category) {
						$category_id = $category['category_name'];
						$term = get_term( $category_id );

						echo '<section class="partners" id="'.$term->slug.'"><div class="container"><div class="row">
								<div class="col-xs-12">
									<h1>'.$term->name.'</h1>
									<p>'.$term->description.'</p>
								</div>';

								$apps_text = '';
								foreach($category['partners'] as $partner){
									$apps = get_field('apps', $partner->ID);
									if(count($apps) > 1){
										foreach ($apps as $app) {
											if($app['category'] == $category_id){
												$app_text = $app['name'];
											}
										}
									}else{
										$app_text = $apps[0]['name'];
									}
									$class_text = '';
									if(strpos($app_text, '<br') !== false){
										$class_text = 'two-lines';
									}
									$class_long = '';
									if(strlen($app_text) > 29){
										$class_long = 'long-string';
									}
									$class_mobile = '';
									if(strlen($app_text) > 21){
										$class_long = 'long-mobile';
									}
									
									$title_mobile = '';
									if(strlen($partner->post_title) > 14){
										$title_mobile = 'long-mobile';
									}

							        echo '<div class="col-xs-12 col-md-6 partner-item">
							        <ul class="partner">
							        <li><div class="title '.$title_mobile.'">'.$partner->post_title.'</div>
							        <div class="apps '.$class_text.' '.$class_long.'">'.$app_text.'</div></li>

							        </ul></div>';
							      
							     }

						echo '</div></div></section>';
					}


				?>


				
				</section>
				<?php
					//resources
						$resources = get_field('resources');
						$resources_text = get_field('resources_text');

						if(count($resources) > 0){

						echo '<div class="industry"><section class="resources-section">
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

						echo '</div></div></section></div>';		

						}


				?>
			
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
jQuery(document).ready(function ($) {

	 if(location.hash != null && location.hash != ""){

    	var idElement = location.hash;
    	
    	var top = $(idElement).offset().top;
		$('html, body').animate({scrollTop:top-60}, 500 );

    	};
});
</script>
<?php get_footer(); ?>