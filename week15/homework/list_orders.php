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

echo "<h1 class='text-6xl text-blue-500 mt-28 mb-8 mx-24'>List of Orders</h1>";

// showRedirectMessage();



//And now to perform a simple query to make sure it's working
$query = "SELECT order_id, products_tbl.product_id, prod_name, product_price, users_id, first_name, last_name, email, product_image, user_image FROM users_tbl INNER JOIN orders_tbl ON users_tbl.users_id = orders_tbl.customer_id INNER JOIN products_tbl ON orders_tbl.product_id = products_tbl.product_id;";

$result = mysqli_query($dbc, $query);


// table customized to use card-similar style
echo "
  <div class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 m-28'>
";

while ($row = mysqli_fetch_assoc($result)) {
  if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
    echo "
        <div class='bg-white shadow-md shadow-green-200 rounded-lg p-6 h-full flex flex-col'>

            <h2 class='text-center text-blue-500 text-3xl'>Order Information</h2>
            <p class='text-sm text-gray-600 text-center mb-2'><strong>Order ID:</strong> {$row['order_id']}</p>

            <hr />


            <p class='font-bold text-xl'>Product Information</p>
            <p class='text-sm text-gray-600 mb-2'><strong>Product ID:</strong> {$row['product_id']}</p>
            <img src='productphotos/{$row["product_image"]}' alt='Product Image' width='200' height='200'>
            <h2 class='text-xl font-semibold mb-2'>{$row['prod_name']}</h2>
            <p><strong>Price:</strong> \${$row['product_price']}</p>


            <hr />

            <p class='font-bold text-xl'>Customer Information:</p>
            <p class='text-sm text-gray-600 mb-2'><strong>User ID:</strong> {$row['users_id']}</p>
            <p class='mb-2'><strong>{$row['first_name']} {$row['last_name']}</strong> </p>
            <img src='productphotos/{$row["user_image"]}' alt='Product Image' width='200' height='200'>
            <p class='mb-4'><strong>Email:</strong> {$row['email']}</p>


            <div class='flex gap-2 items-center'>

                <a href='edit_order.php?id={$row['order_id']}' class='mt-auto w-fit bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-900'>Edit</a>

                <a href='delete_order.php?id={$row['order_id']}' 
                onclick=\"return confirm('Are you sure you want to delete this product?');\"
                class='mt-auto w-fit bg-red-500 text-white px-4 py-2 rounded hover:bg-red-900'>Delete</a>

            </div>


        </div>
    ";
  } else {
    echo "
        <div class='bg-white shadow-md shadow-green-200 rounded-lg p-6 h-full flex flex-col'>

            <h2 class='text-center text-blue-500 text-3xl'>Order Information</h2>
            <p class='text-sm text-gray-600 text-center mb-2'><strong>Order ID:</strong> {$row['order_id']}</p>

            <hr />


            <p class='font-bold text-xl'>Product Information</p>
            <p class='text-sm text-gray-600 mb-2'><strong>Product ID:</strong> {$row['product_id']}</p>
            <img src='productphotos/{$row["product_image"]}' alt='Product Image' width='200' height='200'>
            <h2 class='text-xl font-semibold mb-2'>{$row['prod_name']}</h2>
            <p><strong>Price:</strong> \${$row['product_price']}</p>


            <hr />

            <p class='font-bold text-xl'>Customer Information:</p>
            <p class='text-sm text-gray-600 mb-2'><strong>User ID:</strong> {$row['users_id']}</p>
            <p class='mb-2'><strong>{$row['first_name']} {$row['last_name']}</strong> </p>
            <img src='user_uploads/{$row["user_image"]}' alt='User Image' width='200' height='200'>
            <p class='mb-4'><strong>Email:</strong> {$row['email']}</p>

        </div>
    ";
  }
}

echo "</div>";

include 'includes/footer.html';
?>
<!-- <script src="./scripts/flashRedirectMsg.js"></script> -->
</body>
</html>