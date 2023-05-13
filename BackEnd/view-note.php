<?php
header('Access-Control-Allow-Origin: *');

include_once("database.php");

// Get notes for a specific student
function getNotes($student_id) {
    global $mysqli;
    $query = "SELECT e.fname, e.lname, n.matiere, n.note
    FROM etudiant e, note n
    WHERE e.id_etudiant=n.idetudiant AND e.id_etudiant=$student_id";
    $result = mysqli_query($mysqli, $query);
    $notes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $notes;
}

// Check if a student ID was provided
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    // Output data as JSON
    header('Content-Type: application/json');
    echo json_encode(getNotes($student_id));
} else {
    echo "Error: no student ID provided";
}
?>
