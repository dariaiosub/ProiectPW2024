<?php
require_once('connect.php');
if (isset($_POST['submit'])) {
    $details = $_POST['details'];
    $folder = 'upload/';
    $image_file = $_FILES['image']['name'];
    $file=$_FILES['image']['tmp_name'];
    $path=$folder.$image_file;
    $target_file=$folder.basename($image_file);
    $imageFileType=pathinfo($target_file, PATHINFO_EXTENSION);
    if($imageFileType!="jpg" && $imageFileType!="png" && $imageFileType!="jpeg" && $imageFileType!="gif"){
        $error[]='Sorry, only JPG, JPEG, PNG, GIF files are allowed!';
    }
    if($_FILES['image']['size']>1048576){
        $error[]='Sorry, your image is too large. Upload less than 1 MB';
    }
    if(!isset($error)){
        move_uploaded_file($file,$target_file);
        $result=mysqli_query($db,"INSERT INTO items(image,details) VALUES('$image_file','$details')");
        if($result){
            $image_success=1;
        }else{
            echo 'Something went wrong';
        }
    }
    if(isset($error)){
        foreach($error as $error) {
            echo '<div class="message">'.$error.'</div><br>';
        }
    }
    //$sql = "insert into `produse` (name, price, number) values('$name', '$price', '$number')";
    //$result = mysqli_query($con, $sql);
    //if ($result) {
        //echo "Data inserted succesfully";
    //    header('location:ceva.php');
    //} else {
    //    die(mysqli_error($con));
    //}
}
?>
<?php if(isset($image_success)){
    echo '<div class="success">Image Uploaded successfully!</div>';
}
?>

<?php 
if(isset($_GET['updated']))
{
        echo '<div class="success">Saved!</div>';

}
if(isset($_GET['deleted']))
{
        echo '<div class="success">Deleted!</div>';

}
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
            <div>
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
        <section class="page-section">
            <div>
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ms-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">Every day is a new song to listen to! Check our favorite jam for know:</span>
                                <audio controls>
                                    <source src="audio\springday.mp3" type="audio/mpeg">
                                </audio>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/img/products-01.jpg" alt="..." />
                    <div class="product-item-description d-flex me-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">Our guitars are made with all the love and kindness to help all of our beloved music passionate people find the happiness through music!</p>
                        <p class="mb-0">Our guitars are made of high quality wood and the prices, we assure you, are the lowest on this market!</p></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section">
            <div>
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex me-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-lower">Find your own self in music!</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/img/products-02.jpg" alt="..." />
                    
                </div>
            </div>
        </section>
        <section class="page-section">
            <div>
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ms-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">From Around the Music World</span>
                                <span class="section-heading-lower">You can choose between many types of guitars!</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/img/products-03.jpg" alt="..." />
                    
                </div>
            </div>
        </section>
        <section class="page-section">
            <div>
                <div class="product-item-description d-flex me-auto">
                    <div class="bg-faded p-5 rounded"><p class="mb-0"> 
                            Are you looking for a product? You might be able to see it here!
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Id</td>
                                                <td>Image</td>
                                                <td>Details</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $con=mysqli_connect("localhost","root","","items");
                                            
                                            if(isset($_GET['search'])){
                                                $filtervalues=$_GET['search'];
                                                $query="SELECT * FROM `items` WHERE CONCAT(image,details) LIKE '%$filtervalues%'";
                                                $query_run=mysqli_query($con,$query);
                                                
                                                if(mysqli_num_rows($query_run)>0){
                                                    foreach($query_run as $items){
                                                        ?>
                                                            <tr>
                                                                <td><?=$items['id'];?></td>
                                                                <td><?=$items['image'];?></td>
                                                                <td><?=$items['details'];?></td>
                                                               
                                                            </tr>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                        <tr>
                                                            <td colspan="3">No record found!</td>
                                                        </tr> 
                                                    <?php
                                                    
                                                }
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section">
            <div>
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 rounded"><p class="mb-0"> 
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Music Product</label>
                                    <input type="file" class="form-control" name="image" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Details about it</label>
                                    <input type="text" class="form-control" name="details">
                                    
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Upload</button>
                            </form>
                        </p></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section">
            <div>
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 rounded"><p class="mb-0"> 
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <th>Image</th>
                                            <th>Details</th>
                                        </tr>
                                        <?php
                                        $res=mysqli_query($db,"SELECT * FROM items ORDER BY id DESC");
                                        while($row= mysqli_fetch_array($res)){
                                            echo '<br><tr>
                                                <td><img src="upload/'.$row['image'].'" height="200"></td>
                                                <td>'.$row['details'].'</td>
                                                <td><a href="update.php?id='.$row['id'].'"><button class="btn-primary">Update</button></a></td> <br><br>
                                                <td><a href="delete.php?id='.$row['id'].'"><button class="btn-primary">Delete</button></a></td>
                                                </tr>';
                                                   
                                        }
                                        ?>
                                    </table>
                                    
                                </div>
                            </form>
                        </p></div>
                    </div>
                </div>
            </div>
        </section>
        
        <footer class="footer text-faded text-center py-5">
            <div><p class="m-0 small">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

