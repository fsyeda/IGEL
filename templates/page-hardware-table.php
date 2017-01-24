<?php
/*
Template Name: Hardware Product Table - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="product-hardware-table">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs sub-nav hardware-breadcrumbs">
				<div class="container">
					<?php wp_nav_menu( array('menu' => 'Hardware Overview Menu' )); ?>
				</div>
			</div>

			<?php the_content(); ?>
			

			<?php endwhile; ?>		
		
		<?php else : ?>
		
		<article id="post-not-found" class="block">
		    <p><?php _e("No pages found.", "simple-bootstrap"); ?></p>
		</article>
		
		<?php endif; ?>

		
	<?php get_template_part( './templates/top-link' ); ?>
	</div>

</div>
<script type="text/javascript">
	jQuery(document).ready(function($){
		var products_table_Top = $('.cd-products-table').offset().top;

    $(window).on( 'scroll', function(){
            if ($(window).scrollTop() >= products_table_Top) {
                $('.cd-products-table').addClass('top-fixed');
            } else {
                $('.cd-products-table').removeClass('top-fixed');
            }
        });
	});
</script>
<?php get_footer(); ?>