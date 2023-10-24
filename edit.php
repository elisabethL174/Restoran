<!-- edit.php -->
<?php
include 'db.php'; // Ensure db.php includes database connection
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] != 'Admin') {
    header("Location: login.php");
    exit;
}

// Retrieve the menu item to edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM menu WHERE id = ?");
    $stmt->execute([$id]);
    $menu = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$menu) {
        // Redirect if the menu item with the specified ID is not found
        header("Location: admin.php");
        exit;
    }
} else {
    // Redirect if the ID parameter is not provided
    header("Location: admin.php");
    exit;
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Check if a new image file is uploaded
    if ($_FILES["image"]["size"] > 0) {
        // Define the directory where you want to store the uploaded images
        $imageDirectory = 'Menu/';

        // Handle image upload
        $imagePath = $imageDirectory . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

        // Note: You might want to add additional validation and security checks for file uploads.

        // Update the image path in the database
        $stmt = $pdo->prepare("UPDATE menu SET name=?, price=?, description=?, image_path=? WHERE id=?");
        $stmt->execute([$name, $price, $description, $imagePath, $id]);
    } else {
        // Update the menu details excluding the image path
        $stmt = $pdo->prepare("UPDATE menu SET name=?, price=?, description=? WHERE id=?");
        $stmt->execute([$name, $price, $description, $id]);
    }

    // Redirect to the admin page after editing the menu item
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu - Your Restaurant Name</title>
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
        <h2>Edit Menu</h2>

        <form action="edit.php?id=<?php echo $menu['id']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Menu Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $menu['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $menu['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required><?php echo $menu['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">New Image:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="currentImage">Current Image:</label>
                <img src="<?php echo $menu['image_path']; ?>" alt="<?php echo $menu['name']; ?>" height="50">
                <input type="hidden" name="currentImage" value="<?php echo $menu['image_path']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update Menu</button>
        </form>

    </div>

    <!-- Bootstrap JS and Popper.js scripts (place them at the end of the body) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
