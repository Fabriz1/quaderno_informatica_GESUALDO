<!DOCTYPE html>
<html>

    <body>
        <h1>Benvenuto nella mia prima pagina PHP</h1> <!-- Intestazione principale della pagina -->
    </body>
    <?php
    // Creazione di un oggetto DateTime per ottenere l'ora corrente nel fuso orario di Roma
    $ora_completa = new DateTime("now", new DateTimeZone('Europe/Rome'));

    // Visualizza l'orario corrente nel formato H:i:s (ore, minuti, secondi)
    echo $ora_completa->format('H:i:s');
    echo "<br>";

    // Determina il messaggio di cortesia in base all'ora corrente utilizzando uno switch
    switch ($ora_completa->format('H')) {
        case 'h<12 && h>8': // Se l'ora è tra le 8 e le 12
            $cortesia = "buongiorno";
            break;
        case "h>12 && h<=18": // Se l'ora è tra le 12 e le 18
            $cortesia = "buon pomeriggio";
            break;
        default: // Per tutti gli altri orari
            $cortesia = "buonasera";
            break;
    }

    // Creazione di una variabile per il nome
    $paolo = "paolo";

    // Visualizzazione del messaggio di cortesia con il nome
    echo "$cortesia $paolo benvenuto nella mia prima pagina PHP <br>";

    // Visualizza il browser dell'utente utilizzando la variabile $_SERVER['HTTP_USER_AGENT']
    echo "stai usando il browser: " . $_SERVER['HTTP_USER_AGENT'];
    ?>

    <h1>Benvenuto nella mia prima pagina PHP</h1> <!-- Ripetizione dell'intestazione -->

    <p>Questo codice PHP visualizza un messaggio di benvenuto personalizzato in base all'ora del giorno e mostra il
        browser che stai utilizzando.</p>

    <p>Inizialmente, viene creata una variabile `$ora_completa` che contiene l'orario corrente nel fuso orario di Roma.
        Il formato dell'orario visualizzato è `H:i:s`, che mostra le ore, i minuti e i secondi.</p>

    <p>Successivamente, viene utilizzato un'istruzione `switch` per determinare il messaggio di cortesia appropriato. Se
        l'orario è tra le 8:00 e le 12:00, viene visualizzato "buongiorno". Se l'orario è tra le 12:00 e le 18:00, viene
        mostrato "buon pomeriggio", mentre in qualsiasi altro caso verrà scritto "buonasera".</p>

    <p>Viene poi aggiunto il nome "Paolo" al messaggio di cortesia, creando un saluto completo, e infine viene mostrato
        anche il tipo di browser utilizzato dalla persona che visita la pagina, grazie alla variabile
        `$_SERVER['HTTP_USER_AGENT']`.</p>
        <br><br>
        <a href="index.html">Torna alla Home</a> <!-- Link per tornare alla pagina principale -->
    </body>

</html>
