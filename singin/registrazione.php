<?php
$lines = file("../dati.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //mette dentro l'array lines tutte le righe contenute nel file

$boleano=true;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($lines as $line) {
        $dati_utente = explode(';', $line, 2);
        if ($_POST["username"] == $dati_utente[0]) {
            echo "hai inserito un nome non univoco, reiserisci i dati";
            $boleano=false;
        }


    }
    if($boleano){
    echo "dati caricati correttamente, vai alla pagina di login";
    $dati_da_inserire = $_POST["username"] . ";" . $_POST["password"] . "\n";
    $fileHandle = fopen("../dati.txt", 'a');
    fwrite($fileHandle, $dati_da_inserire);
    fclose($fileHandle);
}
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .buttonLogin {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007BFF;
            /* Blu */
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .buttonLogin:hover {
            background-color: #0056b3;
            /* Blu scuro */
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Esegui il sing in inserendo i dati</h1>
    <form action="" method="post">
        <label for="username">Nome utente(lo userai per accedere) (univoco):</label><br>
        <input type="text" name="username"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit">Registrati</button>
    </form>
</body>

</html>