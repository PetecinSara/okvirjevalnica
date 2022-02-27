<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.3.0.js" integrity="sha256-TFWSuDJt6kS+huV+vVlyV1jM3dwGdeNWqezhTxXB/X8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./narocanje.js" type="text/javascript"></script>
    <title>Naročanje</title>
</head>


<body>
    <?php
    $activeMeniItem = "NAROČANJE";
    include "meni.php";
    if (isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        include "dbConn.php";
            $sql = "SELECT * FROM narocilo WHERE id=$id"; 
            $result = mysqli_query($db, $sql) or die(mysqli_error($db));
            $narocilo = "";
            while ($data = mysqli_fetch_array($result)) {
                $narocilo = $data;
            } 
     } ?>

    <form action="postavka.php" id="narocilo" method="POST" class="row justify-content-md-center pt-5">
        <fieldset class="col-auto">
            <legend>NAROČILO</legend>
            <div class="col">
                <label for="stranka" class="col-form-label">Stranka:</label>
                <select id="stranka" class="form-control">
                    <option></option>
                    <?php include "dbConn.php";
                    $records = mysqli_query($db, "SELECT id, ime, priimek FROM stranka");
                    while ($data = mysqli_fetch_array($records)) {
                        if ($narocilo['stranka_id'] == $data['id']){
                            echo "<option value=" . $data['id'] . " selected >" . $data['ime'] . " " . $data['priimek'] . "</option>";
                        }
                        if (isset($_REQUEST['idstranka']) && $_REQUEST['idstranka']==$data['id']){
                            $id = $_REQUEST['idstranka'];
                            echo "<option value=" . $data['id'] . " selected >" . $data['ime'] . " " . $data['priimek'] . "</option>";
                        }
                        echo "<option value=" . $data['id'] . ">" . $data['ime'] . " " . $data['priimek'] . "</option>";
                    } ?>
                </select>
                <a class="nav-link" href="dodajStranko.php">Dodaj stranko</a>
                <div class="row">
                    <div class="col">
                        <label for="date" class="col-form-label">Datum sprejema:</label>
                        <input class="datepicker form-control" type="date" id="datumSprejema" name="datumSprejema" value="<?php echo $narocilo['datum_sprejema']; ?>" />
                    </div>
                    <div class="col">
                        <label for="date" class="col-form-label">Rok izdelave:</label>
                        <input class="datepicker form-control" type="date" id="rokIzdelave" value="<?php echo $narocilo['rok_izdelave']; ?>" />
                    </div>
                    <div class="col">
                        <label for="popust" class="col-form-label">Popust:</label>
                        <input class="form-control" type="number" id="popust" name="popust" value="<?php echo $narocilo['popust']; ?>" />
                    </div>
                    <div class="col">
                        <label for="koncniZnesek" class="col-form-label">Znesek naročila:</label>
                        <input class="form-control" type="text" id="koncniZnesek" value="<?php echo $narocilo['cena']; ?>" readonly>
                    </div>
                </div>
                <br />
                <?php 
                if (!isset($_REQUEST['id']))
                    echo "<div class='col-md-12 text-center pt-5'>
                        <input id='submit' type='button' value='Dodaj naročilo'>
                    </div>" ?>
                <p id="info"></p>
        </fieldset>
    </form>
    <?php include 'narocanjeTabela.php' ?>
    <?php include 'narocanjeVrstica.php' ?>
    
    <?php
    if (isset($_REQUEST['id'])){ ?>
    <script type="text/javascript">
        znesek()
    </script>
    <?php }?>

    <?php
    if (!isset($_REQUEST['id'])){ ?>
    <script type="text/javascript">
        var date = new Date();
        var trenutniDatum = date.toISOString().substring(0, 10);
        document.getElementById('datumSprejema').value = trenutniDatum;
    </script>
    <?php }?>

</body>

</html>