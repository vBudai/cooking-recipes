<?php
    $search = $_POST['searchTitle'];
    header("Location: https://your-recipess.herokuapp.com/index.php?page=search&search=$search");
    exit();