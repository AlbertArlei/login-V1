<?php session_start();
$array = $_SESSION['user'];
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
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
    <title>Panel</title>
</head>

<body>
    <main>
        <div id="message-container">
            <span>you are logged in</span>
        </div>
        <div id="userInfo-container">
            <span>id:
                <span class="user-info">
                    <?php print_r($_SESSION['user']['id']); ?>
                </span>
            </span>
            <span>email:
                <span class="user-info">    
                    <?php print_r($_SESSION['user']['username']); ?>
                </span>
            </span>
            <span>username:
                <span class="user-info">
                    <?php print_r($_SESSION['user']['email']); ?>
                </span>
            </span>
            <span>password:
                <span class="user-info">
                    <?php print_r($_SESSION['user']['password']); ?>
                </span>
                (encrypted in SHA-512)
            </span>
        </div>

        <form id="edit-user">
            <div class="input-container">
                <span>Name</span>
                <input id="editUser-name" type="text" value="<?php echo $_SESSION['user']['username'] ?>" name="name"
                    placeholder="Name">
            </div>

            <div class="input-container">
                <span>E-mail</span>
                <input id="editUser-email" type="text" value="<?php echo $_SESSION['user']['email'] ?>" name="email"
                    placeholder="E-mail">
            </div>

            <input id="editUser-btn" type="submit" value="Send">
        </form>

        <form id="edit-userPassword">
        <div class="input-container">
                <span>Current password</span>
                <div class="password-container">
                    <input id="editUser-currentPassword" type="password" name="current-password" placeholder="Current password">
                    <span id="editCurrentPassword-eye" class="material-symbols-outlined">visibility</span>
                    <span id="editCurrentPassword-eyeOff" class="material-symbols-outlined">visibility_off</span>
                </div>
            </div>

            <div class="input-container">
                <span>New password</span>
                <div class="password-container">
                    <input id="editUser-newPassword" type="password" name="new-password" placeholder="New password">
                    <span id="editNewPassword-eye" class="material-symbols-outlined">visibility</span>
                    <span id="editNewPassword-eyeOff" class="material-symbols-outlined">visibility_off</span>
                </div>
            </div>

            <input id="editUserPassword-btn" type="submit" value="Send">
        </form>

        <div id="logout-btn"><span>logout</span></div>


    </main>

    <script src="../js/painel.js"></script>
</body>

</html>