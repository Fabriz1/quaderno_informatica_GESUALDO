<?php

$valid_username = "ciao";
$valid_password = "ciao";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if ($username === $valid_username && $password === $valid_password) {
        echo "<h1>Accesso riuscito!</h1>";
        echo "<p>Benvenuto!! ";
        exit;
    } else {
        echo "<h1>Accesso negato!</h1>";
        echo "<p>Nome utente o password errati.</p>";
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="" method="post">
        <label for="username">Nome utente:</label><br>
        <input type="text" name="username"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit">Accedi</button>
    </form>
</body>

</html>

<br><br>
<h1>Descrizione</h1>

<p>In questo codice, viene creato un semplice modulo di login che confronta i dati inseriti dall'utente (nome utente e
    password) con valori predefiniti, che in questo caso sono entrambi "ciao". Quando il modulo viene inviato tramite il
    metodo POST, PHP verifica se il nome utente e la password corrispondono a quelli validi. Se i dati sono corretti,
    viene visualizzato un messaggio di "Accesso riuscito", altrimenti viene mostrato un messaggio di errore che indica
    che il nome utente o la password sono errati.</p>