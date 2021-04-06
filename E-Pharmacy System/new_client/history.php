<?php

include 'server_configuration.php'; 
$conn = new mysqli($host, $username, $passwrd, "PROJECTDB"); //store new conn, connect to database myDB
if ($conn->connect_error) { // if there is error
    die("Connection failed: " . $conn->connect_error); // print the error and kill connection
}
 
class History{
    public function StoreSession($session = null, $table = "history"){
        if ($this -> conn != null){
            if ($session!= null){
                $columns = implode(',', array_keys($session));
                $values = "'".implode("','".array_values($session))."'";
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table,$columns,$values);
                $result = $this->conn->query($query_string);
                if ($result){
                    echo "Session Data Inserted Successfully";

                }
            }
        }
    }
}

$obj = new History();
$obj -> StoreSession($_SESSION["shopping-cart"]);


 ?>