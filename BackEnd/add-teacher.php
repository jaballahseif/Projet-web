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

   
  
        $sql = "INSERT INTO enseignant (fname, lname, email, password,role) VALUES ('$fname', '$lname', '$email', '$pwd','enseignant')";
  

    if($mysqli->query($sql)){
        $data=array('message' => 'success');
        echo json_encode($data);
    }else{
        $data=array('message' => 'error');
        echo json_encode($data);
    }
}
?>
