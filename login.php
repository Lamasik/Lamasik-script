<?php
    require  "db.php";
    session_start();

    $data = $_POST;
    if( isset($data['do_login']))
    {
        $errors = array();
        $user = R::findOne('user', 'login = ?', array($data['login']));

        if($user)
        {
            // Если логин найден
            if( password_verify($data['password'], $user->password)
            ) {
                // Все хорошо, работает, то злогиниваем юзера
                $_SESSION['logged_user'] = $user;
                $_SESSION['user_name'] = $user['login'];
                header('Location: /game.php');
            } else
            {
                $errors[] = 'Неверно введён пароль!';
            }
        } else
        {
            $errors[] = 'Пользователь с таким логином не найден!';
        }

        if( ! empty($errors) )
        {
            echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
        }


    }
    ?>

<form action="login.php" method="post">

    <p>
    <p><strong> Логин </strong> </p>
    <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>


    <p>
    <p><strong> Пароль </strong> </p>
    <input type="password" name="password" value="<?php echo @$data['login']; ?>">
    </p>

    <p>
        <button type="submit" name="do_login"> Войти </button>
    </p>

</form>
