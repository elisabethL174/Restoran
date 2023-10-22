<?php
include 'db2.php';

// Query untuk mengambil semua menu dari database
$sql = "SELECT * FROM menu";
$result = $conn->query($sql);
$menus = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menus[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
    <div class="row">
        <?php foreach ($menus as $menu): ?>
        <div class="col-md-4" data-aos="fade-up">
            <div class="card">
                <img src="<?php echo $menu['image_path']; ?>" class="card-img-top" alt="<?php echo $menu['name']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $menu['name']; ?></h5>
                    <button class="btn btn-primary" onclick="showDetails('<?php echo $menu['description']; ?>', 'Harga: Rp. <?php echo number_format($menu['price'], 2); ?>')">Detail</button>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="selectedMenu" value="<?php echo $menu['id']; ?>" id="MenuID<?php echo $menu['id']; ?>">
                        <label class="form-check-label" for="MenuID<?php echo $menu['id']; ?>">Pilih</label>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="mt-5">
        <button class="btn btn-success" onclick="submitOrder()">Beli</button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();

    function showDetails(desc, price) {
        alert(desc + '\n' + price);
    }

    function submitOrder() {
        let selectedItems = document.querySelectorAll('input[name="selectedMenu"]:checked');
        let selectedIds = [];
        
        selectedItems.forEach(item => {
            selectedIds.push(item.value);
        });
        
        // Kirim ke server
        fetch('submit_order.php', {
            method: 'POST',
            body: JSON.stringify(selectedIds),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Order berhasil!');
            } else {
                alert('Terjadi kesalahan.');
            }
        });
    }
</script>
</body>

</html>
