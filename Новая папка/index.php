<?php
session_start();

if (!isset($_SESSION['authorized']) || $_SESSION['authorized'] !== true) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header("Location: login.php");
    exit;
}

function safeOutput($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$userLogin = safeOutput($_COOKIE['user_login'] ?? 'Не указано');
$userName = safeOutput($_COOKIE['user_name'] ?? 'Не указано');
$userAge = safeOutput($_COOKIE['user_age'] ?? 'Не указано');
$userGender = safeOutput($_COOKIE['user_gender'] ?? 'Не указано');
$userFood = safeOutput($_COOKIE['user_food'] ?? 'Не указано');
$userClothing = safeOutput($_COOKIE['user_clothing'] ?? 'Не указано');
$userMusic = safeOutput($_COOKIE['user_music'] ?? 'Не указано');
$userHobby = safeOutput($_COOKIE['user_hobby'] ?? 'Не указано');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Моя анкета</h2>
        <div class="profile-data">
            <p><span>Логин:</span> <?php echo $userLogin; ?></p>
            <p><span>Имя:</span> <?php echo $userName; ?></p>
            <p><span>Возраст:</span> <?php echo $userAge; ?> лет</p>
            <p><span>Пол:</span> <?php echo $userGender; ?></p>
            <p><span>Предпочтения в еде:</span> <?php echo $userFood; ?></p>
            <p><span>Стиль одежды:</span> <?php echo $userClothing; ?></p>
            <p><span>Любимая музыка:</span> <?php echo $userMusic; ?></p>
            <p><span>Хобби:</span> <?php echo $userHobby; ?></p>
        </div>
        <div class="links" style="margin-top: 30px;">
            <a href="profile.php?action=logout" style="color: #dc3545;">Выйти из аккаунта</a>
        </div>
    </div>
</body>
</html>
