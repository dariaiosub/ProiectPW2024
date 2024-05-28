<?php

class music
{
    public $title;
    public $author;
    private $views;
    private $year;
    
    public function setViews($views)
    {
        $this->views=$views;
    }
    public function getViews()
    {
        return $this->views;
    }
    public function setYear($year)
    {
        $this->year=$year;
    }
    public function getYear()
    {
        return $this->year;
    }
}

$music= new music();
$music->title='"Growing old with you"';
$music->author='Restless Road';
$music->setYear(2022);
$music->setViews('4,1 milioane');
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
        <section class="page-section about-heading">
            <div>
<iframe width="760" height="315" src="https://www.youtube.com/embed/EPOajk2UidA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                <!--<div class="about-heading-content">-->
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="bg-faded rounded p-5">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-lower">Do you know this song?</span>
                                    <span class="section-heading-upper">We love it! Let us give you some advice about some other song you should have in your playlist as well:</span>
                                    <span class="section-heading-lower">
                                        <?php
                                        echo "<br>";
                                        echo $music->title;
                                        echo " by ";
                                        echo $music->author;
                                        ?> </span>
                                    <span class="section-heading-upper">
                                        <?php
                                        echo "<br><br>";
                                        echo "Apparition year? ";
                                        echo $music->getYear();
                                        echo "<br><br>";
                                        echo "Number of views? ";
                                        echo $music->getViews();
                                        ?>
                                    </span>
                                
                                </h2>
                            </div>   
                            
                        </div>
                    </div>
                <!--</div>-->
            </div>
        </section>
        <section class="page-section">
            <div>
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ms-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">Please, send us a photo of you listening your favorite song! Check the Make some noise gallery!</span>
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="file" /><!-- comment -->
                                    <button type="submit" name="upload">Upload your photo!</button>
                                </form>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section">
            <div>
             <div class="product-item">
              <div class="product-item-title d-flex">
                 <div class="bg-faded p-5 d-flex ms-auto rounded">
                   <h2 class="section-heading mb-0">
                    <div class="product-item-description d-flex me-auto">
                        <p>Image to use:</p>
                        <img id="leslie" src="assets/img/leslie.png" alt="Leslie" width="220" height="277">
                        <p>Canvas to fill:</p>
                        <canvas id="myCanvas" width="250" height="300" style="border:1px solid #d3d3d3;">
                                   Your browser does not support the HTML canvas tag.
                        </canvas>

                        <p><button onclick="myCanvas()">Try it</button></p>

                        <script>
                        function myCanvas() {
                            var c = document.getElementById("myCanvas");
                            var ctx = c.getContext("2d");
                            var img = document.getElementById("leslie");
                            ctx.drawImage(img,10,10);
                        } 
                        </script>
                    </div>
                   </h2>
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
