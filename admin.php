<?php
include 'db.php'; 
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] != 'Admin') {
    header("Location: login.php");
    exit;
}

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM menu WHERE id = ?");
    $stmt->execute([$id]);
    $menu = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$menu) {
        header("Location: admin.php");
        exit;
    }

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar-brand {
            text-shadow: rgba(255, 255, 255, 0);
            font-weight: bold;
            color: white;
            transition: 0.3s;
        }

        .navbar-brand:hover {
            text-shadow: rgba(255, 255, 255, 1);
            transition: 0.3s;
        }

        body {
            background-image: url("img/admin.png");
            background-color: rgba(0, 0, 0, 0.5);
            background-blend-mode: darken;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .text {
            color: white;
        }

        .container.header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .add-task-button {
            display: flex;
            font-size: 1vw;
            position: relative;
            text-decoration: none;
            margin-bottom: 0;
        }

        .add-task {
            padding-top: 1vw;
            padding-bottom: 1vw;
            padding-left: 1vw;
            padding-right: 1vw;
            color: white;
            font-size: 1vw;
            border-radius: 0.5vw 0 0 0.5vw;
            background: linear-gradient(to left, #0052AA, #6095FF);
            text-align: center;
            z-index: 2;
            position: relative;
            text-decoration: none;
            margin-bottom: 0;
        }

        .add-task::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, #0052AA, #6095FF);
            opacity: 0;
            border-radius: 0.5vw 0 0 0.5vw;
            z-index: -1;
            transition: opacity 0.3s;
        }

        .add-task-button:hover .add-task::before {
            opacity: 1;
            transition: opacity 0.3s;
        }

        .add-task-plus {
            margin-left: 0.2vw;
            padding-top: 1vw;
            padding-bottom: 1vw;
            padding-left: 1.5vw;
            padding-right: 1.5vw;
            color: white;
            font-size: 1vw;
            border-radius: 0 0.5vw 0.5vw 0;
            background-color: #0052AA;
            text-align: center;
            z-index: 2;
            font-weight: bold;
            transition: 0.3s;
            text-decoration: none;
            margin-bottom: 0;
        }

        .add-task-button:hover .add-task-plus {
            background-color: #6095FF;
            transition: 0.3s;
        }

        .add-task-button:hover {
            text-decoration: none;
        }

        .odd-row {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .even-row {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .table-header {
            background: linear-gradient(to right, #68614D, #FFCC29);
        }

        .text-header {
            color: white;
        }

        .table-header th {
            border-top: 0px !important;
            border-bottom: 0px !important;
        }

        .table-header th:first-child {
            border-radius: 5px 0 0 0;
        }

        .table-header th:last-child {
            border-radius: 0 10px 0 0;
        }

        .text-top {
            color: white;
            text-shadow: 0px 0px 50px rgba(0, 0, 0, 0.7);
        }

        .btn.btn-warning {
            transition: 0.3s;
        }

        .btn.btn-warning:hover {
            background-color: #9E8300;
            border-color: #9E8300;
            transition: 0.3s;
        }

        .btn.btn-primary {
            transition: 0.3s;
        }

        .btn.btn-success {
            transition: 0.3s;
            margin-bottom: 25px;
        }

        .btn.btn-success:hover {
            background-color: #11491D;
            border-color: #11491D;
            transition: 0.3s;
        }

        .btn.btn-primary:hover {
            background-color: #00029B;
            border-color: #00029B;
            transition: 0.3s;
        }

        .btn.btn-danger {
            transition: 0.3s;
        }

        .btn.btn-danger:hover {
            background-color: #990007;
            border-color: #990007;
            transition: 0.3s;
        }

        .btn.btn-secondary {
            transition: 0.3s;
        }

        .btn.btn-secondary:hover {
            background-color: #404449;
            border-color: #404449;
            transition: 0.3s;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            text-align: center;
            color: white;
            z-index: 1000;
            transition: background 0.5s ease-in-out;
        }

        .le-admin-panel {
            margin-top: 50px;
        }

        .action-button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .action-button {
            width: 48%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="admin.php">El Munchero</a>
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
    </nav>

    <header class="le-admin-panel bg-dark text-white p-4">
        <div class="container">
            <h1>El Munchero - Admin Panel</h1>
        </div>
    </header>

    <div class="container mt-4">
        <h2 class="text">Menu List</h2>
        <table class="table">
            <thead class="table-header">
                <tr>
                    <th class="text-header">No.</th>
                    <th class="text-header">Name</th>
                    <th class="text-header">Price</th>
                    <th class="text-header">Description</th>
                    <th class="text-header">Image</th>
                    <th class="text-header">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM menu");
                $stmt->execute();
                $menus = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $evenRow = true;

                foreach ($menus as $menu) {
                    $rowClass = $evenRow ? 'even-row' : 'odd-row';
                    echo "<tr class='$rowClass'>";
                    echo "<td class='text'>{$menu['id']}</td>";
                    echo "<td class='text'>{$menu['name']}</td>";
                    echo "<td class='text'>{$menu['price']}</td>";
                    echo "<td class='text'>{$menu['description']}</td>";
                    echo "<td class='text'><img src='{$menu['image_path']}' alt='{$menu['name']}' height='50'></td>";
                    echo "<td>";
                    echo "<div class='action-button-container'>";
                    echo '<a class="btn btn-warning action-button" href="edit.php?id=' . $menu['id'] . '"><img src="img/edit.png" style="width: 20px; height: 20px;" /></a>';
                    echo '<a class="btn btn-secondary action-button" href="admin.php?action=delete&id=' . $menu['id'] . '"><img src="img/delete.png" style="width: 20px; height: 20px;" /></a>';
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                
                    $evenRow = !$evenRow;
                }
                ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="add_menu.php">Add Menu</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>