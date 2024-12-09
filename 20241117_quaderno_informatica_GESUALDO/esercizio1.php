<!DOCTYPE html>
<html>
<head>
    <title>Tabella PHP</title> <!-- Titolo della pagina -->
</head>
<body>
    <?php
    echo '<table border="1">'; // Inizio della tabella con bordo
    for ($c = 1; $c <= 10; $c++) { // Ciclo esterno: genera le righe della tabella
        echo '<tr>'; // Inizio di una riga della tabella
        for ($i = 1; $i <= 10; $i++) { // Ciclo interno: genera le colonne di ogni riga
            $e = $c * $i; // Calcola il prodotto tra il numero di riga ($c) e il numero di colonna ($i)
            echo "<td>$e</td>"; // Crea una cella della tabella con il risultato del prodotto
        }
        echo '</tr>'; // Fine di una riga della tabella
    }
    echo '</table>'; // Fine della tabella
    ?>
    <p>Questo codice crea una tabella che mostra i risultati della moltiplicazione di numeri da 1 a 10. Per fare ciò, il ciclo esterno (da 1 a 10) crea le righe della tabella, mentre il ciclo interno (anch'esso da 1 a 10) calcola il prodotto tra i numeri della riga e della colonna. Ogni risultato viene inserito in una cella della tabella.</p>
    <p>Il risultato finale è una tabella 10x10 che mostra tutte le moltiplicazioni tra i numeri da 1 a 10.</p>
    <br><br>
    <a href="index.html">Torna alla Home</a> <!-- Link per tornare alla pagina principale -->
</body>
</html>
