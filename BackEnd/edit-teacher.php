<?php
include_once("database.php");

// Update teacher by ID
function updateTeacher($id, $data) {
  global $mysqli;
  
  // Build query string
  $query = "UPDATE enseignant SET";
  foreach ($data as $key => $value) {
    $query .= " $key='$value',";
  }
  $query = rtrim($query, ',');
  $query .= " WHERE id_enseignant=$id";

  // Execute query
  $result = mysqli_query($mysqli, $query);

  if ($result) {


        return true;
       
  } else {
    return false;
  }
}

// Check if ID is set and call updateTeacher function
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $data = json_decode(file_get_contents("php://input"), true);
  $updated = updateTeacher($id, $data);
  if ($updated) {
    
    echo json_encode(['success' => true, 'message' => 'Teacher updated successfully.']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Failed to update teacher.']);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'No teacher ID provided.']);
}
?>
