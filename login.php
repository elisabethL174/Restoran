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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <title>Login</title>
    <style>
        body {
            padding: 50px;
        }
    </style>
</head>

<body>
    <div class="container" data-aos="fade-up">
        <h2 class="mt-5 mb-4">Login</h2>
        <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="captcha">Enter the text below:</label>
                <p><strong><?php echo $_SESSION['captcha']; ?></strong></p>
                <input type="text" class="form-control" id="captcha" name="captcha" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
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
