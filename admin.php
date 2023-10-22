<!-- admin.php -->
<?php
include 'db.php'; // Ensure db.php includes a database connection
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] != 'Admin') {
    header("Location: login.php");
    exit;
}

// Handle delete action
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch menu item details for the confirmation modal
    $stmt = $pdo->prepare("SELECT * FROM menu WHERE id = ?");
    $stmt->execute([$id]);
    $menu = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$menu) {
        // Redirect if the menu item with the specified ID is not found
        header("Location: admin.php");
        exit;
    }

    // Display a confirmation modal
    echo "
    <script>
        if (confirm('Are you sure you want to delete this menu item?')) {
            window.location.href = 'admin.php?action=confirmedDelete&id={$menu['id']}';
        } else {
            window.location.href = 'admin.php';
        }
    </script>";
    exit;
}

// Handle confirmed delete action
if (isset($_GET['action']) && $_GET['action'] == 'confirmedDelete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM menu WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Your Restaurant Name</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .sticky-top {
            position: sticky;
            top: 0;
            z-index: 1000;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Your Restaurant Name</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-dark text-white p-4">
        <div class="container">
            <h1>Nama Restoran- Admin Panel</h1>
            <a class="text-white" href="logout.php">Logout</a>
        </div>
    </header>

    <div class="container mt-4">
        <h2>Menu List</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch menu items from the database and display them in the table
                $stmt = $pdo->prepare("SELECT * FROM menu");
                $stmt->execute();
                $menus = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($menus as $menu) {
                    echo "<tr>";
                    echo "<td>{$menu['id']}</td>";
                    echo "<td>{$menu['name']}</td>";
                    echo "<td>{$menu['price']}</td>";
                    echo "<td>{$menu['description']}</td>";
                    echo "<td><img src='{$menu['image_path']}' alt='{$menu['name']}' height='50'></td>";
                    echo "<td>
                            <a class='btn btn-primary' href='edit.php?id={$menu['id']}'>Edit</a>
                            <a class='btn btn-danger' href='admin.php?action=delete&id={$menu['id']}'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <a class="btn btn-success" href="add_menu.php">Add Menu</a>
    </div>

    <!-- Bootstrap JS and Popper.js scripts (place them at the end of the body) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
