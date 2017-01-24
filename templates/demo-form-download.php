<?php
/*
 * Template Name:	Demo Form Download
 */
?>
<?php
$data			=	$_POST;

if($data){
	
	$to = 'fana@hellonextstep.com';
	/* Create XML Document */
	$xmlDoc = new DOMDocument('1.0');
	
	/* Build Maximizer XML file */
	$xmlRoot = $xmlDoc->createElement('data');
	$xmlDoc->appendChild($xmlRoot);
	//fullname
	$xmlfullname = $xmlDoc->createElement('Fullname',$data['fullname']);
	$xmlRoot->appendChild($xmlfullname);
	//company
	$xmlcompany = $xmlDoc->createElement('Company',$data['company']);
	$xmlRoot->appendChild($xmlcompany);
	//email
	$xmlemail = $xmlDoc->createElement('Email',$data['email']);
	$xmlRoot->appendChild($xmlemail);
	//phone
	$xmlphone = $xmlDoc->createElement('Phone',$data['phone']);
	$xmlRoot->appendChild($xmlphone);
	if($data['country']){
		//country
		$xmlcountry = $xmlDoc->createElement('Country',$data['country']);
		$xmlRoot->appendChild($xmlcountry);	
	}
	if($data['checkbox']){
		//checkbox
		$xmlcheckbox = $xmlDoc->createElement('Checkbox',$data['checkbox']);
		$xmlRoot->appendChild($xmlcheckbox);
	}
	//optiondate1
	$xmloptiondate1 = $xmlDoc->createElement('OptionDate1',$data['optiondate1']);
	$xmlRoot->appendChild($xmloptiondate1);
	//optiondate2
	$xmloptiondate2 = $xmlDoc->createElement('OptionDate2',$data['optiondate2']);
	$xmlRoot->appendChild($xmloptiondate2);
	//optiontime1
	$xmloptiontime1 = $xmlDoc->createElement('OptionTime1',$data['optiontime1']);
	$xmlRoot->appendChild($xmloptiontime1);
	//optiontime2
	$xmloptiontime2 = $xmlDoc->createElement('OptionTime2',$data['optiontime2']);
	$xmlRoot->appendChild($xmloptiontime2);
	//optionzone1
	$xmloptionzone1 = $xmlDoc->createElement('OptionZone1',$data['optionzone1']);
	$xmlRoot->appendChild($xmloptionzone1);
	//optionzone2
	$xmloptionzone2 = $xmlDoc->createElement('OptionZone2',$data['optionzone2']);
	$xmlRoot->appendChild($xmloptionzone2);
	
	
	//********
	//define the receiver of the email
	$to = 'fana@hellonextstep.com';
	$content = chunk_split(base64_encode($xmlDoc->saveXML()));
	$filename = 'myfile.xml';
	$subject = 'Demo Form';
	$message = 'My message';
	// a random hash will be necessary to send mixed content
	$separator = md5(time());

	// carriage return type (RFC)
	$eol = "\r\n";
	$fname = $data['fullname'];
	$femail = $data['email'];
	// main header (multipart mandatory)
	$headers = "From: {$fname} <{$femail}>" . $eol;
	$headers .= "MIME-Version: 1.0" . $eol;
	$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
	$headers .= "Content-Transfer-Encoding: 7bit" . $eol;
	$headers .= "This is a MIME encoded message." . $eol;

	// message
	$body = "--" . $separator . $eol;
	$body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
	$body .= "Content-Transfer-Encoding: 8bit" . $eol;
	$body .= $message . $eol;

	// attachment
	$body .= "--" . $separator . $eol;
	$body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
	$body .= "Content-Transfer-Encoding: base64" . $eol;
	$body .= "Content-Disposition: attachment" . $eol;
	$body .= $content . $eol;
	$body .= "--" . $separator . "--";
	//********
	$fname2	=	"Igeltech";
	$femail2="fana@hellonextstep.com";
	// main header (multipart mandatory)
	$headers2 = "From: {$fname2} <{$femail2}>" . $eol;
	$headers2 .= "MIME-Version: 1.0" . $eol;
	$headers2 .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
	$headers2 .= "Content-Transfer-Encoding: 7bit" . $eol;
	$headers2 .= "This is a MIME encoded message." . $eol;

	wp_mail($to, $subject, $body,$headers);
	wp_mail($data['email'], $subject, "Thank you, here are your requested dates",$headers2);

}
?>
<script>
	alert('We will send Demo version!');
</script>