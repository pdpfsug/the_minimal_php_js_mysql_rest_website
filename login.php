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
        $_SESSION['login'] ="";
    }
}
?>

<section class="section">
    <h2>
    <?php
        if(!(isset($_SESSION['login']) && $_SESSION['login'] != ''))
            echo "Non sei autenticato";
        else
            echo "Ciao ".$_SESSION['login'];
    ?>
    </h2>


    <form class="container" action="" method="POST">
        <div class="field">
            <p class="control has-icons-left has-icons-right">
                <input class="input" name="username" type="text" placeholder="Username">
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
            </p>
        </div>
        <div class="field">
            <p class="control has-icons-left">
                <input class="input" name="password" type="password" placeholder="Password">
                <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                </span>
            </p>
        </div>
        <div class="field">
            <p class="control">
                <button class="button is-success">Login</button>
            </p>
        </div>
    </form>
</section>


<?php require "footer.html"; ?>
