<?php
/*
 * Template Name:	Demoit Download Thank You
*/
?>
<?php get_header(); ?>
<?php while (have_posts()):the_post()?>
<?php	

//start CURL
    $URL = 'https://194.76.156.73:8444/sub/datafactory/evaluation';
    $data = json_encode(array(
		"products" 		=> "SUB_SERVICE_SET_UNIFIED_MANAGEMENT_AGENT", 
		"totalLicenses" => "0"
	));
	
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
    
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json', 
    'Authorization: Basic '.base64_encode('IGELHOMEPAGE:L27ZtzBaB7KxNg6tPXFajD')
    ));   
   

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    
    $file = curl_exec($ch);

    if ($file === FALSE) {
    	echo "curl error: ". curl_error($ch);
    } 
    // else {
    // echo "<pre>";
    // print_r(json_decode ($file));	
    // echo "</pre>";
    // }
    
    curl_close($ch);

    //print_r(json_decode ($file));
    $activationKey = json_decode ($file)->activationKey;

    /////////////////////////

	$title_new_content	=	get_field('title_new_content');
	$description		=	get_field('description');
	$udc_link			=	get_field('udc_link');
	$ums_link			=	get_field('ums_link');
	$viewContent = (isset($_GET['activationKey'])) ? esc_attr($_GET['activationKey']) : '';
	$currentLink = get_permalink();
	if(isset($_POST)){
	$posts	=	$_POST;		

		if($posts && $activationKey){
		//if($posts){
			$firstname		=	isset($posts['firstname'])?$posts['firstname']:'';
			$lastname		=	isset($posts['lastname'])?$posts['lastname']:'';
			$company		=	isset($posts['company'])?$posts['company']:'';
			$email			=	isset($posts['email'])?$posts['email']:'';
			$phone			=	isset($posts['phone'])?$posts['phone']:'';
			$checkbox		=	isset($posts['checkbox'])?$posts['checkbox']:'False';
			$action			=	isset($posts['action'])?$posts['action']:'';
			$country 		= 	isset($posts['country'])?$posts['country']:'';
			
			if(!is_email($email) || !$firstname || !$lastname|| !$company || !$phone || !$country) return false;
			
			/* Create XML Document */
			$xmlDoc = new DOMDocument('1.0');
			
			/* Build Maximizer XML file */
			$xmlRoot = $xmlDoc->createElement('data');
			$xmlDoc->appendChild($xmlRoot);
			//Form Name
			$xmlformname = $xmlDoc->createElement('Formname','Download Form');
			$xmlRoot->appendChild($xmlformname);
			
			$xmlfirstname = $xmlDoc->createElement('Firstname',$firstname);
			$xmlRoot->appendChild($xmlfirstname);
			
			$xmllastname = $xmlDoc->createElement('Lastname',$lastname);
			$xmlRoot->appendChild($xmllastname);

			$xmlcompany = $xmlDoc->createElement('Company',$company);
			$xmlRoot->appendChild($xmlcompany);
			
			$xmlemail = $xmlDoc->createElement('Email',$email);
			$xmlRoot->appendChild($xmlemail);
			
			$xmlphone = $xmlDoc->createElement('Phone',$phone);
			$xmlRoot->appendChild($xmlphone);
			if($posts['country']){
				//Country
				$xmlcountry = $xmlDoc->createElement('Country',$posts['country']);
				$xmlRoot->appendChild($xmlcountry);	
			}
			if($checkbox){
				$xmlterms = $xmlDoc->createElement('Terms',$checkbox);
				$xmlRoot->appendChild($xmlterms);
			}
			
			//********
			//define the receiver of the xml
			$to = 'xmlparser@igel.com';
			$content = chunk_split(base64_encode($xmlDoc->saveXML()));
			$filename = 'download.xml';
			$subject = 'Download XML Form';
			$message = 'Download XML Form';
			// a random hash will be necessary to send mixed content
			$separator = md5(time());
		
			// carriage return type (RFC)
			$eol = "\r\n";
			// main header (multipart mandatory)
			$headers = "From: {$firstname} <no-reply@igel.com>" . $eol;
		
			// message
			$body = $xmlDoc->saveXML();
			$body = strtr($body, array("\n" => ''));

			wp_mail($to, $subject, $body, $headers);			

			$subject2 = "Congratulations! You've Received 3 Free IGEL Software Licenses";
			$fname2	=	"IGEL";
			$femail2 =  "demoit@igel.com";
			//********
			// main header (multipart mandatory)
			$headers2 = "From: {$fname2} <$femail2>" . $eol;
			$headers2 .= "MIME-Version: 1.0" . $eol;
			$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . $eol;
			
			$body2 = "
				<html>
				<head>
				  <title>IGEL Download Software</title>
				</head>
				<body>
				  <p>You're almost there! Follow the steps below to download and activate your free IGEL licenses.</p>
				  <ul>	<ol>1. <a href='".$ums_link."' target='blank'>Download the Universal Management Suite (UMS)</a></ol>
					  	<ol>2. Install the UMS. <a href='http://edocs.igel.com/index.htm#5888.htm' target='_blank'>See instructions</a></ol>
					  	<ol>3. <a href='".$udc_link."' target='blank'>Download the Universal Desktop Converter (UDC)</a> </ol>
					  	<ol>4. Install the UDC3. <a href='http://edocs.igel.com/index.htm#11610.htm' target='_blank'>See instructions</a></ol>
					  	<ol>5. Register your UDC3 machines with UMS. <a href='http://edocs.igel.com/index.htm#9335.htm'>See instructions</a></ol>
					  	<ol>6. Go to <a href='https://activation-dev.igel.com/index.php?id=18&activation_key=".$activationKey ."' target='_blank'>https://activation-dev.igel.com/index.php?id=18&activation_key=".$activationKey ."</a> to activate your software licenses and follow these <a href='http://edocs.igel.com/best_practices/demolicenses/index.htm#12243.htm' target='_blank'>instructions</a></ol>
						<ol>7. Roll Out the licenses using UMS. <a href='http://edocs.igel.com/index.htm#10200794.htm'>See instructions</a></ol>
						<ol>8. After you have activated your software in Step 7 here are the instructions on how to use your software</ol>
						<ol><ul><li><a href='http://edocs.igel.com/index.htm#11758.htm'>Universal Desktop Converter (UDC3) Manual</a></li>
								<li><a href='http://edocs.igel.com/index.htm#5933.htm'>Universal Management Suite (UMS) Manual</a></li></ul>
						</ol>
					</ul><br/><br/>
					<p>Trouble Activating your licenses?</p>
					<p>Contact Customer Care: info@igel.com or +1 954 739 9990</p>
				</body>
				</html>
				";

			wp_mail($email, $subject2, $body2, $headers2);			
			header('Location: '.$currentLink.'?activation_key='.$activationKey);
  			exit;
		}		
	}
?>
<div class="page-one">
	<div class="demo-list3">
		<div class="top">
			<div class="container">
				<div class="content">
					<?php echo $description;?>
 				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile;?>
<?php get_footer(); ?>