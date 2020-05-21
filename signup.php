<?php
    require "db.php";
/*    session_start();*/

    $data = $_POST;
    if( isset($data['do_signup']) )
    {
        // Место регистрации
        $errors = array();
        if( trim($data['login']) == '' )
        {
            $errors[] = 'Введите логин!';
        }

        if( $data['password'] == '' )
        {
            $errors[] = 'Введите пароль!';
        }

        if( $data['password_2'] != $data['password'] ) {
            $errors[] = 'Повторный пароль не введён или введён не верно!';
        }

        if( R::count('user', "login = ?", array($data['login'])) > 0  )
        {
            $errors[] = 'Пользователь с таким логиным уже существует!';
        }


        if( empty($errors) )
        {
            // Все ок, можно зарегать
            // To create a new bean (of type 'book') use: \ RedBean PHP
            $user = R::dispense('user');
            $user->login = $data['login'];
            $user->password = password_hash($data['password'], PASSWORD_DEFAULT); // Хранение пароля в открытом доступе. Не рекомендуется
            R::store($user);
            echo '<div style="color: green;">Вы успешно зарегестрированы!</div><hr>'; ?>
<?php
        } else
        {
            echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
        }
    }



    ?>



<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesignup.css" type="text/css">
</head>
<body>
<form class="form" action="/signup.php" method="post">

    <h1 class="form_title"> Регистрация </h1>

    <div class="form_grup">
        <label class="form_label"> Логин </label>
        <input class="form_input" placeholder="" type="text" name="login" value="<?php echo @$data['login']; ?>">
    </div>
    <div class="form_grup">
        <label class="form_label"> Пароль </label>
        <input class="form_input" placeholder="" type="password" name="password" value="<?php echo @$data['password']; ?>">
    </div>
    <div class="form_grup">
        <label class="form_label"> Повторите пароль </label>
        <input class="form_input" placeholder="" type="password" name="password_2" value="<?php echo @$data['password_2']; ?>">
    </div>

    <button class="form_button" type="submit" name="do_signup"> Войти </button>

</form>
<body>
</html>







<!--<link rel="stylesheet" href="stylesignup.css" type="text/css">  -->
<!--<form class="form" action="/signup.php" method="post">
    <h1 class="form_title"> Регистрация </h1>
    <div class="form_grup">
        <p>
            <p><strong> Логин </strong> </p>
        <input class="form_input" type="text" name="login" value="<?php /*echo @$data['login']; */?>">
        </p>
    </div>


    <div class="form_grup">
    <p>
        <p><strong> Пароль </strong> </p>
        <input class="form_input" type="password" name="password" value="<?php /*echo @$data['password']; */?>">
    </p>
    </div>

    <div class="form_grup">
    <p>
        <p><strong> Повторите пароль </strong> </p>
        <input class="form_input" type="password" name="password_2" value="<?php /*echo @$data['password_2']; */?>">
    </p>
    </div>

    <p>
        <button class="form_button" type="submit" name="do_signup"> Зарегестрироваться </button>
    </p>

</form>-->
