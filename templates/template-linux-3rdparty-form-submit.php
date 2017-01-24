<?php
/*
 * Template Name: Linux 3rd Party Form
 */
?>
<?php get_header(); ?>
<?php while (have_posts()):the_post()?>
<div class="page-one">
<?php
$data			=	isset($_POST) ? $_POST : '';

if($data){
	
	//$to = 'devicerequest@igel.com';
	$to = 'fana@hellonextstep.com';
	/* Create XML Document */
	$xmlDoc = new DOMDocument('1.0');
	
	/* Build Maximizer XML file */
	$xmlRoot = $xmlDoc->createElement('data');
	//Form Name
	$xmlname = $xmlDoc->createElement('Formname', 'Linux 3rd Party');
	$xmlRoot->appendChild($xmlname);
	$xmlDoc->appendChild($xmlRoot);
	//Name
	$xmlname = $xmlDoc->createElement('Name',$data['fullname']);
	$xmlRoot->appendChild($xmlname);
	//Company
	$xmlcompany = $xmlDoc->createElement('Company',$data['company']);
	$xmlRoot->appendChild($xmlcompany);
	//Email
	$xmlemail = $xmlDoc->createElement('Email',$data['email']);
	$xmlRoot->appendChild($xmlemail);
	//Category
	$xmlcategory = $xmlDoc->createElement('Category',$data['category_name']);
	$xmlRoot->appendChild($xmlcategory);
	//Manufacturer
	$xmlmanufacturer = $xmlDoc->createElement('Manufacturer',$data['manu_name']);
	$xmlRoot->appendChild($xmlmanufacturer);
	//Product
	$xmlproduct = $xmlDoc->createElement('Product',$data['product_name']);
	$xmlRoot->appendChild($xmlproduct);
	//Testsignal
	$xmltestsignal = $xmlDoc->createElement('Testsignal',$data['testsignal']);
	$xmlRoot->appendChild($xmltestsignal);	
	//Firmware
	$xmlfirmware = $xmlDoc->createElement('Firmware',$data['firmware']);
	$xmlRoot->appendChild($xmlfirmware);	
	//Comment
	$xmlcomment = $xmlDoc->createElement('Comment',$data['comment']);
	$xmlRoot->appendChild($xmlcomment);	
	//Limitation
	$xmllimitation = $xmlDoc->createElement('Limitation',$data['limitation']);
	$xmlRoot->appendChild($xmllimitation);	
	//Hint
	$xmlhint = $xmlDoc->createElement('Hint',$data['hint']);
	$xmlRoot->appendChild($xmlhint);
	//********
	//define the receiver of the email
	$to = 'fana@hellonextstep.com';
	$content = chunk_split(base64_encode($xmlDoc->saveXML()));
	$filename = 'myfile.xml';
	$subject = 'Linux 3rd Party';
	// a random hash will be necessary to send mixed content
	$separator = md5(time());

	// carriage return type (RFC)
	$eol = "\r\n";
	$fname = $data['fullname'];
	$eol = "\r\n";

	// main header (multipart mandatory)
	$headers = "From: {$fname} <no-reply@igel.com>" . $eol;
	
	// message
	$body = $xmlDoc->saveXML();
	$body = strtr($body, array("\n" => ''));

	wp_mail($to, $subject, $body,$headers);
	//********
	$fname2	=	"IGEL";
	//$femail2="devicerequest@igel.com";
	$femail2="fana@hellonextstep.com";
	$subject2 = 'Linux 3rd Party xml';
	// main header (multipart mandatory)
	$headers2 = "From: {$fname2} <no-reply@igel.com>" . $eol;
	$headers2 .= "MIME-Version: 1.0" . $eol;
	$headers2 .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
	$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . $eol;
	$body2 = "
				<html>
				<head>
					<title>IGEL Linux 3rd Party</title>
				</head>
					<body>
					  <p>Thank you for sending us your test result.</p>
					<p>The submitted data is now going to be verified from an IGEL employee. In case of any open questions, you will be contacted by email. </p>
					<p>After successful verification your test results will be published. You won´t receive any further notification about. </p>
					<br/>
					<p>Thank you very much,<p>
					<p>Your IGEL Team<p>
					</body>
				</html>
				";

	
	wp_mail($data['email'], $subject2, $body2, $headers2); 
}
?>
	<div class="container linux-3rd-party-thankyou">
		<h2><?//php the_title();?></h2>
		<span>Dear <?php echo $data['fullname'];?></span>
		<div class="dud-col-12">
			<?php the_content();?>
		</div>
		<h5 class="read_more"><a href="<?php echo site_url() . '/linux-3rd-party-hardware-database/' ;?>" class="load_more">BACK</a></h5>
	</div>
</div>
<?php endwhile;?>
<?php get_footer(); ?>