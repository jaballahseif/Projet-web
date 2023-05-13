<?php
include_once("database.php");

// Search for teachers by name
function searchTeachers($name) {
    global $mysqli;
    $query = "SELECT * FROM etudiant WHERE fname LIKE '%$name%' OR lname LIKE '%$name%'";
    $result = mysqli_query($mysqli, $query);
    $teachers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $teachers;
}

// Get search term from URL parameter
$searchTerm = $_GET['searchTerm'];

// Output data as JSON
header('Content-Type: application/json');
echo json_encode(searchTeachers($searchTerm));
?>
