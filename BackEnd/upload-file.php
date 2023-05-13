<?php
include_once("database.php");

if(isset($_FILES['file'])) {
  $file = $_FILES['file'];

  // File details
  $name = $file['name'];
  $tmp_name = $file['tmp_name'];

  // Get file extension
  $ext = explode('.', $name);
  $ext = strtolower(end($ext));

  // Allowed file types
  $allowed = array('txt', 'pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png');

  // Check if file type is allowed
  if(in_array($ext, $allowed)) {
    // File upload path
    $destination = 'uploads/' . $name;

    // Upload file
    if(move_uploaded_file($tmp_name, $destination)) {
      // File uploaded successfully
      echo "File uploaded successfully.";
    } else {
      // Failed to upload file
      echo "Failed to upload file.";
    }
  } else {
    // Invalid file type
    echo "Invalid file type.";
  }
}
?>
