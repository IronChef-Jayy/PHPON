<?php 

include 'navigation.php';

echo "<h1 class='text-6xl text-indigo-500 mt-28 mb-8 mx-24'>Edit Product</h1>";

$product_id = $_GET['id'];


require('../../dbconnect.php'); // use require because we want to force this to exist before running our queries




// checkpoint testing
// echo $users_id;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // check for the post
        // print_r($_POST);

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
            header("Location: list_products.php?msg=ok");
            exit;
            // echo "Record successfully edited"
        } else {
            // failure
            echo "Failed";
        }

    } else {
        // perform a query and fetch the columns to extract data
        $query = "SELECT product_id, product_name, product_description, product_price, status FROM products_tbl WHERE product_id = $product_id";


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
    <title>Edit Users</title>
</head>
<body>



    <form action="edit_products.php" method="post">
        <div class="flex flex-col gap-6 ml-16 mt-20">
            <p>Product ID : <input type="text" name="product-id" class="border border-indigo-500 rounded p-1 w-96" value="<?php echo $row['product_id']; ?>" readonly></p>

            <p>Name : <input type="text" name="product-name" class="border border-indigo-500 rounded p-1 w-96" value="<?php echo $row['product_name']; ?>"></p>

            <label for="product-description">Description:</label>
            <textarea name="product-description" class="border border-indigo-500 rounded p-1 w-96 h-28"><?php echo $row['product_description']; ?></textarea>

            <p>Price : <input type="text" name="product-price" class="border border-indigo-500 rounded p-1 w-28" value="<?php echo $row['product_price']; ?>"></p>

            <p>Status : <input type="text" name="status" class="border border-indigo-500 rounded p-1 w-28" value="<?php echo $row['status']; ?>"></p>
        </div>
        <br />
        <button type="submit" class="ml-16 mb-16 p-2 shadow-2 shadow-indigo-500 bg-indigo-500 rounded text-white text-center">Submit</button>
    </form>
    
</body>
</html>