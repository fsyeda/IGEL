<?php
/*
 * Template Name:	Linux 3rd Party Hardware DB
 */
?>
<?php get_header(); ?>
<div class="page-one">
	<div class="linux3rd">
		<div class="container">
			<div class="top dud-row">
				<div class="left col-md-5">
					<div class="align-left">
						<h2><?php the_field('title');?></h2>
						<h4><?php the_field('sub_title');?></h4>
					</div>
				</div>
				<div class="right col-md-7">
					<div class="align-left">
						<p><?php the_field('description');?></p>
					</div>
				</div>
			</div><!-- top -->
			<div class="bot">
				<div class="form">
					<form class="form_linux" action="">
						<div class="search">
							<h4>Use the field or select from the filters below to search the database</h4>
							<div class="rs-search">
								<input class="search-text" type="text" id="" name="search_text" placeholder="Search" value="" />               				 
			       				<button type="button" name="asas" id="search_button"></button>
							</div>
						</div>
						<div class="filter-select dud-row">
							<div class="col-md-3 col-sm-6">
								<select class="filter select_category" id="tab-cate-bot" name="select_category" data-default-value="Manufacturer">
									<option value="">Category</option>
									<?php 
										$term_category		=	"category_linux";
										$taxonomy_category	=	get_terms(array(
													'taxonomy'	=>	$term_category,
													'hide_empty'=>	false
												));
									?>
									<?php if($taxonomy_category && is_array($taxonomy_category) && !is_wp_error($taxonomy_category)):?>
									<?php 
										foreach ($taxonomy_category as $category){
										if($category->parent==0){
									?>
										<option value="<?php echo $category->term_id;?>"><?php echo $category->name;?></option>
									
									<?php 
											}
										}
										endif;
									?>
								</select>
							</div>
							<div class="col-md-3 col-sm-6">
								<select class="filter tab-menu select_menu" name="select_menu">
									<option value="">Manufacturer</option>	
									<?php 
										$term_category		=	"category_linux";
										$taxonomy_category	=	get_terms(array(
													'taxonomy'	=>	$term_category,
													'hide_empty'=>	false
												));
									?>
									<?php if($taxonomy_category && is_array($taxonomy_category) && !is_wp_error($taxonomy_category)):?>
									<?php 
										foreach ($taxonomy_category as $category){
										if($category->parent!=0){
									?>
										<option value="<?php echo $category->term_id;?>"><?php echo $category->name;?></option>
									
									<?php 
											}
										}
										endif;
									?>								
								</select>
							</div>
							<div class="col-md-3 col-sm-6">
								<select class="filter tab-product" name="select_product">
									<option value="">Product</option>
								</select>
							</div>
							<?php print_r(check_posts_exits());?>
							<div class="col-md-3 col-sm-6">
								<select class="filter select_status" name="select_status">
									<option value="">All status</option>
									<?php 
										$term_slug		=	"status";
										$taxonomy_terms = get_terms( array(
											'taxonomy' => $term_slug,
											'hide_empty' => false,
										));
									?>
									<?php if($taxonomy_terms && is_array($taxonomy_terms) && !is_wp_error($taxonomy_terms)):?>
									<?php foreach ($taxonomy_terms as $status){?>
										<option value="<?php echo $status->term_id;?>"><?php echo $status->name;?></option>
									<?php }endif;?>
								</select>
							</div>
						</div>
						<div class="status">
							<h4>Status Legend</h4>
							<div class="dud-row">
							<?php if($taxonomy_terms && is_array($taxonomy_terms) && !is_wp_error($taxonomy_terms)):?>
							<?php 
								foreach ($taxonomy_terms as $terms){
									$color	=	get_field('color','status_'.$terms->term_id);
							?>
								<div class="col-md-6">
									<span class="color" style="background: <?php echo $color;?>;"></span>
									<h5><?php echo $terms->description;?></h5>
								</div>
							<?php 
									}
								endif;
							?>
							</div>
						</div>
					</form>
				</div>
				<div class="content-main">
					<div class="content content-hide">
						<div class="product-linux">
							<div class="dud-col"></div>
							<div class="dud-col"><h5>PRODUCT</h5></div>
							<div class="dud-col"><h5>FIRMWARE</h5></div>
							<div class="dud-col"><h5>DETAILS</h5></div>
						</div>
					</div>
					<div class="content content-linux">
						<?php 
							$page	=	get_query_var('page') ? get_query_var('page') : 1;
							$args	=	array(
					            'post_type'			=>	'linux_product',
								'paged'				=>	$page,
					            'posts_per_page'	=>	10,
					        ); 
						?>
						 <?php	        
					        $custom	=	new WP_Query($args);    
					        $max_num_pages = $custom->max_num_pages;   
					        if($custom -> have_posts()):
					            while ($custom->have_posts()):$custom->the_post();
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
					            		}
					            	}
					            }
							?>
								<div class="product-linux">
									<div class="dud-col"><span class="color" style="background: <?php echo $color;?>;"></span></div>
									<div class="dud-col"><span><?php echo $cate_name;?> <?php the_title();?> <?php the_field('deviceid');?></span></div>
									<div class="dud-col"><span><?php the_field('firmware');?></span></div>
									<div class="dud-col"><a href="<?php the_permalink();?>">DETAILS</a></div>
								</div>			
				            <?php endwhile;endif;wp_reset_query(); ?>
					</div>
				</div>
				<h5 class="read-more" <?php if($max_num_pages==1):?>style="display:none"<?php endif;?>>
					<a href="#" data-page="1" class="load_more">
						LOAD MORE
						<img src="<?php echo get_stylesheet_directory_uri() . '/img/loading.gif' ;?>"/>
					</a>
				</h5>
			</div><!-- bot -->
		</div>
	</div>
</div><!-- page-one -->
<script>
(function($){
	$(document).ready(function(){
		function ajax_linux(){
			var data = $('.form_linux').serialize(); 
			 $.ajax({
				 type : 'POST',
				 dataType: 'json',
				 data : {
					 'action' : 'search_linux_new',
					 'data' : data					 
				 },
				 url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
				 beforeSend: function(){
				 	$('.content-linux').html('<img src="<?php echo get_stylesheet_directory_uri() . '/img/ajax-loading.gif' ;?>" class="load_img" />');
					$('.load_more').attr('data-page',1);
					$('.load_more').text('Load more');
					$('.read-more').fadeOut();
				 },
				 success : function (resp){
					if(resp.success){
						$('.content-linux').html(resp.data.content);						
						if(!resp.data.page){
							$('.read-more').css('display','none');
						}else{
							$('.read-more').fadeIn();
						}
					}else{
						$('.content-linux').html('No post to load!');
						$('.read-more').fadeOut();
					}
				 },
				 error: function(dataE){
					 $('.content-linux').html('No post to load!');
				}
			 });
		 }		 
		 $('.form_linux').bind('change submit',function(){
			 ajax_linux();
			 return false;
		 });
		 $('.load_more').click(function(event){
			 event.preventDefault();
			 var pageCurrent = parseInt($(this).attr('data-page'));
			 
			 var data = $('.form_linux').serialize();
			 $.ajax({
				 type : 'POST',
				 dataType: 'json',
				 data : {
					 'action' : 'search_linux_new',
					 'data' : data,
					 'paged' : parseInt(pageCurrent + 1)
				 },
				 url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
				 beforeSend: function(){
					 $('.read-more').css('display','block');
				 },				 
				 success : function (resps){
					 if(resps.success){
						if(resps.data.page){
							$('.load_more').attr('data-page',parseInt(pageCurrent + 1));
						}else{
							$('.read-more').css('display','none');
						}
					 	$('.content-linux').append(resps.data.content);			 	
					 }else{
						 $('.load_more').text('No more post to load!');
						 $('.read-more').css('display','none');
					 }
				 },
				 error: function(dataE){
					 $('.read-more').css('display','none');
				}
			 });
		 });
		$('.tab-menu').change(function(){
			var cate_id	=	$('.select_category').attr('value');
			var menu_id	=	$(this).attr('value');

			$.ajax({
				 type : 'POST',
				 dataType: 'json',
				 data : {
					 'action' : 'search_product_new',
					 'cate_id' : cate_id,
					 'menu_id' : menu_id
				 },
				 url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
				 beforeSend: function(){
					 $('.tab-product').html('<option value="">Product</option>');
				 },
				 success : function (resp){
					if(resp.success){
						$('.tab-product').html('<option value="">Product</option>');
						$('.tab-product').append(resp.data);
					}else{
						$('.tab-product').html('<option value="">Product</option>');
					}
				 },
				 error: function(dataE){
					console.log(dataE);
				}
			});	
		});
		$('.select_category').change(function(){
			var cate_id	=	$(this).attr('value');
			$.ajax({
				 type : 'POST',
				 dataType: 'json',
				 data : {
					 'action' : 'search_manufacturer_new',
					 'data' : cate_id
				 },
				 url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
				 beforeSend: function(){
					 $('.tab-menu').html('<option value="">Manufacturer</option>');
					 $('.tab-product').html('<option value="">Product</option>');
				 },
				 success : function (resp){
					if(resp.success){
						$('.tab-menu').html('<option value="">Manufacturer</option>');
						$('.tab-menu').append(resp.data);
					}else{
						$('.tab-menu').html('<option value="">Manufacturer</option>');
					}
				 },
				 error: function(dataE){
					console.log(dataE);
				}
			});
		});		 
	});		 
})(jQuery);
</script>
<?php get_footer(); ?>