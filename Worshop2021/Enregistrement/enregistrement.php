 <?php
    
    /* page: inscription.php */
//connexion à la base de données:
$BD_serveur     = "localhost";
$BD_utilisateur = "bitnani";
$BD_motDePasse  = "mdpdebian";
$BD_base        = "workshop";

@mysqli_connect($BD_serveur, $BD_utilisateur, $BD_motDePasse)
    or die("Impossible de se connecter au serveur de bases de données.");
@mysqli_select_db($BD_base)
    or die("Impossible de se connecter à la base de données.");
 
//traitement du formulaire:
if(isset($_POST['adresseMail'],$_POST['mdp'])){//vérifie si les champs sont définis avec "isset"
    if(empty($_POST['adresseMail'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
        echo "Le champ adresse mail est vide.";
    } elseif(!preg_match("^[a-z0-9]+([-._]?[a-z0-9]+)*+@?[a-z0-9]+([-._]?[a-z0-9]+)",$_POST['adresseMail'])){//le champ pseudo est renseigné mais ne convient pas au format qu'on souhaite qu'il soit, soit: que des lettres minuscule + des chiffres (je préfère personnellement enregistrer le pseudo de mes membres en minuscule afin de ne pas avoir deux pseudo identique mais différents comme par exemple: Admin et admin)
        echo "Le format de l'adresse mail ne semble pas conforme";
    } elseif(empty($_POST['mdp'])){
        echo "Le champ mot de passe est vide.";
    } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM user WHERE adresseMail='".$_POST['adresseMail']."'"))==1){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
        echo "Désolé, cette adresse email est déjà utilisée.";
    } else {
        //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
        if(!mysqli_query($mysqli,"INSERT INTO user SET adresseMail='".$_POST['adresseMail']."', mdp='".md5($_POST['mdp'])."'")){//on crypte le mot de passe avec la fonction propre à PHP: md5()
            echo "Une erreur s'est produite: ";//.mysqli_error($mysqli);
        } else {
            echo "Vous êtes inscrit avec succès!";
        }
    }
}
    ?>

    <br />
    <form method="post" action="inscription.php">
        Adresse Mail : <input type="text" name="adresseMail">
        <br />
        Mot de passe : <input type="password" name="mdp">
        <br />
        <input type="submit" value="S'inscrire">
    </form>
