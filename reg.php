<?php
    require "database/db.php";
    $login = trim($_POST['nickname']);
    $pass = trim($_POST['password']);
    $pass_sec = trim($_POST['password_repeat']);
    $admin = '0';

    if($login === '' || $pass === '' || $pass_sec === ''){
        $f = "Не все поля заполнены!";
    }
    else if(mb_strlen($login, 'UTF8') < 2){
        $f = "Логин должен быть больше 2-х символов!";
    }
    else if($pass !== $pass_sec){
        $f = "Пароли не совпадают!";

    }
    else{
        $isExist = selectOne('user', ['userName' => $login]);

        $isArr = false;
        if(is_array($isExist)) $isArr = true;

        if($isArr===true && $isExist['userName'] === $login){
            $f = "Такой логин уже занят";
        }
        else{
            $pass = md5($pass);
            $post = [
                'userName' => $login,
                'md5Password' => $pass,
                'admin' =>  $admin
            ];
            $id = insert('user', $post);
            $user = selectOne('user', ['id'=>$id]);

            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['userName'];
        }
    }

    if(!isset($_SESSION['id'])){
        $f = $login;
        header('location: ' .  "https://cooking-recipes/index.php?page=profile");
    }
    else{
        header('location: ' .  "https://cooking-recipes/index.php");
    }
