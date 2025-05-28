<?php # Script 12.1 - login_page.inc.php
// This page prints any errors associated with logging in
// and it creates the entire login page, including the form.

// Include the header first:
$page_title = 'Login';
include('includes/header.html');

// Print any error messages, if they exist:
if (isset($errors) && !empty($errors)) {
	echo '
		<h1 class="text-xl text-red-500 font-bold mt-16">Error!</h1>
		<p class="error text-red-500">The following error(s) occurred:<br>';
		foreach ($errors as $msg) {
		echo " <strong> - $msg</strong><br>\n";
	}
	echo '</p><p class="text-red-500">Please try again.</p>';
}

// Display the form:
?>




<div class="form-container border border-slate-200 bg-gray-100 shadow-lg shadow-gray-200 rounded-md p-20 my-16 mx-auto w-fit">
	<h1 class="text-5xl mt-10 mb-12 text-center">Login</h1>
	<form action="login.php" method="post" class="flex flex-col gap-6 ">
		<input type="email" name="email" class="border border-slate-300 p-1 rounded-md shadow-lg shadow-slate-400" size="30" maxlength="60" placeholder="Email Address:">

		<input type="password" name="password" class="border border-slate-300 p-1 rounded-md shadow-lg shadow-slate-400" size="30" maxlength="20" placeholder="Password">

		<input type="submit" name="submit" class="mx-auto w-fit p-2 border border-slate-400 rounded-md shadow-lg shadow-slate-400 bg-blue-300 text-xl text-pink-500 cursor-pointer hover:bg-blue-900" value="Login">
	</form>
</div>


<?php include('includes/footer.html'); ?>