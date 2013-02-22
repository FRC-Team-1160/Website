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
	
		if(!isset($hasError)) {
			$emailTo = get_option('tz_email');
			if (!isset($emailTo) || ($emailTo == '') ){
				$emailTo = get_option('admin_email');
			}
			$subject = '[Titanium Robotics] Contact Form Submission From '.$name;
			$body = "Titanium Robotics Contact Form Submission:\n\n\n\nName\n\n$name\n\nEmail\n\n$email\n\nComments\n\n$comments";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
	
			wp_mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}

	}
?>
<?php get_header(); ?>
<div id="contents">
	<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post"><div class="post-content">
					<?php
					if ( has_post_thumbnail() ) {
						echo '<div class="thumbnail"><div class="drop-shadow curved curved-hz-1"><div class="featured">';
						the_post_thumbnail();
						echo '</div></div></div>';
					}
					else {
							
					}
					?>
<div class="entry">
<fieldset><legend>
<?php the_title(); ?></legend></fieldset>
<?php the_content();?>
<div class="clear"></div>
					<div class="entry-content">
						<?php if(isset($emailSent) && $emailSent == true) { ?>
							<div class="thanks">
								<p>Thanks, your email was sent successfully.</p>
							</div>
						<?php } else { ?>
							<?php if(isset($hasError) || isset($captchaError)) { ?>
								<p class="error">Sorry, an error occured: please check the fields with error messages.<p>
							<?php } ?>

<p style="font-size:1.3em; font-weight:100; color: #0054A3">Contact Titanium Robotics!</p>
<p style="color:red; font-weight:bold; font-size:small;"><sup>*</sup> &mdash; required</p>
<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
							<ul class="contactform">
							<li>
			<label for="contactName">Name<sup style="color:red; font-weight:bold">*</sup></label>
								<?php if($nameError != '') { ?>
									<span class="error"><?=$nameError;?></span>
								<?php } ?>
			<input type="text" required="required" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" placeholder="Mr. Roboto" class="required requiredField" />
							</li>

							<li>
			<label for="email">Email<sup style="color:red; font-weight:bold">*</sup></label>
								<?php if($emailError != '') { ?>
									<span class="error"><?=$emailError;?></span>
								<?php } ?>
			<input type="email" required="required" name="email" id="email" placeholder="domoarigato@mr-roboto.com" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
							</li>

							<li>
			<label for="commentsText">Message<sup style="color:red; font-weight:bold">*</sup></label>
								<?php if($commentError != '') { ?>
									<span class="error"><?=$commentError;?></span>
								<?php } ?>
			<textarea name="comments" required="required" id="commentsText" rows="8" placeholder="Dear Titanium Robotics. . ."
		class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
							</li>

							<li>
							<button type="submit">Submit</button>
							</li>
						</ul>
						<input type="hidden" name="submitted" id="submitted" value="true" />
					</form>
				<?php } ?>
<?php edit_post_link('edit'); ?>
<div class="clear"></div>
<?php endwhile; ?>
<?php endif; ?>
</div>
</div></div>
</div>
<?php get_footer(); ?>