<?php
//Includiamo il file per la connessione al dabatase
include "connessione.php";
//Facciamo una query per recuperare tutte le persone dal database,ordinate per ID nascosto in modo decrescente
$risultato = $db_connection->query("SELECT * FROM Persone ORDER BY id DESC");
//Se esistono dati,viene visualizzata la tabella,altrimenti  viene mostrato un messaggio
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
//Chiusura connessione al database
$db_connection->close();
?>
