<?php
include_once("database.php");

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);

    $fname = trim($request->fname);
    $lname = trim($request->lname);
    $email = mysqli_real_escape_string($mysqli, trim($request->email));
    $pwd = mysqli_real_escape_string($mysqli, trim($request->password));
    $role = mysqli_real_escape_string($mysqli, trim($request->role)); // new field

    // Check if email and password already exist
    $sql = "SELECT * FROM $role WHERE email='$email' AND password='$pwd'";
    $result = $mysqli->query($sql);

    if($result->num_rows > 0) {
        // User already exists, log them in
        $data=array('message' => 'USER ALREADY EXISTS');
        echo json_encode($data);
    } else {
        // User does not exist, insert new user
        if ($role == 'admin') {
            $sql = "INSERT INTO admin (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$pwd')";
        } else if ($role == 'enseignant') {
            $sql = "INSERT INTO enseignant (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$pwd')";
        } else if ($role == 'etudiant') {
            $sql = "INSERT INTO etudiant (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$pwd')";
        } else {
            $data=array('message' => 'error');
            echo json_encode($data);
        }

        if($mysqli->query($sql)){
            $data=array('message' => 'success');
            echo json_encode($data);
        }else{
            $data=array('message' => 'error');
            echo json_encode($data);
        }
    }
}
?>