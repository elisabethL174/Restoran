<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            position: fixed;
            top: 0;
            width: 100%;
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
        .navbar-brand {
        font-weight: bold;
        color: white;
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

.white-thingy {
    display: flex;
    background-color: white;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    flex-grow: 1; /* Allow the white-thingy to grow to fill empty space */
    z-index: 2;
    background-color: #333345;
  }

.grey-thingy {
  background-color: #f2f2f2;
  width: 95vw;
  height: auto;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 2vw;
  margin-bottom: 1vw;
  border-radius: 15px;
  flex-direction: column;
  background-color: #9191A5;
  z-index: 2;
}

.white-box-container {
  margin-top: 0.7vw;
  display: flex; /* Arrange white boxes horizontally */
  z-index: 2;
}

.white-box-container-again {
  display: flex; /* Arrange white boxes horizontally */
  flex-direction: column;
  justify-content: center;
  padding: 0;
  align-items: center; /* Center horizontally */
  text-align: center; /* Center the text within the box */
  margin: 1vw; /* Add some margin for spacing */
  z-index: 2;
}

.guh {
  text-align: center;
  justify-content: center;
  align-self: center;
  font-weight: bold;
  font-size: 1.3vw;
  margin-top: 10px;
  margin-bottom: 0;
  z-index: 2;
  color: white;
  text-shadow: 0px 0px 50px rgba(0, 0, 0, 0.5); /* Text shadow */
}

.white-box {
  background-color: white;
  border-radius: 15px;
  padding: 1vw;
  width: 10vw;
  height: 10vw;
  margin-left: 1vw;
  margin-right: 1vw;
  display: flex;
  align-items: center;
  justify-content: center;
  flex: 1;
  margin-bottom: 0;
  z-index: 2;
  background-color: #333345;
  box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.5); /* Box shadow */
}

.wbimg {
  height: 7vw;
  width: 7vw;
  margin-left: 0;
  margin-right: 0;
}

.motto-desc {
  display: flex;
  justify-content: space-between;
  z-index: 2;
}

.menu-text {
            margin: 2.5vw auto;
            padding: 1vw 4vw;
            background-color: #ffcc29; /* Golden color */
            color: #000;
            font-weight: bold;
            border-radius: 50vw; /* Circle shape */
            font-size: 24px;
            text-align: center;
            z-index: 2;
            transition: 0.3s;
            text-shadow: 0 0 20px rgba(255, 204, 41, 0.5); /* Text shadow */
            box-shadow: 0 0 20px rgba(255, 204, 41, 0.5); /* Box shadow */
            display: inline-block;
            text-decoration: none;
        }
        .menu-text:hover {
            background-color: #fff;
            color: #ffcc29;
            transition: 0.3s;
        }

        .description-box {
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black background */
            padding: 20px;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
        }

        .menu-item {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 20px;
    transition: transform 0.2s;
}

.menu-item:hover {
    transform: scale(1.05);
}

.menu-item-image {
    width: 100%;
    height: 200px; /* Adjust this based on your design */
    background-size: cover;
    background-position: center;
}

.menu-item-content {
    padding: 20px;
    text-align: center;
}

.menu-item-title {
    font-size: 24px;
    margin: 0;
    color: #333;
}

.menu-item-description {
    font-size: 16px;
    color: #555;
}

.menu-item-price {
    font-size: 18px;
    font-weight: bold;
    margin-top: 10px;
    color: #ffcc29;
}

.menu-item img {
    width: 100%;
    height: 200px; /* Adjust this based on your design */
    border-radius: 10px;
    display: block;
    margin: 0 auto; /* Center the image horizontally */
    margin-top: 30px;
}

.carousel .carousel-inner {
    transition: opacity 0.6s ease-in-out;
}

.carousel .carousel-item {
    opacity: 0;
    transition: opacity 0.6s ease-in-out;
}

.carousel .carousel-item.active, .carousel .carousel-item-next, .carousel .carousel-item-prev {
    opacity: 1;
}


    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home_page.php">El Munchero</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="foodimg-container">
        <img src="img/a1.png" class="foodimg">
        <a href="#menu" class="menu-link">Look at our menu</a>
    </div>

    <div class="container">
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="5000" data-wrap="true">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carousel1.png" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="img/carousel2.png" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="img/carousel3.png" class="d-block w-100" alt="Image 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" ariahidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

    <div class="container2">
    <div class="row mt-4" data-aos="fade-up">
        <div class="col-md-6">
            <img src="img/carousel1.png" class="img-fluid" alt="Left Image 1">
        </div>
        <div class="col-md-6">
            <div class="description-box">
                <p>Keterangan untuk Gambar Kiri 1</p>
            </div>
        </div>
    </div>

    <div class="row mt-4" data-aos="fade-up">
        <div class="col-md-6 order-md-2">
            <img src="img/carousel2.png" class="img-fluid" alt="Right Image 1">
        </div>
        <div class="col-md-6 order-md-1">
            <div class="description-box">
                <p>Keterangan untuk Gambar Kanan 1</p>
            </div>
        </div>
    </div>
</div>

<div class="container" id="menu">
    <h2 class="text-center" style="color: #ffcc29; font-size: 36px; margin-bottom: 30px;">Our Menu</h2>
    <div class="row menu-items">
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
            echo '<div class="menu-item-content">';
            echo '<h3 class="menu-item-title">' . $row['name'] . '</h3>';
            echo '<p class="menu-item-description">' . $row['description'] . '</p>';
            echo '<p class="menu-item-price">Price: Rp. ' . number_format($row['price'], 2) . '</p>';
            echo '</div>';
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

<div class="white-thingy">

    <div class="grey-thingy">

        <div class="white-box-container">

            <div class="white-box-container-again">
                <div class="white-box">
                    <img src="img/eoa.png" class="wbimg">
                </div>
                <p class="guh">Ease of<br>Use<p>
            </div>
            <div class="white-box-container-again">
                <div class="white-box">
                    <img src="img/idk.png" class="wbimg">
                </div>
                <p class="guh">Simple<br>Features<p>
            </div>
            <div class="white-box-container-again">
                <div class="white-box">
                    <img src="img/eyedropper.png" class="wbimg">
                </div>
            <p class="guh">Clear<br>Visuals<p>
        </div>
    </div>
</div>

<a class="menu-text" href="login.php">Discover Our Menu</a>

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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>AOS.init();</script>
</body>
</html>
