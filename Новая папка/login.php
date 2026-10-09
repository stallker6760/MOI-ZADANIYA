<?php
session_start();

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_login = trim($_POST['login'] ?? '');
    $input_password = trim($_POST['password'] ?? '');

    $cookie_login = $_COOKIE['user_login'] ?? '';
    $cookie_password = $_COOKIE['user_password'] ?? '';

    if ($input_login === $cookie_login && $input_password === $cookie_password && $cookie_login !== '') {
        $_SESSION['authorized'] = true;
        $_SESSION['login'] = $input_login;
        $message = "Вы успешно авторизовались!";
        $messageType = "success";
    } else {
        $message = "Неверный логин или пароль";
        $messageType = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Авторизация</h2>

        <?php if ($message): ?>
            <div class="message <?php echo $messageType; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === true): ?>
            <div class="links">
                <a href="profile.php" style="font-size: 16px; font-weight: bold;">Перейти в личный кабинет</a>
            </div>
        <?php else: ?>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label>Логин</label>
                    <input type="text" name="login" required>
                </div>
                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit">Войти</button>
            </form>
        <?php endif; ?>

        <div class="links">
            <a href="register.php">Нет аккаунта? Зарегистрироваться</a>
        </div>
    </div>
</body>
</html>
