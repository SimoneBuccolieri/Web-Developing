<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>Lista degli eventi</h1>
    <table>
        <tr>
            <th>Oggetto</th>
            <th>Data</th>
            <th>Azioni</th>
        </tr>
        <?php
        // Assicurati di avere incluso il file per la connessione al database
        #require 'index.php';  // ad esempio, il file che contiene la connessione $conn
        
        // Recupera gli eventi dal database
        $eventi = getDB();
        
        foreach ($eventi as $evento) {
            echo "<tr>";
            echo "<td><p>" . $evento->getOggetto() . "</p></td>";
            echo "<td><p>" . $evento->getDatetime() . "</p></td>";
            echo "<td><a href='index.php?removeid=" . $evento->getId() . "'>Rimuovi</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
