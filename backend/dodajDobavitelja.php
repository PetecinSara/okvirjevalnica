<?php
include 'dbConn.php';

$data = file_get_contents("php://input");
$json = json_decode($data);

try{
    $povezava = new PDO('mysql:host='.$host.';dbname='.$imePodatkovneBaze.';charset=utf8mb4', $uporabniskoIme, $geslo);
    $povezava->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $poizvedba = $povezava->prepare("INSERT INTO dobavitelj (naziv, telefonska_stevilka, email , link_povezava, kratica) VALUES ('$json->naziv','$json->telefonska_stevilka', '$json->email', '$json->link_povezava', '$json->kratica')");
    $poizvedba->execute();
    $idVstavljeneVrstice = $povezava->lastInsertId(); 
    echo $idVstavljeneVrstice;  
} catch(PDOException $e) {
    $povezava->rollback();
    echo "Error: " . $e->getMessage();
}
    
$povezava = null
 
?>