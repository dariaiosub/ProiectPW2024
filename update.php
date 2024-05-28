<?php
require_once('connect.php');
$id=$_GET['id'];
if (isset($_POST['submit'])) {
    $details = $_POST['details'];
    $folder = 'upload/';
    $image_file = $_FILES['image']['name'];
    $file=$_FILES['image']['tmp_name'];
    $path=$folder.$image_file;
    $target_file=$folder.basename($image_file);
    $imageFileType=pathinfo($target_file, PATHINFO_EXTENSION);
    if($file!=''){
        if($imageFileType!="jpg" && $imageFileType!="png" && $imageFileType!="jpeg" && $imageFileType!="gif"){
        $error[]='Sorry, only JPG, JPEG, PNG, GIF files are allowed!';
    }
    }
    
    if($_FILES['image']['size']>1048576){
        $error[]='Sorry, your image is too large. Upload less than 1 MB';
    }
    if(!isset($error)){
        if($file!='')
        {
            $res=mysqli_query($db,"SELECT * from items where id=$id");
            if($row=mysqli_fetch_array($res)){
                $delimage=$row['image'];
            }
            unlink($folder.$delimage);
            move_uploaded_file($file,$target_file);
            $result=mysqli_query($db,"UPDATE items SET image='$image_file',details='$details' WHERE id=$id");
        }else
        {
            $result=mysqli_query($db,"UPDATE items SET details='$details' WHERE id=$id");
        }
        if($result){
            header("location:products.php?updated=1");
        }else{
            echo 'Something went wrong';
        }
    }
    if(isset($error)){
        foreach($error as $error) {
            echo '<div class="message">'.$error.'</div><br>';
        }
    }
    $res=mysqli_query($db,"SELECT * from items where id=$id");
    if($row=mysqli_fetch_array($res))
    {
        $image=$row['image'];
        echo $details=$row['details'];
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
<?php if(isset($_GET['updated'])){
    echo '<div class="success">Image Updated successfully!</div>';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Business Casual - Start Bootstrap Theme</title>
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
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="pagina1.php">Your Happy Place</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="pagina1.php">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about.php">About</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="products.php">Book Club</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="store.php">A piece of happiness</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 rounded"><p class="mb-0"> 
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Product</label>
                                    <input type="file" class="form-control" name="image" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Details</label>
                                    <input type="text" class="form-control" name="details">
                                    
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Update</button>
                            </form>
                        </p></div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

