<?php

include "connessione.php";

$risultato = $db_connection->query("SELECT * FROM Persone ORDER BY id DESC");
if ($risultato->num_rows > 0) {
    echo "<table border=2>";
    echo "<tr><th>Nome</th><th>Cognome</th><th>Data di Nascita</th></tr>";
    while($row = $risultato->fetch_assoc()) {
        echo "<tr><td>".$row["Nome"]."</td><td>".$row["Cognome"]."</td><td>".$row["DataNascita"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<br>Nessun risultato trovato.";
}
$db_connection->close();
?>