<?php
// Avvia la sessione
session_start();

// Verifica se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Salva i dati nella sessione (simula la registrazione)
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT); // Memorizza la password hashata

    echo "Registrazione completata! Ora puoi <a href='login.php'>accedere</a>.";
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

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Registrati</button>
    </form>
</body>
</html>
