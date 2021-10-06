<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'bitnani', 'mdpdebian');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

/*
$name = $bdd->query('SELECT name FROM formation');
$ville = $bdd->query('SELECT ville FROM formation');
$etablissement = $bdd->query('SELECT etablissement FROM formation');
$cout = $bdd->query('SELECT cout FROM formation');
$discipline = $bdd->query('SELECT discipline FROM formation'); 
$niveau = $bdd->query('SELECT niveau FROM formation');
$capacite = $bdd->query('SELECT capacite FROM formation');
*/


$form = $bdd->query('SELECT * FROM formation');


while($formDonnees = $form->fetch()){
    ?>
    <p>

    Nom formation : <?php echo $formDonnees['nom']; ?> <br>
    Nom établissement : <?php echo $formDonnees['nomEtablissement']; ?><br>
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

