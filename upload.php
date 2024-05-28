<?php
include_once 'database.php';

if (isset($_POST['upload'])) {
    $file = rand(1000, 100000) . "-" . $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder = "upload/";
    $new_size = $file_size / 1024;
    $new_file_name = strtolower($file);
    $final_file = str_replace(' ', '-', $new_file_name);

    if (move_uploaded_file($file_loc, $folder . $final_file)) {
        $sql = "INSERT INTO file(file_name, type, size) VALUES('$final_file', '$file_type', '$new_size')";
        if (mysqli_query($conn, $sql)) {
            // Redirect to about.php after successful upload
            header("Location: about.php");
            exit(); // Make sure to call exit after redirection
        } else {
            echo "Database error. Please try again.";
        }
    } else {
        echo "Error. Please try again.";
    }
}
?>
