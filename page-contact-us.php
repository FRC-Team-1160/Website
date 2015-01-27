<?php
/*
Template Name: Contact
*/
?>

<?php
//The error codes will only be used if the browser doesn't natively support the "Required" attribute tag for input types because the browser does it upon clicking submit, while PHP refreshes the page first.
	if(isset($_POST['submitted'])) {
		if(trim($_POST['contactName']) === '') {
			$nameError = 'Please enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}

		if(trim($_POST['email']) === '')  {
			$emailError = 'Please enter a valid email address.';
			$hasError = true;
		} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		if(trim($_POST['comments']) === '') {
			$commentError = 'Please enter a message.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
				$topic = trim($_POST['topic']);

		if(!isset($hasError)) {
			$emailTo = get_option('tz_email');
			if (!isset($emailTo) || ($emailTo == '') ){
				$emailTo = get_option('admin_email');
			}
			$subject = $topic;
			$body = "Titanium Robotics Contact Form Submission:\n\n\n\nName\n\n" . $name . "\n\nEmail\n\n" . $email . "\n\nMessage\n\n" . $comments;
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

			wp_mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}

	}
?>
<?php get_header(); ?>

<div class="contents">
	<?php require('loop.php');
	get_required_files(); ?>
<?php get_footer(); ?>