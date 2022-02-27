<?php
include 'dbConn.php';

$data = file_get_contents("php://input");
$json = json_decode($data);

try{
    $povezava = new PDO('mysql:host='.$host.';dbname='.$imePodatkovneBaze.';charset=utf8mb4', $uporabniskoIme, $geslo);
    $povezava->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $povezava->beginTransaction();
    if($json->tip_materiala == 1){
        $povezava->exec("INSERT INTO material (tip_materiala_id, naziv, dobavitelj_id, sirina, barva, cena) VALUES ('$json->tip_materiala', '$json->naziv', '$json->dobavitelj', '$json->sirina', '$json->barva', '$json->cena')");
    } else if($json->tip_materiala == 2){
        $povezava->exec("INSERT INTO material (tip_materiala_id, naziv, dobavitelj_id, vrsta_stekla_id, cena) VALUES ('$json->tip_materiala', '$json->naziv', '$json->dobavitelj', '$json->vrsta_stekla', '$json->cena')");
    } else if($json->tip_materiala == 3){
        $povezava->exec("INSERT INTO material (tip_materiala_id, naziv, dobavitelj_id, barva, cena) VALUES ('$json->tip_materiala', '$json->naziv', '$json->dobavitelj', '$json->barva', '$json->cena')");
    } else if($json->tip_materiala == 4){
        $povezava->exec("INSERT INTO material (tip_materiala_id, naziv, dobavitelj_id, sirina, dolzina, cena) VALUES ('$json->tip_materiala', '$json->naziv', '$json->dobavitelj', '$json->sirina', '$json->dolzina', '$json->cena')");
    } else {
        echo 'ni vrednosti';
    }
    $idVstavljeneVrstice = $povezava->lastInsertId(); 
    echo $idVstavljeneVrstice;  
    $povezava->commit();
} catch(PDOException $e) {
    $povezava->rollback();
    echo "Error: " . $e->getMessage();
}
    
$povezava = null
?>