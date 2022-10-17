<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Manrope" />
    <link rel="stylesheet" href="frontend/style/reset.css" class="css">
    <link rel="stylesheet" href="frontend/style/style.css" class="css">
    <title>ХавайХавай</title>
</head>

<body>
<div class='page'>
<?php
session_start();
    require "database/dbconnect.php";
    require "database/db.php";
    require "path.php";
    if(isset($_GET['logout'])&&$_GET['logout'] == 1){
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        header("location", BASE_URL);
    }

    require "frontend/header.php";

    if(!isset($_GET['page'])){
        $category = setCategory();
        require "frontend/main.php";
    }
    else{
        switch ($_GET['page']){
            case "main":
                isset($_GET['category']) ? $category = $_GET['category'] : $category = setCategory();
                require "frontend/main.php";
                break;

            case "myrecipes":
                if(isset($_SESSION['id'])){
                    $id_user = $_SESSION['id'];
                    require "frontend/myRecipes.php";
                }
                else
                    require "frontend/login_form.php";
                break;

            case "create-recipe":
                require "frontend/creationRecipe_form.php";
                break;

            case "profile":
                require "frontend/login_form.php";
                break;

            case "recipe":
                $id_recipe = $_GET['id_recipe'];
                require "frontend/recipe.php";
                $id_recipe = null;
                break;

            case "search":
                $title = $_GET['search'];
                require "frontend/searchedAd.php";
                break;
        }
    }




    //require "frontend/recipe.php";
    //require "frontend/creationRecipe_form.php";
    //require "frontend/login_form.php"

function setCategory(){
    $timeDay = date("H"); // Текущий час
    return match (TRUE) {
        $timeDay >= 7 && $timeDay <= 10 => "Завтрак",
        $timeDay > 12 && $timeDay <= 14 => "Обед",
        $timeDay >= 18 && $timeDay <= 21 => "Ужин",
        default => "Перекус",
    };
}
?>

</div>

</body>
</html>