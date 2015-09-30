<?php
	/*email: iscofisu@gmail.com password: 15c-20is*/
	$type = $_POST['type'];
	$person = $_POST['name'];
	$email = $_POST['email'];
	$question = $_POST['text'];

	if($person == "" || $email == "" || $question == "" || $type == ""){
		echo "fail";
		exit;
	}

	/*Recipient below will get email no matter what kind of type the form is*/
	$recipient = "rashid14@iastate.edu";

	$from = 'From: ISC of ISU website Mailer<iscofisu@gmail.com>';
	$subject = "";
	$body = "";
	switch ($type) {
		case 'contact-contact_simple':
			//add Adli $recipient .= ','.'example@example.com';
			//$recipient .= ", adlishah@iastate.edu";
			$subject = "Someone contacted you through ISC's website";
			$body="Hello ISC Officer,\n\n$person filled up a sponsorship form through the ISC's website.\nHis or her comment/question is: $question";
			break;
		case 'contact-sponsor':
			//add Adli
			$subject = "Someone contacted you regarding Sponsorship through ISC's website";
			$body="Hello ISC Officer,\n\n$person filled up a contact form through the ISC's website.\nHis or her comment/question is: $question";
			break;
		default:
			echo "fail";
			exit;
			break;
	}

	$body = $body . "\n\nPlease contact him or her if necessary through this email provided by him or her: $email";
	
	if(!mail($recipient, $subject, $body, $from))
    {
    	echo "fail";
    	exit;
    }
    else
    {
    	echo "success";
    	exit;
    }

?>