<?php 
    function deleteUser() {
        require('../../dbconnect.php');

        if(isset($_GET['id'])) {
            // intval for sanitation purposes
            $userId = intval($_GET['id']);
            $query = "UPDATE users_tbl SET status = 'I' WHERE users_id = $userId";

            if(mysqli_query($connection, $query)) {
                header("Location: list_users.php?msg=deleted");
                exit;
            } else {
                echo "Error deleting user: " . mysqli_error($connection);
            }

        } else {
            echo "No user ID provided";
        }

    }

    deleteUser();

?>