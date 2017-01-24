<?php
/*
Template Name: Why Revolutionary
*/
?>

<?php get_header(); ?>

<div id="content" class="why-revolutionary-page">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="breadcrumbs cream">
				<div class="container">
					<?php wp_nav_menu( array('menu' => 'Why Igel Menu' )); ?>
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
jQuery(document).ready(function ($) {

	 if(location.hash != null && location.hash != ""){

    	var idElement = location.hash;
    	
    	var top = $(idElement).offset().top;
		$('html, body').animate({scrollTop:top-60}, 500 );

    	};


    	 $(".fancybox_youtube").fancybox({
	        autoSize    : false,
	        closeClick    : false,
	        openEffect    : 'none',
	        closeEffect    : 'none',
	         afterShow: function(){
               var idVideo = $(this).attr('href');
               $(idVideo + ' .why-video').get(0).play();
             },
             afterClose: function(){
               var idVideo = $(this).attr('href');
               $(idVideo + ' .why-video').get(0).pause();
             },
             helpers: {
                overlay: {
                  locked: false
                }
            }
         });
         
});
</script>

<?php get_footer(); ?>