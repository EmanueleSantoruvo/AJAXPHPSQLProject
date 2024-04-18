<?php
$db="my_santoruvo";
$db_host="localhost";
$db_user="santoruvo";
$db_password="";

$db_connection=new mysqli($db_host,$db_user,$db_password,$db);
if($db_connection==false){
	die ("Si è verificato il seguente problema tecnico:".$db_connection->connect_error);
}

?>