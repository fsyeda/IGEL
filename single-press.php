<?php

get_header();

?>

<div id="content" class="press-release">

	<div id="main" role="main">

	<div class="container-wrapper">
			<div class="clearfix">
				
		        <div id="main" role="main">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<section class="press-content"><div class="container"><div class="row">
						<?php
							//Content
							echo '<div class="col-xs-12 col-md-8">';

							echo '<h1>'.get_the_title().'</h1>';
							echo '<h2>'.get_field('subtitle').'</h2>';

							$pdf = get_field('pdf');
							$doc = get_field('doc');


							if($pdf != '' || $doc != ''){
								echo '<div class="documents">';
								if($pdf != ''){
									$pdf_name = get_field('pdf_name');
									echo '<a href="'.$pdf.'" title="'.$pdf_name.'" target="_blank" class="pdf">'.$pdf_name.'</a>';
								}
								if($doc != ''){
									$doc_name = get_field('doc_name');
									echo '<a href="'.$doc.'" title="'.$doc_name.'" target="_blank" class="doc">'.$doc_name.'</a>';
								}
								echo '</div>';
							}

							echo '<article>'.apply_filters( 'the_content', $post->post_content ).'</article>';

							echo '</div>';
							//Sidebar
							echo '<div class="col-xs-12 col-md-4 sidebar">';
							
							$company_page = get_page_by_title( 'company' );
							$press_contacts = get_field('press_contacts', $company_page->ID);

							echo '<div class="press-contacts">'.$press_contacts.'</div>';
							echo '<div class="subcription-box"><h4>'.__('Subscribe to IGEL News', 'igel').'</h4><a href="#" class="button">'.__('SUBSCRIBE', 'igel').'</a></div>';
								
							echo '</div>';
							
							echo '</div></div></section>';

						?>
						<?php endwhile; ?>
						
					<?php endif; ?>
				</div> <!-- end #main -->
			</div> <!-- end #content -->
		</div>
	<?php get_template_part( '/templates/top-link' ); ?>
	</div>

</div>

<?php get_footer(); ?>