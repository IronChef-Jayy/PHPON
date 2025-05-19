<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<title>List Users</title>

</head>
<body class="bg-green-100">



<div class="menu">
  <?php 
    include 'navigation.php';
    include 'redirectMessages.php';
    
  ?>
</div>

<!-- redirect completion message for edit_user.php -->




<?php 
require('../../dbconnect.php'); // use require because we want to force this to exist before running our queries

echo "<h1 class='text-6xl text-green-500 mt-28 mb-8 mx-24'>List of Users</h1>";

showRedirectMessage();
//And now to perform a simple query to make sure it's working
$query = "SELECT * FROM users_tbl";

// $query = "SELECT * FROM users_tbl WHERE status = 'A'
// ";

// for deletion
/* 
// $query = "SELEC users_id, first_name, last_name, email, status FROM users_tbl WHERE status = 'A'";
*/

$result = mysqli_query($connection, $query);




// table customized to use card-similar style
echo "
  <div class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 m-28'>
";

while ($row = mysqli_fetch_assoc($result)) {
    echo "
        <div class='bg-white shadow-md shadow-indigo-200 rounded-lg p-6 h-full flex flex-col'>

            <img src='../lab/uploads/{$row["user_image"]}' alt='Profile Image' width='300' height='300'>

            <h2 class='text-xl font-semibold mb-2'>{$row['first_name']} {$row['last_name']}</h2>

            <p class='text-sm text-gray-600 mb-2'><strong>ID:</strong> {$row['users_id']}</p>

            <p class='mb-2'><strong>Email:</strong> {$row['email']}</p>

            <p class='mb-4'><strong>Status:</strong> {$row['status']}</p>

            <div class='flex gap-2 items-center'>
                <a href='edit_user.php?id={$row['users_id']}' class='mt-auto w-fit bg-green-500 text-white px-4 py-2 rounded hover:bg-green-900'>Edit</a>

                <a href='delete_user.php?id={$row['users_id']}' 
                onclick=\"return confirm('Are you sure you want to delete this user?');\"
                class='mt-auto w-fit bg-red-500 text-white px-4 py-2 rounded hover:bg-red-900'>Delete</a>
            </div>
        </div>
    ";
}

echo "</div>";


?>

<script src="./scripts/flashRedirectMsg.js"></script>
</body>
</html>