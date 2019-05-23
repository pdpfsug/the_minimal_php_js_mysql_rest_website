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
        $user = mysqli_fetch_assoc($ris);
        return $user["id"];
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {

          // Get all "navbar-burger" elements
          var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

          // Check if there are any navbar burgers
          if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(function ($el) {
              $el.addEventListener('click', function () {

                // Get the target from the "data-target" attribute
                var target = $el.dataset.target;
                var $target = document.getElementById(target);

                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

              });
            });
          }

        });
    </script>

	Modifica body
    <nav role="navigation" aria-label="main navigation" class="navbar is-primary">
        <div class="navbar-brand">
            <a class="navbar-item" href="/"> PHP/JS/CSS site </a>
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="my_menu">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu" id="my_menu">
            <a class="navbar-item" href="/login.php">Home</a>
            <a class="navbar-item" href="/login-minimal.php">Home minimale</a>
            <a class="navbar-item" href="/client.php">Comunica la tua posizione</a>
            <a class="navbar-item" href="/dashboard.php">Tabella</a>
            <a class="navbar-item" href="/dashboard-ajax.php">Tabella (AJAX)</a>
            <a class="navbar-item" href="/logout.php">Logout</a>
        </div>
    </nav>
