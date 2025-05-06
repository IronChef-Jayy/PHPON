<!-- redirect completion message for edit_user.php -->
<?php 
    function showProductRedirectMessage() {
        $msg = htmlspecialchars($_GET['msg']);


        if ($msg) {
            echo "<p class='bg-green-500' id='flash-msg'>Product Successfully Updated!</p>";
        }
    }

    function showUserRedirectMessage() {
        $msg = htmlspecialchars($_GET['msg']);

        if ($msg) {
            echo "<p class='bg-green-500' id='flash-msg'>User Successfully Updated!</p>";
        }
    }


?>