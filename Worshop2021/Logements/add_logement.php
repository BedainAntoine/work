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
    
        if($idGroup = "logement"){
    ?>
<div>
    <form action="logement_envoi.php" method="GET">
        <div>
            <p>Bonjour ! Vous souhaitez ajouter un logement ?</p>
        </div>
        
        <div>
    <p> Le nom de votre logement :
            <input type="text" id="name" name="nom"></p>
        </div>
        <div>
    <p> L'adresse de votre logement :
            <input type="text" name="adresseLogement"></p>
        </div>
        <div>
    <p> Le type de logement :
            <input type="text" name="typeLogement"></p>
        </div>
        <div>
    <p> Le logement poss&egrave;de t'il un ascenceur ?
            <input type="text" name="typeLogement"></p>
        </div>
        <div>
    <p> Numero d'etage :
            <input type="text" name="typeLogement"></p>
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