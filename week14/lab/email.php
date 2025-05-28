<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Contact Me</title>
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100">
<h1 class="text-6xl text-center text-blue-500 my-16">Contact Me</h1>
<?php # Script 11.1 - email.php

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Minimal form validation:
	if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comments']) ) {

		// Create the body:
		$body = "Name: {$_POST['name']}\n\nComments: {$_POST['comments']}";

		// can create the body with html since we set the html headers below

		// $body = "<p>{$_POST['name']}<br>EMAIL: {$_POST['email]}</p>;"

		// Make it no longer than 70 characters long:
		$body = wordwrap($body, 70);

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <no-reply@ironchefjayy.com>' . "\r\n";
		$headers .= 'Cc: ironchefjayy@gmail.com' . "\r\n";

		

		// Send the email:
		// mail('your_email@example.com', 'Contact Form Submission', $body, "From: {$_POST['email']}");

        mail('class@webdevlearning.org', 'Contact Form Submission',"From: {$_POST['email']}", $body, $headers);



		// Print a message:
		echo '<p><em>Thank you for contacting me. I will reply some day.</em></p>';

		// Clear $_POST (so that the form's not sticky):
		$_POST = [];

	} else {
		echo '<p style="font-weight: bold; color: #C00">Please fill out the form completely.</p>';
	}

} // End of main isset() IF.

// Create the HTML form:
?>
<p class="text-xl text-center font-semibold">Please fill out this form to contact me.</p>
<form action="email.php" method="post">
	<div class="inputs-container flex flex-col items-center p-8 gap-4">

		<input type="text" name="name" size="30" maxlength="60" class="border shadow-lg shadow-gray-300 rounded-md p-1" placeholder="Name:" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">


		<input type="email" name="email" size="30" maxlength="80" class="border shadow-lg shadow-gray-300 rounded-md p-1" placeholder="Email Address:" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">


		<textarea class="border shadow-lg shadow-gray-300 rounded-md p-1" name="comments" rows="8" cols="40"  placeholder="Comments:"><?php if (isset($_POST['comments'])) echo $_POST['comments']; ?></textarea>


		<input type="submit" name="submit" class="border shadow-lg shadow-gray-300 rounded-md p-2 bg-blue-500 text-xl text-white hover:bg-blue-900 cursor-pointer" value="Send!">

	</div>
	
</form>
</body>
</html>