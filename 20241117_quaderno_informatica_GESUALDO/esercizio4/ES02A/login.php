<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
<?php
// Credenziali predefinite
$utente = "ciao";
$password = "ciao";

// Verifica del form
if ($_POST['username'] === $utente && $_POST['password'] === $password) {
    echo "Accesso riuscito! Benvenuto";
} else {
    echo "Accesso negato! Credenziali errate.";
}
?>
<br><br>
<a href="../../index.html">Torna alla Home</a>    
</body>
</html>