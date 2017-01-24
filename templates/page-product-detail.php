<?php
/*
Template Name: Hardware Product - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="product-detail">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs sub-nav hardware-breadcrumbs thinclient-breadcrumbs">
				<div class="container">
					<?php wp_nav_menu( array('menu' => 'Thin Client Menu' )); ?>
				</div>
			</div>

			<?php the_content(); ?>

			<section class="software-section">
				<div class="container">
					<div class="row">
					<?php echo get_field('software'); ?>
					</div>
				</div>
			</section>

			<?php
				//Specs Tab is optional
				$specs = get_field('specs');

			?>

			<section class="specifications">
			<div class="container"><div class="row">
					<div class="col-xs-12">
						<ul class="nav nav-tabs" role="tablist" id="spec-tabs">
						    <li role="presentation" class="active"><a href="#features" aria-controls="features" role="tab" data-toggle="tab"><?php echo __('FEATURES & BENEFITS', 'igel'); ?></a></li>
						    <?php if($specs !=''){ ?><li role="presentation"><a href="#specs" aria-controls="specs" role="tab" data-toggle="tab"><?php echo __('SPECS', 'igel'); ?></a></li><?php } ?>
						    <li role="presentation"><a href="#downloads" aria-controls="downloads" role="tab" data-toggle="tab"><?php echo __('DOWNLOADS & ACCESSORIES', 'igel'); ?></a></li>
						    <li role="presentation"><a href="#maintenance" aria-controls="maintenance" role="tab" data-toggle="tab"><?php echo __('MAINTENANCE, SUPPORT & WARRANTY', 'igel'); ?></a></li>
						  </ul>
					</div>
				</div>
			</div>

			<div class="tab-container">
						<div class="tab-content">
								<?php
									$features = get_field('features_benefits');

									if($features){
										echo '<section class="features-section tab-pane active" role="tabpanel" id="features">
												<div class="container features-content">
													<div class="row">';
													?>
													<ul class="col-xs-12 col-md-6 features-list">
											          <?php $i = 0; $j = count( $features );?>
											          <?php foreach ($features as $feature) { ?>
											                <?php 
											                	echo '<li class="feature-item">
																		<div class="wrap-img"><img src="'.$feature['icon'].'" alt="icon" class="icon" /></div>
																		<div class="wrap-text">'.$feature['text'].'</div>
																		</li>';


											                 ?>
											            <?php if ( ( $i + 1 ) == ceil($j / 2) ) echo '</ul><ul class="col-xs-12 col-md-6 features-list">'; ?>
											            <?php $i++; } ?>

											        </ul>

											        <?php
										echo '</div></div></section>';
									}
								?>
								<?php 
									$downloads = get_field('downloads_accessories');

									if($downloads){
							

										echo '<section class="downloads-section tab-pane" role="tabpanel" id="downloads">
												<div class="container downloads-content">
													<div class="row">';
													foreach ($downloads as $download) {
														echo '<div class="col-xs-12 col-sm-4 download-item">';
														$link = $download['url'];
														$target = $download['target'];
														$target_text = ($target == true)? 'target="_blank"' : '';
														if($link != ''){
															echo '<a '.$target_text.' href="'.$link.'" title="'.$download['text'].'">';
														}
															echo '<div class="wrap-img"><img src="'.$download['icon'].'" alt="icon" class="icon" /></div>
															<div class="wrap-text">'.$download['text'].'</div>';

														if($link != ''){
															echo '</a>';
														}
														echo '</div>';
													}
										echo '</div></div></section>';
									
									}
									$maintenance = get_field('maintenance_support');
									if($maintenance != ''){
										echo '<section class="maintenance-section tab-pane" role="tabpanel" id="maintenance">
												<div class="container maintenance-content">
													<div class="row"><div class="wrapper">'.$maintenance.'</div>
													</div></div></section>';
									}

									
									if($specs != ''){
										echo '<section class="specs-section tab-pane" role="tabpanel" id="specs">
												<div class="container specs-content">
													<div class="row">'.$specs.'
													</div></div></section>';
									}
								?>
						</div>
						
			</div>
			</section>
			<?php
				$other_products = get_field('other_products');

				if($other_products != ''){
					echo '<section class="other-products-section">
							<div class="container">
								<div class="row">'.$other_products.'</div>
							</div>
						</section>';

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
		$('#spec-tabs').tabCollapse({
		    tabsClass: 'hidden-sm hidden-xs',
		    accordionClass: 'visible-sm visible-xs'
		});

		

		$('#spec-tabs').on('shown-accordion.bs.tabcollapse', function(){
		    $('.panel-collapse').each(function(i, elem){
				if($(elem).hasClass('in')){
					$(elem).parent().find('.panel-heading').addClass('actives');
				}
			});


		});

		$('#spec-tabs-accordion').on('shown.bs.collapse', function (e) {
	        var offset = $('.panel.panel-default > .panel-collapse.in').offset();
	        if(offset) {
	            $('html,body').animate({
	                scrollTop: $('.panel-title a').offset().top -20
	            }, 500); 
	        }
    	}); 

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