<?php
include 'dbConn.php';

$data = file_get_contents("php://input");
$json = json_decode($data);


try{
    $povezava = new PDO('mysql:host='.$host.';dbname='.$imePodatkovneBaze.';charset=utf8mb4', $uporabniskoIme, $geslo);
    $povezava->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $povezava->beginTransaction();
    $povezava->exec("INSERT INTO stranka (ime, priimek, telefonska_stevilka , email, naziv_podjetja, davcna_stevilka) VALUES ('$json->ime', '$json->priimek', '$json->telefonska_stevilka', '$json->email', '$json->naziv_podjetja', '$json->davcna_stevilka')");
    $idVstavljeneVrstice = $povezava->lastInsertId(); 
    echo $idVstavljeneVrstice;
    $povezava->commit();
      
} catch(PDOException $e) {
    $povezava->rollback();
    echo "Error: " . $e->getMessage();
}
    
$povezava = null
 
?>