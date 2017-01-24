<?php
/*
Template Name: Virtualization Page
*/
?>

<?php get_header(); ?>

<div id="content" class="considering-virtualization virtualization-page proof-of-concept">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs">
				<div class="container">
					<?php wp_nav_menu( array('menu' => 'Solutions Menu' )); ?>
				</div>
			</div>
				
				<?php the_content(); ?>

				<section class="faq" id="faq">
					<div class="container">
					<div class="row">
					<div class="col-xs-12">

					<?php
						echo get_field('faq_title');
					?>
					</div>
					<?php
							$faq_list = get_field('faq');
							$faq_list2 = get_field('faq_2');

							echo '<div class="panel-group" id="faq-tabs-accordion">';
							$j=1;
							

							echo '<div class="col-xs-12 col-sm-6">';

							foreach($faq_list as $faq_item){
								if($j==1){
						        	$class = 'in';
						        	$icon = 'minus';
						        }else{
						        	$class = '';
						        	$icon = 'plus';
						        }

								echo '
									<div class="panel panel-default">   
										<div class="panel-heading actives">      
											<h4 class="panel-title">      
												<a href="#0" class="pannel-toggleable" data-target="#'.$j.'-collapse" aria-controls="'.$j.'" role="tab" data-toggle="collapse" data-parent="#faq-tabs-accordion"><span class="icon '.$icon.'"></span><span class="text">'.get_the_title($faq_item->ID).'</span></a></h4> 
										</div>  
									</div>';
						        
						        echo '
						            <div id="'.$j.'-collapse" class="panel-collapse collapse '.$class.'">       
										<div class="panel-body">       
											<div class="container faq-content">
												<div class="row">
												<div class="wrapper">
													'.get_field('answer', $faq_item->ID).'
												</div>
												</div>
											</div>
										</div>
									</div>
						        ';
						        $j++;
							}
							echo '</div>';
							echo '<div class="col-xs-12 col-sm-6">';
							foreach($faq_list2 as $faq_item){
								echo '
						            <div class="panel panel-default">   
										<div class="panel-heading">      
											<h4 class="panel-title">      
												<a href="#0" class="pannel-toggleable" data-target="#'.$j.'-collapse" aria-controls="'.$j.'" role="tab" data-toggle="collapse" data-parent="#faq-tabs-accordion"><span class="icon plus"></span><span class="text">'.get_the_title($faq_item->ID).'</span></a></h4>   
										</div>
									</div>';
						       	echo '
						            <div id="'.$j.'-collapse" class="panel-collapse collapse ">       
										<div class="panel-body">       
											<div class="container faq-content">
												<div class="row">
												<div class="wrapper">
													'.get_field('answer', $faq_item->ID).'
												</div>
												</div>
											</div>
										</div>
									</div>
						        ';
						        $j++;
							}
							echo '</div>';

							echo '</div>';
						?>
					</div>
					</div>
				</section>

				<section class="try-out">
					<div class="container"><div class="row">
					<?php 
						echo get_field('try_out');
					?>
					</div>
					</div>
				</section>

				<section class="cta-section schedule">
					<div class="container"><div class="row">
					<?php 
						//echo get_field('schedule');
					?>
					<div class="col-xs-12">
					    <h1>Schedule a jump start with an IGEL engineer.<br class="hidden-xs" /> What happens next:</h1>
					</div>
					<ul class="numbers">
					    <li class="col-xs-12 col-sm-4">Connect via a Go-to Meeting &amp; install the UMS, remotely</li>
					    <li class="col-xs-12 col-sm-4">Set up profiles with policy-based management &amp; connect to Citrix/VMware environment</li>
					    <li class="col-xs-12 col-sm-4">Customize the User Interface &amp; answer questions</li>
					</ul>
					<div class="schedule_form col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
					    <div class="row">
					        <form id="schedule-form" class="schedule_form_action" action="" method="post">
					            <div class="row-schedule">
					                <div class="col-sm-6">
					                    <p style="padding: 0px 0 5px 0;">
					                        <input class="firstname" name="firstname" type="text" placeholder="First Name" />
					                    </p>
					                </div>
					                <div class="col-sm-6">
					                    <p>
					                        <input class="lastname" name="lastname" type="text" placeholder="Last Name" />
					                    </p>
					                </div>
					            </div>
					            <div class="row-schedule">
					            	<div class="col-sm-6">
					                    <p style="padding: 0px 0 5px 0;">
					                        <input class="company" name="company" type="text" placeholder="Company" />
					                    </p>
					                </div>
					                <div class="col-sm-6">
					                    <p>
					                        <input class="phone" name="phone" type="text" placeholder="Phone Number" />
					                    </p>
					                </div>
					            </div>
					            <div class="row-schedule submit_apmt">
					            	<div class="col-sm-6">
					                    <p style="padding: 0px 0 5px 0;">
					                        <input class="email" name="email" type="email" placeholder="Email Address" />
					                    </p>
					                </div>
					                <div class="col-sm-6">
						            	<?php wp_nonce_field('nonce_engineer_action','nonce_engineer');?>
										<input type="hidden" name="action" value="devvn_engineer_recruitment"/>
										<input type="hidden" name="stage" value="<?php echo get_the_title(); ?>"/>
						                <input class="submit" name="submit" type="submit" value="SCHEDULE APPOINTMENT" />
					            	</div>
					            </div>
					            <div class="col-xs-12 register_mess"></div>
					        </form>
					    </div>
					</div>
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
		/*$('#faq-tabs-accordion .collapse').on('hidden.bs.collapse', function(){
    		$(this).parent().find(".minus").removeClass("minus").addClass("plus");
    	});*/
    	$('.pannel-toggleable').on('click', function(){
    		$(this).find('.icon').toggleClass('plus minus');
    	});
	   
	});

</script>
<?php get_footer(); ?>