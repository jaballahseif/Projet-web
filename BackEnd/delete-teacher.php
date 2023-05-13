<?php
include_once("database.php");

// Delete teacher by ID
function deleteTeacher($id) {
    global $mysqli;
    $query = "DELETE FROM enseignant WHERE id_enseignant=$id";
    $result = mysqli_query($mysqli, $query);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Check if ID is set and call deleteTeacher function
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleted = deleteTeacher($id);
    if ($deleted) {
        echo json_encode(['success' => true, 'message' => 'Teacher deleted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete teacher.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No teacher ID provided.']);
}

?>
