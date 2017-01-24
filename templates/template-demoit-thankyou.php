<?php
/*
 * Template Name: Demoit Thank You
 */
?>
<?php get_header(); ?>
<?php while (have_posts()):the_post()?>
<?php 
	$img_icon	=	get_field('icon_image');
	$viewContent = false;	
	$currentLink = get_permalink();
?>
<?php
if(isset($_POST)){
	$data =	$_POST;
	
	$firstname	=	isset($data['firstname'])?$data['firstname']:'';
	$lastname	=	isset($data['lastname'])?$data['lastname']:'';
	$company	=	isset($data['company'])?$data['company']:'';
	$email	=	isset($data['email'])?$data['email']:'';
	$phone	=	isset($data['phone'])?$data['phone']:'';
	$optiondate1 = isset($data['optiondate1'])?$data['optiondate1']:'';
	$optiondate2 = isset($data['optiondate2'])?$data['optiondate2']:'';
	$optiontime1 = isset($data['optiontime1'])?$data['optiontime1']:'';
	$optiontime2 = isset($data['optiontime2'])?$data['optiontime2']:'';
	$optionzone1 = isset($data['optionzone1'])?$data['optionzone1']:'';
	$optionzone2 = isset($data['optionzone2'])?$data['optionzone2']:'';
	$country = isset($data['country'])?$data['country']:'';
	$checkbox = isset($data['checkbox'])?$data['checkbox']:'';

	if($firstname && $lastname && $company && is_email($email) && $phone && $country && $checkbox){

	/* Create XML Document */
	$xmlDoc = new DOMDocument('1.0');
	
	/* Build Maximizer XML file */
	$xmlRoot = $xmlDoc->createElement('data');
	$xmlDoc->appendChild($xmlRoot);
	//Form Name
	$xmlformname = $xmlDoc->createElement('Formname','Demo it');
	$xmlRoot->appendChild($xmlformname);
	//Firstname
	$xmlfirstname = $xmlDoc->createElement('Firstname',$data['firstname']);
	$xmlRoot->appendChild($xmlfirstname);
	//Last name
	$xmllastname = $xmlDoc->createElement('Lastname',$data['lastname']);
	$xmlRoot->appendChild($xmllastname);
	//Company
	$xmlcompany = $xmlDoc->createElement('Company',$data['company']);
	$xmlRoot->appendChild($xmlcompany);
	//Email
	$xmlemail = $xmlDoc->createElement('Email',$data['email']);
	$xmlRoot->appendChild($xmlemail);
	//Phone
	$xmlphone = $xmlDoc->createElement('Phone',$data['phone']);
	$xmlRoot->appendChild($xmlphone);
	if($data['country']){
		//Country
		$xmlcountry = $xmlDoc->createElement('Country',$data['country']);
		$xmlRoot->appendChild($xmlcountry);	
	}
	if($data['checkbox']){
		//checkbox
		$xmlcheckbox = $xmlDoc->createElement('Terms',$data['checkbox']);
		$xmlRoot->appendChild($xmlcheckbox);
	}
	
	
	//OptionDate1
	$xmloptiondate1 = $xmlDoc->createElement('OptionDate1',$data['optiondate1']);
	$xmlRoot->appendChild($xmloptiondate1);
	//OptionDate2
	$xmloptiondate2 = $xmlDoc->createElement('OptionDate2',$data['optiondate2']);
	$xmlRoot->appendChild($xmloptiondate2);
	//OptionTime1
	$xmloptiontime1 = $xmlDoc->createElement('OptionTime1',$data['optiontime1']);
	$xmlRoot->appendChild($xmloptiontime1);
	//OptionTime2
	$xmloptiontime2 = $xmlDoc->createElement('OptionTime2',$data['optiontime2']);
	$xmlRoot->appendChild($xmloptiontime2);
	//OptionZone1
	$xmloptionzone1 = $xmlDoc->createElement('OptionZone1',$data['optionzone1']);
	$xmlRoot->appendChild($xmloptionzone1);
	//Optionzone2
	$xmloptionzone2 = $xmlDoc->createElement('OptionZone2',$data['optionzone2']);
	$xmlRoot->appendChild($xmloptionzone2);
	
	
	//********
	//define the receiver of the email
	$to = 'xmlparser@igel.com';
	$content = chunk_split(base64_encode($xmlDoc->saveXML()));
	$filename = 'demofile.xml';
	$subject = 'Demo';
	$fname = $data['firstname'];
	//$message = 'My message';
	// a random hash will be necessary to send mixed content
	$separator = md5(time());

	// carriage return type (RFC)
	$eol = "\r\n";

	// main header (multipart mandatory)
	$headers = "From: {$fname} <no-reply@igel.com>" . $eol;
	
	// message
	$body = $xmlDoc->saveXML();
	$body = strtr($body, array("\n" => ''));

	wp_mail($to, $subject, $body, $headers);

	//********
	$fname2	=	"IGEL";
	$subject2 = "Thank you for Requesting a Demo";
	$femail2= $data['email'];

	// main header (multipart mandatory)
	$headers2 = "From: {$fname2} <no-reply@igel.com>" . $eol;
	$headers2 .= "MIME-Version: 1.0" . $eol;
	$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . $eol;
	$body2 = "
				<html>
				<head>
				  <title>IGEL Demo</title>
				</head>
				<body>
				  <p>Thank you for contacting IGEL. An IGEL rep will contact you to confirm your demo time. We have sent them your requested times below.</p>
				  <p>".$data['optiondate1'] ." ".$data['optiontime1']." ".$data['optionzone1']."</p>
				  <p>".$data['optiondate2'] ." ".$data['optiontime2']." ".$data['optionzone2']."</p>
				  <br/>
				  <p>Curious to see how much you can save with IGEL? Try out our <a href='https://igeltech.wpengine.com/roi-calculator/' target='_blank'>ROI Calculator</a></p>
				</body>
				</html>
				";
	wp_mail($femail2, $subject2, $body2, $headers2); 
	?>
		<form id="theForm" method="post" action="<?php echo esc_url($currentLink)?>">
			<input type="hidden" value="<?php echo esc_attr($firstname)?>" name="firstname">
			<input type="hidden" value="<?php echo esc_attr($lastname)?>" name="lastname">
			<input type="hidden" value="<?php echo esc_attr($company)?>" name="company">
			<input type="hidden" value="<?php echo esc_attr($email)?>" name="email">
			<input type="hidden" value="<?php echo esc_attr($phone)?>" name="phone">
			<input type="hidden" value="<?php echo esc_attr($country) ?>" name="country">
			<input type="hidden" value="<?php echo esc_attr($optiondate1)?>" name="optiondate1">
			<input type="hidden" value="<?php echo esc_attr($optiondate2)?>" name="optiondate2">
			<input type="hidden" value="<?php echo esc_attr($optiontime1)?>" name="optiontime1">
			<input type="hidden" value="<?php echo esc_attr($optiontime2)?>" name="optiontime2">
			<input type="hidden" value="<?php echo esc_attr($optionzone1)?>" name="optionzone1">
			<input type="hidden" value="<?php echo esc_attr($optionzone2)?>" name="optionzone2">
		</form>
		<script type="text/javascript">
		document.getElementById('theForm').submit();
		</script>
		<?php
  		exit;
	}elseif ($firstname && $lastname && $company && is_email($email) && $phone){
		$viewContent = true;
	}
}
?>
<?php if($viewContent):?>
<div class="page-one">
	<div class="demo-list2">
		<div class="top">
			<div class="container">
				<div class="title">
					<h2><?php the_field('title_top');?></h2>
					<span><?php the_field('description_top');?></span>
				</div>
				<div class="file">
					<div class="content">
						<img src="<?php echo $img_icon['url']; ?>"/>
						<?php if($data){?>
							<div class="text">
								<p>OPTION 1</p>
								<p><?php echo $data['optiondate1'];?> at <?php echo $data['optiontime1'];?> <?php echo $data['optionzone1'];?></p>
							</div>
							<div class="text">
								<p>OPTION 2</p>
								<p><?php echo $data['optiondate2'];?> at <?php echo $data['optiontime2'];?> <?php echo $data['optionzone2'];?></p>
							</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<div class="bot">
			<div class="container">
				<h2><?php the_field('title_bot');?></h2>
				<span><?php the_field('description_bot');?></span>
				<form action="<?php echo site_url() . '/demoit-download-thankyou/' ;?>" method="post">
					<input type="hidden" value="<?php echo esc_attr($firstname)?>" name="firstname">
					<input type="hidden" value="<?php echo esc_attr($lastname)?>" name="lastname">
					<input type="hidden" value="<?php echo esc_attr($company)?>" name="company">
					<input type="hidden" value="<?php echo esc_attr($email)?>" name="email">
					<input type="hidden" value="<?php echo esc_attr($phone)?>" name="phone">
					<input type="hidden" value="<?php echo $country ?>" name="country">
					<input type="submit" value="DOWNLOAD" class="load_more">
				</form>
			</div>
		</div>
	</div>
</div>
<?php endif;?>
<?php endwhile;?>
<?php get_footer(); ?>