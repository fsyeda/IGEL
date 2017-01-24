<?php get_header(); ?>
<?php 
if(isset($_GET)){			
	$search_text = !empty($_GET['search_text']) ? esc_attr($_GET['search_text']) : ''; 
	$select_topic = !empty($_GET['select_topic']) ? intval($_GET['select_topic']) : ''; 
	$select_product = !empty($_GET['select_product']) ? intval($_GET['select_product']) : ''; 
	$select_industry = !empty($_GET['select_industry']) ? intval($_GET['select_industry']) : ''; 
	$select_content_type = !empty($_GET['select_content_type']) ? intval($_GET['select_content_type']) : ''; 
}
?>
<div class="resources-container">

	<div class="container">
	<form action="" class="form_filtter">
		<div class="main-top">
			<h1><?php the_field('title_resource','option');?></h1>
			<p><?php the_field('description_resource','option');?></p>
			
			<!--<div class="rs-search">
					<input class="search-text" type="text" id="" name="search_text" placeholder="Search" value="<?php /*echo ($search_text)?$search_text:'';*/?>" />               				 
       				 <button type="submit" name="asas" id="search_button">
       				 </button>
			</div>-->
		</div><!-- main-top -->
		<div class="filter-select">
			
			<?php $list_terms = array('topic','product','industry','content_type');?>
			<?php foreach ($list_terms as $term_slug):
			if ( 
				($term_slug == 'topic' && !empty($select_topic)) || 
				($term_slug == 'product' && !empty($select_product)) || 
				($term_slug == 'industry' && !empty($select_industry)) || 
				($term_slug == 'content_type' && !empty($select_content_type)) 
			){
				$class	= 'selected';
			}else{
				$class = '';
			}
			?>
			<div class="col-md-3 col-sm-6">
				<select class="filterResource select_<?php echo $term_slug;?> <?php echo $class;?>" name="select_<?php echo $term_slug;?>">
				<option value="">Filter by <?php echo get_taxonomy($term_slug)->label;?></option>
				<?php
						$taxonomy_terms = get_terms( array(
						    'taxonomy' => $term_slug,
    						'hide_empty' => false,
						));

					?>
				<?php if($taxonomy_terms && is_array($taxonomy_terms) && !is_wp_error($taxonomy_terms)):?>
				<?php foreach ($taxonomy_terms as $terms):
				if ( 
					($term_slug == 'topic' && $select_topic == $terms->term_id) || 
					($term_slug == 'product' && $select_product == $terms->term_id) || 
					($term_slug == 'industry' && $select_industry == $terms->term_id) || 
					($term_slug == 'content_type' && $select_content_type == $terms->term_id) 
				){
					$checked_og = 'selected="selected"';					
				}else{
					$checked_og = '';
				}
				?>
					<option <?php echo $checked_og;?> data-taxonomy="<?php echo $term_slug;?>" value="<?php echo $terms->term_id;?>"><?php echo $terms->name;?></option>
				<?php endforeach;?>
				<?php endif;?>
				</select>
				</div>
			<?php endforeach;?>
			
			
		</div>
	</form>
		
		<div class="rs-content">
		<?php 
		$paged	=	get_query_var('page') ? get_query_var('page') : 1;
		if($search_text || $select_topic || $select_product || $select_industry || $select_content_type){	
						
			$all_topic = get_id_list_term('topic');
			$all_industry = get_id_list_term('industry');
			$all_product = get_id_list_term('product');
			$all_content_type = get_id_list_term('content_type');
			
			$tax_query_child = $tax_query_child2 = array();
		
			if($select_topic) {
				$tax_query_child[] = array(					
					'taxonomy' => 'topic',
					'field'    => 'term_id',
					'terms'    => $select_topic,	
				);
			}
			if($select_industry) {
				$tax_query_child[] = array(
					'taxonomy' => 'industry',
					'field'    => 'term_id',
					'terms'    => $select_industry,
				);
			}
			if($select_product) {
				$tax_query_child[] = array(
					'taxonomy' => 'product',
					'field'    => 'term_id',
					'terms'    => $select_product,
				);
			}
			if($select_content_type) {
				$tax_query_child[] = array(
					'taxonomy' => 'content_type',
					'field'    => 'term_id',
					'terms'    => $select_content_type,
				);
			}
			
			if(!$select_topic && !$select_industry && !$select_product && !$select_content_type){
				$tax_query_child[] = array(					
					'taxonomy' => 'topic',
					'field'    => 'term_id',
					'terms'    => $all_topic,	
				);
				$tax_query_child[] = array(
					'taxonomy' => 'industry',
					'field'    => 'term_id',
					'terms'    => $all_industry,
				);
				$tax_query_child[] = array(
					'taxonomy' => 'product',
					'field'    => 'term_id',
					'terms'    => $all_product,
				);
				$tax_query_child[] = array(
					'taxonomy' => 'content_type',
					'field'    => 'term_id',
					'terms'    => $all_content_type,
				);
				$tax_query_child = implode(', ', $tax_query_child);
			}
		    $tax_query = array(
		    	'relation' => 'AND',
				$tax_query_child
			);       
	        $args	=	array(
	            'post_type'			=>	'resources',
	            'paged'				=>	$paged,
	            'posts_per_page'	=>	8,
	        	'tax_query' 		=>  $tax_query
	        );
			if($search_text){
	        	$post__in  = search_text_to_ID($search_text);
	        	if($post__in && is_array($post__in)){	
					$args['post__in'] = $post__in;
	        	}else{
					$args['s'] = $search_text;
	        	}
			}
		}else{			
			$args	=	array(
				'post_type'			=>	'resources',
				'paged'				=>	$paged,
				'posts_per_page'	=>	'8'
			);
		}
			$custom	=	new WP_Query($args);
			$max_num_pages = $custom->max_num_pages;
			if($custom -> have_posts()):
			while ($custom->have_posts()):$custom->the_post();
		?>
		<?php 
			$modal_view	=	get_field('modal_view');
			 $term_type		=	get_the_terms($post,'content_type');
			 $add_file		=	get_field('add_file');
			 $content		=	get_the_title();
			 $more = '';

			 if(strlen($content) >= 46) $more = '...';
			 $sub			=	substr($content,0,46).$more;
			 if($term_type){
				foreach ($term_type as $cat){
					$name = $cat->name;
					$nameType = $cat->slug;					
					$icon	= get_field('icon_img','content_type_'.$cat->term_id);
				}
				if($nameType == 'videos') $nameType = 'WATCH';
				else $nameType = 'READ';
			 }
		?>
			<div class="col-md-3 col-sm-6">
			<?php if($modal_view==true){?>
				<div class="img">				
					<a class="fancybox_video"  href="#ex<?php echo get_the_ID($post);?>">
						<?php the_post_thumbnail('img-resources');?>
					</a>
					<a class="btn-filter fancybox_video" href="#ex<?php echo get_the_ID($post);?>">
						<img src="<?php echo $icon['url'];?>"/>
						<?php echo $name;?>
					</a>
					<div class="dud-fulldiv">
					 	<a class="fancybox_video"  href="#ex<?php echo get_the_ID($post);?>">
						 	<div class="dud-divicon">
							 	<div class="dud-icon">
							 		<span></span>
							 	</div>
							 	<p class="first"><?php echo $nameType;?></p>
							 	<p><?php echo $name;?></p>
							 </div>
					 	</a>
				 	</div>		
				</div>
				<div class="excerpt">
					<?php echo $sub;?>
				</div>
				<div id="ex<?php echo get_the_ID($post);?>" style="display:none;">
				    <video controls id="video-id" >
				    	<source src="<?php echo $add_file['url'];?>" type="video/mp4">
				    </video>
				 </div>
				 
			<?php }else {?>
				<div class="img">				
					<a href="<?php echo $add_file['url'];?>" target="_blank">
						<?php the_post_thumbnail('img-resources');?>
					</a>
					<a class="btn-filter" href="<?php echo $add_file['url'];?>" target="_blank">
						<img src="<?php echo $icon['url'];?>"/>
						<?php echo $name;?>
					</a>
					<div class="dud-fulldiv">
					 	<a href="<?php echo $add_file['url'];?>" target="_blank">
						 	<div class="dud-divicon">
							 	<div class="dud-icon">
							 		<span></span>
							 	</div>
							 	<p class="first"><?php echo $nameType;?></p>
							 	<p><?php echo $name;?></p>
							 </div>
					 	</a>
					 </div>		
				</div>
				<div class="excerpt">
					<?php echo $sub;?>
				</div>
				
			<?php }?>
			</div>
		<?php endwhile;endif;wp_reset_query();?>		
		</div>
		<h5 class="read-more" style="<?php echo ($max_num_pages == 1)?'display: none':''?>">
			<a href="#" data-page="1" class="load_more">
				LOAD MORE
				<img src="<?php echo get_stylesheet_directory_uri() . '/img/loading.gif' ;?>" style="display:none"/>
			</a>
		</h5>
	</div><!-- container -->	
</div>
<script>
(function($){
	$(document).ready(function(){
		function ajax_js(){
			var search_text = $('.search-text').val();		
			var select_topic = $('.select_topic').val();		
			var select_product = $('.select_product').val();		
			var select_industry = $('.select_industry').val();		
			var select_content_type = $('.select_content_type').val();		

			//var href = window.location.origin + window.location.pathname + '?search_text='+search_text+'&select_topic='+select_topic+'&select_product='+select_product+'&select_industry='+select_industry+'&select_content_type='+select_content_type;		
			var href = window.location.origin + window.location.pathname + '?select_topic='+select_topic+'&select_product='+select_product+'&select_industry='+select_industry+'&select_content_type='+select_content_type;
			history.pushState({}, '', href);

			$('.read-more').fadeOut();
			$('.load_more').attr('data-page',1);
			var data = $('.form_filtter').serialize(); 
			 $.ajax({
				 type : 'POST',
				 dataType: 'json',
				 data : {
					 'action' : 'dvd_action',
					 'data' : data,
					 'paged' : 1					 
				 },
				 url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
				 beforeSend: function(){
					 $('.rs-content').html('<img src="<?php echo get_stylesheet_directory_uri() . '/img/ajax-loading.gif' ;?>" class="load_img" />');
				 },
				 success : function (resp){
					if(resp.success){
						$('.rs-content').html(resp.data['content']);
						if(!resp.data['paged']){
					 		$('.read-more').fadeOut();
					 	}else{
							$('.load_more').text('Load more');
							$('.read-more').fadeIn();
					 	}
					}else{
						$('.rs-content').html('<div class="col-xs-12">No post to load!</div>');
						$('.read-more').fadeOut();
					}
				 }
			 });
		 }
		 $('.form_filtter').bind('change submit',function(){
				ajax_js();
			 return false;
		 });
		 $('.load_more').click(function(event){
			 event.preventDefault();
			 var pageCurrent = parseInt($(this).attr('data-page'));
			 var data = $('.form_filtter').serialize();
			 $.ajax({
				 type : 'POST',
				 dataType: 'json',
				 data : {
					 'action' : 'dvd_action',
					 'data' : data,
					 'paged' : parseInt(pageCurrent + 1)
				 },
				 url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
				 beforeSend: function(){
					 $('.read-more img').css('display','block');
				 },
				 success : function (resp){
					 if(resp.success){
						$('.load_more').attr('data-page',parseInt(pageCurrent + 1));
					 	$('.rs-content').append(resp.data['content']);	
					 	if(!resp.data['paged']){
					 		$('.read-more').css('display','none');
					 	}		 	
					 }else{
						 $('.load_more').text('No more post to load!');
						 setTimeout(function(){
							 $('.read-more').fadeOut();
						 },1000);
					 }
					 $('.read-more img').css('display','none');
				 }
			 });
		 });
		  $('select.filterResource').bind('change',function(){
			 var thisVal = $(this).val();
			 if(thisVal){
				 $(this).addClass('selected');
			 }else{
				 $(this).removeClass('selected');
			 }
		 });
	});		 
})(jQuery);
</script>
<?php get_footer(); ?>