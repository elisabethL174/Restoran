<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
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
            color: #fff; /* Hover color */
            font-weight: bold;
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>AOS.init();</script>
</body>
</html>
