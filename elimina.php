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

// Verifica se è stato inviato un ID per l'eliminazione
if (isset($_GET['id']) && isset($_GET['tabella'])) {
    $id = $_GET['id'];
    $tabella = $_GET['tabella'];

    // Prepara e esegui la query di eliminazione
    $sql = "DELETE FROM $tabella WHERE ID_$tabella=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record eliminato con successo";
    } else {
        echo "Errore durante l'eliminazione del record: " . $conn->error;
    }
}

// Chiudi la connessione al database
$conn->close();
?>
