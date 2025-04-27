<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<title>List Users</title>
<style>
td {
width: 250px;
padding: 20px;
}
thead {
font-weight: bold;
font-size: 1.25rem;
color: darkcyan;
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

echo "<h1 class='text-6xl text-green-500 mt-28 mb-8 mx-24'>List of Users</h1>";
//And now to perform a simple query to make sure it's working
$query = "SELECT * FROM users_tbl";
$result = mysqli_query($connection, $query);


echo "<table class='table-auto border-gray-500 shadow-2 shadow-green-500'>
        <thead>
            <td class='center'>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email Address</td>
        </thead>"; // open table and include table headings

        while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td class='center'>" . $row['users_id'] . "</td>
                <td>" . $row['first_name'] . "<td> " . $row['last_name'] . "</td>
                <td> " . $row['email'] . "</td>
              </tr>";
            }
echo "</table>"; // close table

?>
</body>
</html>