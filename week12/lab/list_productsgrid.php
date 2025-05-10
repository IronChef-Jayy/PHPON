<!DOCTYPE html>
<html>
<head>
<title>List Products</title>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-indigo-100">

<div class="menu">
  <?php 
    include 'navigation.php';
    include 'redirectMessages.php';

    showProductRedirectMessage();
  ?>
</div>


<!-- redirect completion message for edit_products.php -->



<?php
require('../../dbconnect.php');

echo "<h1 class='text-6xl text-indigo-500 mt-28 mb-8 mx-24'>List of Products</h1>";

$query = "SELECT * FROM products_tbl";
$result = mysqli_query($connection, $query);


// table customized to use card-similar style
echo "
  <div class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 m-28'>
";

while ($row = mysqli_fetch_assoc($result)) {
    echo "
        <div class='bg-white shadow-md shadow-indigo-200 rounded-lg p-6 h-full flex flex-col'>

            <h2 class='text-xl font-semibold mb-2'>{$row['product_name']}</h2>

            <p class='text-sm text-gray-600 mb-2'><strong>ID:</strong> {$row['product_id']}</p>

            <p class='mb-2'><strong>Description:</strong> {$row['product_description']}</p>

            <p class='mb-2'><strong>Price:</strong> \${$row['product_price']}</p>

            <p class='mb-4'><strong>Status:</strong> {$row['status']}</p>

            <a href='edit_products.php?id={$row['product_id']}' class='mt-auto w-fit bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-900'>Edit</a>
        </div>
    ";
}

echo "</div>";

?>
<script src="./scripts/flashRedirectMsg.js"></script>
</body>
</html>