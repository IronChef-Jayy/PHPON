<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<title>Connect to MySQL</title>
</head>
<body>

<div class="menu">
  <?php include 'navigation.php' ?>
</div>

<main>
<section>
<article>
<h1 class="text-6xl text-indigo-500 mt-28 mb-8 mx-28">Add Product</h1>

<form action="add_product.php" method="post">
  <div class="flex flex-col gap-8 ml-16 mt-12">
    <input type="text" name="product-name" id="product-name" class="border border-indigo-500 rounded p-1 w-96" placeholder="Product Name Here" value="<?php if (isset($_POST['product-name'])) { print htmlspecialchars($_POST['product-name']); } ?>">

    <textarea name="product-description" id="product-description" class="border border-indigo-500 rounded p-1 w-96 h-28" placeholder="Description" value="<?php if (isset($_POST['product-description'])) { print htmlspecialchars($_POST['product-description']); } ?>"></textarea>

    <input type="number" name="product-price" id="product-price" class="border border-indigo-500 rounded p-1 w-28" placeholder="Price" value="<?php if (isset($_POST['product-price'])) { print htmlspecialchars($_POST['product-price']); } ?>" max="1000" step="0.01">
  </div>
    <br />
    <input type="submit" class="ml-16 mb-16 p-2 shadow-2 shadow-indigo-500 bg-indigo-500 rounded text-white text-center">
<?php



// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $problem = false; // No problems so far. 

  // Check for each value...
  if (empty($_POST['product-name'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter a product name.</span></p>';
   }

  if (empty($_POST['product-description'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter a description for this product</span></p>';
   }

  if (empty($_POST['product-price'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter a price.</span></p>';
  }

  if (!$problem) { // If there weren't any problems...

    // Add order to database

    $productName = $_POST['product-name'];
    $productDescription = $_POST['product-description'];
    $productPrice = $_POST['product-price'];
    
    require('../../dbconnect.php');

    $sql = "INSERT INTO products_tbl (product_name, product_description, product_price)
    VALUES ('" . $productName . "','" . $productDescription . "','" . $productPrice . "')";

    if (mysqli_query($connection, $sql)) {
     echo '<p><span class="form-success text-indigo-500 text-2xl text-bold ml-16">' . $productName . ' added as a new product.</span></p>';
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