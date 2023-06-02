<!DOCTYPE html>
<html>
<head>
    <title>Save Image</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="Upload">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the file was uploaded without errors
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tempFilePath = $_FILES['image']['tmp_name'];
            $destination = 'img/';  // Set the desired destination path and file name

            // Move the uploaded file to the desired directory
            if (move_uploaded_file($tempFilePath, $destination)) {
                echo 'Image saved successfully.';
            } else {
                echo 'Failed to save the image.';
            }
        } else {
            echo 'Error uploading the image.';
        }
    }
    ?>
</body>
</html>