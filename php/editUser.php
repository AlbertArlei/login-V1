<?php
session_start();
include('./connect.php');
$jsonPayload = file_get_contents('php://input');
$form = json_decode($jsonPayload);
$id = $_SESSION['user']['id'];
$select = mysqli_query($conn, "SELECT id, username, email, password FROM user WHERE id='$id'");
$selectData = mysqli_fetch_assoc($select);

if (isset($form->currentPassword)) {
    $newPassword = hash('sha512', $form->newPassword);
    $currentPassword = hash('sha512', $form->currentPassword);

    if ($currentPassword === $selectData['password']) {
        http_response_code(200);
        echo json_encode(['message' => 'sucess']);
        $update = mysqli_query($conn, "UPDATE user SET password = '$newPassword' WHERE id='$id'");
        $_SESSION['user']['password'] = $newPassword;
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Current password incorrect']);
    }
} elseif (isset($form->username) || isset($form->email)) {
    $username = mysqli_real_escape_string($conn, $form->username);
    $email = mysqli_real_escape_string($conn, $form->email);
    if ($select->num_rows > 0) {
        http_response_code(200);
        echo json_encode(['message' => 'sucess']);
        $update = mysqli_query($conn, "UPDATE user SET username ='$username', email = '$email' WHERE id='$id'");

        $_SESSION['user'] = ['id' => $id, 'username' => $username, 'email' => $email, 'password' => $selectData['password']];
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'algo ']);
    }
}