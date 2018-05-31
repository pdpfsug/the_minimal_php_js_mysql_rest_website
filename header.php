<?php
session_start();

function authenticated($u, $p) {
    /* Questa funzione si occupa di autenticare l'utente:
     *
     * param u: nome utente
     * param p: password
     *
     * return true se autenticato, false altrimenti
     */

    $DBNAME = "esempio";

    $conn = mysqli_connect("localhost", "phpminimal", "phpcrazy") or die("Non riesco a connettermi");
    mysqli_select_db($conn, $DBNAME);

    $ris = mysqli_query($conn, "SELECT * FROM utente WHERE username='$u' AND password=PASSWORD('$p');");

    if ($ris->num_rows > 0) {
        return $ris[0]["user_id"];
    } else {
        return false;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Sito PHP/JS/HTML/REST</title>
        <link rel="stylesheet" href="assets/bulma.css">
        <script defer src="assets/font-awesome.min.js"></script>
    </head>
  <body>
    <script src="assets/jquery-3.3.1.min.js"></script>
    <nav>
        <ul>
            <li><a href="/login.php">Home</a></li>
            <li><a href="/login-minimal.php">Home minimale</a></li>
            <li><a href="/client.php">Comunica la tua posizione</a></li>
            <li><a href="/dashboard.php">Tabella</a></li>
            <li><a href="/dashboard-ajax.php">Tabella (AJAX)</a></li>
            <li><a href="/logout.php">Logout</a></li>
        </ul>
    </nav>
