<!DOCTYPE html>
<html>
<head>
    <title>Tabella PHP</title>
</head>
<body>
    <?php
    echo '<table border="1">';
    for ($c = 1; $c <= 10; $c++) {
        echo '<tr>'; 
        for ($i = 1; $i <= 10; $i++) {
            $e = $c * $i;
            echo "<td>$e</td>"; 
        }
        echo '</tr>'; 
    }
    echo '</table>';
    ?>
    <p>Questo codice crea una tabella che mostra i risultati della moltiplicazione di numeri da 1 a 10. Per fare ciò, il ciclo esterno (da 1 a 10) crea le righe della tabella, mentre il ciclo interno (anch'esso da 1 a 10) calcola il prodotto tra i numeri della riga e della colonna. Ogni risultato viene inserito in una cella della tabella.</p>
    <p>Il risultato finale è una tabella 10x10 che mostra tutte le moltiplicazioni tra i numeri da 1 a 10.</p>
</body>
</html>

