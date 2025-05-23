<?php 
    function deleteUser() {
        require('../mysqli_connect.php');

        if(isset($_GET['id'])) {
            // intval for sanitation purposes
            $userId = intval($_GET['id']);
            $query = "UPDATE users_tbl SET status = 'I' WHERE users_id = $userId";

            if(mysqli_query($dbc, $query)) {
                header("Location: index.php?msg=deleted");
                exit;
            } else {
                echo "Error deleting user: " . mysqli_error($dbc);
            }

        } else {
            echo "No user ID provided";
        }

    }

    deleteUser();

?>