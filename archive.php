<?php get_header(); ?>

<div id="content" class="blog archive">

	<div id="main" role="main">

	<section class="banner blog-banner">

	</section>
	<section class="blog-posts-list">
		<div class="container">
				<div class="clearfix row">
					
			        <div class="col-xs-12 col-sm-12 col-md-8">
							<div class="block block-title">
								<h1 class="archive_title">
									<?php echo get_the_archive_title() ?>
								</h1>
							</div>

							<?php if (have_posts()) : ?>

							<?php while (have_posts()) : the_post(); ?>
							
								<div id="post-<?php echo $post->ID; ?>" class="post-excerpt">
							  		<div class="post-text">
							  			<div class="link-back"><a href="/blog" class="back-link" title="Blog"><?php echo __('< back to all posts', 'igel'); ?></a></div>
						                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						                <div class="info-post"><span>Written by: <?php the_author(); ?></span><span class="date">Published: <?php the_date('F j, Y'); ?></span></div>
										<div class="excerpt"><?php the_excerpt(); ?></div>

										<div class="cat_tags">
											<div class="categories">Posted in <?php the_category( ', ' ); ?></div><div class="tags"><span>Tagged</span> <?php the_tags(); ?></div>
										</div>
										<div class="share-icons-list">
											<span class="text">Share</span>
											<ul class="share-list">
												<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=henley-putnam.edu" target="_blank" title="Linkedin Share"><span class="share-icons ln"></span></a></li>
												<li><a href="http://twitter.com/intent/tweet?status=<?php the_title(); ?>+<?php the_permalink(); ?>" target="_blank" title="Twitter Share"><span class="share-icons tw"></span></a></li>
												<li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" title="Facebook Share" ><span class="share-icons fb"></span></a></li>
												<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" title="Google Plus Share"><span class="share-icons gplus"></span></a></li>
												<li><a href="https://www.xing.com/social_plugins/share?url=<?php the_permalink(); ?>" target="_blank" title="Xing Share"><span class="share-icons xing"></span></a></li>
												<li><a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site <?php the_permalink(); ?>" target="_blank" title="Mail Share"><span class="share-icons mail"></span></a></li>
											</ul>
											
										</div>
									</div>
								</div>
							
							<?php endwhile; ?>	
							
							<?php custom_numeric_posts_nav(); ?>	
							
							<?php else : ?>
							
							<article id="post-not-found" class="block">
							    <p><?php _e("No items found.", "simple-bootstrap"); ?></p>
							</article>
							
							<?php endif; ?>

						</div> <!-- end #main -->
						<?php 
							get_sidebar("right");
						?>
				</div> <!-- end #content -->
			</div>
		</section>
	<?php get_template_part( './templates/top-link' ); ?>
	</div>

</div>

<?php get_footer(); ?>