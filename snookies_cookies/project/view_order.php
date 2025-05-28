<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<title>List Orders</title>

</head>
<body class="bg-blue-100">
    
<div class="menu">
  <?php
    session_start(); // Start the session.
    include('includes/header.html');
    // include 'navigation.php';
    // include 'redirectMessages.php';
    
  ?>
</div>

<?php 
require('../mysqli_connect.php'); // use require because we want to force this to exist before running our queries
require('includes/login_functions.inc.php');

// send back to login if not logged in
if (!isset($_SESSION['users_id'])) {
    redirect_user(); 
}

echo "<h1 class='text-4xl mt-20 mb-6 text-blue-600 text-center'>Your Order History</h1>";

// showRedirectMessage();

$users_id = $_SESSION['users_id'];
$page_title = "Your Orders";


//And now to perform a simple query to make sure it's working
$order_query = "SELECT order_id, products_tbl.product_id, prod_name, product_price, users_id, first_name, last_name, email, product_image, user_image FROM users_tbl INNER JOIN orders_tbl ON users_tbl.users_id = orders_tbl.customer_id INNER JOIN products_tbl ON orders_tbl.product_id = products_tbl.product_id WHERE customer_id = $users_id;";

$result = mysqli_query($dbc, $order_query);

if (mysqli_num_rows($result) > 0) {
    // table customized to use card-similar style
    echo "
        <div class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 m-28'>
    ";

    while ($order = mysqli_fetch_assoc($result)) {
        echo "
            <div class='bg-white shadow-md shadow-green-200 rounded-lg p-6 h-full flex flex-col'>

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
        echo "<p class='text-xl font-semibold ml-8'>You have no orders.</p>";
    }




include 'includes/footer.html';
?>
<!-- <script src="./scripts/flashRedirectMsg.js"></script> -->
</body>
</html>