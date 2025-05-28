

<?php # Script 12.13 - loggedin.php #3
// The user is redirected here from login.php.
session_start(); // Start the session.
include 'redirectMessages.php';

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
	<h1 class='text-4xl mt-16 mb-4'>Welcome, {$_SESSION['first_name']} !</h1>
	<div class='quik-nav flex gap-6 mx-8'>
		<p class='hover:text-green-400 hover:font-semibold'><a href=\"logout.php\">Logout</a></p>
        <p class='hover:text-blue-400 hover:font-semibold'><a href=\"view_order.php\">Order History</a></p>
		<p class='hover:text-indigo-400 hover:font-semibold'><a href=\"list_products.php\">Products</a></p>
        
	</div>";
	
// check for session information
// echo var_dump($_SESSION);

// permission check
// if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
// 	echo "You are  " . $_SESSION['user_role'];
// } else if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'customer') {
// 	echo $_SESSION['first_name'] . " has no permissions as a " . $_SESSION['user_role'];
// }



require('../mysqli_connect.php');
$users_id = $_SESSION['users_id'];


$query = "SELECT users_id, first_name, last_name, email, user_image, status FROM users_tbl WHERE users_id = $users_id";

$result = mysqli_query($dbc, $query);
$data = mysqli_fetch_array($result);

$order_query = "SELECT order_id, products_tbl.product_id, prod_name, product_price, users_id, first_name, last_name, email, product_image, user_image FROM users_tbl INNER JOIN orders_tbl ON users_tbl.users_id = orders_tbl.customer_id INNER JOIN products_tbl ON orders_tbl.product_id = products_tbl.product_id WHERE customer_id = $users_id;";


$order_result = mysqli_query($dbc, $order_query);

echo "


    <div class='bg-white shadow-md shadow-indigo-200 rounded-lg p-6 h-full w-fit   flex flex-col mx-8 my-16'>
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
	
";


if (mysqli_num_rows($order_result) > 0) {

    

    echo "
        <h2 class='text-4xl text-center text-blue-700 mt-28 mb-8'>Recent Orders:</h2>
        <div class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 m-6 mb-28'>";
        while ($order = mysqli_fetch_assoc($order_result)) {
            echo "
            <div class='bg-white shadow-md shadow-blue-200 rounded-lg p-6 h-full flex flex-col'>

                <h2 class='text-center text-blue-500 text-3xl'>Order Information</h2>
                <p class='text-sm text-gray-600 text-center mb-2'><strong>Order ID:</strong> {$order['order_id']}</p>

                <hr />

                <p class='mt-4 font-bold text-xl text-indigo-500'>Product Information</p>
                <p class='text-sm text-gray-600 mb-2'><strong>Product ID:</strong> {$order['product_id']}</p>
                <img src='product_uploads/{$order["product_image"]}' alt='Product Image' width='200' height='200'>
                <h2 class='text-xl font-semibold mb-2'>{$order['prod_name']}</h2>
                <p class='mb-4'><strong>Price:</strong> \${$order['product_price']}</p>

                <hr />

                <p class='mt-4 font-bold text-xl text-green-500'>Customer Information:</p>
                <p class='text-sm text-gray-600 mb-2'><strong>User ID:</strong> {$order['users_id']}</p>
                <p class='mb-2'><strong>{$order['first_name']} {$order['last_name']}</strong> </p>
                <img src='user_uploads/{$order["user_image"]}' alt='User Image' width='200' height='200'>
                <p class='mb-4'><strong>Email:</strong> {$order['email']}</p>

            </div>";
    }
    echo "</div>";
} else {
    echo "
        <h2 class='text-4xl text-center text-blue-700 mt-16 mb-8'>Recent Orders:</h2>
        <p class='mb-16 text-xl font-semibold'>You have no orders.</p>
    ";
}
    














include('includes/footer.html');
?>