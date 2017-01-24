<?php
/*
 * Template Name:	Linux 3rd Party
*/
?>
<?php get_header(); ?>
<?php while (have_posts()):the_post()?>
<?php 
	$data		=	$_POST;
	$post_id	=	(isset($_POST['post_id']))?$_POST['post_id']:'';
	$post_name	=	(isset($_POST['post_name']))?$_POST['post_name']:'';
	$color		=	(isset($_POST['color']))?$_POST['color']:'';
	$cat_name	=	(isset($_POST['cat_name']))?$_POST['cat_name']:'';
	$cat_parent	=	(isset($_POST['cat_parent']))?$_POST['cat_parent']:'';
	$comment	=	(isset($_POST['comment']))?$_POST['comment']:'';
	$limitation	=	(isset($_POST['limitation']))?$_POST['limitation']:'';
	$hint		=	(isset($_POST['hint']))?$_POST['hint']:'';	
?>
<div class="page-one">
	<div class="single-linux party-database">
		<div class="container">
			<h2>Submit new Test</h2>
			<div class="top">
				<div class="title">
					<div class="col-md-3">CATEGORY</div>
					<div class="col-md-3">MANUFACTURER</div>
					<div class="col-md-5">PRODUCT</div>
					<div class="col-md-1">STATUS</div>
				</div>
				<div class="content">
					<div class="col-md-3"><?php echo $cat_parent;?></div>
					<div class="col-md-3"><?php echo $cat_name?></div>
					<div class="col-md-5"><?php echo $post_name;?></div>
					<div class="col-md-1"><h5><span class="color" style="background: <?php echo $color;?>;"></span></h5></div>
				</div>
			</div>
			<div class="bot">
				<form action="<?php echo site_url() . '/linux-3rd-party-thankyou/' ;?>" method="post" target="_blank" id="hardware-database-form">
					<div class="left">
						<div class="cf7_wrap">
							<div class="cf7-col1">
								<p>NAME</p>
								<input type="text" value="" name="fullname">
							</div>
							<div class="cf7-col2">
								<p>COMPANY</p>
								<input type="text" value="" name="company">
							</div>
						</div>
						<div class="cf7_wrap">
							<div class="cf7-col1">
								<p>EMAIL</p>
								<input type="email" value="" name="email">
							</div>
						</div>
						<div class="cf7_wrap">
							<div class="cf7-col1">
								<p>TESTSIGNAL</p>
								<select name="testsignal" class="select">
									<option value="Hardware unsuccessful tested">Hardware unsuccessfully tested</option>
									<option value="Hardware successful tested">Hardware successfully tested</option>
								</select>
							</div>
							<div class="cf7-col2">
								<p>FIRMWARE</p>
								<input type="text" value="" name="firmware">
							</div>
						</div>
					</div>
					<div class="right">
						<div class="cf7_wrap">
							<p>COMMENTS</p>
							<textarea name="comment"><?php echo $comment;?></textarea>
						</div>
						<div class="cf7_wrap">
							<p>LIMITATIONS</p>
							<textarea name="limitation"><?php echo $limitation;?></textarea>
						</div>
						<div class="cf7_wrap">
							<p>HINTS</p>
							<textarea name="hint"><?php echo $hint;?></textarea>
						</div>
					</div>
						<input type="hidden" name="category_name" value="<?php echo $cat_parent;?>">
						<input type="hidden" name="menu_name" value="<?php echo $cat_name;?>">
						<input type="hidden" name="product_name" value="<?php echo $post_name;?>">
						<input type="hidden" name="color" value="<?php echo $color;?>">
					<div class="cf7_submit ">
						<a href="<?php echo get_the_permalink($post_id);?>" class="load_more">BACK</a>
						<input type="submit" class="load_more" value="SUBMIT">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php endwhile;?>
<?php get_footer(); ?>