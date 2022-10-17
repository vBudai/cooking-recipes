<?php
    $search = $_POST['searchTitle'];
    header("Location: https://yours-recipes.herokuapp.com/index.php?page=search&search=$search");
    exit();