<?php
// registrazione.php (solo form HTML, nessuna logica PHP qui)
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione - Community Eventi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Registrati</h2>
        <form action="placeholder_process_registration.php" method="post">
            <!-- Logica di registrazione NON implementata in questo esempio -->
            <div class="form-group">
                <label for="nickname">Nickname:</label>
                <input type="text" id="nickname" name="nickname" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="cognome">Cognome:</label>
                <input type="text" id="cognome" name="cognome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="categorie">Categorie Interesse (es. Concerti,Teatro):</label>
                <input type="text" id="categorie" name="categorie">
            </div>
             <div class="form-group">
                <label for="provincia">Provincia Utente (es. FI, RM):</label>
                <input type="text" id="provincia" name="provincia" required>
            </div>
            <button type="submit">Registrati</button>
        </form>
        <div class="link-container">
            <p>Hai già un account? <a href="login.php">Accedi</a></p>
        </div>
    </div>
</body>
</html>