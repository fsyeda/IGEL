<?php get_header(); ?>
<?php while (have_posts()):the_post()?>
<div class="page-one">
	<div class="single-linux">
		<div class="container">
			<?php 
				$term_status	=	get_the_terms($post,'status');
				if($term_status){
					foreach ($term_status as $status_cat){
						$status_id	=	$status_cat->term_id;
						$color		=	get_field('color','status_'.$status_id);
					}
				}
				$term_cate	=	get_the_terms($post, 'category_linux');
				if($term_cate){
					foreach ($term_cate as $cate_menu) {
						if($cate_menu->parent){
							$cate_name	=	$cate_menu->name;
						}else{
							$cate_parent=	$cate_menu->name;
						}
					}
				}
			?>
			<div class="top">
				<h1><?php echo $cate_name;?> <?php the_title();?></h1>
			</div>
			<div class="bot">
				<div class="left">
					<h5>FIRMWARE<span><?php the_field('firmware');?></span></h5>
					<h5>STATUS<span class="color" style="background: <?php echo $color;?>;"></span></h5>
				</div>
				<div class="right">
				<form action="<?php echo site_url() . '/linux-3rd-party/' ;?>" method="post">
					<div class="cf7_wrap">
						<p>COMMENT/S</p>
						<input type="text" value="" name="comment">
					</div>
					<div class="cf7_wrap">
						<p>LIMITATION/S</p>
						<input type="text" value="" name="limitation">
					</div>
					<div class="cf7_wrap">
						<p>HINT/S</p>
						<input type="text" value="" name="hint">
					</div>
					<div class="cf7_submit">
						<input type="hidden" name="color" value="<?php echo $color;?>">
						<input type="hidden" name="cat_name" value="<?php echo $cate_name;?>">
						<input type="hidden" name="cat_parent" value="<?php echo $cate_parent;?>">
						<input type="hidden" name="post_id" value="<?php echo $post->ID;?>">
						<input type="hidden" name="post_name" value="<?php echo $cate_name?> <?php the_title();?>">
						<a href="<?php echo site_url() . '/linux-3rd-party-hardware-database/' ;?>" class="load_more">BACK</a>
						<input type="submit" class="load_more" value="SUBMIT NEW TEST">
						
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile;?>
<?php get_footer(); ?>