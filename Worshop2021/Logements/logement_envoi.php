<?php
 
require('../config.php');
session_start();

if(isset($_POST["submit"])){


$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
$stmt = $dbh->prepare("INSERT INTO formation (nom, complAdresse, adresseLogement, typeLogement, loyer, ville) VALUES (:nom, :complAdresse, :adresseLogement, :typeLogement, :loyer, :ville)"); //créer table formation *
 
$stmt -> bindParam(':complAdresse', $_POST["complAdresse"]);
$stmt -> bindParam(':adresseLogement', $_POST["adresseLogement"]);
$stmt -> bindParam(':typeLogement', $_POST["typeLogement"]);
$stmt -> bindParam(':loyer', $_POST["loyer"]);
$stmt -> bindParam(':ville', $_POST["ville"]);
 
$stmt->execute();
 
if ($dbh->query($stmt)) {
echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}
 
$dbh = null;
}
 
?>