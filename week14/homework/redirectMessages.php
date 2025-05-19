<!-- redirect completion message for edit_user.php
<?php 
    // function showProductRedirectMessage() {
    //     $msg = htmlspecialchars($_GET['msg']);


    //     if ($msg) {
    //         echo "<p class='bg-green-500' id='flash-msg'>Product Successfully Updated!</p>";
    //     }
    // }

    // function showUserRedirectMessage() {
    //     $msg = htmlspecialchars($_GET['msg']);

    //     if ($msg) {
    //         echo "<p class='bg-green-500' id='flash-msg'>User Successfully Updated!</p>";
    //     }
    // }

    // function showDeletedMessage() {
    //     $msg = htmlspecialchars($_GET['msg']);

    //     if ($msg) {
    //         echo "<p class='bg-red-500' id='flash-msg'>User Successfully Deleted!</p>";
    //     }


    // }



   
    function showRedirectMessage() {
        if (!isset($_GET['msg'])) return;

        $msg = htmlspecialchars($_GET['msg']);

        switch ($msg) {
            case 'ok':
                echo "<p class='bg-green-500 text-white p-2 rounded mb-4' id='flash-msg'>User Successfully Updated!</p>";
                break;
            case 'deleted':
                echo "<p class='bg-red-500 text-white p-2 rounded mb-4' id='flash-msg'>User Successfully Deleted!</p>";
                break;
            case 'product_updated':
                echo "<p class='bg-green-500 text-white p-2 rounded mb-4' id='flash-msg'>Product Successfully Updated!</p>";
                break;
            // Add more cases as needed
            default:
                // No message shown
                break;
        }
    }
?>


