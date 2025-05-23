<?php

// include 'navigation.php';

echo "<h1 class='text-6xl text-green-500 mt-28 mb-8 text-center'>Edit Users</h1>";

$users_id = $_GET['id'];


require('../mysqli_connect.php'); // use require because we want to force this to exist before running our queries




// checkpoint testing
// echo $users_id;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // check for the post
        // print_r($_POST);

        $image = "";

        if (isset($_FILES['upload'])) {

		    // Validate the type. Should be JPEG or PNG.
		    $allowed = ['image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png'];
		    if (in_array($_FILES['upload']['type'], $allowed)) {

			    // Move the file over to new location. will give temp name until moved into files
			    if (move_uploaded_file ($_FILES['upload']['tmp_name'], "user_uploads/{$_FILES['upload']['name']}")) {
				    echo '<p><em>The file has been uploaded!</em></p>';
                    $image = $_FILES['upload']['name'];
                    echo $image;
			    } // End of move... IF.
		    } else { // Invalid type.
			    echo '<p class="error">Please upload a JPEG or PNG image.</p>';
		    }

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
            if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
                unlink ($_FILES['upload']['tmp_name']);
            }

	    } // End of isset($_FILES['upload']) IF.

        // checkpoint testing
        // echo $update_query;
        // exit('Testing')

        

        // store & execute SQL UPDATE Query
        // add variables from post
        $userid = $_POST['userid'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $status = $_POST['status'];

        // run a SQL UPDATE Query
        $update_query = "
            UPDATE users_tbl
            SET first_name = '$firstname',
            last_name = '$lastname', 
            email = '$email',
            user_image = '$image',
            status = '$status'
            WHERE users_id = '$userid'; 
        ";


        $update_result = mysqli_query($dbc, $update_query);

            if ($update_result) {
                // success and redirect to another page
                // echo "
                //     <h4 class='bg-green-500 text-2xl '>User successfully updated!</h4>
                //     <p><a href='list_users.php'>Return to List</a></p>
                // ";

                // alternative way to re-direct to another page
                header("Location: loggedin.php?msg=ok");
                exit;
                // echo "Record successfully edited"
            } else {
                // failure
                echo "Failed";
            }
    

        } else {
            // perform a query and fetch the columns to extract data
            $query = "SELECT users_id, first_name, last_name, email, user_image, status FROM users_tbl WHERE users_id = $users_id";


            $result = mysqli_query($dbc, $query);
            $row = mysqli_fetch_array($result);


        }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Edit Users</title>
</head>
<body>



    <form enctype="multipart/form-data" action="edit_user.php" method="post">

        <div class="bg-green-100 shadow-lg shadow-green-100 rounded w-156 p-8 mx-auto flex flex-col gap-4">

            <p class="text-gray-400 font-bold cursor-default">User ID : <input type="text" name="userid" class="border-green-500 rounded shadow-sm shadow-green-500 p-1 w-8 text-center text-sm text-gray-600 font-bold cursor-default" value="<?php echo $row['users_id']; ?>" readonly></p>

            <p class="text-xl">First Name : <input type="text" name="firstname" class="border border-green-500 bg-white rounded p-1 w-96" value="<?php echo $row['first_name']; ?>"></p>

            <p class="text-xl">Last Name : <input type="text" name="lastname" class="border border-green-500 bg-white rounded p-1 w-96" value="<?php echo $row['last_name']; ?>"></p>

            <p class="text-xl">Email : <input type="email" name="email" class="border border-green-500 bg-white rounded p-1 w-96" value="<?php echo $row['email']; ?>"></p>
            
            <p class="text-xl">Status : <input type="text" name="status" class="border border-green-500 bg-white rounded p-1 w-10 text-center" value="<?php echo $row['status']; ?>"></p>

            
            <img src='user_uploads/<?php echo $row["user_image"]; ?>' alt='Profile Image' class="mx-auto" width='200' height='200'>

            <input type="hidden" name="MAX_FILE_SIZE" value="524288">

            <fieldset class="border border-green-500 p-6">
                <legend class="p-2"> Upload an image: MAX SIZE 512KB </legend>
                <p>
                    <strong>File:</strong> 
                    <input type="file" name="upload" class="rounded-md shadow-sm shadow-gray-200 bg-gray-200 cursor-pointer">
                </p>
            </fieldset>


            <button type="submit" class="border w-fit mx-auto p-2 shadow-2 shadow-green-500 bg-green-500 rounded text-white text-xl text-center hover:bg-green-900 cursor-pointer">Update</button>
        </div>


        
    </form>
    
</body>
</html>