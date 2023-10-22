<!-- add_menu.php -->
<?php
include 'db.php'; // Ensure db.php includes database connection

// Define the directory where you want to store the uploaded images
$imageDirectory = 'Menu/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Handle image upload
    $imagePath = $imageDirectory . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

    // Note: You might want to add additional validation and security checks for file uploads.

    $stmt = $pdo->prepare("INSERT INTO menu (name, price, description, image_path) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $price, $description, $imagePath]);

    // Redirect to the admin page after adding a menu item
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu - Your Restaurant Name</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Your Restaurant Name</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Add Menu</h2>

        <form action="add_menu.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Menu Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-success">Add Menu</button>
        </form>

    </div>

    <!-- Bootstrap JS and Popper.js scripts (place them at the end of the body) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
