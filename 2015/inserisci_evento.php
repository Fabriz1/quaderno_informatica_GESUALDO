<?php
// inserisci_evento.php (solo form HTML)
$message = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
        $message = '<div class="message success">Evento inserito con successo!</div>';
    } elseif ($_GET['status'] === 'error') {
        $error_msg = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : 'Errore generico.';
        $message = '<div class="message error">Errore nell\'inserimento: ' . $error_msg . '</div>';
    } elseif ($_GET['status'] === 'missing_data') {
         $message = '<div class="message error">Errore: Dati mancanti.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci Evento - Community Eventi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Inserisci Nuovo Evento</h2>

        <?php echo $message; // Mostra messaggio di successo/errore ?>

        <form action="gestisci_evento.php" method="post">
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <input type="text" id="categoria" name="categoria" placeholder="Es. Concerto, Teatro" required>
            </div>
            <div class="form-group">
                <label for="luogo">Luogo Svolgimento:</label>
                <input type="text" id="luogo" name="luogo" placeholder="Es. Teatro Verdi, Firenze, FI" required>
            </div>
            <div class="form-group">
                <label for="data_evento">Data e Ora Evento:</label>
                <input type="datetime-local" id="data_evento" name="data_evento" required>
            </div>
            <div class="form-group">
                <label for="titolo">Titolo Evento:</label>
                <input type="text" id="titolo" name="titolo" required>
            </div>
            <div class="form-group">
                <label for="artisti">Artisti Coinvolti (opzionale):</label>
                <textarea id="artisti" name="artisti" rows="3"></textarea>
            </div>
            <button type="submit">Inserisci Evento</button>
        </form>
        <div class="link-container">
             <p><a href="login.php">Torna al Login (Demo)</a></p>
        </div>
    </div>
</body>
</html>