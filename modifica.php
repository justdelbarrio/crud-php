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

// Verifica se è stato inviato un ID per la modifica
if (isset($_GET['id']) && isset($_GET['tabella'])) {
    $id = $_GET['id'];
    $tabella = $_GET['tabella'];

    // Esegui una query per selezionare l'elemento da modificare
    $sql = "SELECT * FROM $tabella WHERE ID_$tabella=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Nessun risultato trovato";
    }
}

// Chiudi la connessione al database
$conn->close();
?>
