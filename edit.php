<?php
include 'db.php'; 

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] != 'Admin') {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM menu WHERE id = ?");
    $stmt->execute([$id]);
    $menu = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$menu) {
        header("Location: admin.php");
        exit;
    }
} else {
    header("Location: admin.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if ($_FILES["image"]["size"] > 0) {
        $imageDirectory = 'Menu/';

        $imagePath = $imageDirectory . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);


        $stmt = $pdo->prepare("UPDATE menu SET name=?, price=?, description=?, image_path=? WHERE id=?");
        $stmt->execute([$name, $price, $description, $imagePath, $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE menu SET name=?, price=?, description=? WHERE id=?");
        $stmt->execute([$name, $price, $description, $id]);
    }

    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <title>Edit Menu - Your Restaurant Name</title>
    <style>
        body, label, input, select, .form-check-label, .btn {
            color: white;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url("img/admin.png");
            background-color: rgba(0, 0, 0, 0.5);
            background-blend-mode: darken;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding-top: 100px;
            padding-bottom: 160px;
        }

        .text-center {
            color: white;
        }

        .form-text {
            color: white;
        }

        .navbar-brand {
            font-weight: bold;
            color: white;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            text-align: center;
            color: white;
            z-index: 1000;
        }

        .btn {
            margin-top: 3vh;
        }

        #loginHelp {
            color: white;
        }

        .btn.btn-primary {
            transition: 0.3s;
        }

        .btn.btn-primary:hover {
            background-color: #00029B;
            border-color: #00029B;
            transition: 0.3s;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="admin.php">El Munchero</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

<div class="container" style="width: 35%;">
    <div class="row justify-content-center">
        <h2 class="text-center">Edit Menu</h2>
    </div>
    <form action="edit.php?id=<?php echo $menu['id']; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Menu Name:</label>
            <input type="text" class="form-control col-12" id="name" name="name" value="<?php echo $menu['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control col-12" id="price" name="price" value="<?php echo $menu['price']; ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control col-12" id="description" name="description" required><?php echo $menu['description']; ?></textarea>
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
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-primary d-grid gap-2 col-6 mx-auto">Update Menu</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>

</html>