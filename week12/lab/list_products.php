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
  <?php 
    include 'navigation.php';
    include 'redirectMessages.php';

    showProductRedirectMessage();
  ?>
</div>


<!-- redirect completion message for edit_user.php -->




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
            <td>Status</td>
            <td>Edit</td>
        </thead>"; // open table and include table headings

        // loop through rows and return data from database and display in table
        while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td class='center'>" . $row['product_id'] . "</td>
                <td>" . $row['product_name'] . "<td> " . $row['product_description'] . "</td>
                <td> " . '$' . $row['product_price'] . "</td>
                <td> " . $row['status'] . "</td>
                <td> " . "<a href='edit_products.php?id=" . $row['product_id'] . "'>Edit</a> </td>
             </tr>";
            }
echo "</table>";


/* MOVE ON TO THIS METHOD of displaying tabular data:

// Starting echo statement
echo "
    <div class='text-indigo-500 ' >
        <table>
            <thead>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Price</td>
                <td>Status</td>
                <td>Edit</td>
            </thead>
            <tbody>
";

// Jump out of echo statement - (While Loop has to breathe outside of echo statement)
while ($row = mysqli_fetch_assoc($result)) {
    // Curly Braces are a cleaner way to write without concatenation. Tells PHP to evaluate the array element within a string
    // Concatenation is more flexible in complex cases
    echo "
        <tr>
            <td> {$row['product_id']} </td>
            <td> {$row['product_name']}</td>
            <td> {$row['product_description']}</td>
            <td> {$row['product_price']}</td>
            <td> {$row['status']}</td>
            <td><a href='edit_products.php?id={$row['product_id']}'>Edit</a></td>
        </tr>
    ";
}

// Jump back in echo statement to close the tags
echo "
        </tbody>
    </table>
</div>
";

*/

?>
<script src="./scripts/flashRedirectMsg.js"></script>
</body>
</html>