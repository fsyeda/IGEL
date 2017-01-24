<!doctype html>  

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/css/font-awesome.min.css' ;?>"/>	
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="shortcut icon" href="<?php echo home_url(); ?>/wp-content/themes/igel/favicon-64.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/css/jquery.modal.css' ;?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/inc/js/fancybox/jquery.fancybox.css' ;?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/inc/js/tipped/tipped.css' ;?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/inc/js/tipped/tipped-custom.css' ;?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/inc/js/tipped/tipped-igel.css' ;?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/inc/js/magnific-popup/magnific-popup.css' ;?>"/>
	<?php wp_head(); ?>

	<!-- Google Analytics -->
	
</head>
	
<body <?php body_class(); ?>>

	<div id="content-wrapper">

		<header>
			<nav class="navbar navbar-default "><!--navbar-fixed-top-->
				<div class="hidden-tablet wrapper-top-menu">
					<div class="container"><div class="row">
						<div class="col-xs-12">
							<div class="pull-right">
								<a href="#"  id="show-search-dt" onclick="jQuery('#search_lg_dt').focus();"><i class="search icon"></i></a>
								
				  				<?php

				  					 wp_nav_menu( array( 'theme_location' => 'header-menu' ) )
				  				?>
				  				
                            </div></div>
			  			</div>
		  			</div>
		  		</div>
		  		<div class="searchwrap searchf_mlg" id="searchwrap-dk">
                        <form class="navbar-form navbar-right form-inline" role="search" method="get" id="searchformtop" action="<?php echo home_url( '/' ); ?>">
                            <div class="input-group clearfix right-inner-addon">
                            	<input name="s" id="search_lg_dt" type="text" class="search-query form-control sl-search-input" placeholder="Search" autocomplete="off" />
                                <button type="submit" class="search" id="searchsubmit"></button>
                            </div>
                        </form>
                </div>
		  		<div class="wrapper-main-menu">
					<div class="container">
			  			<div class="row">
							<div class="navbar-header col-xs-6 col-sm-3 col-md-2"> 
								<a class="navbar-brand" title="<?php bloginfo('description'); ?>" href="<?php echo esc_url(home_url('/')); ?>">
									<img src="/wp-content/themes/igel/img/igel-logo.png" class="logo" alt="IGEL" />
								</a>
							</div>

							<?php if (has_nav_menu("main_nav")): ?>
							<div id="navbar-responsive-collapse" class="navbar-collapse"><!--collapse-->
								<div class="desktop-menu pull-right">
								<?php
								    simple_bootstrap_display_main_menu();
								?>
								</div>
							<?php endif ?>

							</div>
						</div>
					</div>
				</div>
			</nav>
		</header>
		
		<div id="page-content">
