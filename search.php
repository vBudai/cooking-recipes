<?php
    $search = $_POST['searchTitle'];
    header("Location: https://cooking-recipes/index.php?page=search&search=$search");
    exit();