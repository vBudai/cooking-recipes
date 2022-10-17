<?php
    $search = $_POST['searchTitle'];
    header("Location: https://vbudai.github.io/cooking-recipes/index.php?page=search&search=$search");
    exit();