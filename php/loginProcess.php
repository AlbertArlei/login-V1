<?php
session_start();
include('./connect.php');
$jsonPayload = file_get_contents('php://input');
$form = json_decode($jsonPayload);
$email = $form->email;
$password = hash('sha512', $form->password);

$read = mysqli_query($conn, "SELECT id, username, email, password FROM user WHERE email = '$email' AND password = '$password'");
if($read->num_rows > 0){
    $dados = [];
    while($dado = mysqli_fetch_assoc($read)){
        $dados[] = $dado;
        $_SESSION['user'] = $dado;
    }
    http_response_code(201);

}else{
    http_response_code(500);
}