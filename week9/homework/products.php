<!DOCTYPE html>
<html>
<head>
<title>Products</title>
<style>
td {
width: 100px;
}
thead {
font-weight: bold;
}
.center {
text-align:center;
}

</style>
</head>
<body>
<?php 
require('../../dbconnect.php'); // use require because we want to force this to exist before running our queries

echo "<h1>List of Website Products</h1>";
//And now to perform a simple query to make sure it's working
$query = "SELECT * FROM products_tbl";
$result = mysqli_query($connection, $query);


echo "
    <table>
        <thead>
            <td class='center'>ID</td>
            <td>Product Name</td>
            <td>Product Description</td>
            <td>Product Price</td>
        </thead>"; // open table and include table headings

        while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <tr>
                <td class='center'>" . $row['product_id'] . "</td>
                <td>" . $row['product_name'] . "</td>
                <td> " . $row['product_description'] . "</td>
                <td> " . $row['product_price'] . "</td>
            </tr
        >";
        }
    
    echo "</table>"; // close table

?>
</body>
</html>