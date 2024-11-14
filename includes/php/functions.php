<?php

  require_once("dbcon.php");

  function database_delete_data($con, $table, $constriant, $identifier){
    $first_check = database_fetch_data($con, $table, $constriant, $identifier, $constriant);
    if($first_check['code'] === 200){
      $sql  = "DELETE FROM {$table} ";
      $sql .= " WHERE {$constriant} = :{$constriant}";

      try {
        $stmt = $con->prepare($sql);
        $stmt->execute([":{$constriant}" => $identifier]);
        $return = ["code" => 200, "message" => "ok"];
      } catch (PDOException $e){
        $return = ["code" => 501, "message" => $e->getMessage()];
      } finally{
        return $return;
      }
    }
    return ["code" => 404, "message" => $first_check['message']];
  }

  function database_fetch_data($con, $table, $constriant, $identifier, $columns = "*"){
    $sql  = "SELECT {$columns} FROM {$table} ";
    $sql .= " WHERE {$constriant} = :{$constriant}";
    try {
      $stmt = $con->prepare($sql);
      $stmt->execute([":{$constriant}" => $identifier]);
      $database = $stmt->fetch(PDO::FETCH_ASSOC);
      if($database){
        $return = ["code" => 200, "message" => $database];
      } else {
        $return = ["code" => 404, "message" => $database]; //empty
      }
    } catch (PDOException $e) {
      $return = ["code" => 501, "message" => $e->getMessage()];
    } finally{
      return $return;
    }
  }

  function database_fetch_table($con, $table, $columns = "*"){
    $sql = "SELECT {$columns} FROM {$table}";    
    try {
      $stmt = $con->prepare($sql);
      $stmt->execute();
      $database = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if($database){
        $return = ["code" => 200, "message" => $database];
      } else {
        $return = ["code" => 404, "message" => $database]; //empty
      }
    } catch (PDOException $e) {
      $return = ["code" => 501, "message" => $e->getMessage()];
    } finally{
      return $return;
    }
  }

  function database_insert($con, $table, $data){
    if (is_assoc($data[0]) && count($data) > 0){
      $columns = implode(", ", array_keys($data[0]));
      $values  = [];
      foreach ($data[0] as $key => $value){
        $values[] = ":{$key}";
        //$Values[':'.$key] = $value;
      }
      $values = implode(", ", $values);
    } elseif (count($data) == 0){
      return [
        "code" => 400,
        "message" => "Empty array provided"
      ];
    } else{
      return [
        "code" => 400,
        "message" => "Invalid data type: non array provided"
      ];
    }
    $sql  = "INSERT INTO {$table} ($columns) ";
    $sql .= " VALUES ({$values})";

    try{
      $stmt = $con->prepare($sql);
      ##################################################
      #$stmt->execute($Values);
      foreach($data as $row){
        $stmt->execute($row);
      }
      ##################################################
      $return = ["code" => 200, "message" => $con->lastInsertId()];
    } catch (PDOException $e){
      $return = ["code" => 501, "message" => $e->getMessage()];
    } finally {
      return $return;
    }
  }

  function database_insert_unique($con, $table, $data){
    $constriant = array_key_first($data);
    $first_check = database_fetch_data($con, $table, $constriant, $data[$constriant], "id");
    switch ($first_check ['code']) {
      case 404:
        return database_insert($con, $table, [$data]);
      case 200:
        return ["code" => "402", "message" => $first_check['message']['id']];      
      default:
        return ["code" => "501", "message" => $first_check['message']];
    }
  }

  function database_update_data($con, $table, $data, $constriant, $identifier){
    if (is_assoc($data) && count($data) > 0){
      $values  = [];
      foreach ($data as $key => $value){
        $values[] = "{$key} = :{$key}";
        $Values[':'.$key] = $value;
      }
      $values = implode(", ", $values);
    } else{
      return ["code" => 400, "message" => "Empty array or invalid data type provided"];
    }
  }

  function get_id($con, $table, $constriant, $id){
    $tag_id = database_fetch_data($con, $table, $constriant, $id, "id");
    if ($tag_id['code'] == 200){
      return ["code" => 200, "message" => $tag_id['message']["id"]];
    } elseif ($tag_id['code'] == 404){
      return ["code" => 404, "message" => "null"];
    } else {
      return ["code" => 500, "message" => "error"];
    }
  }

  function hersh($text, $len = 32, $min = 3){
    $hash = hash(
      "SHA256",
      zlib_encode(
        zlib_encode(
          hash(
            "SHA256",
            base64_encode(
              $text
            )
          ),
          ZLIB_ENCODING_GZIP
        ),
        ZLIB_ENCODING_RAW
      )
    );
    return substr($hash, $min, $min+$len);
  }

  function is_assoc ($array){
    if(is_array($array)){
      $keys = array_keys($array);
      if ($keys !== range(0, count($array) - 1)){
        return True;
      } else {
        return false;
      }
    } else {
      return False;
    }
  }

  function login($con, $key){
    $key = hersh($key);
    sleep(rand(3,7));
    $user = get_id($con, "su", "user", $key);
    return $user['code'] === 200 ? TRUE : FALSE;
  }

  function percentage($x, $y, $z = 100){
    return ($x/$y)*$z;
  }
?>