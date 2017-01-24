<?php
/* Template Name: Blog Search Results */


global $post;

// retrieve our search query if applicable
$query = isset( $_REQUEST['swpquery'] ) ? sanitize_text_field( $_REQUEST['swpquery'] ) : '';

// retrieve our pagination if applicable
$swppg = isset( $_REQUEST['swppg'] ) ? absint( $_REQUEST['swppg'] ) : 1;

if ( class_exists( 'SWP_Query' ) ) {

	$engine = 'blogsearchengine'; // taken from the SearchWP settings screen

	$swp_query = new SWP_Query(
		// see all args at https://searchwp.com/docs/swp_query/
		array(
			's'      => $query,
			'engine' => $engine,
			'page'   => $swppg,
		)
	);

	// set up pagination
	$pagination = paginate_links( array(
		'format'  => '?swppg=%#%',
		'current' => $swppg,
		'total'   => $swp_query->max_num_pages,
	) );
}

get_header(); ?>


<div id="content" class="blog search-page">

	<div id="main" role="main">

	<div class="container">
			<div class="clearfix row">
				
		        <div class="col-xs-12 col-sm-12 col-md-8">
		
					<div class="block block-title">
						<h1><?php if ( ! empty( $query ) ) : ?>

							<?php 

								echo stripcslashes('Search Results for: <span class="sl-search-keyword">'.$query.'</span>'); 

								?>
						<?php else : ?>
							Blog Search
						<?php endif; ?></h1>
					</div>

					<?php if ( ! empty( $query ) && isset( $swp_query ) && ! empty( $swp_query->posts ) ) {
						foreach ( $swp_query->posts as $post ) {
							setup_postdata( $post );

							// output the result
							?>
								
								<div id="post-<?php echo $post->ID; ?>" class="post-excerpt">
									  		<div class="post-text">
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
							<?php
						}
						
						wp_reset_postdata();

						// pagination
						if ( $swp_query->max_num_pages > 1 ) { ?>
							<div class="navigation pagination" role="navigation">
								<h2 class="screen-reader-text">Posts navigation</h2>
								<div class="nav-links">
									<?php echo wp_kses_post( $pagination ); ?>
								</div>
							</div>
						<?php }
					} else {
						echo '<div class="search-result col-xs-12"><h2>No results Found</h2><p>Sorry, the search had no results.</p>';

						echo '</div>';
					} ?>


				</div> <!-- end #main -->
					<?php 
						get_sidebar("right");
					?>
			</div> <!-- end #content -->
		</div>
	<?php get_template_part( './templates/top-link' ); ?>
	</div>

</div>

<?php get_footer(); ?>