<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <title>Halaman Index</title>

    <style>
       body {
            background-color: black;
            margin: 0;
            padding: 0;
            color: white;
        }
        .container2 {
            text-align: center;
            padding: 5vw;
        }
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
            color: #fff; 
            font-weight: bold;
            text-decoration: none;

        }
        #main-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            overflow: hidden;
            margin: 0 auto;
        }
        .image-container {
            display: flex;
            width: 300%;
        }
        .image-container img {
            width: 100%;
            height: auto;
        }
        .button-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            gap: 20px;
        }
        .button {
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
        }
        /* Set the height of carousel images */
        .carousel-inner img {
            width: 100%;
            height: 300px; /* Adjust this height based on your needs */
            object-fit: cover;
        }
        .foodimg-container {
    position: relative;
    width: 100vw;
    height: 48vw;
    margin-bottom: 5vw;
}

.foodimg {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 75%;
}

.menu-link {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-decoration: none;
    font-size: 5vw;
    font-family: 'Lobster', cursive;
}

.menu-link:hover {
    transform: translate(-50%, -50%) scale(1.1);
    text-decoration: none;
    color: white;
}


.menu-item img {
    width: 100%;
    height: auto;
    max-width: 200px; /* Sesuaikan dengan ukuran yang Anda inginkan */
    max-height: 150px; /* Sesuaikan dengan ukuran yang Anda inginkan */
    object-fit: cover;
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

    <div class="foodimg-container">
        <img src="img/a1.jpg" class="foodimg">
        <a href="#menu" class="menu-link">Look at our menu</a>
    </div>

    <div class="container">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/m1.jpg" class="d-block w-100" alt="Image 1">
                </div>
                <div class="carousel-item">
                    <img src="img/m2.jpg" class="d-block w-100" alt="Image 2">
                </div>
                <div class="carousel-item">
                    <img src="img/m3.jpg" class="d-block w-100" alt="Image 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container2">
        <div class="row mt-4" data-aos="fade-up">
            <div class="col-md-6">
                <img src="img/c1.jpg" class="img-fluid" alt="Left Image 1">
            </div>
            <div class="col-md-6" style="text-align: left;">
                <p>Keterangan untuk Gambar Kiri 1</p>
            </div>
        </div>

        <div class="row mt-4" data-aos="fade-up">
            <div class="col-md-6" style="text-align: right;">
                <p>Keterangan untuk Gambar Kanan 1</p>
            </div>
            <div class="col-md-6">
                <img src="img/c2.jpg" class="img-fluid" alt="Right Image 1">
            </div>
        </div>
    </div>


    <div class="container" id="menu">
    <h2>Our Menu</h2>
    <div class="row">
        <?php
        // Koneksi ke database (Ganti dengan informasi Anda)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "restoran";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Koneksi ke database gagal: " . $conn->connect_error);
        }

        // Query untuk mengambil data menu
        $sql = "SELECT * FROM menu";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4" data-aos="fade-up">';
            echo '<div class="menu-item" data-toggle="modal" data-target="#menuModal">';
            echo '<img src="' . $row['image_path'] . '" class="img-fluid" alt="' . $row['name'] . '">';
            echo '</div>';
            echo '</div>';
        }
        

        // Menutup koneksi ke database
        $conn->close();
        ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menuModalLabel">Menu Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 id="modal-name"></h4>
                <p id="modal-description"></p>
                <p id="modal-price"></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function showDetails(name, description, price, imagePath) {
        const modal = document.getElementById('menuModal');
        const modalName = modal.querySelector('#modal-name');
        const modalDescription = modal.querySelector('#modal-description');
        const modalPrice = modal.querySelector('#modal-price');
        modalName.textContent = name;
        modalDescription.textContent = description;
        modalPrice.textContent = 'Price: Rp. ' + parseFloat(price).toFixed(2);
        modalImage.src = imagePath;

        $('#menuModal').modal('show');
    }
</script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>AOS.init();</script>
</body>
</html>
