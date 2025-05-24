<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <title>Add Product</title>
    </head>

    <body class="bg-indigo-100">

        <div class="menu">
            <?php include 'navigation.php' ?>
        </div>

        <main>
            <section>
                <article>
                    <h1 class="text-6xl text-indigo-500 mt-28 mb-8 mx-28">Add Product</h1>

                    <form enctype="multipart/form-data" action="add_product.php" method="post">

                        <div class="flex flex-col gap-8 ml-16 mt-12">
                            <input
                                type="text" 
                                name="product-name" 
                                id="product-name" 
                                class="border border-indigo-500 bg-white rounded p-1 w-96"
                                placeholder="Product Name Here" 
                                value="<?php if (isset($_POST['product-name'])) { print htmlspecialchars($_POST['product-name']); } ?>"
                            >

                            <textarea name="product-description" id="product-description" class="border border-indigo-500 bg-white rounded p-1 w-96 h-28" placeholder="Description" value="<?php if (isset($_POST['product-description'])) { print htmlspecialchars($_POST['product-description']); } ?>"></textarea>

                            <input 
                                type="number" 
                                name="product-price" 
                                id="product-price" 
                                class="border border-indigo-500 bg-white rounded p-1 w-28" placeholder="Price" 
                                value="<?php if (isset($_POST['product-price'])) { print htmlspecialchars($_POST['product-price']); } ?>" max="1000" step="0.01"
                            >

                            <input 
                                type="hidden" 
                                name="MAX_FILE_SIZE" 
                                value="524288"
                            >

                            <fieldset class="border border-indigo-500 p-6 w-156">
                                <legend class="p-2"> Select a JPEG or PNG image of 512KB or smaller to be uploaded: </legend>

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

                        <br />

                        <input 
                            type="submit" 
                            class="ml-16 mb-16 p-2 shadow-2 shadow-indigo-500 bg-indigo-500 rounded text-white text-center cursor-pointer hover:bg-indigo-900"
                            value="Add Product"
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
                            
                                        }// End of move... IF.

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

                                    $sql = "INSERT INTO products_tbl (product_name, product_description, product_price, product_image)
                                    VALUES ('" . $productName . "','" . $productDescription . "','" . $productPrice . "','" . $image_name . "')";

                                    if (mysqli_query($connection, $sql)) {
                                    echo '<p id="flash-msg"><span class="form-success text-indigo-500 text-2xl text-bold ml-16">' . $productName . ' added as a new product.</span></p>';
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
                    </form>
                </article>
            </section>
        </main>
        <script src="./scripts/flashRedirectMsg.js"></script>
    </body>
</html>