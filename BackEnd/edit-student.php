<?php
include_once("database.php");

function updateStudent($id, $data) {
  global $mysqli;
  
  // Build query string
  $query = "UPDATE etudiant SET";
  foreach ($data as $key => $value) {
    $query .= " $key='$value',";
  }
  $query = rtrim($query, ',');
  $query .= " WHERE id_etudiant=$id";

  // Execute query
  $result = mysqli_query($mysqli, $query);

  if ($result) {
        return true;
       
  } else {
    return false;
  }
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $data = json_decode(file_get_contents("php://input"), true);
  $updated = updateStudent($id, $data);
  if ($updated) {
    
    echo json_encode(['success' => true, 'message' => 'student updated successfully.']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Failed to update student.']);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'No student ID provided.']);
}
?>
