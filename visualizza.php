<?php
// Connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "negozio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Esegui una query per visualizzare i dati
$sql = "SELECT * FROM videogiochi";
$result = $conn->query($sql);

// Chiudi la connessione al database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza Dati</title>
    <link rel="stylesheet" href="visualizza.css">
</head>
<body>
    <div class="container">
        <h1>Elenco Videogiochi</h1>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>ID Gioco</th>
                    <th>Titolo</th>
                    <th>Genere</th>
                    <th>Prezzo</th>
                </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["ID_GIOCO"]; ?></td>
                        <td><?php echo $row["TITOLO"]; ?></td>
                        <td><?php echo $row["GENERE"]; ?></td>
                        <td><?php echo $row["PREZZO"]; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>Nessun risultato trovato</p>
        <?php endif; ?>
    </div>
</body>
</html>
