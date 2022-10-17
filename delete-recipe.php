<?php
require "database/db.php";
require "path.php";
require "database/cloud_connect.php";
use Cloudinary\Api\Upload\UploadApi;

    $id_recipe = $_GET['id'];
    $recipe = selectOne('recipe', ['id' => $id_recipe]);
    $steps = selectAll('step', ['id_recipe' => $id_recipe]);
    $ingredients = selectAll('ingredient', ['id_recipe' => $id_recipe]);




    // Удаление ингредиентов
    for($i = 0; $i < count($ingredients); $i++){
        delete('ingredient', $ingredients[$i]['id']);
    }

    // Удаление шагов
    for($i = 0; $i < count($steps); $i++){
        $stepImg = new UploadApi();
        $id_img = getImageId($steps[$i]['image']);
        if($id_img != "")
            $stepImg->destroy($id_img);

        delete('step', $steps[$i]['id']);
    }

    //Удаление главного изображения
    $mainImg = new UploadApi();
    $mainImgUrl = getImageId($recipe['mainImage']);
    if($mainImgUrl != "")
        $mainImg->destroy($mainImgUrl);

    delete('recipe', $recipe['id']);

    header("Location: ".BASE_URL."index.php?page=myrecipes");
    exit();

function getImageId($url){
    $id_img = "";
    for($j = strlen($url) - 5; $j > 0; $j--){
        if($url[$j] == '/'){
            break;
        }
        else{
            $id_img = $url[$j].$id_img;
        }
    }
    return $id_img;
}