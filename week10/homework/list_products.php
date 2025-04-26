<!DOCTYPE html>
<html>
<head>
<title>List Products</title>
<style>
td {
width: 100px;
}
thead {
font-weight: bold;
}
.center {
text-align: center;
}

</style>
</head>
<body>

<div class="menu">
  <?php include 'navigation.php' ?>
</div>

<?php
require('../../dbconnect.php');

echo "<h1>List of Products</h1>";

$query = "SELECT * FROM products_tbl";
$result = mysqli_query($connection, $query);


echo "<table>
        <thead>
            <td class='center'>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Price</td>
        </thead>";

        while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td class='center'>" . $row['product_id'] . "</td>
                <td>" . $row['product_name'] . "<td> " . $row['product_description'] . "</td>
                <td> " . $row['product_price'] . "</td>
             </tr>";
            }
echo "</table>";

?>
</body>
</html>