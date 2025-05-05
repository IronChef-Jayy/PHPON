<?php 

echo "<h1 class='text-6xl text-green-500 mt-28 mb-8 mx-24'>Edit Users</h1>";

$users_id = $_GET['id'];


require('../../dbconnect.php'); // use require because we want to force this to exist before running our queries




// checkpoint testing
// echo $users_id;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // check for the post
        // print_r($_POST);

        // add variables from post
        $userid = $_POST['userid'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $status = $_POST['status'];

        // run a SQL UPDATE Query
        $update_query = "
            UPDATE users_tbl
            SET first_name = '$firstname',
            last_name = '$lastname', 
            email = '$email',
            status = '$status'
            WHERE users_id = '$userid'; 
        ";

        // checkpoint testing
        // echo $update_query;
        // exit('Testing')

        // store & execute SQL UPDATE Query
        $update_result = mysqli_query($connection, $update_query);

        if ($update_result) {
            // success and redirect to another page
            // echo "
            //     <h4 class='bg-green-500 text-2xl '>User successfully updated!</h4>
            //     <p><a href='list_users.php'>Return to List</a></p>
            // ";

            // alternative way to re-direct to another page
            header("Location: list_users.php?msg=ok");
            exit;
            // echo "Record successfully edited"
        } else {
            // failure
            echo "Failed";
        }

    } else {
        // perform a query and fetch the columns to extract data
        $query = "SELECT users_id, first_name, last_name, email, status FROM users_tbl WHERE users_id = $users_id";


        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
</head>
<body>

    <form action="edit_user.php" method="post">
        <p>User ID : <input type="text" name="userid" value="<?php echo $row['users_id']; ?>" readonly></p>
        <p>First Name : <input type="text" name="firstname" value="<?php echo $row['first_name']; ?>"></p>
        <p>Last Name : <input type="text" name="lastname" value="<?php echo $row['last_name']; ?>"></p>
        <p>Email : <input type="email" name="email" value="<?php echo $row['email']; ?>"></p>
        <p>Status : <input type="text" name="status" value="<?php echo $row['status']; ?>"></p>

        <button type="submit">submit</button>
    </form>
    
</body>
</html>