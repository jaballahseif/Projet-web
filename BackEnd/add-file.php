<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $targetDir = 'uploads/';
        $targetFile = $targetDir . basename($file['name']);

        // move uploaded file to target directory
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            echo 'File uploaded successfully.';
            echo json_encode(array('fileName' => $_FILES['file']['name']));

        } else {
            echo 'Error uploading file.';
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['file'])) {
        $file = $_GET['file'];
        $targetDir = 'uploads/';
        $targetFile = $targetDir . $file;

        // force download of file
        if (file_exists($targetFile)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($targetFile) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($targetFile));
            readfile($targetFile);
            exit;
        } else {
            echo 'Error downloading file.';
        }
    }
?>

