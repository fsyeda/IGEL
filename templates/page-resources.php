<?php
/*
 * Template Name:	Resources
 */
?>
<?php get_header(); ?>
	<div class="container">
		<div class="main-top">
			<h2><?php the_field('title');?></h2>
			<h3><?php the_field('description');?></h3>
			<div class="rs-search">
				
			</div>
		</div><!-- main-top -->
	</div><!-- container -->
<?php get_footer(); ?>