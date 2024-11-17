<!DOCTYPE html>
<html>

<head>
    <title>Dati Utente</title>
</head>
<?php
$cognome = $_POST['cognome'];
$nome = $_POST['nome'];
$email = $_POST['email'];


if ($nickname === $nome || $nickname === $cognome) {
    echo "Il nickname non può essere uguale al nome o al cognome.";
    exit;
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "L'email inserita non è valida.";
    exit;
}
?>

<body>
    <h1>Dati Inseriti</h1>
    <ul>
        <li><strong>Nome:</strong> <?= isset($_POST['nome']) ? $_POST['nome'] : '' ?></li>
        <li><strong>Cognome:</strong> <?= isset($_POST['cognome']) ? $_POST['cognome'] : '' ?></li>
        <li><strong>Data di Nascita:</strong> <?= isset($_POST['data_nascita']) ? $_POST['data_nascita'] : '' ?></li>
        <li><strong>Codice Fiscale:</strong> <?= isset($_POST['codice_fiscale']) ? $_POST['codice_fiscale'] : '' ?></li>
        <li><strong>Email:</strong> <?= isset($_POST['email']) ? $_POST['email'] : '' ?></li>
        <li><strong>Cellulare:</strong> <?= isset($_POST['cellulare']) ? $_POST['cellulare'] : '' ?></li>
        <li><strong>Indirizzo:</strong> <?= isset($_POST['indirizzo']) ? $_POST['indirizzo'] : '' ?></li>
        <li><strong>CAP:</strong> <?= isset($_POST['cap']) ? $_POST['cap'] : '' ?></li>
        <li><strong>Comune:</strong> <?= isset($_POST['comune']) ? $_POST['comune'] : '' ?></li>
        <li><strong>Provincia:</strong> <?= isset($_POST['provincia']) ? $_POST['provincia'] : '' ?></li>
        <li><strong>Nickname:</strong> <?= isset($_POST['nickname']) ? $_POST['nickname'] : '' ?></li>
    </ul>
</body>

</html>