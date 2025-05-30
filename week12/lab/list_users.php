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

<!-- redirect completion message for edit_user.php -->
<?php 
  if ($_GET['msg']) {
    echo "<p class='bg-green-500' id='flash-msg'>User Successfully Updated!</p>";
  }
?>



<?php 
require('../../dbconnect.php'); // use require because we want to force this to exist before running our queries

echo "<h1 class='text-6xl text-green-500 mt-28 mb-8 mx-24'>List of Users</h1>";
//And now to perform a simple query to make sure it's working
$query = "SELECT * FROM users_tbl";

// for deletion
/* 
// $query = "SELEC users_id, first_name, last_name, email, status FROM users_tbl WHERE status = 'A'";
*/

$result = mysqli_query($connection, $query);


echo "<table class='table-auto border-red-500 shadow-2 shadow-green-500'>
        <thead>
            <td class='center'>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email Address</td>
            <td>Status</td>
            <td>Edit</td>
        </thead>"; // open table and include table headings

        // loop through rows and return data from database and display in table
        while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td class='center'>" . $row['users_id'] . "</td>
                <td>" . $row['first_name'] . "<td> " . $row['last_name'] . "</td>
                <td> " . $row['email'] . "</td>
                <td> " . $row['status'] . "</td>
                <td> " . " <a href='edit_user.php?id=" . $row['users_id'] . "'>Edit</a> </td>
              </tr>";
            }
echo "</table>"; // close table

?>

<script>
  setTimeout(() => {

    const msg = document.getElementById('flash-msg');

    if (msg) msg.style.display = 'none';
  }, 5000);
</script>
</body>
</html>