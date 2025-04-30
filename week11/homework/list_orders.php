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
$query = "SELECT * FROM order_tbl";
$result = mysqli_query($connection, $query);


echo "
    <table class='table-auto border-gray-500 shadow-2 shadow-blue-500'>
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