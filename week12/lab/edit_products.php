<?php 

echo "<h1 class='text-6xl text-green-500 mt-28 mb-8 mx-24'>Edit Product</h1>";

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
    <title>Edit Users</title>
</head>
<body>

    <form action="edit_products.php" method="post">
        <p>Product ID : <input type="text" name="product-id" value="<?php echo $row['product_id']; ?>" readonly></p>
        <p>Name : <input type="text" name="product-name" value="<?php echo $row['product_name']; ?>"></p>
        <p>Description : <textarea name="product-description"><?php echo $row['product_description']; ?></textarea></p>
        <p>Price : <input type="text" name="product-price" value="<?php echo $row['product_price']; ?>"></p>
        <p>Status : <input type="text" name="status" value="<?php echo $row['status']; ?>"></p>

        <button type="submit">submit</button>
    </form>
    
</body>
</html>