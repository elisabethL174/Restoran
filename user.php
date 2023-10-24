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
        background: linear-gradient(to bottom, #333345, #000000);
    }

    .card {
        padding: 10px;
        background-image: url("img/woods.jpg");
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.8);
    }

    .your_name {
        justify-content: center;
    }

    .name {
        color: white;
    }
    #customAlert {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan agar lebih terlihat */
        text-align: center; /* Tengahkan teks dalam alert */
    }
    #purchaseAlert {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
    background: white;
    padding:2vw;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.card-title {
        color: #FFD700;
        height: 3rem; /* Set a fixed height for the card title */
    }

    .card-body {
        margin-bottom: 0px;
    }

    .btn.btn-warning {
            transition: 0.3s;
        }

        .btn.btn-warning:hover {
            background-color: #9E8300;
            border-color: #9E8300;
            transition: 0.3s;
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
                        <button class="btn btn-warning btn-sm"
                        onclick="showDetails('<?php echo $menu['name']; ?>', 'Harga: Rp. <?php echo number_format($menu['price'], 2); ?>', '<?php echo $menu['description']; ?>', '<?php echo $menu['id']; ?>')">Detail</button>
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
        <div class="mt-5 mb-5 col-12 text-center">
            <button class="btn btn-warning btn-lg" onclick="submitOrder" style="width: 200px; margin: 0 auto;">Beli</button>
        </div>
    </div>
</div>


<div id="customAlert" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; background: white; padding: 20px; border-radius: 8px;">
        <h2 id="alertTitle"></h2>
        <p id="alertDescription"></p>
        <p id="alertPrice"></p>
        <button onclick="closeAlert()">Close</button>
    </div>
    
    <div id="purchaseAlert" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); text-align: center;">
        <h2 id="purchaseTitle"></h2>
        <p id="purchaseDescription"></p>
    <button onclick="closePurchaseAlert()">Close</button>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    AOS.init();

    let selectedItemsInfo = []; // Deklarasi variabel di sini

    function showDetails(name, price, desc, id) {
        document.getElementById('alertTitle').textContent = name;
        document.getElementById('alertDescription').textContent = desc;
        document.getElementById('alertPrice').textContent = price;
        document.getElementById('customAlert').style.display = 'block';

        // Periksa apakah item ini sudah ada di selectedItemsInfo
        let itemIndex = selectedItemsInfo.findIndex(item => item.id === id);

        if (itemIndex !== -1) {
            // Jika item sudah ada, perbarui informasinya
            selectedItemsInfo[itemIndex].price = parseFloat(price.replace('Harga: Rp. ', '').replace(',', ''));
        } else {
            // Jika item belum ada, tambahkan item baru
            selectedItemsInfo.push({
                id: id,
                name: name,
                price: parseFloat(price.replace('Harga: Rp. ', '').replace(',', ''))
            });
        }
        setTimeout(function() {
            closeAlert();
        }, 5000);
    }
    function closeAlert() {
    document.getElementById('customAlert').style.display = 'none';
}

function showPurchaseAlert(title, description) {
    document.getElementById('purchaseTitle').textContent = title;
    document.getElementById('purchaseDescription').textContent = description;
    document.getElementById('purchaseAlert').style.display = 'block';

    // Opsi untuk menutup alert setelah beberapa detik
    setTimeout(function() {
        closePurchaseAlert();
    }, 7000);
}

function closePurchaseAlert() {
    document.getElementById('purchaseAlert').style.display = 'none';
}

function submitOrder() {
    let selectedItems = document.querySelectorAll('input[name="selectedMenu"]:checked');
    let alertMessage = "Item yang telah dibeli:\n";

    selectedItems.forEach(item => {
        let selectedItem = selectedItemsInfo.find(info => info.id === item.value);
        if (selectedItem) {
            alertMessage += `- ${selectedItem.name}: Rp. ${selectedItem.price.toLocaleString('id-ID')}\n`;
        }
    });

    let totalHarga = selectedItemsInfo.reduce((total, item) => total + item.price, 0);

    alertMessage += `\nTotal Harga: Rp. ${totalHarga.toLocaleString('id-ID')}`;
    showPurchaseAlert("Konfirmasi Pembelian", alertMessage);

    // Mengosongkan selectedItemsInfo setelah menghitung total harga
    selectedItemsInfo = [];
}
</script>
</body>

</html>
