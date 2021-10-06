<!DOCTYPE html>
<body>
<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'bitnani', 'mdpdebian');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$idUser = $bdd->query('SELECT id_user FROM tableGroupe');
$idGroup = $bdd->query('SELECT id_groupe FROM tableGroupe WHERE id_user = :idUser');

    if($idGroup = "formation"){
?>
        <div>
        <form action="formation_envoi.php" method="GET">
            <div>
                <p>Bonjour ! Vous souhaitez ajouter une formation ?</p>
            </div>
            
            <div>
        <p> Le nom de votre formation :
                <input type="text" id="name" name="nom"></p>
            </div>
            <div>
        <p> Le lieu de votre formation :
                <input type="text" name="adresse"></p>
            </div>
            <div>
        <p> La principale discipline enseign&eacute;e :
                <input type="text" name="discipline"></p>
            </div>
            <div>
        <p> Le niveau de formation necessaire :
                <input type="text" name="niveau"></p>
            </div>
            <div>
        <p> Le co&ucirc;t :
                <input type="text" name="cout"></p>
            </div>
    
        <div> <button>OK</button></div>
    
        </form>
    </div>
    <?php
    } else{
        ?>
         <div>
        <p>Vous n'avez rien à faire ici</p>
        </div>

       <?php 
    }
    ?>

    
</body>