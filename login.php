<?php
session_start();
if (isset($_SESSION['user'])) header('Location: ./php/panel.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;800&family=Montserrat&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;800&family=Montserrat&display=swap"
        rel="stylesheet">
    <title>login</title>
</head>

<body>
    <main>
        <div id="notification-container">
            <span>nome pequeno</span>
        </div>
        <form id="create-user">
            <div class="input-container">
                <span>Name</span>
                <input id="createUser-name" type="text" name="name" placeholder="Name">
            </div>

            <div class="input-container">
                <span>E-mail</span>
                <input id="createUser-email" type="text" name="email" placeholder="E-mail">
            </div>

            <div class="input-container">
                <span>Password</span>
                <div class="password-container">
                    <input id="createUser-password" type="password" name="password" placeholder="Password">
                    <span id="createPassword-eye" class="material-symbols-outlined">
                        visibility
                    </span>
                    <span id="createPassword-eyeOff" class="material-symbols-outlined">
                        visibility_off
                    </span>
                </div>
            </div>

            <div class="input-container">
                <span>Confirm password</span>
                <div class="password-container">
                    <input id="createUser-confirmPassword" type="password" name="confirm-password"
                        placeholder="Confirm password">
                    <span id="createConfirmPassword-eye" class="material-symbols-outlined">
                        visibility
                    </span>
                    <span id="createConfirmPassword-eyeOff" class="material-symbols-outlined">
                        visibility_off
                    </span>
                </div>
            </div>
            <span id="login-form">already have an account</span>

            <input id="createUser-btn" type="submit" value="Send">
        </form>

        <div id="notification-container"></div>

        <form id="login-user">

            <div class="input-container">
                <span>E-mail</span>
                <input id="loginUser-email" type="text" name="email" placeholder="E-mail">
            </div>

            <div class="input-container">
                <span>Password</span>
                <div class="password-container">
                    <input id="loginUser-password" type="password" name="password" placeholder="Password">
                    <span id="loginPassword-eye" class="material-symbols-outlined">
                        visibility
                    </span>
                    <span id="loginPassword-eyeOff" class="material-symbols-outlined">
                        visibility_off
                    </span>
                </div>
            </div>
            <span id="create-form">don't have an account</span>

            <input id="loginUser-btn" type="submit" value="Send">
        </form>
    </main>
    <script src="./js/login.js"></script>
    <script src="./js/createUser.js"></script>
    <script src="./js/loginProcess.js"></script>
</body>

</html>