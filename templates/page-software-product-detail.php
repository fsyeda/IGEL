<?php
/*
Template Name: Software Product - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="product-detail software-product">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs sub-nav">
				<div class="container">
					<?php wp_nav_menu( array('menu' => 'UMS AddOns Overview Menu' )); ?>
				</div>
			</div>

			<?php the_content(); ?>
			<?php 
				$technical = get_field('technical_requirements'); 
				$managed_functions = get_field('managed_functions');
				$use_cases = get_field('use_cases');
			?>

			<section class="specifications">
			<div class="container"><div class="row">
					<div class="col-xs-12">
						<ul class="nav nav-tabs" role="tablist" id="spec-tabs">
						    <li role="presentation" class="active"><a href="#features" aria-controls="features" role="tab" data-toggle="tab"><?php echo __('FEATURES & BENEFITS', 'igel'); ?></a></li>
						    <?php if($technical != ''){?><li role="presentation"><a href="#technical-requirements" onclick="javascript:void(0);" aria-controls="technical-requirements" role="tab" data-toggle="tab"><?php echo __('TECHNICAL REQUIREMENTS', 'igel'); ?></a></li><?php } ?>
						    <li role="presentation"><a href="#downloads" aria-controls="downloads" role="tab" data-toggle="tab"><?php echo __('DOWNLOADS', 'igel'); ?></a></li>
						    <?php if($use_cases != ''){?><li role="presentation"><a href="#use-cases" aria-controls="use-cases" role="tab" data-toggle="tab"><?php echo __('USE CASES', 'igel'); ?></a></li><?php } ?>
						    <?php if($managed_functions != ''){?><li role="presentation"><a href="#managed_functions" aria-controls="managed_functions" role="tab" data-toggle="tab"><?php echo __('MANAGED FUNCTIONS', 'igel'); ?></a></li><?php } ?>
						    <li role="presentation"><a href="#licensing" aria-controls="licensing" role="tab" data-toggle="tab"><?php echo __('LICENSING', 'igel'); ?></a></li>
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
									
									if($technical != ''){

										echo '<section class="technical-section tab-pane" role="tabpanel" id="technical-requirements">
												<div class="container accordion-content">
													<div class="row"><div class="col-xs-12">'.$technical.'</div>
												</div></div></section>';
									}

								?>
								<?php 
									$downloads = get_field('downloads');

									if($downloads){
							

										echo '<section class="downloads-section tab-pane" role="tabpanel" id="downloads">
												<div class="container downloads-content">
													<div class="row">';
													foreach ($downloads as $download) {
														echo '<div class="col-xs-12 col-sm-4 download-item">';
														$link = $download['url'];
														if($link != ''){
															echo '<a target="_blank" href="'.$link.'" title="'.$download['text'].'">';
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
									
									if($use_cases != ''){
										echo '<section class="use_cases-section tab-pane" role="tabpanel" id="use-cases">
												<div class="container accordion-content">
													<div class="row"><div class="wrapper"><div class="col-xs-12">'.$use_cases.'</div></div>
													</div></div></section>';
									}

									$licensing = get_field('licensing');
									if($licensing != ''){
										echo '<section class="licensing-section tab-pane" role="tabpanel" id="licensing">
												<div class="container accordion-content">
													<div class="row"><div class="col-xs-12">'.$licensing.'</div>
												</div></div></section>';
									}

									
									if($managed_functions != ''){
										echo '<section class="managed_functions-section tab-pane" role="tabpanel" id="managed_functions">
												<div class="container accordion-content">
													<div class="row"><div class="col-xs-12">'.$managed_functions.'</div>
												</div></div></section>';
									}

								?>
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
	   
	});

</script>
<?php get_footer(); ?>