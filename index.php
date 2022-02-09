<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=projetaddicts;charset=utf8", "root", "");

if(isset($_POST['pseudo']) AND isset($_POST['message']) AND !empty($_POST['pseudo']) AND !empty($_POST['message']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);
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

    <title>Conversation Koh Lanta des addicts</title>
</head>
<body>
    <h1>
        Bienvenue sur la conversation du Koh Lanta des Addicts
    </h1>

    <form method="post" action="">
        <input type="text" name="pseudo" placeholder="Pseudo">
        <br>
        <textarea type="text" name="message" placeholder="Ton message"></textarea>
        <br>
        <input type="submit" value="Envoyer">
    </form>

    <?php 
    $allmsg = $bdd->query('SELECT * FROM chat ORDER BY id DESC');
    while($msg = $allmsg->fetch())
    {
    ?>
    <b><?php echo $msg['pseudo']; ?> : </b><?php echo $msg['message']; ?> <br />
    
    <?php }
    
    ?>

</body>
</html>