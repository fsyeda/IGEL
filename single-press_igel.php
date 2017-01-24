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
							echo '<div class="link-back"><a href="/press" class="back-link" title="Events">'.__('< back to all Press', 'igel').'</a></div>';

							echo '<h1>'.get_the_title().'</h1>';
							echo '<h2>'.get_field('subtitle').'</h2>';

							$pdf = get_field('pdf');
							$doc = get_field('doc');
							$pdf2 = get_field('pdf_2');


							if($pdf != '' || $doc != '' || $pdf2 != ''){
								echo '<div class="documents">';
								if($pdf != ''){
									$pdf_name = get_field('pdf_name');
									echo '<a href="'.$pdf.'" title="'.$pdf_name.'" target="_blank" class="pdf">'.$pdf_name.'</a>';
								}
								if($doc != ''){
									$doc_name = get_field('doc_name');
									echo '<a href="'.$doc.'" title="'.$doc_name.'" target="_blank" class="doc">'.$doc_name.'</a>';
								}
								if($pdf2 != ''){
									$pdf2_name = get_field('pdf_2_name');
									echo '<a href="'.$pdf2.'" title="'.$pdf2_name.'" target="_blank" class="pdf">'.$pdf2_name.'</a>';
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
							echo '<div class="subcription-box newsletter-form"><h4>'.__('Subscribe to IGEL News', 'igel').'</h4>
							<form id="subscribe-newsletter" action="#">
                            <div class="input-group">
                              <label for="customer"><input type="checkbox" name="customer" /> Customer</label>
                              <label for="partner"><input type="checkbox" name="partner" /> Partner</label>
                            </div>
                            <div class="input-group email-submit">
                              <input type="text" name="email" placeholder="Your Email" />
                              <input type="submit" value="submit" />
                            </div>
                          </form>
							</div>';
								
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