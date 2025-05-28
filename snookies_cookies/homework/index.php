<?php
    // This function outputs theoretical HTML
    // for adding ads to a Web page.
    // function create_ad() {
    // echo '<div class="alert alert-info" role="alert"><p>This is an annoying ad! This is an annoying ad! This is an annoying ad! This is an annoying ad!</p></div>';
    // } // End of the function definition.

    $page_title = 'Snookie\'s World Famous Cookies!';
    require('includes/header.html');
    include 'redirectMessages.php';

    // Call the function:
    // create_ad();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Swanky+and+Moo+Moo&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-blue-300">

    

    <main class="home-page">
        <header class="page-header pt-28  flex items-center">
            <img src="./images/chef.png" alt="Company Logo" width="200px" height="200px" >


            <h1 class="text-7xl text-pink-500 font-[Swanky_and_Moo_Moo] ">Welcome to Snookie's World Famous Cookies!</h1>

        </header>

        
        <section class="hero flex flex-col justify-center items-center gap-2">
            <p class="mx-4 text-3xl">Satisfy Your <span class="text-4xl text-pink-500 bg-gray-100 font-[Swanky_and_Moo_Moo]">tastebuds</span> on an upcoming <span class="text-4xl text-pink-500 bg-gray-100 font-[Swanky_and_Moo_Moo]">Cheat Day</span>!</p>

            <p class="mx-4 font-semibold">We only use the finest ingredients and all of <a href="list_products.php" class="text-pink-500 text-md">our products</a> are handcrafted then baked with Love. </p>

        </section>
        
    </main>
    

    

    <?php
        require('includes/footer.html');
    ?>
    <script src="./scripts/flashRedirectMsg.js"></script>
</body>
</html>




