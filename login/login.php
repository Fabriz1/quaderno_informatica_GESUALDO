<?php
$lines = file("../dati.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //mette dentro l'array lines tutte le righe contenute nel file

$bool = true;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($lines as $line) {
        $dati_utente = explode(';', $line, 2);
        if ($_POST["username_login"] == $dati_utente[0] && $_POST["password_login"] == $dati_utente[1]) {
            echo "login eseguito con successo";
            $bool=false;
            break;
        }
    }
    if($bool){
        echo "credenziali errate";
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
    <h1>esegui il login</h1>
    <form action="" method="post">
        <label for="username_login">Nome utente:</label><br>
        <input type="text" name="username_login"><br><br>
        <label for="password_login">Password:</label><br>
        <input type="password" name="password_login"><br><br>
        <button type="submit">Registrati</button>
    </form>
</body>

</html>