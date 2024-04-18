<!DOCTYPE html>
<html>

<head>
    <title>AJAX PHP Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
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
    <label for="rimuovi">Seleziona persona da rimuovere:</label><br>
    <select id="rimuovi">
        <!-- Qui appariranno le opzioni dei nomi -->
    </select>
    <button id="btnRimuovi">Rimuovi selezionato</button>
    <div id="tabella"></div>

    <script>
        $(document).ready(function() {
            function AggiornaTabella() {
                $.ajax({
                    type: "GET",
                    url: "tabella.php",
                    success: function(response) {
                        $("#tabella").html(response);
                    }
                });
            }

            function OpzioniRimozione() {
                $.ajax({
                    type: "GET",
                    url: "opzioni_rimozione.php",
                    success: function(response) {
                        $("#rimuovi").html(response);
                    }
                });
            }
            AggiornaTabella();
            OpzioniRimozione();

            $("#form").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "inserisci.php",
                    data: formData,
                    success: function() {
                        AggiornaTabella();
                        OpzioniRimozione();
                    }
                });
            });
                AggiornaTabella();
                OpzioniRimozione();

            $("#btnRimuovi").click(function() {
                var persona = $("#rimuovi").val();
                $.ajax({
                    type: "GET",
                    url: "rimuovi.php",
                    data: { persona: persona },
                    success: function() {
                        AggiornaTabella();
                        OpzioniRimozione();
                    }

                });
            });
                AggiornaTabella();
                OpzioniRimozione();
        });
        
    </script>
</body>

</html>
