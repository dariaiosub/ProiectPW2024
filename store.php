<?php

class Artist {

    public $name;
    
    

}

$artistoftheday = new Artist();
$artistoftheday->name = '"Charlie Puth"';

?>
<?php

session_start();
require "database.php"; 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Music Shop</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="pagina1.php">Music Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="pagina1.php">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about.php">About our shop</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="products.php">Guitars</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="store.php">Make some noise</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="page-section cta">

            <div>
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <video width="600" height="400" controls>
                                <source src="audio/video.mp4" type="video/mp4">
                            </video>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section about-heading">
        <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2659.6540022311406!2d27.569709948155324!3d47.173735196494135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2sUniversitatea%20%E2%80%9EAlexandru%20Ioan%20Cuza%E2%80%9D!5e0!3m2!1sro!2sro!4v1684871725419!5m2!1sro!2sro" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div>
                <div class="row">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2> 
                                <span class="section-heading-lower">ROCK'N ROLL</span>
                            </h2>
                            <h2>
                                <span class="section-heading-upper">
                                    <?php
                                    // Ajustează query-ul pentru a se referi la tabela corectă
                                    $query = 'SELECT file_name FROM file WHERE type LIKE "image/%"';
                                    $result = mysqli_query($conn, $query);

                                    if (!$result) {
                                        echo 'Error Message: ' . mysqli_error($conn) . '<br>';
                                        exit;
                                    }

                                    // Afișează imaginile stocate în directorul uploads
                                    while ($record = mysqli_fetch_assoc($result)) {
                                        echo '<hr>';
                                        echo '<img src="upload/' . htmlspecialchars($record['file_name']) . '" alt="Image" style="max-width:100%;">';
                                    }
                                    ?>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <section class="page-section about-heading">
            <div>
                <div>
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="bg-faded rounded p-5">
                                <h2>
                                    <span class="section-heading-upper">The artist of the week?</span>
                                    <span class="section-heading-lower">Say no more!</span>
                                </h2>
                                <h2>
                                    <span class="section-headind-upper">   
                                        <?php
                                            echo $artistoftheday->name;
                                                                                   ?>
                                    </span>
                                </h2>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-faded text-center py-5">
            <div><p class="m-0 small">
                    <button id="like" onclick="liked()">
                        <i class="fa fa-thumbs-up"></i>
                        <span class="icon">Like</span>
                    </button>
                    <script>
                        function liked() {
                            var element = document.getElementById("like");
                            element.classList.toggle("liked");
                        }
                    </script>
                    <button id="share" onclick="shared()">
                        <i class="fa fa-thumbs-up"></i>
                        <span class="icon">Share</span>
                    </button>
                    <script>
                        function shared() {
                            var element = document.getElementById("share");
                            element.classList.toggle("shared");
                        }
                    </script>
                </p>
                
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
