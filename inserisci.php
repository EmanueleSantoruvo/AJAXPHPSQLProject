<?php
include "connessione.php";

$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$datanascita=$_POST['datanascita'];

$check_query="SELECT * FROM Persone WHERE Nome='$nome' AND Cognome='$cognome' AND DataNascita='$datanascita'";
$check_res=$db_connection->query($check_query);

if ($check_res->num_rows>0){
    die();
}
else{
    $sql="INSERT INTO Persone (Nome, Cognome, DataNascita) VALUES ('$nome', '$cognome', '$datanascita')";
    $query=$db_connection->query($sql);
}

$db_connection->close();
?>
