<?php
// Avvia la sessione
session_start();

// Verifica se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Salva il nome utente nella sessione
    $_SESSION['username'] = $_POST['username'];

    echo "Registrazione completata! Ora puoi <a href='../login_session/login.php'>accedere</a>.";
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
</head>
<body>
    <h2>Registrati</h2>
    <form method="POST">
        <label for="username">Nome utente:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <button type="submit">Registrati</button>
    </form>
</body>
</html>
