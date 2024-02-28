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

// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera il nome della tabella selezionata dal form
    $tabella = $_POST["tabella"];
    
    // Prepara e esegui l'inserimento dei dati nella tabella specificata
    switch($tabella) {
        case "videogiochi":
            $titolo = $_POST["titolo"];
            $genere = $_POST["genere"];
            $prezzo = $_POST["prezzo"];
            $sql = "INSERT INTO videogiochi (TITOLO, GENERE, PREZZO) VALUES ('$titolo', '$genere', '$prezzo')";
            break;
        case "utenti":
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            $indirizzo = $_POST["indirizzo"];
            $email = $_POST["email"];
            $sql = "INSERT INTO utenti (NOME, COGNOME, INDIRIZZO, EMAIL) VALUES ('$nome', '$cognome', '$indirizzo', '$email')";
            break;
        case "ordine":
            $id_utente = $_POST["id_utente"];
            $data_ordine = $_POST["data_ordine"];
            $sql = "INSERT INTO ordine (ID_UTENTE, DATA_ORDINE) VALUES ('$id_utente', '$data_ordine')";
            break;
        case "carrello":
            $id_utente = $_POST["id_utente"];
            $sql = "INSERT INTO carrello (ID_UTENTE) VALUES ('$id_utente')";
            break;
        default:
            echo "Tabella non valida";
            exit();
    }
    
    // Esegui la query per l'inserimento dei dati
    if ($conn->query($sql) === TRUE) {
        echo "Record aggiunto con successo";
    } else {
        echo "Errore durante l'aggiunta del record: " . $conn->error;
    }
}

// Chiudi la connessione al database
$conn->close();
?>
