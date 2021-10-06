<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
<?php
    /* page: inscription.php */
//connexion à la base de données:
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'bitnami');
define('DB_PASSWORD', 'mdpdebian');
define('DB_NAME', 'workshop');

$bdd = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($bdd === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

$sql= 'INSERT INTO adresse SET adresse='".$_POST['adresse']."'"';
//traitement du formulaire:
if(isset($_REQUEST['adresseMail'],$_REQUEST['mdp'])){
   $adresseMail = mysqli_real_escape_string($bdd, $adresseMail);
   $mdp = mysqli_real_escape_string($bdd, $mdp);
   $prenom = mysqli_real_escape_string($bdd,$prenom);
   $nom = mysqli_real_escape_string($bdd, $nom);
   $age = mysqli_real_escape_string($bdd, $age);
   $telephone = mysqli_real_escape_string($bdd, $telephone);

   $query = "INSERT INTO utilisateur (id, adresseMail, prenom, nom, age, telephone, mdp) VALUES ('','$adresseMail', '$prenom', '$nom', '$age', '$telephone', '".hash('sha256', $mdp)."')";

   $res = mysqli_query($bdd, $query);
   if($res){
       echo "<div>
            <h3> Vous etes inscrit avec succès </h3>
            <p>Clique <a href='../Connexion/connexion.php'> ici pour te connecter akhy</a></p></div> "
   }
}else{
    ?>
    <form action="" method="post">
    <h1>Inscription</h1>
    <input type="text" name="email" placeholder="Email" required />
    <input type="password" name="mdp" placeholder="Mot de passe" required />
    <input type="text" name="prenom" placeholder="Prenom" required />
    <input type="text" name="nom" placeholder="Nom" required />
    <input type="text" name="telephone" placeholder="Telephone" required />
    <input type="text" name="age" placeholder="Age" required />


    <input type="submit" name="submit" value="S'inscrire"/>
    <p>Vous êtes éjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>
   }

    
   
    