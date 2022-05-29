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
    require "data/dbconnect.php";
    require "frontend/header.php";

    require "frontend/recipe.php";
    require "frontend/main.php";
    require "frontend/creationRecipe_form.php";
    require "frontend/login_form.php"
?>

</div>

</body>
</html>