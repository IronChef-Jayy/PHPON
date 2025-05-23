<?php # Script 12.12 - login.php #4
// This page processes the login form submission.
// The script now stores the HTTP_USER_AGENT value for added security.
// will not log in if there are duplicate users and passwords

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Need two helper files:
	require('includes/login_functions.inc.php');
	require('../mysqli_connect.php');

	// Check the login:
	list ($check, $data) = check_login($dbc, $_POST['email'], $_POST['password']);

	if ($check) { // OK!

		// Set the session data:
		session_start();
		$_SESSION['users_id'] = $data['users_id'];
		$_SESSION['first_name'] = $data['first_name'];
		$_SESSION['user_role'] = $data['user_role'];
		

		// Store the HTTP_USER_AGENT:
		$_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);

		// Redirect:
		redirect_user('loggedin.php');

	} else { // Unsuccessful!

		// Assign $data to $errors for login_page.inc.php:
		$errors = $data;

	}

	mysqli_close($dbc); // Close the database connection.

} // End of the main submit conditional.

// Create the page:
include('includes/login_page.inc.php');
?>