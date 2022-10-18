<?php
    require "database/db.php";
    $login = $_POST['nickname'];
    $pass = $_POST['password'];
    $user = selectOne('user', ['userName'=>$login]);

    $isArr = false;
    if(is_array($user)) $isArr = true;

    if($isArr===true && $user['userName'] === $login) {
        $pass = md5($pass);
        if($user['md5Password'] === $pass){
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['userName'];
            header('location: ' .  "https://havaihavai.herokuapp.com/index.php?page=profile");
        }
        else{
            $f = 'Неправильный пароль!';
        }
    }
    else{
        $f = 'Неправильный логин!';
    }

    if(!isset($_SESSION['id'])){
        header('location: ' .  "https://havaihavai.herokuapp.com/index.php?page=profile");
    }
    else{
        header('location: ' .  "https://havaihavai.herokuapp.com/index.php");
    }