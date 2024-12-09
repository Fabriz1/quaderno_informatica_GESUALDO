<!DOCTYPE html>
<html>

<head>
    <title>Dati Utente</title> <!-- Titolo della pagina -->
</head>

<?php
// Recupero dei dati inviati tramite POST
$cognome = $_POST['cognome']; // Cognome dell'utente
$nome = $_POST['nome']; // Nome dell'utente
$email = $_POST['email']; // Email dell'utente

// Controllo sul nickname 
if ($nickname === $nome || $nickname === $cognome) {
    // Se il nickname è uguale al nome o al cognome, mostra un errore e termina l'esecuzione
    echo "Il nickname non può essere uguale al nome o al cognome.";
    exit;
}

// Validazione dell'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Se l'email non è valida, mostra un errore e termina l'esecuzione
    echo "L'email inserita non è valida.";
    exit;
}
?>

<body>
    <h1>Dati Inseriti</h1> <!-- Intestazione della pagina -->

    <!-- Elenco dei dati inseriti dall'utente -->
    <ul>
        <!-- Visualizza il nome, se è stato inviato -->
        <li><strong>Nome:</strong> <?= isset($_POST['nome']) ? $_POST['nome'] : '' ?></li>

        <!-- Visualizza il cognome, se è stato inviato -->
        <li><strong>Cognome:</strong> <?= isset($_POST['cognome']) ? $_POST['cognome'] : '' ?></li>

        <!-- Visualizza la data di nascita, se è stata inviata -->
        <li><strong>Data di Nascita:</strong> <?= isset($_POST['data_nascita']) ? $_POST['data_nascita'] : '' ?></li>

        <!-- Visualizza il codice fiscale, se è stato inviato -->
        <li><strong>Codice Fiscale:</strong> <?= isset($_POST['codice_fiscale']) ? $_POST['codice_fiscale'] : '' ?></li>

        <!-- Visualizza l'email, se è stata inviata -->
        <li><strong>Email:</strong> <?= isset($_POST['email']) ? $_POST['email'] : '' ?></li>

        <!-- Visualizza il numero di cellulare, se è stato inviato -->
        <li><strong>Cellulare:</strong> <?= isset($_POST['cellulare']) ? $_POST['cellulare'] : '' ?></li>

        <!-- Visualizza l'indirizzo, se è stato inviato -->
        <li><strong>Indirizzo:</strong> <?= isset($_POST['indirizzo']) ? $_POST['indirizzo'] : '' ?></li>

        <!-- Visualizza il CAP, se è stato inviato -->
        <li><strong>CAP:</strong> <?= isset($_POST['cap']) ? $_POST['cap'] : '' ?></li>

        <!-- Visualizza il comune, se è stato inviato -->
        <li><strong>Comune:</strong> <?= isset($_POST['comune']) ? $_POST['comune'] : '' ?></li>

        <!-- Visualizza la provincia, se è stata inviata -->
        <li><strong>Provincia:</strong> <?= isset($_POST['provincia']) ? $_POST['provincia'] : '' ?></li>

        <!-- Visualizza il nickname, se è stato inviato -->
        <li><strong>Nickname:</strong> <?= isset($_POST['nickname']) ? $_POST['nickname'] : '' ?></li>
    </ul>

    <br><br>
    <!-- Link per tornare alla home -->
    <a href="../index.html">Torna alla Home</a>
</body>

</html>
