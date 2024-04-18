<?php
include "connessione.php";

$sql="SELECT Nome, Cognome FROM Persone";
$ris=$db_connection->query($sql);
$opt="";

if ($ris->num_rows > 0) {
    while ($row = $ris->fetch_assoc()) {
        $opt .= '<option value="'. $row['Nome']. ' ' . $row['Cognome'] . '">' . $row['Nome']. ' ' . $row['Cognome'] . '</option>';
    }
    
    echo $opt;
} else {
    echo '<option value="">Nessuna persona trovata</option>';
}

$db_connection->close();
?>
