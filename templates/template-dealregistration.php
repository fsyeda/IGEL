<?php
/*
 * Template Name: Deal Registration Form
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
									<span>Post Code*</span>
									<input type="text" name="postcode" class="postcode"/>
								</label></p>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-6">
								<p><label>
									<span>Phone*</span>
									<input type="text" name="phone" class="phone"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Email*</span>
									<input type="email" name="email" class="email"/>
								</label></p>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-12 title_form">Customer Info</div>
							<div class="col-sm-6">
								<p><label>
									<span>First Name *</span>
									<input type="text" name="CustomerFirstName" class="CustomerFirstName"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Last Name *</span>
									<input type="text" name="CustomerLastName" class="CustomerLastName"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Company *</span>
									<input type="text" name="CustomerCompany" class="CustomerCompany"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Address *</span>
									<input type="text" name="CustomerAddress" class="CustomerAddress"/>
								</label></p>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-6">
								<p><label>
									<span>Country *</span>
									<select name="CustomerCountry" class="CustomerCountry">
										<option value="">Country</option>
									</select>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>State/province *</span>
									<select name="CustomerState" class="CustomerState">
										<option value="">State</option>												
									</select>
								</label></p>										
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-6">
								<p><label>
									<span>City *</span>
									<input type="text" name="CustomerCity" class="CustomerCity"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Post code*</span>
									<input type="text" name="CustomerPostCode" class="CustomerPostCode"/>
								</label></p>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-6">
								<p><label>
									<span>Phone</span>
									<input type="text" name="CustomerTelephone" class="CustomerTelephone"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Email*</span>
									<input type="email" name="CustomerEmail" class="CustomerEmail"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Position</span>
									<input type="text" name="CustomerPosition" class="position"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Industry*</span>
									<select name="industry" class="industry">
										<option value="">Please choose</option>
								 		<option value="Automotive">Automotive</option>
								 		<option value="Financial Service">Financial Service</option>
								 		<option value="Manufacturing Industry">Manufacturing Industry</option>
								 		<option value="Universities &amp; Research">Universities &amp; Research</option>
								 		<option value="Healthcare">Healthcare</option>
								 		<option value="Retail">Retail</option>
								 		<option value="Care Facilities">Care Facilities</option>
								 		<option value="Church">Church</option>
								 		<option value="Logistics">Logistics</option>
								 		<option value="Public Sector">Public Sector</option>
								 		<option value="Pharmaceutical Industry">Pharmaceutical Industry</option>
								 		<option value="Education">Education</option>
								 		<option value="Telecommunication">Telecommunication</option>
								 		<option value="Utilitiy companies">Utilitiy companies</option>
								 		<option value="Insurance">Insurance</option>
								 		<option value="Charity">Charity</option>
								 		<option value="Other Industries">Other Industries</option>
		 							</select>
								</label></p>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-12 title_form">Please choose your distributor</div>
							<div class="col-sm-8">
								<p><label>
									<span>Distributor</span>
									<select name="distributor" class="distributor">
										<option value="">Please choose</option>
								 		<option value="Australia - Connector Systems">Australia - Connector Systems</option>
		 								<option value="Australia - Exclusive Networks">Australia - Exclusive Networks</option>
								 		<option value="Austria - ADN Distribution GmbH">Austria - ADN Distribution GmbH</option>
								 		<option value="Belgium - Avnet Technology Solutions">Belgium - Avnet Technology Solutions</option>
								 		<option value="Belgium - Ingram Micro bvba">Belgium - Ingram Micro bvba</option>	
		 								<option value="Belgium - Arrow ECS">Belgium - Arrow ECS</option>
								 		<option value="Czech Republic - Arrow ECS">Czech Republic - Arrow ECS</option>
		 								<option value="China - Beijing Stone Software Technology">China - Beijing Stone Software Technology</option>
		 								<option value="Denmark - Arrow ECS Denmark A/S">Denmark - Arrow ECS Denmark A/S</option>
								 		<option value="Dubai - Specialist Computer Distribution FZE">Dubai - Specialist Computer Distribution FZE</option>
								 		<option value="Estonia - Arrow ECS Baltic OÜ">Estonia - Arrow ECS Baltic OÜ</option>
								 		<option value="Finland - Arrow ECS Finland Oy">Finland - Arrow ECS Finland Oy</option>
								 		<option value="France - A2L">France - A2L</option>
								 		<option value="France - Arrow ECS">France - Arrow ECS</option>
								 		<option value="Germany - ADN Distribution GmbH">Germany - ADN Distribution GmbH</option>
								 		<option value="Germany - Arrow ECS">Germany - Arrow ECS</option>
								 		<option value="Germany - Vanquish GmbH">Germany - Vanquish GmbH</option>
								 		<option value="Iceland - Arrow ECS Iceland">Iceland - Arrow ECS Iceland</option>
								 		<option value="Ireland - Minos Technology Holdings Limited">Ireland - Minos Technology Holdings Limited</option>
								 		<option value="Israel - Vision IT Ltd.">Israel - Vision IT Ltd.</option>
								 		<option value="Italy - Ready Informatica srl">Italy - Ready Informatica srl</option>
								 		<option value="Kazakhstan - Softprom">Kazakhstan - Softprom</option>
								 		<option value="Luxemburg - Ingram Micro bvba">Luxemburg - Ingram Micro bvba</option>
								 		<option value="Luxemburg - Avnet Technology Solutions">Luxemburg - Avnet Technology Solutions</option>
								 		<option value="Luxemburg - Arrow ECS">Luxemburg - Arrow ECS</option>
								 		<option value="Mexico - Thin Tech">Mexico - Thin Tech</option>
								 		<option value="Netherlands - Avnet Technology Solutions">Netherlands - Avnet Technology Solutions</option>
								 		<option value="Netherlands - Tweco IT b.v.">Netherlands - Tweco IT b.v.</option>
								 		<option value="New Zealand - Connector Systems">New Zealand - Connector Systems</option>
								 		<option value="New Zealand - Exclusive Networks">New Zealand - Exclusive Networks</option>
								 		<option value="Norway - Arrow ECS Norge AS">Norway - Arrow ECS Norge AS</option>
								 		<option value="Poland - Arrow ECS SP. z o.o.">Poland - Arrow ECS SP. z o.o.</option>
								 		<option value="Russia - Softprom">Russia - Softprom</option>
								 		<option value="Slovakia - ASBIS SK s.r.o.">Slovakia - ASBIS SK s.r.o.</option>
								 		<option value="South Africa - Olicom Africa Networking Solutions">South Africa - Olicom Africa Networking Solutions</option>
								 		<option value="Spain - Dakel Informática S.A.">Spain - Dakel Informática S.A.</option>
								 		<option value="Spain - Towers IT">Spain - Towers IT</option>
								 		<option value="Sweden - Arrow ECS Sweden">Sweden - Arrow ECS Sweden</option>
								 		<option value="Sweden - Commaxx AB">Sweden - Commaxx AB</option>
								 		<option value="Switzerland - Arrow ECS Internet Security AG">Switzerland - Arrow ECS Internet Security AG</option>
								 		<option value="Switzerland - BCD-SINTRAG AG">Switzerland - BCD-SINTRAG AG</option>
								 		<option value="Ukraine - Softprom">Ukraine - Softprom</option>
								 		<option value="United Kingdom - Arrow ECS">United Kingdom - Arrow ECS</option>
								 		<option value="United Kingdom - SDG LTD (IQ-Sys UK)">United Kingdom - SDG LTD (IQ-Sys UK)</option>
								 		<option value="United Kingdom - Getech">United Kingdom - Getech</option>
								 		<option value="United States - Ingram Micro, Inc.">United States - Ingram Micro, Inc.</option>
								 		<option value="United States - SYNNEX Corporation">United States - SYNNEX Corporation</option>
		 							</select>
									</select>
								</label></p>
							</div>
							<div class="col-sm-12 title_form">Project Overview</div>
							<div class="col-sm-8">
								<p><label>
									<span>IGEL Hardware</span>
									<select name="igelhw" class="igelhw">
										<option value="">Please choose</option>
										<option value="IZ2 HDX">IZ2 HDX</option>
								 		<option value="IZ2 RFX">IZ2 RFX</option>
								 		<option value="IZ2 Horizon">IZ2 Horizon</option>
								 		<option value="IZ3 HDX">IZ3 HDX</option>
								 		<option value="IZ3 RFX">IZ3 RFX</option>
								 		<option value="IZ3 Horizon">IZ3 Horizon</option>
								 		<option value="UD Pocket">UD Pocket</option>
								 		<option value="UD2 LX">UD2 LX</option>
								 		<option value="UD3 LX">UD3 LX</option>
								 		<option value="UD3 W7+">UD3 W7+</option>
								 		<option value="UD5 LX">UD5 LX</option>
								 		<option value="UD5 W7">UD5 W7</option>
								 		<option value="UD5 W7+">UD5 W7+</option>
								 		<option value="UD6 LX">UD6 LX</option>
								 		<option value="UD6 W7">UD6 W7</option>
								 		<option value="UD6 W7+">UD6 W7+</option>
								 		<option value="UD9 LX">UD9 LX</option>
								 		<option value="UD9 LX Touch">UD9 LX Touch</option>
								 		<option value="UD9 W7">UD9 W7</option>
								 		<option value="UD9 W7+">UD9 W7+</option>
								 		<option value="UD9 W7 Touch">UD9 W7 Touch</option>
								 		<option value="UD9 W7+ Touch">UD9 W7+ Touch</option>
								 	</select>
								</label></p>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-8">
								<p><label>
									<span>IGEL Software</span>
									<select name="igelsw" class="igelsw">
										<option value="">Please choose</option>
										<option value="UDC3">UDC3</option>
									</select>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Project Volume in Units</span>
									<input type="text" name="ProjectVolumeUnits" class="ProjectVolumeUnits"/>
								</label></p>
							</div>
							<div class="col-sm-12 title_form">Hardware Features</div>
							<div class="col-sm-12 margin-og-b-15">
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="scr" value="True"/>
										<span>Smartcard Reader</span>
									</label>
								</div>
							</div>
							<div class="col-sm-12 margin-og-b-15">
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="Wifi" value="True"/>
										<span>WLAN</span>
									</label>
								</div>
							</div>
							<div class="col-sm-12 margin-og-b-15">
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="VESA" value="True"/>
										<span>VESA</span>
									</label>
								</div>
							</div>
							<div class="col-sm-12 title_form">Evaluation Kit desired?</div>
							<div class="col-sm-6">
								<p><label>
									<span>Hardware units</span>
									<input type="text" name="EvalUnitsHW" class="EvalUnitsHW"/>
								</label></p>
							</div>
							<div class="col-sm-6">
								<p><label>
									<span>Software units</span>
									<input type="text" name="EvalUnitsSW" class="EvalUnitsSW"/>
								</label></p>
							</div>
							<div class="col-sm-6 margin-og-b-15">
								<div class="checkbox_list"> 
									Start Date
									<input id="optiondate1" class="demo-input-date" name="EvalStartDate" type="text" required readonly='true'>
								</div>
							</div>
							<div class="col-sm-6 margin-og-b-15">
								<div class="checkbox_list"> 
									Project close date
									<input id="optiondate2" class="demo-input-date" name="EvalEndDate" type="text" required readonly='true'>
								</div>
							</div>
							<div class="col-sm-12 title_form">Presales Activity from IGEL required</div>
							<div class="col-sm-12 margin-og-b-15">
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="PreSalesCall" value="True"/>
										<span>Phone Contact</span>
									</label>
								</div>
							</div>
							<div class="col-sm-12 margin-og-b-15">
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="PreSalesPresentation" value="True"/>
										<span>Presentation at Customer</span>
									</label>
								</div>
							</div>
							<div class="col-sm-12 margin-og-b-15">
								<div class="checkbox_list"> 
									<label>
										<input type="checkbox" name="PreSales48h" value="True"/>
										<span>48H Service <a id="service_h" data-toggle="tooltip" class="question-icon tpd-hideOnClickOutside">?</a></span>
									<div id="tooltip-service_h" class="tooltip services-tooltip" style="display: none;">
									<p>The 48h-Service contains the following services:<br/>
										• Joined installation of the UMS<br/>
										• Installation and setup of UDC and UD Pocket<br/>
										• Network scan and inclusion of at least 1 client into the UMS<br/>
										• Basic profile set up and creation of up to 3 profiles<br/>
										• Configuration of client connection to the server via UMS</p>
									</div>
									</label>
								</div>
							</div>
							<div class="col-sm-8">
								<p><label>
									<span>Additional comments</span>
									<textarea rows="6" cols="60" name="Comments"></textarea>
								</label></p>
							</div>
							<div class="col-sm-8">
								<p><label>
									<span>Project requirements</span>
									<input type="text" name="ProjectRequirements" class="ProjectRequirements"/>
								</label></p>
							</div>
							
							<div class="col-xs-12 submit_leftwrap">
								<?php wp_nonce_field('nonce_dealreg_action','nonce_dealreg');?>
								<input type="hidden" name="action" value="dealreg_application"/>
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
<script type="text/javascript">
	(function($){
		 $(document).ready(function () {
		 	var tooltip = '#tooltip-service_h';
		 	 Tipped.create('#service_h', $(tooltip).html(), {
              skin : 'igel',
              position: 'top',
              hideOnClickOutside: true
        	});

        });
      })(jQuery);

</script>
<?php get_footer(); ?>