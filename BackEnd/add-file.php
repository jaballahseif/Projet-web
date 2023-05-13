<?php
include_once("database.php");

if(isset($_POST['submit']))
{
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $file_name = mysqli_real_escape_string($conn, $_FILES['file']['name']);
    $file_tmp = $_FILES['file']['tmp_name'];
    
    // Move uploaded file to desired directory
    $upload_dir = 'uploads/';
    $file_path = $upload_dir . $file_name;
    move_uploaded_file($file_tmp, $file_path);

    // Insert document into the database
    $sql = "INSERT INTO documents (title, file_name) VALUES ('$title', '$file_name')";

    if($conn->query($sql)){
        echo "Document added successfully.";
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
