<?php
include 'db2.php';
session_start();


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

    <style>
    .card-img-overlay {
        display: none;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 10px;
        background: rgba(0, 0, 0, 0.6);
    }
    
    .card:hover .card-img-overlay {
        display: block;

    }

    .card-img-top{
        width: 12vw;
        height: 10vw;
        text-align: center;
    }
</style>

</head>

<body>

<div class="navbar">
    <span>Restoran</span>
    <div style="position: absolute; right: 15px; top: 15px;">
    <span>Welcome, <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></span>

        <a href="logout.php" class="navlink">Logout</a>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($menus as $menu): ?>
        <div class="col" data-aos="fade-up">
        <div class="card">
    <img src="<?php echo $menu['image_path']; ?>" class="card-img-top" alt="<?php echo $menu['name']; ?>">
    <div class="card-img-overlay">
        <button class="btn btn-primary btn-sm" onclick="showDetails('<?php echo $menu['name']; ?>', 'Harga: Rp. <?php echo number_format($menu['price'], 2); ?>', '<?php echo $menu['description']; ?>')">Detail</button>
        <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" name="selectedMenu" value="<?php echo $menu['id']; ?>" id="MenuID<?php echo $menu['id']; ?>">
            <label class="form-check-label" for="MenuID<?php echo $menu['id']; ?>">Pilih</label>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?php echo $menu['name']; ?></h5>
    </div>
</div>

        </div>
        <?php endforeach; ?>
    </div>
    <div class="mt-5">
        <button class="btn btn-success" onclick="submitOrder()">Beli</button>
    </div>
</div>

<div id="customAlert" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; background: white; padding: 20px; border-radius: 8px;">
    <h2 id="alertTitle"></h2>
    <p id="alertDescription"></p>
    <p id="alertPrice"></p>
    <button onclick="closeAlert()">Close</button>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();

    function showDetails(name, price, desc) {
    document.getElementById('alertTitle').textContent = name;
    document.getElementById('alertDescription').textContent = desc;
    document.getElementById('alertPrice').textContent = price;
    document.getElementById('customAlert').style.display = 'block';
}

function closeAlert() {
    document.getElementById('customAlert').style.display = 'none';
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
