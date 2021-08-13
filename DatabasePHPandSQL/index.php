<?php

/* ----------------- 
E. 2 Databases in PHP, MySQL
Write PHP code that returns a combination of data from 2 databases.
--------------------- */

class Fruit {
    public $fruit_id ;
    public $name ;
    public $color ;
    public $weight ;

    public function setFruit($fruit_id, $name, $color) {
        $this->fruit_id = $fruit_id;
        $this->name = $name;
        $this->color = $color;

    }
    public function setFruit1($fruit_id, $weight) {
        $this->fruit_id = $fruit_id;
        $this->weight = $weight;
    }
}

$db_hostname = "localhost";
$db_username = "id17408907_fruits";
$db_password = "A{9TW5rJe-RVVnBW";
$db_name = "id17408907_fruit_username";

$conn = mysqli_connect($db_hostname , $db_username , $db_password , $db_name);

// DELETE PRIVIOUS INSERTS

$sqlD = "DELETE FROM fruits WHERE 1";
$QueryD = mysqli_query($conn, $sqlD);
$sqlD2 = "DELETE FROM fruits_info WHERE 1";
$QueryD2 = mysqli_query($conn, $sqlD2);

// INSERT THE DATA

$Sql1 = "INSERT INTO `fruits` (`fruit_id`, `name`, `color`) VALUES ('1', 'Apple', 'red')";
$Sql2 = "INSERT INTO `fruits_info` (`fruit_id`, `weight`) VALUES ('1', '100gm')";

$Query1 = mysqli_query($conn, $Sql1);
$Query2 = mysqli_query($conn, $Sql2);

// RETRIVE THE DATA

$Sql1_RETRIVE = "SELECT * FROM `fruits`"; 
$Sql2_RETRIVE = "SELECT * FROM `fruits_info`"; 

$Query1_RETRIVE = mysqli_query($conn, $Sql1_RETRIVE);
$Query2_RETRIVE = mysqli_query($conn, $Sql2_RETRIVE);

$num1 = mysqli_num_rows($Query1_RETRIVE);
$num2 = mysqli_num_rows($Query1_RETRIVE);

$fruit_class = new Fruit();

while($row = $Query1_RETRIVE->fetch_assoc()) {
    $fruit_class->setFruit( $row["fruit_id"] , $row["name"] , $row["color"] );
}

while($row = $Query2_RETRIVE->fetch_assoc()) {
    $fruit_class->setFruit1( $row["fruit_id"] , $row["weight"] );
}

echo json_encode([$fruit_class]);


?>