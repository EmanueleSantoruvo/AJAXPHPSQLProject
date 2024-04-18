<?php
include "connessione.php";

$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$datanascita=$_POST['datanascita'];

$sql="INSERT INTO Persone (Nome, Cognome, DataNascita) VALUES ('$nome', '$cognome', '$datanascita')";
$query=$db_connection->query($sql);


$db_connection->close();
?>
