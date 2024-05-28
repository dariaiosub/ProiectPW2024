<?php

session_start();
require "login/User.php";
require "login/Utils.php";
if(User::isLoggedIn()){
    header("Location: index.php");
    exit;
}
$rand= rand(999999,100000);
?>

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
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.php">Music Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.php">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about_client.php">About our shop</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="products_client.php">Guitars</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="store_client.php">Make some noise</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section cta">
    <div >
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class=" bg-faded text-center rounded">
                    <h2 class="section-heading mb-4">
                        <span class="section-heading-upper">Happiness. Learn how to find it</span>
                    </h2>
                    <p class="mb-3">"Happiness consists more in small conveniences or pleasures that occur every day, than in great pieces of good fortune that happen but seldom."</p>
                    <p class="mb-3">Meik Wiking</p>
                    <div class="d-flex justify-content-center">
                         <form action="login/auth.php" method="POST" class="auth-form" text-align:center; width: 400px;">
                                            <h2>Sign In</h2>
                                            <?php auth_error('auth_errors');?>
                                            <p>
                                                <label for="email"> Email Address </label><br>
                                                <input type="text" name="email" id="">                                            
                                            </p>
                                            <p>
                                                <label for="password"> Password </label><br>
                                                <input type="password" name="password" id="">                                            
                                            </p>
                                            <div class="form-group">
                                                <label for="captcha">Captcha: </label><br>
                                                <input type="text" name="captcha" placeholder="Enter Captcha" required>
                                                <input type="hidden" name="captcha-rand" value="<?php echo $rand; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="captcha-code">Captcha Code: </label><br>
                                                <div class="captcha"><?php echo $rand; ?></div>
                                            </div>
                                            <p>
                                                <input type="checkbox" name="remember" id="" value="yes"><!-- comment -->
                                                <label for="remember">Remember me</label>
                                            </p>
                                            <button type="submit" name="login">Login</button>

                                        </form>
                    </div>
                    <p style="text-align: center;"><a href="register.php">Create an account</a></p>
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



