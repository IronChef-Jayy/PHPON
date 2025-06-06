<?php
ob_start(); // begins output buffering, so any output (like echoed content or headers) is stored in memory until the script ends or until you call ob_end_flush(). ob_end_flush() sends the buffered output to the browser.
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Register User</title>
  </head>

  <body class="bg-green-100">

    <div class="menu">
        <?php 
            include('includes/header.html');
            // include 'navigation.php' 
        ?>
    </div>


    <main>
      <section>
        <article>
          <h1 class="text-6xl text-green-500 mt-28 mb-8 mx-28">Register User</h1>


          <form enctype="multipart/form-data" action="register.php" method="post">

            <div class="flex flex-col gap-6 ml-16 mt-12">

              <input 
                type="text" 
                name="first-name" 
                id="first-name" 
                class="border border-green-500 bg-white rounded p-1 w-96" 
                placeholder="First Name" 
                value="<?php if (isset($_POST['first-name'])) { print htmlspecialchars($_POST['first-name']); } ?>"
              >
      
              <input 
                type="text" 
                name="last-name" 
                id="last-name" 
                class="border border-green-500 bg-white rounded rounded p-1 w-96" 
                placeholder="Last Name" 
                value="<?php if (isset($_POST['last-name'])) { print htmlspecialchars($_POST['last-name']); } ?>"
              >

              <input 
                type="email" 
                name="email" 
                id="email" 
                class="border border-green-500 bg-white rounded rounded p-1 w-96" 
                placeholder="Email" value="<?php if (isset($_POST['email'])) { print htmlspecialchars($_POST['email']); } ?>"
              >
              
              <hr class="text-yellow-500 w-156" >
      
              <p>Enter a Password:</p>
              <input 
                type="password" 
                name="password" 
                id="password" 
                class="border border-green-500 bg-white rounded rounded p-1 w-96" 
                placeholder="password"
              >

              <p>Re-type password:</p>
              <input 
                type="password" 
                name="confirm-password" 
                id="confirm-password" 
                class="border border-green-500 bg-white rounded rounded p-1 w-96" 
                placeholder="password"
              >

              <input 
                type="hidden" 
                name="MAX_FILE_SIZE" 
                value="524288"
              >

              <fieldset class="border border-green-500 p-4 w-156">
                <legend> Select a JPEG or PNG image of 512KB or smaller to be uploaded: </legend>

                <p>
                  <strong>File:</strong> 
                  <input 
                    type="file" 
                    name="upload" 
                    class="rounded-md shadow-sm shadow-gray-200 bg-gray-200 cursor-pointer"
                  >
                </p>
              </fieldset>
            </div>
            
            <br>

            <input 
              type="submit" 
              class="ml-16 mb-16 p-2 shadow-2 shadow-green-500 bg-green-500 rounded text-white text-center cursor-pointer"
            >


            <?php
              $image_name = "";

              // Check if the form has been submitted:
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Check for an uploaded file:
                if (isset($_FILES['upload'])) {

                  // Validate the type. Should be JPEG or PNG.
                  $allowed = ['image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png'];
                    if (in_array($_FILES['upload']['type'], $allowed)) {

                      // Move the file over to new location. will give temp name until moved into files
                      if (move_uploaded_file ($_FILES['upload']['tmp_name'], "user_uploads/{$_FILES['upload']['name']}")) {
                        $image_name = $_FILES['upload']['name'];
                      } // End of move... IF.

                    } else { // Invalid type.
                        echo '<p class="error">Please upload a JPEG or PNG image.</p>';
                    }

                } // End of isset($_FILES['upload']) IF.

                // Check for an error:
                if ($_FILES['upload']['error'] > 0) {
                  echo '<p class="error">The file could not be uploaded because: <strong>';
                  // Print a message based upon the error.
                  switch ($_FILES['upload']['error']) {
                    case 1:
                      print 'The file exceeds the upload_max_filesize setting in php.ini.';
                      break;
                    case 2:
                      print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
                      break;
                    case 3:
                      print 'The file was only partially uploaded.';
                      break;
                    case 4:
                      print 'No file was uploaded.';
                      break;
                    case 6:
                      print 'No temporary folder was available.';
                      break;
                    case 7:
                      print 'Unable to write to the disk.';
                      break;
                    case 8:
                      print 'File upload stopped.';
                      break;
                    default:
                      print 'A system error occurred.';
                      break;
                  } // End of switch.

                  print '</strong></p>';

                } // End of error IF.

                // Delete the temp file if it still exists:
                if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])) {
                  unlink ($_FILES['upload']['tmp_name']);
                }


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

                  require('../mysqli_connect.php');
                  require('includes/login_functions.inc.php');

                  
                  
                  $sql = "INSERT INTO users_tbl (first_name, last_name, email, user_image, password)
                  VALUES ('" . $firstname . "','" . $lastname . "','" . $email . "','" . $image_name . "','" . $password . "')";


                  if (mysqli_query($dbc, $sql)) {

                    list($check, $data) = check_login($dbc, $email, $password);

                    if ($check) {
                        // Login success — set session variables
                        $_SESSION['users_id'] = $data['users_id'];
                        $_SESSION['first_name'] = $data['first_name'];
                        $_SESSION['user_role'] = $data['user_role']; // Important for permission checks!

                        // Store the HTTP_USER_AGENT:
		                    $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);

                        // Redirect to the main page
                        redirect_user('loggedin.php');
                        exit;
                    } else {
                        // Login failed — $data contains errors
                        $errors = $data;
                    }

                    // // Redirect to loggedin.php
                    // redirect_user("Location: loggedin.php");
                    // exit; // Always call exit after header redirect
                    // // echo '<p id="flash-msg"><span class="form-success text-green-500 text-2xl text-bold ml-16">' . $firstname . ' ' . $lastname . ' was added as a New User!</span></p>';

                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
                  }

                  mysqli_close($dbc);
                  // Clear the posted values:
                    $_POST = [];
   

                 
                } else { // Forgot a field.
                  print '<p><span class="form-error">Please try again!</span></p>';   
                }

                 
              

              } // End of the submitted conditional.

            ?>
          </form>
        </article>
      </section>
    </main>
    <?php include('includes/footer.html'); ?>
    <script src="./scripts/flashRedirectMsg.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>