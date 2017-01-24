<?php
/*
 * Template Name: UMS Training Registration Form
 */
?>
<?php get_header(); ?>
<?php while (have_posts()):the_post();?>
<div class="user_register">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 user_register_content">
				<h1><?php the_title();?></h1>
				<?php the_content();?>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="register_form">
					<form action="" method="post" class="register_form_action">
						<div class="row">
							<div class="col-sm-12 title_form first">Your Info</div>
							<div class="col-sm-6">
								<p><label>
									<span>First Name *</span>
									<input type="text" name="firstname" class="firstname"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Last Name *</span>
									<input type="text" name="lastname" class="lastname"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Company *</span>
									<input type="text" name="company" class="company"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Address *</span>
									<input type="text" name="address" class="address"/>
								</label></p>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-6">
								<p><label>
									<span>Country *</span>
									<select name="country" class="country">
										<option value="">Country</option>
									</select>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>State/province *</span>
									<select name="state_province" class="state_province">
										<option value="">State</option>												
									</select>
								</label></p>										
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-6">
								<p><label>
									<span>City *</span>
									<input type="text" name="city" class="city"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Post code</span>
									<input type="text" name="postcode" class="postcode"/>
								</label></p>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-6">
								<p><label>
									<span>Phone</span>
									<input type="text" name="phone" class="phone"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Email*</span>
									<input type="email" name="email" class="email"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Title</span>
									<input type="text" name="active_function" class="active_function"/>
								</label></p>
							</div>

							<div class="clearfix"></div>
							<div class="col-sm-12 title_form">Attendee 2</div>
							<div class="col-sm-6">
								<p><label>
									<span>First name</span>
									<input type="text" name="attendee2_firstName" class="attendee2_firstName"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Last name</span>
									<input type="text" name="attendee2_lastName" class="attendee2_lastName"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Title</span>
									<input type="text" name="attendee2_function" class="attendee2_function"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Email</span>
									<input type="email" name="attendee2_email" class="attendee2_email"/>
								</label></p>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-12 title_form">Attendee 3</div>
							<div class="col-sm-6">
								<p><label>
									<span>First name</span>
									<input type="text" name="attendee3_firstName" class="attendee3_firstName"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Last name</span>
									<input type="text" name="attendee3_lastName" class="attendee3_lastName"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Title</span>
									<input type="text" name="attendee3_function" class="attendee3_function"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Email</span>
									<input type="email" name="attendee3_email" class="attendee3_email"/>
								</label></p>
							</div>
							
							<div class="clearfix"></div>
							<div class="col-sm-6 margin-og-b-15">
								<div class="checkbox_list"> 
									Training Date
									<input id="optiondate1" class="demo-input-date" name="trainingdate" type="text" required readonly='true'>
								</div>
							</div>	

							<div class="col-sm-12 margin-og-b-15">
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="AgreeConditionsOfParticipation" value="Agree"/>
										<span>I have read and accept the Conditions of Participation.*</span>
									</label>
								</div>
							</div>
							<div class="col-sm-12 margin-og-b-15">
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="AgreeTerms" value="Agree"/>
										<span>I have read and accept the Terms for Sale, Delivery and License.*</span>
									</label>
								</div>
							</div>
							<div class="col-sm-12 margin-og-b-15">
								<p><label><span>SUBSCRIBE TO OUR NEWSLETTER</span></label></p>
								<div class="checkbox_list">
									<label>
										<input type="checkbox" name="channel_newsletter" value="1"/>
										<span>Channel Newsletter</span>
									</label>								
								</div>
								<div class="checkbox_list">
									<label>
										<input type="checkbox" name="technical_newsletter" value="1"/>
										<span>Technical Newsletter</span>
									</label>								
								</div>
							</div>
							
							<div class="col-xs-12 submit_leftwrap">
								<?php wp_nonce_field('nonce_umstraining_action','nonce_ums');?>
								<input type="hidden" name="action" value="ums_training"/>
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