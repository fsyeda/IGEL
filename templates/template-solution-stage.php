<?php
/*
Template Name: Solution Stages Page
*/
?>

<?php get_header(); ?>

<div id="content" class="considering-virtualization virtualization-page stage-page">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs">
				<div class="container">
					<?php wp_nav_menu( array('menu' => 'Solutions Menu' )); ?>
				</div>
			</div>
				
				<?php the_content(); ?>



				<section class="cta-section schedule">
					<div class="container"><div class="row">
					<?php 
						//echo get_field('schedule');
					?>
					<div class="col-xs-12">
					    <h1>Schedule a jump start with an IGEL engineer.<br class="hidden-xs" /> What happens next:</h1>
					</div>
					<ul class="numbers">
					    <li class="col-xs-12 col-sm-4">Connect via a Go-to Meeting &amp; Install the UMS, remotely</li>
					    <li class="col-xs-12 col-sm-4">Set up profiles with policy-based management &amp; Connect to Citrix/VMware environment</li>
					    <li class="col-xs-12 col-sm-4">Customize the User Interface &amp; Answer questions</li>
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
					            <div class="row-schedule">
					            	<div class="col-sm-6">
					                    <p style="padding: 0px 0 5px 0;">
					                        <input class="email" name="email" type="email" placeholder="Email Address" />
					                    </p>
					                </div>
					                <div class="col-sm-6">
										<p>
											<select name="CustomerCountry" class="CustomerCountry">
												<option value="">Country</option>
											</select>
										</p>
									</div>
								</div>
								<div class="row-schedule submit_apmt">
									<div class="col-sm-6"></div>
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
<?php get_footer(); ?>