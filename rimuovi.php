<?php
include "connessione.php";

$persona=$_GET['persona'];
$sql="DELETE FROM Persone WHERE CONCAT(Nome, ' ', Cognome) = '$persona'";
$db_connection->query($sql);

$db_connection->close();
?>


