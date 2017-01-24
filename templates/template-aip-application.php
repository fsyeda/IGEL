<?php
/*
 * Template Name: AIP Application
 */
?>
<?php get_header(); ?>
<?php while (have_posts()):the_post();?>
<div id="content" class="partners-page">

	<div id="main" role="main">
	
	<div class="breadcrumbs long-list gray">
		<div class="container">
			<?php wp_nav_menu( array('menu' => 'Partners Menu' )); ?>
		</div>
	</div>
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
							<div class="col-sm-12 title_form first">Company Info</div>
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
									<span>Company Email *</span>
									<input type="email" name="companyemail" class="companyemail"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Company Phone *</span>
									<input type="text" name="companyphone" class="companyphone"/>
								</label></p>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-12 title_form">Main Contact Info</div>
							<div class="col-sm-6">
								<p><label>
									<span>First name</span>
									<input type="text" name="firstname_contactperson" class="firstname_contactperson"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Last name</span>
									<input type="text" name="lastname_contactperson" class="lastname_contactperson"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Title</span>
									<input type="text" name="active_function" class="active_function"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Email</span>
									<input type="email" name="email" class="email"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Phone Number *</span>
									<input type="phone" name="phone" class="phone"/>
								</label></p>
							</div>
							
							<div class="clearfix"></div>
							<div class="col-sm-12 title_form">Managing Director Contact Info</div>
							<div class="col-sm-6">
								<p><label>
									<span>First name</span>
									<input type="text" name="firstname_managingdirector" class="firstname_managingdirector"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Last name</span>
									<input type="text" name="lastname_managingdirector" class="lastname_managingdirector"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Email Address</span>
									<input type="email" name="email_managingdirector" class="email_managingdirector"/>
								</label></p>
							</div>
							
							<div class="clearfix"></div>
							<div class="col-sm-12 title_form">Marketing Director Contact Info</div>
							
							<div class="col-sm-6">
								<p><label>
									<span>First name</span>
									<input type="text" name="firstname_marketingcontact" class="firstname_marketingcontact"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Last name</span>
									<input type="text" name="lastname_marketingcontact" class="lastname_marketingcontact"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Email Address</span>
									<input type="email" name="email_marketingcontact" class="email_marketingcontact"/>
								</label></p>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-12 title_form">Sales Contact Info</div>
							
							<div class="col-sm-6">
								<p><label>
									<span>First name</span>
									<input type="text" name="firstname_salescontact" class="firstname_salescontact"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Last name</span>
									<input type="text" name="lastname_salescontact" class="lastname_salescontact"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Email address</span>
									<input type="email" name="email_salescontact" class="email_salescontact"/>
								</label></p>
							</div>
							
							<div class="clearfix"></div>
							<div class="col-sm-12 title_form">General Info</div>
							<div class="col-sm-12 margin-og-b-15">
								<p><label>
									<span>WHICH DISTRIBUTORS HAVE YOU WORKED WITH?</span>
									<input type="text" name="distributors" class="distributors"/>
								</label></p>
							</div>
							<div class="col-sm-12 margin-og-b-15">
								<p><label><span>WHICH MANUFACTURERS DO YOU WORK WITH DIRECTLY OR INDIRECTLY?</span></label></p>
								<div class="checkbox_list">
									<label>
										<input type="checkbox" name="citrix" value="True"/>
										<span>Citrix</span>
									</label>
									<label>
										<input type="checkbox" name="microsoft" value="True"/>
										<span>Microsoft</span>
									</label>
									<label>
										<input type="checkbox" name="vmware" value="True"/>
										<span>VMWare</span>
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
								<?php wp_nonce_field('nonce_aip_action','nonce_aip');?>
								<input type="hidden" name="action" value="devvn_aip_application"/>
								<input value="Become a Solution Provider" name="submit" type="submit" class="submit"/>
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
<?php get_template_part( './templates/top-link' ); ?>
	</div>

</div>
<?php get_footer(); ?>