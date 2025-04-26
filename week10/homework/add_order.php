<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Orders</title>
</head>
<body>

<div class="menu">
  <?php include 'navigation.php' ?>
</div>

<main>
<section>
<article>
<h1>Add Order</h1>

<form action="add_order.php" method="post">
    <input type="number" name="product-id" id="product-id" placeholder="Product ID Here" value="<?php if (isset($_POST['product-id'])) { print htmlspecialchars($_POST['product-id']); } ?>">

    <input type="text" name="prod-name" id="prod-name" placeholder="Product's Name Here" value="<?php if (isset($_POST['prod-name'])) { print htmlspecialchars($_POST['prod-name']); } ?>"></textarea>

    <input type="number" name="users-id" id="users-id" placeholder="User Here" value="<?php if (isset($_POST['users-id'])) { print htmlspecialchars($_POST['users-id']); } ?>" >
    

    <br />
    <input type="submit">
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
    $usersId = $_POST['users-id'];
    
    require('../../dbconnect.php');

    $sql = "INSERT INTO order_tbl (product_id, prod_name, users_id)
    VALUES ('" . $productId . "','" . $productName . "','" . $usersId . "')";

    if (mysqli_query($connection, $sql)) {
     echo '<p><span class="form-success">' . $usersId . ' has ordered a product.</span></p>';
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