<?php
include 'dbConn.php';

$data = file_get_contents("php://input");
$json = json_decode($data);

try{
    $povezava = new PDO('mysql:host='.$host.';dbname='.$imePodatkovneBaze.';charset=utf8mb4', $uporabniskoIme, $geslo);
    $povezava->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $povezava->beginTransaction();
    $povezava->exec("INSERT INTO postavka (kolicina, dolzina, sirina, opis_slike, okvir_id, paspartu_id, steklo_id, narocilo_id, cena, znesek) VALUES ('$json->kolicina', '$json->dolzina', '$json->sirina', '$json->opis', '$json->okvir', '$json->paspartu', '$json->steklo', '$json->id_narocila', '$json->cena', '$json->cena'*'$json->kolicina')");
    $povezava->commit();
    
} catch(PDOException $e) {
    $povezava->rollback();
    echo "Error: " . $e->getMessage();
}
    
$povezava = null
 
?>