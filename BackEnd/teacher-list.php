<?php
include_once("database.php");

// Get all teachers
function getTeachers() {
    global $mysqli;
    $query = "SELECT * FROM enseignant";
    $result = mysqli_query($mysqli, $query);
    $teachers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $teachers;
}

// Output data as JSON
header('Content-Type: application/json');
echo json_encode(getTeachers());
?>
