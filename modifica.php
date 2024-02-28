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

// Esegui una query per modificare un gioco
$sql = "UPDATE videogiochi SET PREZZO = '59.99' WHERE TITOLO = 'Call of Duty'";
if ($conn->query($sql) === TRUE) {
    echo "Gioco modificato con successo";
} else {
    echo "Errore durante la modifica del gioco: " . $conn->error;
}
$conn->close();
?>
