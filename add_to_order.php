// add_to_order.php
<?php
include 'db.php';
header('Content-Type: application/json');

if (isset($_POST['menu_id']) && isset($_POST['user_id'])) {
    $menu_id = $_POST['menu_id'];
    $user_id = $_POST['user_id'];

    $stmt = $pdo->prepare("INSERT INTO orders (user_id, menu_id, quantity, order_date, status) VALUES (?, ?, 1, NOW(), 'pending')");
    $result = $stmt->execute([$user_id, $menu_id]);


    if ($result) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false]);
}
?>