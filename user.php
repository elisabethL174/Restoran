<?php
include 'db2.php';
session_start();

// Query to fetch all menu items from the database
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- CSS Styles -->
    <style>
    body {
        background-image: url("img/le_menu.png");
        background-color: rgba(0, 0, 0, 0.5);
        background-blend-mode: darken;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

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

    .card-img-top {
        max-width: 100%;
        height: auto;
        width: auto;
        max-height: 100%;
        text-align: center;
        border-radius: 10px;
    }

    .navbar-brand {
        text-shadow: rgba(0, 0, 0, 0);
        font-weight: bold;
        color: #FFD700;
        transition: 0.3s;
    }

    .navbar-brand:hover {
        text-shadow: rgba(255, 255, 255, 0.6);
        transition: 0.3s;
    }

    /* Additional styling for buttons */
    .btn {
        background-color: #FFD700;
        color: #1B2631;
    }

    .btn:hover {
        background-color: #FFD700;
        color: #1B2631;
    }

    /* Additional styling for card titles */
    .card-title {
        color: #FFD700;
        height: 3rem;
        overflow: hidden;
        text-shadow: rgba(0, 0, 0, 0.7);
    }

    .headuh {
        padding-top: 10vw;
        color: white;
        padding-bottom: 9vw;
        font-weight: bold;
        font-size: 2vw;
        font-style: italic;
        z-index: 2;
    }

    .white-thingy {
        display: flex;
        background-color: white;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        flex-grow: 1;
        background-color: #333345;
        background-image: url("img/paper.jpg");
    }

    .card {
        /*background-image: #604E42;*/
        padding: 10px;
        background-image: url("img/wood.jpg");
        border-radius: 10px;
    }

    .your_name {
        justify-content: center;
    }

    .name {
        color: white;
    }
</style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="user.php">El Munchero</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="your_name">
            <span class="text-center name">Welcome, <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></span>
        </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h3 class="text-center headuh">Our Menu</h3>
</div>

<div class="white-thingy">
    <div class="container mt-3">
        <div class="row">
            <?php foreach ($menus as $menu): ?>
            <div class="col-md-2 mb-4" data-aos="fade-up">
                <div class="card h-100">
                    <img src="<?php echo $menu['image_path']; ?>" class="card-img-top mx-auto mt-2"
                        alt="<?php echo $menu['name']; ?>">
                    <div class="card-img-overlay">
                        <button class="btn btn-primary btn-sm"
                            onclick="showDetails('<?php echo $menu['name']; ?>', 'Harga: Rp. <?php echo number_format($menu['price'], 2); ?>', '<?php echo $menu['description']; ?>')">Detail</button>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="selectedMenu"
                                value="<?php echo $menu['id']; ?>" id="MenuID<?php echo $menu['id']; ?>">
                            <label class="form-check-label" for="MenuID<?php echo $menu['id']; ?>">Pilih</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center" style="color: #FFD700;"><?php echo $menu['name']; ?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-5 mb-5 col-12">
            <button class="btn btn-success" onclick="submitOrder()">Beli</button>
        </div>
    </div>
</div>

<div id="customAlert"
    style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; background: white; padding: 20px; border-radius: 8px;">
    <h2 id="alertTitle"></h2>
    <p id="alertDescription"></p>
    <p id="alertPrice"></p>
    <button onclick="closeAlert()">Close</button>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
