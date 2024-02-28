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

// Se l'utente ha effettuato il login
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query per verificare le credenziali
    $sql = "SELECT * FROM credenziali WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        header("Location: crud.html");
        exit();
    } else {
        echo "Credenziali non valide.";
    }
}

// Chiudi la connessione al database
$conn->close();
?>
