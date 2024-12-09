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
$utente = "ciao"; // Nome utente corretto
$password = "ciao"; // Password corretta

// Verifica del form
if ($_POST['username'] === $utente && $_POST['password'] === $password) {
    // Se le credenziali sono corrette
    echo "Accesso riuscito! Benvenuto"; // Messaggio di benvenuto
} else {
    // Se le credenziali sono errate
    echo "Accesso negato! Credenziali errate."; // Messaggio di errore
}
?>

<br><br>
<a href="../../index.html">Torna alla Home</a> <!-- Link per tornare alla pagina principale -->

</body>
</html>
