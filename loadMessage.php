<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=projetaddicts;charset=utf8", "root", "");

    $allmsg = $bdd->query('SELECT * FROM chat ORDER BY id DESC');
    while($msg = $allmsg->fetch())
    {
    ?>
    <b><?php echo $msg['date']; echo $msg['pseudo']; ?> : </b><?php echo $msg['message']; ?> <br />
    
    <?php }
    
    ?>