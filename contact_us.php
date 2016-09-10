<?php
	$page_title = 'Contact Us';
	require_once('includes/page_parts/header.php');
?>
			<div id="contactPage" class="page">
				<h1 class="pageTitle">Contact Us</h1>
				<p>
					We highly value any questions or comments. To reach us, leave a message below. Thanks!
				</p>
				<div id="contactForm">
					<form id="contactFormInner" action="mailto:bev5@duke.edu" method="post" enctype="text/plain">
						<strong>Name:</strong> <br><input type="text" name="name"><br><br>
						<strong>Employer:</strong> <br><input type="text" name="employer"><br><br>
						<strong>Email:</strong> <br><input type="text" name="email"><br><br>
						<strong>Your Message:</strong> <br><textarea rows="4" cols="50"></textarea><br><br>
						<input type="submit" value="Send Message">
					</form>
				</div>
			</div>
<?php require_once("includes/page_parts/footer.php");?>
