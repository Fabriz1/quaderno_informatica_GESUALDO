<!DOCTYPE html>
<html>
<style>
    body {
        font-family: monospace;
    }
</style>

<body>
    <?php
    for ($i = 0; $i <= 10; $i++) {

        for ($b = 0; $b < $i; $b++) {
            echo "*";
        }
        echo "<br>";
    }

    echo "<br>";
    echo "<br>";
    for ($i = 10; $i >= 0; $i--) {

        for ($b = 0; $b < $i; $b++) {
            echo "*";
        }
        echo "<br>";
    }

    echo "<br>";
    echo "<br>";

    for ($i = 0; $i <= 10; $i++) {

        for ($b = 0; $b < $i; $b++) {
            echo '&nbsp;';
        }
        for ($b = 0; $b < 10 - $i; $b++) {
            echo "*";
        }
        echo "<br>";
    }
    echo "<br>";
    echo "<br>";

    for ($i = 10; $i >= 0; $i--) {

        for ($b = 0; $b < $i; $b++) {
            echo '&nbsp;';
        }
        for ($b = 0; $b < 10 - $i; $b++) {
            echo "*";
        }
        echo "<br>";
    }

    ?>
    <h1>Descrizione del Codice PHP per la Stampa di Stelle</h1>

    <p>Questo codice PHP genera quattro diverse figure di stelle nel browser, utilizzando dei cicli annidati per formare
        delle piramidi e dei rombi. La prima parte del codice stampa una piramide crescente di stelle, mentre la seconda
        parte stampa una piramide decrescente. Successivamente, vengono stampate due figure a forma di piramide, una in
        cui le stelle sono allineate a sinistra e l'altra in cui sono centrate.</p>

    <h2>Figura 1: Piramide Crescente</h2>
    <p>Il primo ciclo esterno va da 0 a 10 e per ogni valore di `$i`, il ciclo interno stampa `$i` stelle. Questo crea
        una piramide crescente.</p>

    <h2>Figura 2: Piramide Decrescente</h2>
    <p>Il secondo ciclo esterno va da 10 a 0 e per ogni valore di `$i`, il ciclo interno stampa `$i` stelle, creando una
        piramide decrescente.</p>

    <h2>Figura 3: Piramide Crescente con Stelle Allineate a Destra</h2>
    <p>Il terzo ciclo esterno va da 0 a 10, ma stavolta si aggiungono degli spazi (`&nbsp;`) prima delle stelle, per
        allineare le stelle a destra mentre la piramide cresce.</p>

    <h2>Figura 4: Piramide Decrescente con Stelle Allineate a Destra</h2>
    <p>Il quarto ciclo esterno va da 10 a 0, e simile al caso precedente, si utilizzano gli spazi per allineare le
        stelle a destra mentre la piramide decresce.</p>

</body>

</html>