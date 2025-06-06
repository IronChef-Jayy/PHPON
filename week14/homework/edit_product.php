<?php 

include 'navigation.php';

echo "<h1 class='text-6xl text-center text-indigo-500 mt-28 mb-8'>Edit Product</h1>";

$product_id = $_GET['id'];


require('../../dbconnect.php'); // use require because we want to force this to exist before running our queries




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
			    if (move_uploaded_file ($_FILES['upload']['tmp_name'], "productphotos/{$_FILES['upload']['name']}")) {
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


        // add variables from post
        $productID = $_POST['product-id'];
        $productName = $_POST['product-name'];
        $productDescription= $_POST['product-description'];
        $productPrice = $_POST['product-price'];
        $status = $_POST['status'];

        // run a SQL UPDATE Query
        $update_query = "
            UPDATE products_tbl
            SET product_name = '$productName',
            product_description = '$productDescription', 
            product_price = '$productPrice',
            product_image = '$image',
            status = '$status'
            WHERE product_id = '$productID'; 
        ";

        // checkpoint testing
        // echo $update_query;
        // exit('Testing')

        // store & execute SQL UPDATE Query
        $update_result = mysqli_query($connection, $update_query);

        if ($update_result) {
            // success and redirect to another page
            // echo "
            //     <h4 class='bg-green-500 text-2xl '>User successfully updated!</h4>
            //     <p><a href='list_users.php'>Return to List</a></p>
            // ";

            // alternative way to re-direct to another page
            header("Location: list_products.php?msg=product_updated");
            exit;
            // echo "Record successfully edited"
        } else {
            // failure
            echo "Failed";
        }

    } else {
        // perform a query and fetch the columns to extract data
        $query = "SELECT product_id, product_name, product_description, product_price, product_image, status FROM products_tbl WHERE product_id = $product_id";


        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Edit Product</title>
</head>
<body>



    <form enctype="multipart/form-data" action="edit_product.php" method="post" class="">

        <div class="bg-indigo-100 shadow-lg shadow-indigo-100 rounded w-156 p-8 mx-auto flex flex-col gap-6">

            <p class="text-gray-400 font-bold cursor-default">
                Product ID : 
                <input type="text" name="product-id" class="border-indigo-500 rounded shadow-sm shadow-indigo-500 p-1 w-8 text-center text-sm text-gray-600 font-bold cursor-default" value="<?php echo $row['product_id']; ?>" readonly>
            </p>

            <img src='productphotos/<?php echo $row["product_image"]; ?>' alt='Profile Image' class="mx-auto" width='200' height='200'>

            <input type="hidden" name="MAX_FILE_SIZE" value="524288">

            <fieldset class="border border-indigo-500 p-6">
                <legend class="p-2"> Upload an image: MAX SIZE 512KB </legend>
                <p>
                    <strong>File:</strong> 
                    <input type="file" name="upload" class="rounded-md shadow-sm shadow-gray-200 bg-gray-200 cursor-pointer">
                </p>
            </fieldset>

            <p class="text-xl">
                <strong>Name: </strong> 
                <input type="text" name="product-name" class="border-b-1 shadow border-indigo-500 shadow-indigo-500 rounded p-1 w-80" value="<?php echo $row['product_name']; ?>"> 
                
            </p>


            <div class="flex flex-col gap-2">
                <label for="product-description"><strong class="text-xl">Description:</strong></label>

                <textarea 
                    name="product-description" 
                    id="product-description" 
                    class="border-indigo-500 rounded shadow-sm shadow-indigo-500 p-2 w-96 h-36 text-xl mx-auto"> <?php echo $row['product_description']; ?> 
                </textarea>

            </div>
                
            <p class="text-xl"><strong>Price:</strong> $<input type="text" name="product-price" class="border-b-1 border-indigo-500 shadow-sm shadow-indigo-500 rounded p-1 w-16" value="<?php echo $row['product_price']; ?>"></p>

            <p class="text-xl"><strong>Status:</strong> <input type="text" name="status" class="border-b-1 border-indigo-500 shadow-sm shadow-indigo-500 rounded p-1 w-28" value="<?php echo $row['status']; ?>"></p>

            <br />

            <button type="submit" class="p-2 shadow-2 shadow-indigo-500 bg-indigo-500 rounded text-white text-center text-xl hover:bg-indigo-900 cursor-pointer ">Save Changes</button>

        </div>
    </form>
</body>
</html>