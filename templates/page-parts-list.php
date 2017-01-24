<?php
/*
Template Name: Parts List Page - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="parts-list">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>

				<?php

				//get fields and create the panel group
				$ud2 = get_field('ud2');
				$ud3 = get_field('ud3');
				$ud5 = get_field('ud5');
				$ud6 = get_field('ud6');
				$ud9 = get_field('ud9');
				$ud9_touch = get_field('ud9_touch');
				$ud_pocket = get_field('ud_pocket');
				$imi = get_field('imi');
				$uma = get_field('uma');
				$udc3 = get_field('udc3');
				$software = get_field('software_options');
				$hardware = get_field('hardware_accessories');

				?>
				<section class="list-parts-accordion">
					<div class="container"><div class="row">
					<div class="col-xs-12">
						<div class="panel-group" id="parts-tabs-accordion">
							<div class="panel panel-default">
								<div class="panel-heading actives">
									<h4 class="panel-title">
										<a href="#0" class="pannel-toggleable" data-target="#ud2-collapse" aria-controls="ud2" role="tab" data-toggle="collapse" data-parent="#parts-tabs-accordion">
										<span class="text"><?php echo __('UD2 & IZ2', 'igel'); ?></span><span class="icon cross"></span>
										</a></h4>
								</div>
								<div id="ud2-collapse" class="panel-collapse collapse in">
									<div class="panel-body">
										<div class="container part-content">
											<div class="row">
												<div class="wrapper">
													<div class="col-xs-12">
														<table class="parts-table">
															<thead><th><?php echo __('PART NUMBER', 'igel'); ?></th><th><?php echo __('DESCRIPTION', 'igel'); ?></th></thead>
															<tbody>
															<?php
																foreach ($ud2 as $part) {
																	echo '<tr><td>'.$part['number'].'</td><td>'.$part['description'].'</td></tr>';
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#0" class="pannel-toggleable" data-target="#ud3-collapse" aria-controls="ud3" role="tab" data-toggle="collapse" data-parent="#parts-tabs-accordion">
										<span class="text"><?php echo __('UD3 & IZ3', 'igel'); ?></span><span class="icon plus"></span>
										</a></h4>
								</div>
								<div id="ud3-collapse" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="container part-content">
											<div class="row">
												<div class="wrapper">
													<div class="col-xs-12">
														<table class="parts-table">
															<thead><th><?php echo __('PART NUMBER', 'igel'); ?></th><th><?php echo __('DESCRIPTION', 'igel'); ?></th></thead>
															<tbody>
															<?php
																foreach ($ud3 as $part) {
																	echo '<tr><td>'.$part['number'].'</td><td>'.$part['description'].'</td></tr>';
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#0" class="pannel-toggleable" data-target="#ud5-collapse" aria-controls="ud5" role="tab" data-toggle="collapse" data-parent="#parts-tabs-accordion">
										<span class="text"><?php echo __('UD5', 'igel'); ?></span><span class="icon plus"></span>
										</a></h4>
								</div>
								<div id="ud5-collapse" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="container part-content">
											<div class="row">
												<div class="wrapper">
													<div class="col-xs-12">
														<table class="parts-table">
															<thead><th><?php echo __('PART NUMBER', 'igel'); ?></th><th><?php echo __('DESCRIPTION', 'igel'); ?></th></thead>
															<tbody>
															<?php
																foreach ($ud5 as $part) {
																	echo '<tr><td>'.$part['number'].'</td><td>'.$part['description'].'</td></tr>';
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#0" class="pannel-toggleable" data-target="#ud6-collapse" aria-controls="ud6" role="tab" data-toggle="collapse" data-parent="#parts-tabs-accordion">
										<span class="text"><?php echo __('UD6', 'igel'); ?></span><span class="icon plus"></span>
										</a></h4>
								</div>
								<div id="ud6-collapse" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="container part-content">
											<div class="row">
												<div class="wrapper">
													<div class="col-xs-12">
														<table class="parts-table">
															<thead><th><?php echo __('PART NUMBER', 'igel'); ?></th><th><?php echo __('DESCRIPTION', 'igel'); ?></th></thead>
															<tbody>
															<?php
																foreach ($ud6 as $part) {
																	echo '<tr><td>'.$part['number'].'</td><td>'.$part['description'].'</td></tr>';
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#0" class="pannel-toggleable" data-target="#ud9-collapse" aria-controls="ud9" role="tab" data-toggle="collapse" data-parent="#parts-tabs-accordion">
										<span class="text"><?php echo __('UD9', 'igel'); ?></span><span class="icon plus"></span>
										</a></h4>
								</div>
								<div id="ud9-collapse" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="container part-content">
											<div class="row">
												<div class="wrapper">
													<div class="col-xs-12">
														<table class="parts-table">
															<thead><th><?php echo __('PART NUMBER', 'igel'); ?></th><th><?php echo __('DESCRIPTION', 'igel'); ?></th></thead>
															<tbody>
															<?php
																foreach ($ud9 as $part) {
																	echo '<tr><td>'.$part['number'].'</td><td>'.$part['description'].'</td></tr>';
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#0" class="pannel-toggleable" data-target="#ud9_touch-collapse" aria-controls="ud9_touch" role="tab" data-toggle="collapse" data-parent="#parts-tabs-accordion">
										<span class="text"><?php echo __('UD9 Touch', 'igel'); ?></span><span class="icon plus"></span>
										</a></h4>
								</div>
								<div id="ud9_touch-collapse" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="container part-content">
											<div class="row">
												<div class="wrapper">
													<div class="col-xs-12">
														<table class="parts-table">
															<thead><th><?php echo __('PART NUMBER', 'igel'); ?></th><th><?php echo __('DESCRIPTION', 'igel'); ?></th></thead>
															<tbody>
															<?php
																foreach ($ud9_touch as $part) {
																	echo '<tr><td>'.$part['number'].'</td><td>'.$part['description'].'</td></tr>';
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#0" class="pannel-toggleable" data-target="#ud_pocket-collapse" aria-controls="ud_pocket" role="tab" data-toggle="collapse" data-parent="#parts-tabs-accordion">
										<span class="text"><?php echo __('UD Pocket', 'igel'); ?></span><span class="icon plus"></span>
										</a></h4>
								</div>
								<div id="ud_pocket-collapse" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="container part-content">
											<div class="row">
												<div class="wrapper">
													<div class="col-xs-12">
														<table class="parts-table">
															<thead><th><?php echo __('PART NUMBER', 'igel'); ?></th><th><?php echo __('DESCRIPTION', 'igel'); ?></th></thead>
															<tbody>
															<?php
																foreach ($ud_pocket as $part) {
																	echo '<tr><td>'.$part['number'].'</td><td>'.$part['description'].'</td></tr>';
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#0" class="pannel-toggleable" data-target="#imi-collapse" aria-controls="imi" role="tab" data-toggle="collapse" data-parent="#parts-tabs-accordion">
										<span class="text"><?php echo __('IMI', 'igel'); ?></span><span class="icon plus"></span>
										</a></h4>
								</div>
								<div id="imi-collapse" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="container part-content">
											<div class="row">
												<div class="wrapper">
													<div class="col-xs-12">
														<table class="parts-table">
															<thead><th><?php echo __('PART NUMBER', 'igel'); ?></th><th><?php echo __('DESCRIPTION', 'igel'); ?></th></thead>
															<tbody>
															<?php
																foreach ($imi as $part) {
																	echo '<tr><td>'.$part['number'].'</td><td>'.$part['description'].'</td></tr>';
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#0" class="pannel-toggleable" data-target="#uma-collapse" aria-controls="uma" role="tab" data-toggle="collapse" data-parent="#parts-tabs-accordion">
										<span class="text"><?php echo __('UMA', 'igel'); ?></span><span class="icon plus"></span>
										</a></h4>
								</div>
								<div id="uma-collapse" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="container part-content">
											<div class="row">
												<div class="wrapper">
													<div class="col-xs-12">
														<table class="parts-table">
															<thead><th><?php echo __('PART NUMBER', 'igel'); ?></th><th><?php echo __('DESCRIPTION', 'igel'); ?></th></thead>
															<tbody>
															<?php
																foreach ($uma as $part) {
																	echo '<tr><td>'.$part['number'].'</td><td>'.$part['description'].'</td></tr>';
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#0" class="pannel-toggleable" data-target="#udc3-collapse" aria-controls="udc3" role="tab" data-toggle="collapse" data-parent="#parts-tabs-accordion">
										<span class="text"><?php echo __('UDC3', 'igel'); ?></span><span class="icon plus"></span>
										</a></h4>
								</div>
								<div id="udc3-collapse" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="container part-content">
											<div class="row">
												<div class="wrapper">
													<div class="col-xs-12">
														<table class="parts-table">
															<thead><th><?php echo __('PART NUMBER', 'igel'); ?></th><th><?php echo __('DESCRIPTION', 'igel'); ?></th></thead>
															<tbody>
															<?php
																foreach ($udc3 as $part) {
																	echo '<tr><td>'.$part['number'].'</td><td>'.$part['description'].'</td></tr>';
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#0" class="pannel-toggleable" data-target="#software-collapse" aria-controls="software" role="tab" data-toggle="collapse" data-parent="#parts-tabs-accordion">
										<span class="text"><?php echo __('Software Options', 'igel'); ?></span><span class="icon plus"></span>
										</a></h4>
								</div>
								<div id="software-collapse" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="container part-content">
											<div class="row">
												<div class="wrapper">
													<div class="col-xs-12">
														<table class="parts-table">
															<thead><th><?php echo __('PART NUMBER', 'igel'); ?></th><th><?php echo __('DESCRIPTION', 'igel'); ?></th></thead>
															<tbody>
															<?php
																foreach ($software as $part) {
																	echo '<tr><td>'.$part['number'].'</td><td>'.$part['description'].'</td></tr>';
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#0" class="pannel-toggleable" data-target="#hardware-collapse" aria-controls="hardware" role="tab" data-toggle="collapse" data-parent="#parts-tabs-accordion">
										<span class="text"><?php echo __('Hardware Accessories', 'igel'); ?></span><span class="icon plus"></span>
										</a></h4>
								</div>
								<div id="hardware-collapse" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="container part-content">
											<div class="row">
												<div class="wrapper">
													<div class="col-xs-12">
														<table class="parts-table">
															<thead><th><?php echo __('PART NUMBER', 'igel'); ?></th><th><?php echo __('DESCRIPTION', 'igel'); ?></th></thead>
															<tbody>
															<?php
																foreach ($hardware as $part) {
																	echo '<tr><td>'.$part['number'].'</td><td>'.$part['description'].'</td></tr>';
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


						</div>						
					</div>
					</div></div>
				</section>
				<section class="notes">
					<div class="container"><div class="row">
						<?php echo get_field('notes'); ?>
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
		$('#parts-tabs-accordion').on('shown.bs.collapse', function (e) {

			var offset = $('.panel.panel-default > .panel-collapse.in').offset();
	        if(offset) {
	            $('html,body').animate({
	                scrollTop: $('.panel-title a').offset().top -20
	            }, 500);
	        }
    	}); 
    	$('#parts-tabs-accordion .collapse').on('hidden.bs.collapse', function(){
    		$(this).parent().find(".cross").removeClass("cross").addClass("plus");
    	});
    	$('.pannel-toggleable').on('click', function(){
    		$(this).find('.icon').toggleClass('plus cross');
    	});
	   
	});

</script>
<?php get_footer(); ?>