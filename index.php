<?php
    require "db.php";

?>

<?php if( isset($_SESSION['logged_user']) ) : ?>
    Авторизован <br>
    Привет, <?php if(! isset($_SESSION['user_name']));
    echo $_SESSION['user_name']; ?>!

    <hr>
    <a href="/logout.php"> Выйти </a>

<?php else : ?>
    Вы не авторизованы! <br>
<a href="/login.php"> Авторизация </a> <br>
<a href="/signup.php"> Регистрация </a>
<?php endif; ?>