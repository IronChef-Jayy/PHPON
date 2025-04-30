<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<title>Orders</title>
<style>
td {
width: 250px;
padding: 20px;
}
thead {
font-weight: bold;
font-size: 1.25rem;
color: blue;
}
.center {
text-align:center;
}

</style>
</head>
<body>
    
<div class="menu">
  <?php include 'navigation.php' ?>
</div>

<?php 
require('../../dbconnect.php'); // use require because we want to force this to exist before running our queries

echo "<h1 class='text-6xl text-blue-500 mt-28 mb-8 mx-24'>List of Orders</h1>";
//And now to perform a simple query to make sure it's working
$query = "SELECT order_id, products_tbl.product_id, prod_name, product_price, first_name, last_name, email
FROM users_tbl 
INNER JOIN orders_tbl 
ON users_tbl.users_id = orders_tbl.customer_id
INNER JOIN products_tbl
ON orders_tbl.product_id = products_tbl.product_id";
$result = mysqli_query($connection, $query);


echo "
    <table class='table-auto border-gray-500 shadow-2 shadow-blue-500'>
        <thead>
            <td class='center'>Order ID</td>
            <td>Product ID</td>
            <td>Product Name</td>
            <td>Price</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
        </thead>"; // open table and include table headings

        while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <tr>
                <td class='center'>" . $row['order_id'] . "</td>
                <td> " . $row['product_id'] . "</td>
                <td>" . $row['prod_name'] . "</td>
                <td> " . '$' . $row['product_price'] . "</td>
                <td> " . $row['first_name'] . "</td>
                <td> " . $row['last_name'] . "</td>
                <td> " . $row['email'] . "</td>
            </tr
        >";
        }
    
    echo "</table>"; // close table

?>
</body>
</html>