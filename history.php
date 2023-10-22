<?php
include 'db.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] != 'User') {
    header("Location: login.php");
    exit;
}

// Ambil ID pengguna dari sesi
$user_id = $_SESSION['id'];

// Ambil riwayat pembelian dari database
$stmt = $pdo->prepare("SELECT * FROM history WHERE user_id = ?");
$stmt->execute([$user_id]);
$history = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>History</h2>
        <ul>
            <?php foreach ($history as $item): ?>
                <li><?php echo $item['menu_name']; ?> - $<?php echo $item['price']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- ... Sisipkan script JavaScript lainnya jika diperlukan ... -->
</body>
</html>
