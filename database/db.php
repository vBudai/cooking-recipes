<?php
    require "dbconnect.php";

    function tt($value){
        echo "<br>";
        print_r($value);
        echo "<br>";
    }

    //Проверка выполнения запроса к бд
    function dbCheckError($query){
        $errInfo = $query->errorInfo();
        if($errInfo[0] !== PDO::ERR_NONE){
            echo $errInfo[2];
            exit();
        }
        return true;
    }

    //Запрос на получение данных c одной таблицы
    function selectAll($table, $params = []){
        global $conn;
        $sql = "SELECT * from $table";

        if(!empty($params)){
            $i = 0;
            foreach ($params as $key => $value){
                if(!is_numeric($value)){
                    $value = "'" . $value . "'";
                }
                if($i === 0){
                    $sql = $sql . " WHERE $key = $value";
                }
                else{
                    $sql = $sql . " AND $key = $value";
                }
                $i++;
            }
        }

        $query = $conn->prepare($sql);
        $query->execute();
        dbCheckError($query);
        return $query->fetchAll();
    }

    //Запрос на получение одной строки с выбранной таблицы
    function selectOne($table, $params = []){
        global $conn;
        $sql = "SELECT * from $table";

        if(!empty($params)){
            $i = 0;
            foreach ($params as $key => $value){
                if(!is_numeric($value)){
                    $value = "'" . $value . "'";
                }
                if($i === 0){
                    $sql = $sql . " WHERE $key = $value";
                }
                else{
                    $sql = $sql . " AND $key = $value";
                }
                $i++;
            }
        }
        //$sql = $sql . " LIMIT 1";
        $query = $conn->prepare($sql);
        $query->execute();
        dbCheckError($query);
        return $query->fetch();
    }

    //Запись в таблицу БД
    function insert($table, $params){
        global $conn;
        $i = 0;
        $coll = '';
        $mask = '';
        foreach ($params as $key => $value){
            if($i===0){
                $coll = $coll ."$key";
                $mask = $mask . "'" . "$value" . "'";
            }
            else{
                $coll = $coll .", $key";
                $mask = $mask . ", '" . "$value" . "'";
            }
            $i++;
        }

        $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
        //echo $sql . "<br>";
        $query = $conn->prepare($sql);
        $query->execute();

        dbCheckError($query);
        return $conn->lastInsertId();
    }

    //Функция обновления данных в таблице
    function update($table, $id, $params){
        global $conn;
        $i = 0;
        $str = '';
        foreach ($params as $key => $value){
            if($i === 0){
                $str = $str . $key . " = '" . $value . "'";
            }
            else{
                $str = $str .", " . $key . " = '" . $value . "'";
            }
            $i++;
        }

        $sql = "UPDATE $table SET $str WHERE id=$id";
        $query = $conn->prepare($sql);
        $query->execute($params);
        dbCheckError($query);
    }

    //Функция удаления данных в таблице
    function delete($table, $id){
        global $conn;
        $sql = "DELETE FROM $table WHERE id=$id";
        $query = $conn->prepare($sql);
        $query->execute();
        dbCheckError($query);
    }



//Функция удаления данных в таблице
    function search($table, $title){
        global $conn;
        $sql = "SELECT * FROM $table WHERE title LIKE '%$title%'";
        $query = $conn->prepare($sql);
        $query->execute();
        dbCheckError($query);
        return $query->fetchAll();
    }