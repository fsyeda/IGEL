<?php
/*
 * Template Name: Demoit Page
 */
?>
<?php get_header(); ?>
<?php while (have_posts()):the_post()?>
<?php 
	$img1		=	get_field('image_content_1');	
	$img2		=	get_field('image_content_2');
?>
<div class="page-one">
	<div class="demo-page">
		<div class="container">
			<div class="top">
				<h2><?php the_field('title');?></h2>
				<span><?php the_field('description')?></span>
			</div>
			<div class="bot">
				<div class="left col-lg-6">
					<div class="demo-img"></div>
					<?php include (get_stylesheet_directory() . '/inc/custom/demo-form1.php');?>
					<div class="demo-icon"><span>or</span></div>
				</div>
				<div class="right col-lg-6">
					<div class="demo-img"></div>
					<?php include (get_stylesheet_directory() . '/inc/custom/demo-form2.php');?>
				</div>
			</div>
		</div>
	</div><!-- demo-page -->
	<?php get_template_part( './templates/top-link' ); ?>
</div>
<?php endwhile;?>
<?php get_footer(); ?>