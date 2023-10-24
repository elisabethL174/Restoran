<?php
include 'db.php';
session_start();

function generateCaptchaString($length = 5) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Mengatur ulang CAPTCHA setiap kali halaman dimuat ulang
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $_SESSION['captcha'] = generateCaptchaString();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $captcha_input = $_POST['captcha'];
    if (strtolower($captcha_input) !== strtolower($_SESSION['captcha'])) {
        $error_message = "Invalid CAPTCHA!";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['first_name'] = $user['first_name']; // tambahkan baris ini
            $_SESSION['last_name'] = $user['last_name'];   // tambahkan baris ini

            if ($user['role'] == 'Admin') {
                header("Location: admin.php");
            } else {
                header("Location: user.php");
            }
        } else {
            $error_message = "Invalid login!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
    <style>

    body, label, input, select, .form-check-label, strong, .btn {
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
        height: 100vh;
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

    .btn.btn-primary {
        transition: 0.3s;
    }

    .btn.btn-primary:hover {
        background-color: #00029B;
        border-color: #00029B;
        transition: 0.3s;
    }

    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        text-align: center;
        color: white;
        z-index: 1000;
    }

</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">El Muchero</a>
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
            <h2 class="text-center">Login</h2>
        </div>

            <form method="post" action="login.php">
                 <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control col-12" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control col-12" id="password" name="password" placeholder="Password" required>
                </div>
                <div id="loginHelp" class="form-text">Tidak punya akun? Mohon <a href="register.php">register</a> terlebih dahulu.</div>
            <br>
            <div class="form-group">
                <label for="captcha">Enter the text below:</label>
                <p><strong><?php echo $_SESSION['captcha']; ?></strong></p>
                <input type="text" class="form-control" id="captcha" name="captcha" required>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary d-grid gap-2 col-6 mx-auto">Login</button>
            </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>
