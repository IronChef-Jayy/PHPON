<?php 
    function deleteProduct() {
        require('../../dbconnect.php');

        if(isset($_GET['id'])) {
            // intval for sanitation purposes
            $productId = intval($_GET['id']);
            $query = "UPDATE products_tbl SET status = 'OOS' WHERE product_id = $productId";

            if(mysqli_query($connection, $query)) {
                header("Location: list_products.php?msg=product_deleted");
                exit;
            } else {
                echo "Error deleting product: " . mysqli_error($connection);
            }

        } else {
            echo "No user ID provided";
        }

    }

    deleteProduct();

?>