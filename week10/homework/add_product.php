<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Connect to MySQL</title>
</head>

<body>
<main>
<section>
<article>
<h1>Add Product</h1>


<form action="add_product.php" method="post">
    <input type="text" name="product-name" id="product-name" placeholder="Product Name Here" value="<?php if (isset($_POST['product-name'])) { print htmlspecialchars($_POST['product-name']); } ?>">

    <textarea name="product-description" id="product-description" placeholder="Description" value="<?php if (isset($_POST['product-description'])) { print htmlspecialchars($_POST['product-description']); } ?>"></textarea>

    <input type="number" name="product-price" id="product-price" placeholder="Price" value="<?php if (isset($_POST['product-price'])) { print htmlspecialchars($_POST['product-price']); } ?>" max="1000" step="0.01">
    
    <br />
    <input type="submit">
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
     echo '<p><span class="form-success">' . $productName . ' added as a new product.</span></p>';
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