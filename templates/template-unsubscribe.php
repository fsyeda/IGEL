<?php
/*
 * Template Name: Unsubscribe Form
 */
?>
<?php get_header(); ?>
<?php while (have_posts()):the_post();?>
<div class="user_register">
	<div class="container">
		<div class="row">
			<!-- <div class="col-md-4 col-xs-12 user_register_content">
				<h1><?php the_title();?></h1>
			</div> -->
			<div class="col-md-12 col-xs-12">
				<h1><?php the_title();?></h1>
				<div class="register_form">
					<form action="" method="post" class="register_form_action">
						<div class="row">
							<div class="col-sm-6">
								<p>
									Email Address*: 
									<input type="email" name="email" class="email"/>
								</p>
							</div>
							<div class="col-sm-12 margin-og-b-15">
								<p><label><span>Unsubscribe me from:*</span></label></p>
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="customerNewsletter" value="True"/>
										<span>Customer Newsletter</span>
									</label>
								</div>
							</div>
							<div class="col-sm-12 margin-og-b-15">
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="channelNewsletter" value="True"/>
										<span>Channel Newsletter</span>
									</label>
								</div>
							</div>
							<div class="col-sm-12 margin-og-b-15">
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="technicalNewsletter" value="True"/>
										<span>Technical Newsletter</span>
									</label>
								</div>
							</div>
							<div class="col-xs-12 submit_leftwrap">
								<?php wp_nonce_field('nonce_unsub_action','nonce_unsub');?>
								<input type="hidden" name="action" value="devvn_unsubscribe_form"/>
								<input value="Submit" name="submit" type="submit" class="submit"/>
								<i class="fa fa-spinner fa-spin"></i>
							</div>	
							<div class="col-xs-12 register_mess"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile;?>
<?php get_footer(); ?>