

<?php # Script 12.13 - loggedin.php #3
// The user is redirected here from login.php.
session_start(); // Start the session.

// If no session value is present, redirect the user:
// Also validate the HTTP_USER_AGENT!
if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != sha1($_SERVER['HTTP_USER_AGENT']) )) {

	// Need the functions:
	require('includes/login_functions.inc.php');
	redirect_user();

}

// Set the page title and include the HTML header:
$page_title = 'Logged In!';
include('includes/header.html');

// Print a customized message:
echo "
	<h1>Logged In!</h1>
	<p>You are now logged in, {$_SESSION['first_name']}!</p>
	<div>
		<p><a href=\"logout.php\">Logout</a></p>
		<p><a href=\"list_products.php\">Products</a></p>
	</div>";
	

echo var_dump($_SESSION);

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
	echo "The role is " . $_SESSION['user_role'];
} else if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'customer') {
	echo $_SESSION['first_name'] . " has no permissions as a " . $_SESSION['user_role'];
}

echo "<h2>Profile:</h2>";

require('../mysqli_connect.php');
$users_id = $_SESSION['users_id'];


$query = "SELECT users_id, first_name, last_name, email, user_image, status FROM users_tbl WHERE users_id = $users_id";

$result = mysqli_query($dbc, $query);
$data = mysqli_fetch_array($result);


echo "
  <div class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 m-28'>
  <div class='bg-white shadow-md shadow-indigo-200 rounded-lg p-6 h-full flex flex-col'>

            <img src='user_uploads/{$data["user_image"]}' alt='Profile Image' width='300' height='300'>

            <h2 class='text-xl font-semibold mb-2'>{$data['first_name']} {$data['last_name']}</h2>

            <p class='text-sm text-gray-600 mb-2'><strong>ID:</strong> {$data['users_id']}</p>

            <p class='mb-2'><strong>Email:</strong> {$data['email']}</p>

            <p class='mb-4'><strong>Status:</strong> {$data['status']}</p>

			
            <div class='flex gap-2 items-center'>

                <a href='edit_user.php?id={$data['users_id']}' class='mt-auto w-fit bg-green-500 text-white px-4 py-2 rounded hover:bg-green-900'>Edit</a>

                <a href='delete_user.php?id={$data['users_id']}' 
                onclick=\"return confirm('Are you sure you want to delete your account?');\"
                class='mt-auto w-fit bg-red-500 text-white px-4 py-2 rounded hover:bg-red-900'>Delete</a>
            </div>
        </div>
	</div>
";












include('includes/footer.html');
?>