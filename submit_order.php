<?php

include 'db2.php';

// Menerima data yang dikirim dari user.php
$data = json_decode(file_get_contents("php://input"));

if (is_array($data) && count($data) > 0) {
    
    // Membuat entri baru di tabel orders
    $sql_order = "INSERT INTO orders (customer_name) VALUES ('Guest')"; // Anda bisa menyesuaikan kolom customer_name atau menambahkan informasi lain
    if ($conn->query($sql_order)) {
        $last_order_id = $conn->insert_id;

        // Membuat entri untuk setiap item yang dipesan di tabel order_items
        foreach ($data as $menu_id) {
            $sql_item = "INSERT INTO order_items (order_id, menu_id) VALUES ($last_order_id, $menu_id)";
            $conn->query($sql_item);
        }

        echo json_encode(["success" => true, "message" => "Order berhasil disimpan!"]);

    } else {
        echo json_encode(["success" => false, "message" => "Terjadi kesalahan saat menyimpan order."]);
    }

} else {
    echo json_encode(["success" => false, "message" => "Data tidak valid."]);
}

$conn->close();
?>
