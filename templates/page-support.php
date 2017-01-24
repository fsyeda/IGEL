<?php
/*
Template Name: Support Overview - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="support">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>

				<?php
					$lightbox ='<div id="protected-popup" class="white-popup close-out mfp-hide">
											<div class="container-lightbox login-lightbox">';
					$lightbox .=get_field('lightbox_protected');
					$lightbox .='</div></div>';

					echo $lightbox;
				?>
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
		//Open Popup
		var startWindowScroll = 0;
		$('.protected').magnificPopup({
	     items: {
		      src: '#protected-popup',
		      type: 'inline'
		  },
	      midClick: true,
	      mainClass: 'mfp-swipe',
	      fixedContentPos:true,
	       callbacks: {
		      beforeOpen: function() {
		        startWindowScroll = $(window).scrollTop();
		        $('html').addClass('mfp-helper');
		      },
		      close: function() {
		        $('html').removeClass('mfp-helper');
		        $(window).scrollTop(startWindowScroll);
		      }
		    }
	    });
	});

</script>
<?php get_footer(); ?>