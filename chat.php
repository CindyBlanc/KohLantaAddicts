<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=projetaddicts;charset=utf8", "root", "");

if(isset($_POST['pseudo']) AND isset($_POST['message']) AND !empty($_POST['pseudo']) AND !empty($_POST['message']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $message = nl2br(htmlspecialchars($_POST['message']));
    $insertmsg = $bdd->prepare('INSERT INTO chat(pseudo, message) VALUES(?, ?)');
    $insertmsg->execute(array($pseudo, $message));
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Comforter&family=Roboto&display=swap');
</style> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Conversation Koh Lanta des addicts</title>
</head>
<body>
<?php
    if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] == "welcome") // Si le mot de passe est bon
    {
    // On affiche les codes
    ?>
    <h1>
        Bienvenue sur la conversation du Koh Lanta des Addicts
    </h1>
    <section id="messagerie">
    <form method="post" action="">
        <input type="text" name="pseudo" placeholder="Pseudo" value="<?php if(isset($pseudo)) {echo $pseudo; } ?>" />
        <br>
        <textarea type="text" name="message" placeholder="Ton message"></textarea>
        <br>
        <input type="submit" value="Envoyer"/>
    </form>
    </section>

    <section id="message"></section>

<script>
    setInterval('load_message()', 500);
    function load_message() {
        $('#message').load('loadMessage.php');
    }
</script>
<?php
    }
    else // sinon, on affiche un message d'erreur
    {
        echo ' <div class="mdperror">
                <p>Mot de passe incorrect</p>
                <a href="index.php">Retenter ?</a>
                </div>
                ';
    }
    ?>
</body>
</html>