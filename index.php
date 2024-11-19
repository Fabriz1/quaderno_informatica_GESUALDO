
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        .buttonSing {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #ffbf00;
            /* giallo */
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .buttonSing:hover {
            background-color: #b35a00;
            /* arancione scuro */
        }
        
    </style>
</head>

<body>
    <h1>Benvenuto nel sito per la registrazione alla gesualdo crew</h1><br>
    <h2>se sei gia nostro utente clicca pure sul link per il login</h2><br>
    <a href="login/login.php" class="buttonLogin">Vai al login</a> <br>
    <h2>se non sei membro è il momento di entrare a far parte di questa famiglia!!</h2>
    <a href="singin/registrazione.php" class="buttonSing">Registrati</a> <br>
</body>

</html>