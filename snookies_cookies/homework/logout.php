<?php # Script 12.11 - logout.php #2
// This page lets the user logout.
// This version uses sessions.

session_start(); // Access the existing session.

// If no session variable exists, redirect the user:
if (!isset($_SESSION['users_id'])) {

	// Need the functions:
	require('includes/login_functions.inc.php');
	redirect_user();

} else { // Cancel the session:

	$_SESSION = []; // Clear the variables.
	session_destroy(); // Destroy the session itself.
	setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.

}

// Set the page title and include the HTML header:
$page_title = 'Logged Out!';
include('includes/header.html');

// Print a customized message:
echo "
	<h1 class='text-4xl mt-28 mb-2 mx-8'>Thanks for visiting!</h1>
	<p class='text-xl mx-8'>You are now logged off!</p>
";

include('includes/footer.html');
?>