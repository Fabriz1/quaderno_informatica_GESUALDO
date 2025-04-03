<?php
// login.php (solo form HTML, nessuna logica PHP qui)
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Community Eventi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="placeholder_process_login.php" method="post">
            <!-- Logica di login NON implementata in questo esempio -->
            <div class="form-group">
                <label for="email">Email o Nickname:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Accedi</button>
        </form>
         <div class="link-container">
            <p>Non hai un account? <a href="registrazione.php">Registrati</a></p>
            <p><a href="inserisci_evento.php">Inserisci Evento (Demo)</a></p> <!-- Link diretto per test -->
        </div>
    </div>
</body>
</html>