<?php
    $search = $_POST['searchTitle'];
    header("Location: https://havaihavai.herokuapp.com/index.php?page=search&search=$search");
    exit();