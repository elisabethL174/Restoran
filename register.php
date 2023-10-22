<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $birthDate = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $role = $_POST['role']; // Get the selected role from the form

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
        .navbar {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0));
            position: fixed;
            top: 0;
            width: 100%;
            padding: 15px;
            text-align: center;
            color: white;
            z-index: 1000;
            transition: background 0.5s ease-in-out;
        }

        .navlink {
            color: white;
            text-decoration: none;
        }

        .navlink:hover {
            color: #fff; /* Hover color */
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <span>Restoran</span>
        <div style="position: absolute; right: 15px; top: 15px;">
            <a href="login.php" class="navlink">Login</a>
            <a href="register.php" class="navlink">Register</a>
        </div>
    </div>
    <div class="container mt-5" data-aos="fade-up">
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="birth_date">Birth Date:</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date">
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
                <select class="form-control" id="role" name="role">
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
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
