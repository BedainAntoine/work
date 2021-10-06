<?php
 
if(isset($_POST["submit"])){
$hostname='localhost';
$username='root';
$password='';
  
try {
$dbh = new PDO("mysql:host=$hostname;dbname=dbname;charset=utf8", $username,$password);
  
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
$stmt = $dbh->prepare("INSERT INTO formation (nom, adresseLogement, typeLogement) VALUES (:nom, :adresseLogement, :typeLogement)"); //créer table formation *
 
$stmt -> bindParam(':nom', $_POST["nom"]);
$stmt -> bindParam(':adresseLogement', $_POST["adresseLogement"]);
$stmt -> bindParam(':typeLogement', $_POST["typeLogement"]);
 
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