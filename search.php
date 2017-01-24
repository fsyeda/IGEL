<?php get_header(); ?>

<div id="content" class="blog igel-search search-page">

	<div id="main" role="main">

	<div class="container">
			<div class="clearfix row">
				
		        <div class="col-xs-12 col-sm-12 col-lg-8">
		
					<div class="block block-title">
						<h1><?php echo _x("Search for:", "label", "simple-bootstrap"); ?> <span class="sl-search-keyword"><?php echo esc_attr(get_search_query()); ?></span></h1>
					</div>

					<?php if (have_posts()) : ?>

					<?php while (have_posts()) : the_post(); ?>
					
					<div id="post-<?php echo $post->ID; ?>" class="post-excerpt">
									  		<div class="post-text">
								                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
								                
												<div class="excerpt"><?php the_excerpt(); ?></div>
												<div class="translate-read-more"><a href="<?php the_permalink(); ?>" title="Read More" class="read-more">Read More</a></div>

												<!--<a href="<?php the_permalink(); ?>" title="Read More" class="read-more">Read More</a></div>-->
											</div>
										</div>
									
					<?php endwhile; ?>	
		
				<?php custom_numeric_posts_nav(); ?>		
				
				<?php else : ?>
				
				<!-- this area shows up if there are no results -->
				
				<article id="post-not-found" class="block">
				    <p><?php _e("No items found.", "simple-bootstrap"); ?></p>
				</article>
				
				<?php endif; ?>

				</div> <!-- end #main -->
			</div> <!-- end #content -->
		</div>
	<?php get_template_part( 'top-link' ); ?>
	</div>

</div>
<script type="text/javascript">
    /*$(function(){
        $('.excerpt').succinct({
            size: 340
        });
    });*/
</script>
<?php get_footer(); ?>