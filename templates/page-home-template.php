<?php
/*
Template Name: IGEL Homepage - Template
*/
?>

<?php get_header(); ?>

<div id="content" class="igel-home">

	<div id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>


				<?php
					$virtual_path = get_page_by_title( 'virtualization stage links' );

					$stages = get_field('stages', $virtual_path->ID);

						echo '<section class="virtualization-path">
									<div class="container">
									<div class="row">
									<div class="col-xs-12 centered">
									<h1>'.strip_tags(apply_filters( 'the_content', $virtual_path->post_content )).'</h1>
									</div>';

						foreach ($stages as $stage) {
						

							echo '<div class="col-xs-12 col-sm-6 col-md-3 virtualization-element" data-appear-top-offset="-250">
									<div class="wrap-img '.$stage['class'].'"><a href="'.$stage['link'].'" title="'.strip_tags($stage['title']).'"><img src="'.$stage['icon'].'" alt="'.strip_tags($stage['title']).' - Desktop Virtualization Software" class="v-image" /></a></div>
									<div class="wrap-text '.$stage['class'].'-text">
									<h4>'.$stage['title'].'</h4>
									<p class="text">'.$stage['text'].'</p>';

							
								echo '<p><a href="'.$stage['link'].'" title="'.strip_tags($stage['title']).'" class="learn-more">LEARN MORE</a></p>';
							
								echo '</div></div>';

						}

						echo '</div></div></section>';

				?>

				<!-- Event section -->

				<section class="highlight-event" data-stellar-background-ratio="0.1">
					<div class="container"><div class="row">

					<?php
						$event = get_field('event');
						
						if($event){

							$title= get_the_title($event[0]->ID);
							$url= get_field('url', $event[0]->ID);
							$date_start = get_field('date_start', $event[0]->ID);
							$date_end = get_field('date_end', $event[0]->ID);

							$date_text = '';
							if($date_end == ''){
								$date_text = date('F j, Y', strtotime($date_start));
							}else{
								if (date("F Y", strtotime($date_start)) == date("F Y", strtotime($date_end))){
									//same month and year
									$date_text = date('F j-', strtotime($date_start)).''.date('j, Y', strtotime($date_end));
								}else if(date("Y", strtotime($date_start)) == date("Y", strtotime($date_end))){
									//different month, same year
									$date_text = date('F j -', strtotime($date_start)).''.date('F j, Y', strtotime($date_end));
								}else{
									//different month and year
									$date_text = date('F j, Y -', strtotime($date_start)).''.date('F j, Y', strtotime($date_end));
								}
							}
							echo '<div class="col-xs-12 col-sm-7 col-sm-offset-1"><div class="date">'.$date_text.'</div><h4>'.$title.'</h4></div>';
							echo '<div class="col-xs-12 col-sm-4"><a href="'.get_the_permalink($event[0]->ID).'" title="'.$title.'" class="button white">MORE INFO</a></div>';
						}
						else{
							//if not event, then we show the white paper
							$white_paper = get_field('whitepaper');
							if($white_paper != ''){
								echo $white_paper;
							}
						}

					?>


					</div></div>
				</section>
				<!-- social section -->
				<section class="social-proof">
					<div class="container"><div class="row">
					<?php
						echo get_field('social_proof');
					?>
					</div>
					</div>
				</section>
				<!-- products section -->
				<section class="highlight-products">
					<div class="container"><div class="row">
					<?php
						echo get_field('products');
					?>

					<div class="desktop-products hidden-xs">
						<div class="col-xs-12">
							<div class="products-carousel col-xs-6">
								<div class="product element-1" id="element-1" data-page="element-pag-1" data-title="UD 9 Intel Celeron J1900 quad core processor" data-text="With 2.42GHz of processing power, the UD9 gives quick and easy access to any VDI environment, as well as multimedia and web-based applications." data-url="/products-hardware/igel-ud9-universal-desktop-thin-client/" data-titleurl="UD9"><img class="ud9" alt="ud9 - Endpoint Management Thin Client Tools" src="/wp-content/themes/igel/img/products/ud9-endpoint-management-thin-client-tools.png" /></div>
								<div class="product element-2" id="element-2" data-page="element-pag-2" data-title="UD Pocket Micro Universal Desktop Thin Client" data-text="Simply insert, boot up and access cloud services, server-based computing application or virtual desktops.  Get two operating systems on one endpoint." data-url="/products-hardware/igel-ud-pocket-universal-desktop-thin-client/" data-titleurl="UD Pocket Micro"><img class="udp" alt="udp - Endpoint Management Thin Client Tools" src="/wp-content/themes/igel/img/products/ud-pocket-endpoint-management-thin-client-tools.png" /></div>
								<div class="product element-3" id="element-3" data-page="element-pag-3" data-title="UD6 Developed for the most demanding power users" data-text="The UD6 expands the range of applications and easily provides the performance required for CAD applications, unified communication, film editing or big data visualization." data-url="/products-hardware/igel-ud6-universal-desktop-thin-client/" data-titleurl="UD6"><img class="ud6" alt="ud6 - Endpoint Management Thin Client Tools" src="/wp-content/themes/igel/img/products/ud6-endpoint-management-thin-client-tools.png" /></div>
								<div class="product element-4" id="element-4" data-page="element-pag-4" data-title="UD5 Windows Embedded Standard now available" data-text="Optimized for POS systems, bank counters and multi-screen workstations,  the UD5 supports any VDI environment. Comes with 5 year extended warrantee." data-url="/products-hardware/igel-ud5-universal-desktop-thin-client/" data-titleurl="UD5"><img class="ud5" alt="ud5 - Endpoint Management Thin Client Tools" src="/wp-content/themes/igel/img/products/ud5-endpoint-management-thin-client-tools.png" /></div>
								<div class="product element-5" id='element-5' data-page="element-pag-5" data-title="UD3 Simple and Secure Workplace Management" data-text="Integrated with AMD’s Embedded G-Series SoC, the UD3 offers enhanced display features and supports efficient use of two monitors." data-url="/products-hardware/igel-ud3-universal-desktop-thin-client/" data-titleurl="UD3"><img class="ud3" alt="ud3 - Endpoint Management Thin Client Tools" src="/wp-content/themes/igel/img/products/ud3-endpoint-management-thin-client-tools.png" /></div>
								<div class="product element-6" id='element-6' data-page="element-pag-6" data-title="UD2 Powerful and Economical" data-text="The Intel Atom processor delivers 30% extra performance, improved connection options and more multimedia applications." data-url="/products-hardware/igel-ud2-universal-desktop-thin-client/" data-titleurl="UD2"><img class="ud2" alt="ud2 - Endpoint Management Thin Client Tools" src="/wp-content/themes/igel/img/products/ud2-endpoint-management-thin-client-tools.png" /></div>
							</div>
							<div class="products-info">
								<div class="wrap-info">
									<h4 class='title-product desktop-title-product'>UD2 Powerful and Economical</h4>
									<p class="info-product desktop-info-product">The Intel Atom processor delivers 30% extra performance, improved connection options and more multimedia applications.</p>
									<a href="/products-hardware/igel-ud2-universal-desktop-thin-client/" title="Hardware Solutions - Endpoint Management Thin Client Tools" class="url-product desktop-url-product"><?php echo __('DETAILS ON THE', 'igel');?> <span class="name title-url desk-url-title">UD2</span></a>
	 							</div>
	 							<div class="products-pagination">
	 								<ul class="dots"><li data-product="element-6" class="product-display active" id="element-pag-6"></li><li data-product="element-5" class="product-display" id="element-pag-5"></li><li data-product="element-4" class="product-display" id="element-pag-4"></li><li data-product="element-3" class="product-display" id="element-pag-3"></li><li data-product="element-2" class="product-display" id="element-pag-2"></li><li data-product="element-1" class="product-display" id="element-pag-1"></li></ul>
	 							</div>
							</div>
						</div>
					</div>
					<div class="mobile-products visible-xs">
						<div class="container"><div class="row"><div class="col-xs-12">

						<div id="productsCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
							<div class="carousel-inner">
								<div class="products-mobile-home item active">
									<div class="wrap-img"><img class="ud2" alt="ud2 - Endpoint Management Thin Client Tools" src="/wp-content/themes/igel/img/products/ud2-endpoint-management-thin-client-tools.png" /></div>
									<div class="wrap-info">
										<h4 class='title-product'>UD2 Powerful and Economical</h4>
										<p class="info-product">The Intel Atom processor delivers 30% extra performance, improved connection options and more multimedia applications.</p>
										<a href="/products-hardware/igel-ud2-universal-desktop-thin-client/" title="UD2 - Endpoint Management Thin Client Tools" class="url-product"><?php echo __('DETAILS ON THE', 'igel');?> <span class="name title-url">UD2</span></a>
		 							</div>
		 						</div>
		 						<div class="products-mobile-home item">
									<div class="wrap-img"><img class="ud3" alt="ud3 - Endpoint Management Thin Client Tools" src="/wp-content/themes/igel/img/products/ud3-endpoint-management-thin-client-tools.png" /></div>
									<div class="wrap-info">
										<h4 class='title-product'>UD3 Simple and Secure Workplace Management</h4>
										<p class="info-product">Integrated with AMD’s Embedded G-Series SoC, the UD3 offers enhanced display features and supports efficient use of two monitors.</p>
										<a href="/products-hardware/igel-ud3-universal-desktop-thin-client/" title="UD3 - Endpoint Management Thin Client Tools" class="url-product"><?php echo __('DETAILS ON THE', 'igel');?> <span class="name title-url">UD3</span></a>
		 							</div>
		 						</div>
		 						<div class="products-mobile-home item">
									<div class="wrap-img"><img class="ud5" alt="ud5 - Endpoint Management Thin Client Tools" src="/wp-content/themes/igel/img/products/ud5-endpoint-management-thin-client-tools.png" /></div>
									<div class="wrap-info">
										<h4 class='title-product'>UD5 Windows Embedded Standard now available</h4>
										<p class="info-product">Optimized for POS systems, bank counters and multi-screen workstations,  the UD5 supports any VDI environment. Comes with 5 year extended warrantee.</p>
										<a href="/products-hardware/igel-ud5-universal-desktop-thin-client/" title="UD5 - Endpoint Management Thin Client Tools" class="url-product"><?php echo __('DETAILS ON THE', 'igel');?> <span class="name title-url">UD5</span></a>
		 							</div>
		 						</div>
		 						<div class="products-mobile-home item">
									<div class="wrap-img"><img class="ud6" alt="ud6 - Endpoint Management Thin Client Tools" src="/wp-content/themes/igel/img/products/ud6-endpoint-management-thin-client-tools.png" /></div>
									<div class="wrap-info">
										<h4 class='title-product'>UD6 Developed for the most demanding power users</h4>
										<p class="info-product">The UD6 expands the range of applications and easily provides the performance required for CAD applications, unified communication, film editing or big data visualization.</p>
										<a href="/products-hardware/igel-ud6-universal-desktop-thin-client/" title="UD6 - Endpoint Management Thin Client Tools" class="url-product"><?php echo __('DETAILS ON THE', 'igel');?> <span class="name title-url">UD6</span></a>
		 							</div>
		 						</div>
		 						<div class="products-mobile-home item">
									<div class="wrap-img"><img class="ud-pocket" alt="ud-pocket - Endpoint Management Thin Client Tools" src="/wp-content/themes/igel/img/products/ud-pocket-endpoint-management-thin-client-tools.png" /></div>
									<div class="wrap-info">
										<h4 class='title-product'>UD Pocket Micro Universal Desktop Thin Client</h4>
										<p class="info-product">Simply insert, boot up and access cloud services, server-based computing application or virtual desktops.  Get two operating systems on one endpoint.</p>
										<a href="/products-hardware/igel-ud-pocket-universal-desktop-thin-client/" title="UD Pocket - Endpoint Management Thin Client Tools" class="url-product"><?php echo __('DETAILS ON THE', 'igel');?> <span class="name title-url">UD POCKET</span></a>
		 							</div>
		 						</div>
		 						<div class="products-mobile-home item">
									<div class="wrap-img"><img class="ud9" alt="ud9 - Endpoint Management Thin Client Tools" src="/wp-content/themes/igel/img/products/ud9-endpoint-management-thin-client-tools.png" /></div>
									<div class="wrap-info">
										<h4 class='title-product'>UD 9 Intel Celeron J1900 quad core processor</h4>
										<p class="info-product">With 2.42GHz of processing power, the UD9 gives quick and easy access to any VDI environment, as well as multimedia and web-based applications.</p>
										<a href="/products-hardware/igel-ud9-universal-desktop-thin-client/" title="UD9 - Endpoint Management Thin Client Tools" class="url-product"><?php echo __('DETAILS ON THE', 'igel');?> <span class="name title-url">UD9</span></a>
		 							</div>
		 						</div>

	 						</div>
						</div>
						<!-- Left and right controls -->
						  <a class="left carousel-control" href="#productsCarousel" role="button" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left left-control" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#productsCarousel" role="button" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right right-control" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div></div></div>
					</div>


					</div>
					</div>
				</section>
				<!-- download section -->
				<section class="download">
					<div class="container"><div class="row">
					<?php
						echo get_field('download');
					?>
					<div class="col-xs-12 centered">
						<a href="<?php echo get_field('download_link'); ?>" title="Download" class="button"><?php echo __('DEMO IT', 'igel'); ?></a>

					</div>
					</div>
					</div>
				</section>

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

		//$("#video-id")[0].muted=0;

		$('.product').on('click', function(){
			product_slide(this);
			
		});

		$('.product-display').on('click', function(){
			var element = $(this).data('product');

			product_slide('#'+element);

		});

		function set_page_active(page){
			$('.product-display').removeClass('active');
			$('#'+page).addClass('active');
		}


		function product_slide(product){
			$moving_elements = $(product).prevAll();

			$hidding_elements = $(product).nextAll();

			var page = $(product).data('page');
			set_page_active(page);
			var title = $(product).data('title'),
				text = $(product).data('text'),
				url= $(product).data('url'),
				title_url =$(product).data('titleurl');

			$('.desktop-title-product').text(title);
			$('.desk-url-title').text(title_url);
			$('.desktop-info-product').text(text);
			$('.desktop-url-product').attr('href', url);

			$that = $(product);
			$(product).nextAll().hide().promise().done(function(){
				    
				    var i = 5;
					var remove_class = $that.attr('class').split(' ').slice(-1);
					$that.removeClass(remove_class[0]).addClass('element-6');
					$moving_elements.each(function(){
						var last_class = $(this).attr('class').split(' ').slice(-1);
						$(this).removeClass(last_class[0]).addClass('element-'+i);
						i--;
					});

					var j=1;
					$hidding_elements.each(function(){
						var last_class = $(this).attr('class').split(' ').slice(-1);
						$(this).removeClass(last_class[0]).addClass('element-'+j);
						j++;
					}).promise().done(function () { 
					   $hidding_elements.show();
					});

			});
		}
	});

</script>
<?php get_footer(); ?>