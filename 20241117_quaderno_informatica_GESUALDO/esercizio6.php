<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = $_POST['numero'];
    echo '<table border="2">';

    echo '<tr>';
    echo "<td>numero</td>";
    echo "<td>quadrato</td>";
    echo "<td>cubo</td>";
    for ($i = 1; $i <= $num; $i++) {
        echo '<tr>';
        $e = $i;
        echo "<td>$e</td>";
        $e = $i * $i;
        echo "<td>$e</td>";
        $e = $i * $i * $i;
        echo "<td>$e</td>";

        echo '</tr>';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>esercizio6</title>
</head>

<body>
    <h1>INSERISCI IL NUMERO DA ELEVARE ALLA MASSIMA POTENZA</h1>
    <form action="" method="post">
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
        <button type="submit">esegui</button>
    </form>
</body>
<br><br>
<h1>Descrizione</h1>
<p>In questo codice HTML, l'utente inserisce un numero da 1 a 10 tramite un menu a tendina. Dopo aver premuto il
    pulsante "Esegui", viene visualizzata una tabella con tre colonne: la prima colonna mostra i numeri da 1 fino al
    numero scelto, la seconda colonna mostra i quadrati dei numeri e la terza colonna mostra i cubi. Il codice PHP
    utilizza il metodo POST per ottenere il numero selezionato e calcolare il quadrato e il cubo di ciascun numero,
    quindi visualizzare i risultati in una tabella.</p>

</html>