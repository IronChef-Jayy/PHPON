<!DOCTYPE html>
<html>
<head>
<title>Orders</title>
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

echo "<h1>List of Website Orders</h1>";
//And now to perform a simple query to make sure it's working
$query = "SELECT * FROM order_tbl";
$result = mysqli_query($connection, $query);


echo "
    <table>
        <thead>
            <td class='center'>ID</td>
            <td>Product ID</td>
            <td>Product Name</td>
            <td>User's ID</td>
        </thead>"; // open table and include table headings

        while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <tr>
                <td class='center'>" . $row['order_id'] . "</td>
                <td> " . $row['product_id'] . "</td>
                <td>" . $row['prod_name'] . "</td>
                <td> " . $row['users_id'] . "</td>
            </tr
        >";
        }
    
    echo "</table>"; // close table

?>
</body>
</html>