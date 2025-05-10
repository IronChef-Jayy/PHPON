<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
	<title>Upload an Image</title>
	<style>
	.error {
		font-weight: bold;
		color: #C00;
	}
	</style>
</head>
<body>
<?php # Script 11.2 - upload_image.php

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Check for an uploaded file:
	if (isset($_FILES['upload'])) {

		// Validate the type. Should be JPEG or PNG.
		$allowed = ['image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png'];
		if (in_array($_FILES['upload']['type'], $allowed)) {

			// Move the file over to new location. will give temp name until moved into files
			if (move_uploaded_file ($_FILES['upload']['tmp_name'], "uploads/{$_FILES['upload']['name']}")) {
				echo '<p><em>The file has been uploaded!</em></p>';
			} // End of move... IF.

		} else { // Invalid type.
			echo '<p class="error">Please upload a JPEG or PNG image.</p>';
		}

	} // End of isset($_FILES['upload']) IF.

	// Check for an error:
	if ($_FILES['upload']['error'] > 0) {
		echo '<p class="error">The file could not be uploaded because: <strong>';

		// Print a message based upon the error.
		switch ($_FILES['upload']['error']) {
			case 1:
				print 'The file exceeds the upload_max_filesize setting in php.ini.';
				break;
			case 2:
				print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
				break;
			case 3:
				print 'The file was only partially uploaded.';
				break;
			case 4:
				print 'No file was uploaded.';
				break;
			case 6:
				print 'No temporary folder was available.';
				break;
			case 7:
				print 'Unable to write to the disk.';
				break;
			case 8:
				print 'File upload stopped.';
				break;
			default:
				print 'A system error occurred.';
				break;
		} // End of switch.

		print '</strong></p>';

	} // End of error IF.

	// Delete the temp file if it still exists:
	if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
		unlink ($_FILES['upload']['tmp_name']);
	}

} // End of the submitted conditional.
?>

<!-- use enctype for uploading images -->
<form enctype="multipart/form-data" action="upload_image.php" method="post">


	<input type="hidden" name="MAX_FILE_SIZE" value="524288">

	<fieldset><legend>Select a JPEG or PNG image of 512KB or smaller to be uploaded:</legend>

	<p>
		<strong>File:</strong> 
		<input type="file" name="upload"> 
	</p>

	</fieldset>
	<div align="center"><input type="submit" name="submit" value="Submit"></div>

</form>


<p>Any images that are stored will show below: <span class="italic">Click on an image to view it in a separate window.</span></p>
<ul>
<?php # Script 11.6 - images.php
// This script lists the images in the uploads directory.
// This version now shows each image's file size and uploaded date and time.

// Set the default timezone:
date_default_timezone_set('America/Los_Angeles');

$dir = 'uploads'; // Define the directory to view.

$files = scandir($dir); // Read all the images into an array.

// Display each image caption as a link to the JavaScript function:
foreach ($files as $image) {

	if (substr($image, 0, 1) != '.') { // Ignore anything starting with a period.

		// Get the image's size in pixels:
		$image_size = getimagesize("$dir/$image");

		// Calculate the image's size in kilobytes:
		$file_size = round( (filesize("$dir/$image")) / 1024) . "kb";

		// Determine the image's upload date and time:
		$image_date = date("F d, Y H:i:s", filemtime("$dir/$image"));

		// Make the image's name URL-safe:
		$image_name = urlencode($image);

		// Print the information:
		echo "<li><a href=\"javascript:create_window('$image_name',$image_size[0],$image_size[1])\">$image</a> $file_size ($image_date)</li>\n";

	} // End of the IF.

} // End of the foreach loop.

?>
</ul>




<!-- <img src="https://jacobyesters.com/uploads/<?php echo $profile_img; ?>" alt="" style="height: 300px;"> -->

<script>
	// Make a pop-up window function:
function create_window(image, width, height) {

	// Add some pixels to the width and height:
	width = width + 10;
	height = height + 10;

	// If the window is already open,
	// resize it to the new dimensions:
	if (window.popup && !window.popup.closed) {
		window.popup.resizeTo(width, height);
	}

	// Set the window properties:
	var specs = "location=no,scrollbars=no,menubar=no,toolbar=no,resizable=yes,left=0,top=0,width=" + width + ",height=" + height;

	// Set the URL:
	var url = "show_image.php?image=" + image;

	// Create the pop-up window:
	popup = window.open(url, "ImageWindow", specs);
	popup.focus();

} // End of function.

</script>
</body>
</html>