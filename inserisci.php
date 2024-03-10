<?php
//Includiamo il file per la connessione al dabatase
include "connessione.php";
//Prendiamo i dati  inviati dal form
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$datanascita = $_POST['datanascita'];
//Query per l'inserimento della persona
$sql = "INSERT INTO Persone (Nome, Cognome, DataNascita) VALUES ('$nome', '$cognome', '$datanascita')";
$db_connection->query($sql);
//Chiusura connessione al database
$db_connection->close();
?>
