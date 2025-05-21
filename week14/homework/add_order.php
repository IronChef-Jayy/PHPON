<!Doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<title>Add Orders</title>
</head>
<body>

<div class="menu">
  <?php include 'navigation.php' ?>
</div>

<main>
<section>
<article>
<h1 class="text-6xl text-blue-500 mt-28 mb-8 mx-28">Add Order</h1>

<form action="add_order.php" method="post">

  <div class="flex gap-8 ml-16 mt-12">
    <input type="number" name="product-id" id="product-id" class="border border-blue-500 rounded p-1" placeholder="Product ID Here" value="<?php if (isset($_POST['product-id'])) { print htmlspecialchars($_POST['product-id']); } ?>">

    <input type="text" name="prod-name" id="prod-name" class="border border-blue-500 rounded p-1" placeholder="Product's Name Here" value="<?php if (isset($_POST['prod-name'])) { print htmlspecialchars($_POST['prod-name']); } ?>"></textarea>

    <input type="number" name="users-id" id="users-id" class="border border-blue-500 rounded p-1" placeholder="User Here" value="<?php if (isset($_POST['users-id'])) { print htmlspecialchars($_POST['users-id']); } ?>" >
  </div>

    <br />
    <input type="submit" class="ml-20 p-2 shadow-2 shadow-blue-500 bg-blue-500 rounded text-white text-center mb-16">


<?php



// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $problem = false; // No problems so far. 

  // Check for each value...
  if (empty($_POST['product-id'])) {
    $problem = true;
    print '<p><span class="form-error">Please the product id.</span></p>';
   }

  if (empty($_POST['prod-name'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter a name for this product</span></p>';
   }

  if (empty($_POST['users-id'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter the user id.</span></p>';
  }

  if (!$problem) { // If there weren't any problems...

    // Add order to database

    $productId = $_POST['product-id'];
    $productName = $_POST['prod-name'];
    $customerId = $_POST['users-id'];
    
    require('../../dbconnect.php');

    $sql = "INSERT INTO orders_tbl (product_id, prod_name, customer_id)
    VALUES ('" . $productId . "','" . $productName . "','" . $customerId . "')";

    if (mysqli_query($connection, $sql)) {
     echo '<p><span class="form-success text-blue-500 text-2xl text-bold ml-16">' . 'User ' .  $customerId . ' has ordered a product.</span></p>';
    } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);   

    // Clear the posted values:
    $_POST = [];

  } else { // Forgot a field.
      print '<p><span class="form-error">Please try again!</span></p>';   
  }

} // End of handle form IF.

?>