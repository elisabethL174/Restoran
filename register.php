<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $birthDate = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $role = $_POST['role']; 

    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, username, password, birth_date, gender, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$firstName, $lastName, $username, $password, $birthDate, $gender, $role]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <title>User Registration</title>
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
        background-image: url("img/login_and_register.png");
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
        padding-bottom: 50px;
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
        <a class="navbar-brand" href="index.php">El Munchero</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="Register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    <div class="container" style="width: 35%;">
    <div class="row justify-content-center">
                <h2 class="text-center">Register</h2>
            </div>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control col-12" id="first_name" name="first_name">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control col-12" id="last_name" name="last_name">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control col-12" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control col-12" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="birth_date">Birth Date:</label>
                <input type="date" class="form-control col-12" id="birth_date" name="birth_date">
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" value="Male" id="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" value="Female" id="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control col-12" id="role" name="role">
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
                <div id="loginHelp" class="form-text">(Username dan Password bersifat case sensitive)</div>
            </div>

            <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary d-grid gap-2 col-6 mx-auto">Register</button>
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
