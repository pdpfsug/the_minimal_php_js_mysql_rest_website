<?php
require "header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];


    $user_id = authenticated($username, $password);
    if ( $user_id ) {
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user_id;
        header ("Location: client.php");
        exit;
    }
    else {
        $_SESSION['username'] ="";
        $_SESSION['user_id'] = false;
    }
}
?>

<h2>
<?php
    if(!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
        echo "Non sei autenticato";
        echo "<h3>Puoi entrare con <nick>:<nick></h3>";
    } else
        echo "Ciao ".$_SESSION['username'];
?>
</h2>

<form name="login" action="" method="POST">
    Utente <input name="username" type="text" value="">
    <br>
    <p>Password <input name="password" type="password" value="" size="20"> </p>
    <button type="submit">INVIA</button>

</form>

<?php

require "footer.html";

?>
