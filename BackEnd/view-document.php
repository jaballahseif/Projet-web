<?php

$dir = 'uploads/';
$files = scandir($dir);
$file_list = [];

foreach ($files as $file) {
  if ($file != '.' && $file != '..') {
    $file_list[] = [
      'name' => $file,
      'url' => '/uploads/' . $file,
      'type' => mime_content_type($dir . $file),
      'size' => filesize($dir . $file)
    ];
  }
}

header('Content-Type: application/json');
echo json_encode($file_list);
?>