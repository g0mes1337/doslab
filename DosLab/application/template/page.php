<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DosLab</title>
    <link rel="stylesheet" href="assets/css/style_main.css">
    <link rel="icon" href="assets/image/clover.png">
    <?= $scripts ?>
</head>
<body>
<header>
    <nav class="navbar">
        <a class="logo" href="/doslab">Dos<span class="green">Lab</span></a>
        <div class="header">
            <div class="head_container">
                <ul class="head">
                    <li><a href="courses">Курсы</a></li>
                    <li><a href="contact">Контакты</a></li>
                    <li><a href="about">О Нас</a></li>
                </ul>
                <?php if (isset($_SESSION['mail']) && $_SESSION['root'] == "user") {
                    ?>
                    <ul class="head_2">
                        <li><a href="lk">Личный кабинет</a></li>
                        <li><a href="" onclick="LogOut();">Выход</a></li>
                    </ul>
                    <?php
                } else if (!isset($_SESSION['mail']) && $_SESSION['root'] == "user" && !isset($_SESSION['id_user']) && !isset($_SESSION['name'])) { ?>
                    <ul class="head_2">
                        <li><a href="signUp">Зарегистрироваться</a></li>
                        <li><a href="logIn">Войти</a></li>
                    </ul>
                    <?php
                } else if (empty($_SESSION)) {
                    ?>
                    <ul class="head_2">
                        <li><a href="signUp">Зарегистрироваться</a></li>
                        <li><a href="logIn">Войти</a></li>
                    </ul><?php } ?>

                <?php if ($_SESSION['root'] == "admin") { ?>
                    <ul class="head_2">
                        <li><a href="admin">Админ-панель</a></li>
                        <li><a onclick="LogOut();">Выход</a></li>

                    </ul><?php
                }
                ?>

            </div>
        </div>
    </nav>
</header>
<?= $content ?>
<footer>
    <div class="footer-container">
        <div class="footer">
            <div class="footer_under">
                <nav class="navbar_footer">
                    <div class="navigation_footer">
                        <a class="about" href="about">О Нас</a>
                        <a class="about" href="condition">Пользовательское соглашение</a>
                    </div>
                </nav>
                <div class="footer_social">
                    <a href="" class="footer_social_1"><img class="social" src="assets/image/vk.png" alt=""></a>
                    <a href="" class="footer_social_1"><img class="social" src="assets/image/Twitter.png" alt=""></a>
                    <a href="" class="footer_social_1"><img class="social" src="assets/image/facebook.png" alt=""></a>
                </div>
            </div>
            <div class="footer_info">
                <a href="" class="footer_address">г. Астрахань ул. Адмиралтейская д. 22</a>
                <a href="" class="footer_mode">Режим работы: пн-пт с 9-00 до 20-00</a>
            </div>
            <div class="footer-copyright"></div>
        </div>
    </div>
</footer>
</body>
</html>