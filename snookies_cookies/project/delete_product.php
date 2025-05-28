<?php 
    function deleteProduct() {
        require('../mysqli_connect.php');
        session_start();
        if (isset($_GET['id'])) {
            $productId = intval($_GET['id']);
            $query = "UPDATE products_tbl SET status = 'OOS' WHERE product_id = $productId";

            if (mysqli_query($dbc, $query)) {
                
                    header("Location: list_products.php?msg=product_deleted");
                    exit;
                
            } else {
                echo "Failed. Error deleting product: " . mysqli_error($dbc);
            }
 
        } else {
            echo "No product ID provided";
        }
    }


    deleteProduct();

?>