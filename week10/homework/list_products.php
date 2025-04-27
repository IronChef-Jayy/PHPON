<!DOCTYPE html>
<html>
<head>
<title>List Products</title>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<style>
td {
width: 250px;
padding: 20px;
}
thead {
font-weight: bold;
font-size: 1.25rem;
color: rebeccapurple;
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

echo "<h1 class='text-6xl text-indigo-500 mt-28 mb-8 mx-24'>List of Products</h1>";

$query = "SELECT * FROM products_tbl";
$result = mysqli_query($connection, $query);


echo "<table class='table-auto border-gray-500 shadow-2 shadow-indigo-500'>
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
                <td> " . '$' . $row['product_price'] . "</td>
             </tr>";
            }
echo "</table>";

?>
</body>
</html>