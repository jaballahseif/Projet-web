<?php
include_once("database.php");

// Get all teachers
function getStudents() {
    global $mysqli;
    $query = "SELECT * FROM etudiant";
    $result = mysqli_query($mysqli, $query);
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $students;
}

// Output data as JSON
header('Content-Type: application/json');
echo json_encode(getStudents());
?>
