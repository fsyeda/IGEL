<?php
/*
Template Name: IGEL Sitemap
*/
?>

<?php get_header(); ?>

<div id="content" class="igel-page sitemap">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				

				<section class="sitemap-section">
					<div class="container"><div class="row">
						<div class="col-xs-12">
							<h1>IGEL Sitemap</h1>
						</div>
						<section class="sitemap-element">
						<div class="col-xs-12 sitemap-links">
							<h4>WHY IGEL</h4>
							<?php wp_nav_menu( array('menu' => 'Why Igel Menu', 'menu_class' => 'sitemap-list')); ?>

							</div>
						</section>
						<section class="sitemap-element">
						<div class="col-xs-12 sitemap-links">
							<h4>PRODUCTS</h4>
							<div class="row">
							<div class="col-xs-12 col-sm-4">
								<h5>SOFTWARE</h5>
								<ul class="sitemap-list">
									<li><a href="/igel-os-universal-desktop-operating-system/">IGEL OS</a></li>
									<li><a href="/igel-ums-universal-management-suite/">Endpoint Management (UMS)</a></li>
									<li><a href="/ums-add-ons/">UMS Add Ons</a></li>
									<li><a href="/desktop-converter-udc/">Desktop Converter (UDC)</a></li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-4">
								<h5>HARDWARE</h5>
								<ul class="sitemap-list">
									<li><a href="/products-hardware/">Overview</a></li>
									<li><a href="/products-hardware/zero-client-comparisons/">Zero Clients</a>
									<ul class="sitemap-list">
										<li><a href="/citrix-ready-thin-clients/">Citrix HDX</a></li>
										<li><a href="/microsoft-rdsremotefx-thin-clients/">Microsoft RDS/RemoteFX</a></li>
										<li><a href="/vmware-horizon-thin-clients/">VMware Horizon</a></li>
									</ul>
									</li>
									<li><a href="/products-hardware/thin-client/">Thin Clients</a>
										<?php wp_nav_menu( array('menu' => 'Thin Client Menu', 'menu_class' => 'sitemap-list' )); ?>
									</li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-4">
								<h5>OEM</h5>
								<ul class="sitemap-list">
									<li><a href="/endpoint-management-oem-vendors/">OEM Overview</a></li>
								</ul>
							</div>

							</div>
						</section>
						<section class="sitemap-element">
						<div class="col-xs-12 sitemap-links">
							<h4>SOLUTIONS</h4>
							<div class="row">
							<div class="col-xs-12 col-sm-4">
							<ul class="sitemap-list">
							<li><a href="/solutions-for-your-application">For your Applications</a></li>
							</ul>
							</div>
							<div class="col-xs-12 col-sm-4">
							<ul class="sitemap-list">
							<li>FOR YOUR VIRTUALIZATION PROJECT
								<?php wp_nav_menu( array('menu' => 'Solutions Menu', 'menu_class' => 'sitemap-list' )); ?>
							</li>
							</ul>
							</div>
							<div class="col-xs-12 col-sm-4">
							<ul class="sitemap-list">
							<li>FOR YOUR INDUSTRY
								<ul class="sitemap-list">
									<li ><a href="/solutions-education/">Education &amp; Research</a></li>
									<li><a href="/solutions-services-financial-insurance-legal/">Services: Financial, Insurance &amp; Legal</a></li>
									<li><a href="/solutions-healthcare/">HealthCare</a></li>
									<li><a href="/solutions-non-profit-government/">Non Profit &amp; Government</a></li>
									<li><a href="/solutions-retail/">Retail</a></li>
									<li ><a href="/solutions-manufacturing-logistics/">Manufacturing &amp; Logistics</a></li>
									<li ><a href="/solutions-utilities/">Utilities</a></li>
									<li ><a href="/solutions-other-industries/">Other</a></li>
								</ul>
							</li>
							</ul>
							

							</div>
							</div>
							</div>
						</section>
						<section class="sitemap-element">
						<div class="col-xs-12 sitemap-links">
							<h4>PARTNERS</h4>
							<div class="row">
							<div class="col-xs-12 col-sm-4">
							<ul class="sitemap-list">
							<li>SOLUTION PROVIDERS
								<ul class="sitemap-list">
									<li >
									<a href="/find-a-solution-provider/">Find a Solution Provider Near You</a>
									</li>
									<li><a href="/become-solution-provider/">Become a Solution Provider</a></li>
									<li><a href="/become-platinum-partner/">Become a Platinum Partner</a></li>
									<li><a href="/featured-partners/">Featured Partners</a></li>
									<li><a href="/partner-resources/">Partner Resources</a></li>
								</ul>
							</li>
							</ul>
							</div>
							<div class="col-xs-12 col-sm-4">
							<ul class="sitemap-list">
							<li>STRATEGIC PARTNERS
								<ul class="sitemap-list">
									<li ><a href="/our-powerful-partnerships/">Technology Partners</a></li>
									<li><a href="/endpoint-management-oem-vendors/">OEM / Alliance Partners</a></li>
								</ul>
							</li>
							</ul>
							</div>
							<div class="col-xs-12 col-sm-4">
							<ul class="sitemap-list">
							<li>DISTRIBUTORS
								<ul class="sitemap-list">
									<li ><a href="/find-a-distributor/">Find a Distributor</a></li>
								</ul>
							</li>
							</ul>
							
							</div>
							</div>
							</div>
						</section>
						<section class="sitemap-element">
						<div class="col-xs-12 sitemap-links">
						<h4>OTHER PAGES</h4>
							<?php wp_nav_menu( array('menu' => 'Footer 1', 'menu_class' => 'sitemap-list' )); ?>
						</div>
						</section>
						<section class="sitemap-element">
						<div class="col-xs-12 sitemap-links">
							<ul class="sitemap-list"><li><a href="/free-evaluation-units-form-hardware/">ORDER EVALUATION UNIT</a></ul>

							</div>
						</section>
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