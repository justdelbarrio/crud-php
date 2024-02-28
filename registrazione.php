<?php
session_start();

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

// Se l'utente ha inviato il modulo di registrazione
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Verifica che le password corrispondano
    if ($password !== $confirm_password) {
        echo "Le password non corrispondono.";
    } else {
        // Query per inserire le nuove credenziali nel database
        $sql = "INSERT INTO credenziali (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Registrazione avvenuta con successo!";
        } else {
            echo "Errore durante la registrazione: " . $conn->error;
        }
    }
}

// Chiudi la connessione al database
$conn->close();
?>
