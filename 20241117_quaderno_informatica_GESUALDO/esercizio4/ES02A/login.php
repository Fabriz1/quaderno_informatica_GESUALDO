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
