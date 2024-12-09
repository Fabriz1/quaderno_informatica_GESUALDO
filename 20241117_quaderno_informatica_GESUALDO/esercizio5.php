<?php
// Credenziali valide predefinite
$valid_username = "ciao"; // Nome utente valido
$valid_password = "ciao"; // Password valida

// Verifica se il metodo di richiesta è POST (ossia il modulo è stato inviato)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera i valori inviati tramite POST
    $username = $_POST['username']; // Nome utente inserito
    $password = $_POST['password']; // Password inserita

    // Controlla se il nome utente e la password corrispondono a quelli validi
    if ($username === $valid_username && $password === $valid_password) {
        // Se le credenziali sono corrette, mostra il messaggio di accesso riuscito
        echo "<h1>Accesso riuscito!</h1>";
        echo "<p>Benvenuto!! ";
        exit; // Termina l'esecuzione dello script
    } else {
        // Se le credenziali sono errate, mostra il messaggio di errore
        echo "<h1>Accesso negato!</h1>";
        echo "<p>Nome utente o password errati.</p>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title> <!-- Titolo della pagina -->
</head>

<body>
    <h1>Login</h1> <!-- Intestazione della pagina -->

    <!-- Form di login -->
    <form action="" method="post"> <!-- Il modulo invia i dati tramite il metodo POST -->
        <label for="username">Nome utente:</label><br> <!-- Etichetta per il campo nome utente -->
        <input type="text" name="username"><br><br> <!-- Campo di input per il nome utente -->

        <label for="password">Password:</label><br> <!-- Etichetta per il campo password -->
        <input type="password" name="password"><br><br> <!-- Campo di input per la password -->

        <button type="submit">Accedi</button> <!-- Pulsante per inviare il modulo -->
    </form>


<br><br>
<a href="index.html">Torna alla Home</a> <!-- Link per tornare alla pagina principale -->
<br><br>

<h1>Descrizione</h1>
<p>
    In questo codice, viene creato un semplice modulo di login che confronta i dati inseriti dall'utente (nome utente e
    password) con valori predefiniti, che in questo caso sono entrambi "ciao". Quando il modulo viene inviato tramite il
    metodo POST, PHP verifica se il nome utente e la password corrispondono a quelli validi. Se i dati sono corretti,
    viene visualizzato un messaggio di "Accesso riuscito", altrimenti viene mostrato un messaggio di errore che indica
    che il nome utente o la password sono errati.
</p>
</body>

</html>