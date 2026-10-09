<?php
$message = '';
$messageType = '';
//Git add .
// Git commit -m "SamaOdecvatnost"
//im not a fucking Gemini, im from china, my name is DEEPSEEK, not a fucking American Capetalistic idiot
//+79852452426 Love u boy
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $age = trim($_POST['age'] ?? '');
    $gender = trim($_POST['gender'] ?? '');
    $food = trim($_POST['food'] ?? '');
    $clothing = trim($_POST['clothing'] ?? '');
    $music = trim($_POST['music'] ?? '');
    $hobby = trim($_POST['hobby'] ?? '');

    if (empty($login) || empty($password) || empty($name) || empty($age)) {
        $message = "Пожалуйста, заполните все обязательные поля (Логин, Пароль, Имя, Возраст).";
        $messageType = "error";
    } elseif (!is_numeric($age) || $age < 10 || $age > 100) {
        $message = "Укажите корректный возраст (от 10 до 100 лет).";
        $messageType = "error";
    } else {
        $expire = time() + (7 * 24 * 60 * 60);
        setcookie('user_login', $login, $expire, '/');
        setcookie('user_password', $password, $expire, '/');
        setcookie('user_name', $name, $expire, '/');
        setcookie('user_age', $age, $expire, '/');
        setcookie('user_gender', $gender, $expire, '/');
        setcookie('user_food', $food, $expire, '/');
        setcookie('user_clothing', $clothing, $expire, '/');
        setcookie('user_music', $music, $expire, '/');
        setcookie('user_hobby', $hobby, $expire, '/');

        $message = "Регистрация прошла успешно!";
        $messageType = "success";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Регистрация</h2>
        <?php if ($message): ?>
            <div class="message <?php echo $messageType; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <?php if ($messageType !== 'success'): ?>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <label>Логин *</label>
                    <input type="text" name="login" required>
                </div>
                <div class="form-group">
                    <label>Пароль *</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label>Имя *</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Возраст *</label>
                    <input type="number" name="age" required>
                </div>
                <div class="form-group">
                    <label>Пол</label>
                    <select name="gender">
                        <option value="Мужской">Мужской</option>
                        <option value="Женский">Женский</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Предпочтения в еде</label>
                    <select name="food">
                        <option value="Всеядность">Всеядность</option>
                        <option value="Вегетарианство">Вегетарианство</option>
                        <option value="Веганство">Веганство</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Стиль одежды</label>
                    <select name="clothing">
                        <option value="Кэжуал">Кэжуал</option>
                        <option value="Спортивный">Спортивный</option>
                        <option value="Деловой">Деловой</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Любимая музыка</label>
                    <input type="text" name="music">
                </div>
                <div class="form-group">
                    <label>Хобби</label>
                    <input type="text" name="hobby">
                </div>
                <button type="submit">Зарегистрироваться Хотите, я могу что то добавить и дописать ваш код,обращайтесь, с уважением яндекс алиса про 228</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>