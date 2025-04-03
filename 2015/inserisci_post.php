<?php
// inserisci_post.php (solo form HTML)
// Potresti aggiungere qui logica PHP per mostrare messaggi di successo/errore
// come in inserisci_evento.php, se crei lo script processa_post.php
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lascia un Commento/Voto - Community Eventi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Lascia un Commento/Voto</h2>

        <!-- Questo form invia i dati a processa_post.php (da creare) -->
        <form action="processa_post.php" method="post">
            <div class="form-group">
                <label for="id_evento">ID Evento:</label>
                <!-- In un'app reale, questo sarebbe un campo nascosto o
                     determinato dalla pagina dell'evento che stai visualizzando -->
                <input type="number" id="id_evento" name="id_evento" placeholder="Inserisci l'ID numerico dell'evento" required>
            </div>

            <div class="form-group">
                <label for="commento">Commento (opzionale):</label>
                <textarea id="commento" name="commento" rows="4" placeholder="Scrivi qui il tuo commento..."></textarea>
            </div>

            <div class="form-group">
                <label for="voto">Voto (da 1 a 5):</label>
                <select id="voto" name="voto" required>
                    <option value="" disabled selected>-- Seleziona un voto --</option>
                    <option value="1">1 - Pessimo</option>
                    <option value="2">2 - Scarso</option>
                    <option value="3">3 - Sufficiente</option>
                    <option value="4">4 - Buono</option>
                    <option value="5">5 - Ottimo</option>
                </select>
            </div>

            <button type="submit">Invia Post</button>
        </form>
        <div class="link-container">
             <p><a href="inserisci_evento.php">Torna a Inserisci Evento (Demo)</a></p>
             <p><a href="login.php">Torna al Login (Demo)</a></p>
        </div>
    </div>
</body>
</html>