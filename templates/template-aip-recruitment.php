<?php
/*
 * Template Name: AIP Recruitment
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
							<div class="col-sm-12">
								<p><label>
									<span>We wish to apply for the next available Authorization Training in:</span>
									<select name="trainingcountry" class="trainingcountry">
										<option value="">Country</option>
										<option value="Australia">Australia</option>
										<option value="Canada">Canada</option>
										<option value="Germany">Germany</option>
										<option value="New Zealand">New Zealand</option>
										<option value="United Kingdom">United Kingdom</option>
										<option value="United States">United States</option>
										</select>
								</label></p>
							</div>		

							<div class="col-sm-12 margin-og-b-15">
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="AgreeConditionsOfParticipation" value="True"/>
										<span>I have read and accept the <a href="/wp-content/uploads/2017/01/F-07-46-EN-1_General_Terms_and_Conditions_for_Training.pdf" title="Conditions of Participation" target="_blank">Conditions of Participation.</a>*</span>
									</label>
								</div>
							</div>
							<div class="col-sm-12 margin-og-b-15">
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="AgreeTerms" value="True"/>
										<span>I have read and accept the <a href="/terms-conditions" title="Terms & Conditions" target="_blank">Terms for Sale, Delivery and License.</a>*</span>
									</label>
								</div>
							</div>
							<div class="col-sm-12 margin-og-b-15">
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="ConfirmRegistration" value="True"/>
										<span>Confirm Registration*</span>
									</label>
								</div>
							</div>
							<div class="col-sm-12 margin-og-b-15">
								<p><label><span>SUBSCRIBE TO OUR NEWSLETTER</span></label></p>
								<div class="checkbox_list">
									<label>
										<input type="checkbox" name="active_newsletter[]" value="True"/>
										<span>Yes, add me to the newsletter</span>
									</label>								
								</div>
							</div>
							
							<div class="col-xs-12 submit_leftwrap">
								<?php wp_nonce_field('nonce_aiprecruit_action','nonce_aip');?>
								<input type="hidden" name="action" value="devvn_aip_recruitment"/>
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