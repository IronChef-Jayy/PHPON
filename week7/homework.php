<?php
$errors = [];
$name = $email = $password = $gender = $comments = '';
$preferences = [];
$country = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST['name'])) {
        $errors['name'] = "Name is required";
    } else {
        $name = htmlspecialchars($_POST['name']);
    }
    
    // Validate email
    if (empty($_POST['email'])) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    } else {
        $email = htmlspecialchars($_POST['email']);
    }
    
    // Validate password
    if (empty($_POST['password'])) {
        $errors['password'] = "Password is required";
    } else {
        $password = htmlspecialchars($_POST['password']);
    }
    
    // Validate gender
    if (empty($_POST['gender'])) {
        $errors['gender'] = "Please select a gender";
    } else {
        $gender = htmlspecialchars($_POST['gender']);
    }
    
    // Validate preferences (checkbox)
    if (!empty($_POST['preferences'])) {
        $preferences = $_POST['preferences'];
    }
    
    // Validate country selection
    if (empty($_POST['country'])) {
        $errors['country'] = "Please select a country";
    } else {
        $country = htmlspecialchars($_POST['country']);
    }
    
    // Validate comments
    if (empty($_POST['comments'])) {
        $errors['comments'] = "Comments are required";
    } else {
        $comments = htmlspecialchars($_POST['comments']);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="/week7/styles.css" rel="stylesheet">
</head>
<body>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <div class="error"><?php echo $errors['name'] ?? ''; ?></div>
        
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
        <div class="error"><?php echo $errors['email'] ?? ''; ?></div>
        
        <label>Password:</label>
        <input type="password" name="password">
        <div class="error"><?php echo $errors['password'] ?? ''; ?></div>
        
        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>> Male
        <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>> Female
        <div class="error"><?php echo $errors['gender'] ?? ''; ?></div>
        
        <label>Preferences:</label>
        <input type="checkbox" name="preferences[]" value="Sports" <?php if (in_array("Sports", $preferences)) echo "checked"; ?>> Sports
        <input type="checkbox" name="preferences[]" value="Music" <?php if (in_array("Music", $preferences)) echo "checked"; ?>> Music
        <input type="checkbox" name="preferences[]" value="Movies" <?php if (in_array("Movies", $preferences)) echo "checked"; ?>> Movies
        
        <label>Country:</label>
        <select name="country">
            <option value="">Select a country</option>
            <option value="USA" <?php if ($country == "USA") echo "selected"; ?>>USA</option>
            <option value="Canada" <?php if ($country == "Canada") echo "selected"; ?>>Canada</option>
            <option value="UK" <?php if ($country == "UK") echo "selected"; ?>>UK</option>
        </select>
        <div class="error"><?php echo $errors['country'] ?? ''; ?></div>
        
        <label>Comments:</label>
        <textarea name="comments"><?php echo $comments; ?></textarea>
        <div class="error"><?php echo $errors['comments'] ?? ''; ?></div>
        
        <input type="submit" value="Submit">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)): ?>
        <div class="result">
            <h3>Form Submitted Successfully</h3>
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
            <p><strong>Preferences:</strong> <?php echo implode(", ", $preferences); ?></p>
            <p><strong>Country:</strong> <?php echo $country; ?></p>
            <p><strong>Comments:</strong> <?php echo $comments; ?></p>
        </div>
    <?php endif; ?>
</body>
</html>