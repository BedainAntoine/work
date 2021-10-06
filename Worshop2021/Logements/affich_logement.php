<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'bitnami', 'mdpdebian');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}



$form = $bdd->query('SELECT * FROM formation');

while($logementDonnees = $form->fetch()){
    ?>
    <p>

    Nom du logement : <?php echo $logementDonnees['nom']; ?> <br>
    Lieu : <?php echo $logementDonnees['adresseLogement']; ?><br>
    Cout du loyer : <?php echo $logementDonnees['loyer']; ?><br>

    </p>
<?php
}
$form->closeCursor();

?>

