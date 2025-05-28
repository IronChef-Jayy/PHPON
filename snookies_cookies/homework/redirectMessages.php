<?php 
    function showRedirectMessage() {
        if (!isset($_GET['msg'])) return;

        $msg = htmlspecialchars($_GET['msg']);

        switch ($msg) {
            case 'user_updated':
                echo "<p class='bg-green-500 text-white p-2 rounded mb-4' id='flash-msg'>User Successfully Updated!</p>";
                break;
            case 'deleted':
                echo "<p class='bg-red-500 text-white p-2 rounded mb-4' id='flash-msg'>User Successfully Deleted!</p>";
                break;
            case 'product_updated':
                echo "<p class='bg-green-500 text-white p-2 rounded mb-4' id='flash-msg'>Product Successfully Updated!</p>";
                break;
            case 'product_deleted':
                echo "<p class='bg-red-500 text-white p-2 rounded mb-4' id='flash-msg'>Product Successfully Deleted!</p>";
                break;
            default:
                // No message shown
                break;
        }
    }
?>