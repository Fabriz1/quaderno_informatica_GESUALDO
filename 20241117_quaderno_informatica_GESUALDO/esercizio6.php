<?php
// Controlla se il metodo della richiesta è POST (il modulo è stato inviato)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera il numero selezionato dall'utente dal form
    $num = $_POST['numero'];

    // Inizio della tabella HTML con bordo
    echo '<table border="2">';

    // Crea l'intestazione della tabella con tre colonne
    echo '<tr>';
    echo "<td>numero</td>"; // Colonna per i numeri
    echo "<td>quadrato</td>"; // Colonna per i quadrati
    echo "<td>cubo</td>"; // Colonna per i cubi

    // Ciclo per generare le righe della tabella
    for ($i = 1; $i <= $num; $i++) {
        echo '<tr>'; // Inizio della riga

        // Prima colonna: mostra il numero attuale
        $e = $i;
        echo "<td>$e</td>";

        // Seconda colonna: calcola e mostra il quadrato del numero
        $e = $i * $i;
        echo "<td>$e</td>";

        // Terza colonna: calcola e mostra il cubo del numero
        $e = $i * $i * $i;
        echo "<td>$e</td>";

        echo '</tr>'; // Fine della riga
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>esercizio6</title> <!-- Titolo della pagina -->
</head>

<body>
    <h1>INSERISCI IL NUMERO DA ELEVARE ALLA MASSIMA POTENZA</h1> <!-- Intestazione della pagina -->

    <!-- Form per selezionare un numero e inviarlo tramite POST -->
    <form action="" method="post">
        <!-- Menu a tendina con opzioni numeriche da 1 a 10 -->
        <SELECT name="numero">
            <OPTION>1</OPTION>
            <OPTION>2</OPTION>
            <OPTION>3</OPTION>
            <OPTION>4</OPTION>
            <OPTION>5</OPTION>
            <OPTION>6</OPTION>
            <OPTION>7</OPTION>
            <OPTION>8</OPTION>
            <OPTION>9</OPTION>
            <OPTION>10</OPTION>
        </SELECT>
        <button type="submit">esegui</button> <!-- Pulsante per inviare il modulo -->
    </form>
</body>

<br><br>
<a href="index.html">Torna alla Home</a> <!-- Link per tornare alla home -->
<br><br>

<h1>Descrizione</h1>
<p>
    In questo codice HTML, l'utente inserisce un numero da 1 a 10 tramite un menu a tendina. Dopo aver premuto il
    pulsante "Esegui", viene visualizzata una tabella con tre colonne:
</p>
<ul>
    <li>La prima colonna mostra i numeri da 1 fino al numero scelto.</li>
    <li>La seconda colonna mostra i quadrati dei numeri.</li>
    <li>La terza colonna mostra i cubi dei numeri.</li>
</ul>
<p>
    Il codice PHP utilizza il metodo POST per ottenere il numero selezionato, calcola il quadrato e il cubo di ciascun
    numero, e visualizza i risultati in una tabella.
</p>

</html>
