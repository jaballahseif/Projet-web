<?php
include_once("database.php");

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);

    $idenseignant = trim($request->idenseignant);
    $idetudiant = trim($request->idetudiant);
    $matiere = mysqli_real_escape_string($mysqli, trim($request->matiere));
    $note = mysqli_real_escape_string($mysqli, trim($request->note));

    $sql = "INSERT INTO note (idenseignant, idetudiant, matiere, note) VALUES ('$idenseignant', '$idetudiant', '$matiere', '$note')";

    if($mysqli->query($sql)){
        $response = array('message' => 'success');
        echo json_encode($response);
    }else{
        $response = array('message' => 'error');
        echo json_encode($response);
    }
}


?>