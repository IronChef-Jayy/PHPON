<!DOCTYPE html>
<html>
<head>
<title>List Users</title>
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

<div class="menu">
  <?php include 'navigation.php' ?>
</div>


<?php 
require('../../dbconnect.php'); // use require because we want to force this to exist before running our queries

echo "<h1>List of Website Users</h1>";
//And now to perform a simple query to make sure it's working
$query = "SELECT * FROM users_tbl";
$result = mysqli_query($connection, $query);


echo "<table>
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