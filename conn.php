<?php
$host="localhost";
$db_user="root";
$db_psw="";
$db_name="e1";
try{
    $conn=mysqli_connect($host,$db_user,$db_psw,$db_name,"3306");
}catch (Exception $e){
    echo $e->getMessage();
}
