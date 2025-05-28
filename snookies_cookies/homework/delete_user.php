<?php 
    function deleteUser() {
        require('../mysqli_connect.php');
        session_start();
        if(isset($_GET['id'])) {
            // intval for sanitation purposes
            $userId = intval($_GET['id']);
            $query = "UPDATE users_tbl SET status = 'I' WHERE users_id = $userId";

            if(mysqli_query($dbc, $query)) {

                
                if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
                    header("Location: list_users.php?msg=deleted");
                    exit;
                } else {
                    header("Location: index.php?msg=deleted");
                    exit;
                }

            } else {
                echo "Error deleting user: " . mysqli_error($dbc);
            }

        } else {
            echo "No user ID provided";
        }

    }

    deleteUser();

?>