<!-- La seguente pagina web permette di inserire in una tabella i dati relativi a tutte le persone nel database e visualizzarli in una tabella che appare al caricamento della pagina e che si aggiorna ogni volta che si aggiunge o rimuove un record -->
<!DOCTYPE html>
<html>

<head>
    <title>AJAX PHP Form</title>
    <!-- Inserimento delle librerie open source di AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <!-- Form e relativi bottoni -->
    <h1>Benvenuto</h1>
    <form id="form">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br>
        <label for="cognome">Cognome:</label><br>
        <input type="text" id="cognome" name="cognome" required><br>
        <label for="datanascita">Data di nascita:</label><br>
        <input type="date" id="datanascita" name="datanascita" required><br>
        <input type="submit" value="Invia">
    </form>
    <button id="rimuovi">Rimuovi ultimo inserito</button>
    <div id="tabella"></div>

    <script>

        $(document).ready(function() { //Appena il file è caricato esegue le istruzioni
            function AggiornaTabella() { //funzione per la visualizzazione della tabella,usando GET poichè più veloce
                $.ajax({
                    type: "GET",
                    url: "tabella.php",
                    success: function(response) {
                        $("#tabella").html(response);
                    }
                });
            }
            AggiornaTabella();

            $("#form").submit(function(event) { //Appena viene premuto il pulsante invia si passano i dati alla pagina inserisci.php
                event.preventDefault();//permette la non cancellazione dei dati nel form,se volessimo inserire magari la stessa persona ma con due date di nascite diverse
                var formData = $(this).serialize(); //variabile che salva i dati prima di mandarli alla pagina
                $.ajax({
                    type: "POST",
                    url: "inserisci.php",
                    data: formData,
                    success: function() {
                        AggiornaTabella(); 
                    }
                });
                AggiornaTabella(); 
            });

            $("#rimuovi").click(function() {//Appena viene premuto il pulsante rimuovi si chiama la pagina rimuovi.php
                $.ajax({
                    type: "GET",
                    url: "rimuovi.php",
                    success: function() {
                        AggiornaTabella();
                    }
                });
                AggiornaTabella();
            });
        });
    </script>
</body>

</html>
