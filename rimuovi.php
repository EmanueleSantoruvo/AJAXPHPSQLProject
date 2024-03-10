<?php
//Includiamo il file per la connessione al dabatase
include "connessione.php";
//Query per la rimozione della persona
$sql = "DELETE FROM Persone ORDER BY id DESC LIMIT 1";
$db_connection->query($sql);
//Chiusura connessione al database
$db_connection->close();
?>

