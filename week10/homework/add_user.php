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
<h1 class="text-6xl text-green-500 mt-28 mb-8 mx-28">Add User</h1>


<form action="add_user.php" method="post">
  <div class="flex flex-col gap-8 ml-16 mt-12">
    <input type="text" name="first-name" id="first-name" class="border border-green-500 rounded p-1 w-96" placeholder="First Name" value="<?php if (isset($_POST['first-name'])) { print htmlspecialchars($_POST['first-name']); } ?>">
    
    <input type="text" name="last-name" id="last-name" class="border border-green-500 rounded p-1 w-96" placeholder="Last Name" value="<?php if (isset($_POST['last-name'])) { print htmlspecialchars($_POST['last-name']); } ?>">
    <input type="email" name="email" id="email" class="border border-green-500 rounded p-1 w-96"  placeholder="Email" value="<?php if (isset($_POST['email'])) { print htmlspecialchars($_POST['email']); } ?>"><hr class="text-yellow-500" />
    
    <p>Enter a Password:</p>
    <input type="password" name="password" id="password" class="border border-green-500 rounded p-1 w-96" placeholder="password">
    <p>Re-type password:</p>
    <input type="password" name="confirm-password" id="confirm-password" class="border border-green-500 rounded p-1 w-96" placeholder="password">
    
  </div>
  <br>

  <input type="submit" class="ml-16 mb-16 p-2 shadow-2 shadow-green-500 bg-green-500 rounded text-white text-center">


<?php

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $problem = false; // No problems so far. 

  // Check for each value...
  if (empty($_POST['first-name'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter your first name.</span></p>';
   }

  if (empty($_POST['last-name'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter your last name.</span></p>';
   }

  if (empty($_POST['email'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter your email address.</span></p>';
  }

  if (empty($_POST['password'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter a password!</span></p>';
  }

  if ($_POST['password'] != $_POST['confirm-password']) {
    $problem = true;
    print '<p><span class="form-error">Your password did not match your confirmed password!</span></p>';
   } 

  if (!$problem) { // If there weren't any problems...

    // Add user to database

    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    require('../../dbconnect.php');

    


    $sql = "INSERT INTO users_tbl (first_name, last_name, email, password)
    VALUES ('" . $firstname . "','" . $lastname . "','" . $email . "','" . $password . "')";

    if (mysqli_query($connection, $sql)) {
     echo '<p><span class="form-success text-green-500 text-2xl text-bold ml-16">' . $firstname . ' ' . $lastname . ' was added as a new user.</span></p>';
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