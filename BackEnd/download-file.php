<?php
header('Content-Type: application/json');

// Path to the directory containing uploaded files
$uploadDirectory = 'uploads/';

// Get list of files in the directory
$files = scandir($uploadDirectory);

// Remove '.' and '..' from the list
$files = array_diff($files, array('.', '..'));

// Create a new array to store file names
$fileNames = array();

// Iterate over the list of files and add file names to the new array
foreach ($files as $file) {
    $fileNames[] = $file;
}

// Encode the array as JSON and return it
echo json_encode($fileNames);
?>
