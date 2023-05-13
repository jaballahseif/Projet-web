<?php
include_once("database.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
if(isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);
    $email = mysqli_real_escape_string($mysqli, trim($request->email));
    $pwd = mysqli_real_escape_string($mysqli, trim($request->password));

    $sql_etudiant = "SELECT 'etudiant' as role, id_etudiant as id FROM etudiant WHERE email='$email' and password='$pwd'";
    $sql_admin = "SELECT 'admin' as role, id_admin as id FROM admin WHERE email='$email' and password='$pwd'";
    $sql_enseignant = "SELECT 'enseignant' as role, id_enseignant as id FROM enseignant WHERE email='$email' and password='$pwd'";

    $sql = $sql_etudiant . " UNION " . $sql_admin . " UNION " . $sql_enseignant;

    $result = mysqli_query($mysqli, $sql);
    $nums = mysqli_num_rows($result);

    if($nums > 0){
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $role = $row['role'];
        $data=array('message' => 'success', 'email' => $email, 'role' => $role, 'id' => $id);
        echo json_encode($data);
    }
    else{
        $data=array('message' => 'error');
        echo json_encode($data);
    }
}

?>
