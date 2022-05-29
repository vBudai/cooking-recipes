<?php
    require "dbconnect.php";

    //Проверка выполнения запроса к бд
    function dbCheckError($query){
        $errInfo = $query->errorInfo();
        if($errInfo[0] !== PDO::ERR_NONE){
            echo $errInfo[2];
            exit();
        }
        return true;
    }

    //Запрос на получение данных одной таблицы
    function selectAll($table, $params = []){
        global $conn;
        $sql = "SELECT * from $table WHERE";
        $query = $conn->prepare($sql);
        $query->execute();

        dbCheckError($query);

        return $query->fetchAll();
    }

    $params = [
        'nickname' => 'DaDa'
    ];