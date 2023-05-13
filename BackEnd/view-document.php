<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$dir = './uploads';
$files = scandir($dir);
$fileList = array();

foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
        $fileList[] = $file;
    }
}

echo json_encode($fileList);
?>
