<?php
include 'dbConn.php';

$data = file_get_contents("php://input");
$json = json_decode($data);


try{
    $povezava = new PDO('mysql:host='.$host.';dbname='.$imePodatkovneBaze.';charset=utf8mb4', $uporabniskoIme, $geslo);
    $povezava->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $povezava->beginTransaction();
    $povezava->exec("INSERT INTO narocilo (datum_sprejema, rok_izdelave, popust , stranka_id) VALUES ('$json->datumSprejema', '$json->rokIzdelave', '$json->popust', '$json->stranka')");
    $idVstavljeneVrstice = $povezava->lastInsertId(); 
    echo $idVstavljeneVrstice;
    $povezava->commit();
} catch(PDOException $e) {
    $povezava->rollback();
    echo "Error: " . $e->getMessage();
}
    
$povezava = null
 
?>