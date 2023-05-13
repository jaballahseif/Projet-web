<?php
include_once("database.php");

// Delete teacher by ID
function deleteStudent($id) {
    global $mysqli;
    $query = "DELETE FROM etudiant WHERE id_etudiant=$id";
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
    $deleted = deleteStudent($id);
    if ($deleted) {
        echo json_encode(['success' => true, 'message' => 'student deleted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete student.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No student ID provided.']);
}

?>
