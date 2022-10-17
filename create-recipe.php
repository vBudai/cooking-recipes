<?php
use Cloudinary\Api\Upload\UploadApi;


    session_start();
    set_time_limit(180);

    require "database/db.php";
    require "vendor/autoload.php";
    require "database/cloud_connect.php";

    $id_user = $_SESSION['id'];

    $title = $_POST['recipe-title'];
    $category = $_POST['category'];
    $recipe_info = $_POST['recipe-info'];



    if($_FILES['main-img']['tmp_name'] == ""){
        $imgUrl = "https://res.cloudinary.com/dx0qgt7t5/image/upload/v1665838173/cooking-recipes/nofoto_j3flby.png";
    }
    else{
        $main_img_name = strval(rand(0, 1000000)); // Случайное название для файла

        $upload = new UploadApi();

        $upload = json_encode($upload->upload($_FILES['main-img']['tmp_name'], [
                                              'public_id' => $main_img_name,
                                              'use_filename' => TRUE,
                                              'overwrite' => FALSE]));
        $imgUrl = json_decode($upload, true)['url'];
    }

    $cooking_time = $_POST['cooking-time'];
    $portions = $_POST['portions-count'];

    $recipe_params = [
        'id_user'=> $id_user,
        'title'=>$title,
        'mainImage'=>$imgUrl,
        'cookingTime'=>$cooking_time,
        'serviceCount'=>$portions,
        'info'=>$recipe_info,
        'category'=>$category
    ];

    $id_recipe = insert("recipe", $recipe_params);

    //Ингридиенты
    $ingredients = array();
    $i = 0;
    foreach ($_POST['ingredient'] as $item){
        $ingredients[$i] = [
            'id_recipe' => $id_recipe,
            'name' => $item
            ];
        $i++;
    }
    foreach($ingredients as $item){
        insert("ingredient", $item);
    }

    //Фото шагов
    $steps = array();

    for($i=0;$i<count($_FILES['step_img']['tmp_name']);$i++){ //Парсинг фото
        if($_FILES['step_img']['tmp_name'][$i] == ""){
            $stepImg_Url = "https://res.cloudinary.com/dx0qgt7t5/image/upload/v1665838173/cooking-recipes/nofoto_j3flby.png";
            $steps[$i] = [
                'id_recipe' => $id_recipe,
                'image' => $stepImg_Url
            ];
        }
        else {
            $stepImg = new UploadApi();
            $stepImg_Url = strval(rand(0, 1000000));
            echo '<br>'.$i.'<br>';
            echo $_FILES['step_img']['tmp_name'][$i];

            $stepImg = json_encode( $stepImg->upload($_FILES['step_img']['tmp_name'][$i], [
                                                    'public_id' => $stepImg_Url,
                                                    'use_filename' => TRUE,
                                                    'overwrite' => FALSE]));
            $stepUrl = json_decode($stepImg, true)['url'];
            $steps[$i] = [
                'id_recipe' => $id_recipe,
                'image' => $stepUrl
            ];
        }
    }

    //Описание шага
    $i = 0;
    foreach($_POST['step_info'] as $item){ //Парсинг описания
        $steps[$i] += [
            'info' => $item
        ];
        $i++;
    }
    foreach ($steps as $item){
        if($item['info'] != "")
        insert("step", $item);
    }

    header("Location: https://yours-recipes.herokuapp.com/index.php?page=recipe&id_recipe=$id_recipe");
    exit();