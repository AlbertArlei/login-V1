<?php
include('./connect.php');
$jsonPayload = file_get_contents('php://input');
$form = json_decode($jsonPayload);
header('Content-Type: application/json');

$select = mysqli_query($conn, "SELECT email FROM user WHERE email = '$form->email'");
if ($select->num_rows > 0) {
    http_response_code(400);
    $notify = ['message' => 'e-mail in use'];
    echo json_encode($notify);;
} else {
    $username = mysqli_real_escape_string($conn, $form->username);
    $email = mysqli_real_escape_string($conn, $form->email);
    if($form->password === $form->confirmPassword){
        $password = hash('sha512', $form->password);
        $insert = mysqli_query($conn, "INSERT INTO user (username, email, password) values ('$username', '$email', '$password')");
        http_response_code(200);
        $notify = ['message' => 'account created successfully'];
        echo json_encode($notify);;
    }else{
        http_response_code(400);
        $notify = ['message' => 'the passwords are not the same'];
        echo json_encode($notify);
    }
}