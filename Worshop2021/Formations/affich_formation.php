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


while($formDonnees = $form->fetch()){
    ?>
    <p>
    Nom formation : <?php echo $formDonnees['nom']; ?> <br>
    Nom √©tablissement : <?php echo $formDonnees['nomEtablissement']; ?><br>
    Cout de la formation : <?php echo $formDonnees['adresse']; ?><br>
    Discipline : <?php echo $formDonnees['discipline']; ?><br>
    Niveau de la formation : <?php echo $formDonnees['niveau']; ?><br>
    Capacit&eacute d'accueil : <?php echo $formDonnees['cout']; ?><br>
    Cout du loyer : <?php echo $formDonnees['loyer']; ?><br>
    </p>
<?php
}
$form->closeCursor();

?>

