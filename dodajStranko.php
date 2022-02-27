<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script
		  src="https://code.jquery.com/jquery-3.3.0.js"
		  integrity="sha256-TFWSuDJt6kS+huV+vVlyV1jM3dwGdeNWqezhTxXB/X8="
		  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="dodajStranko.js"></script>
    <title>Dodaj stranko</title>
</head>


<body>

<?php
    $activeMeniItem = "NAROČANJE";
    include "meni.php";
    ?>
    
    <div class=“row”>
        <form method="POST" class="row justify-content-md-center pt-5">
            <fieldset class="col-md-auto">
                    <legend>Podatki o stranki</legend>
                    <div class="row">
                        <div class="col">
                            <label for="ime" class="col-form-label">Ime:</label><br>
                            <input class="form-control" type="text" id="ime">
                        </div>
                        <div class="col">
                            <label for="priimek" class="col-form-label">Priimek:</label><br>
                            <input class="form-control" type="text" id="priimek">
                        </div>
                        <div class="col">
                            <label for="telefonska_stevilka" class="col-form-label">Telefonska številka:</label><br>
                            <input class="form-control" type="text" id="telefonska_stevilka">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="email" class="col-form-label">Email:</label><br>
                            <input class="form-control" type="text" id="email" name="email">
                            <h2 id="result"></p>
                           
                        </div>
                        <div class="col">
                            <label for="naziv_podjetja" class="col-form-label">Naziv podjetja:</label><br>
                            <input class="form-control" type="text" id="naziv_podjetja">
                        </div>
                        <div class="col">
                            <label for="davcna_stevilka" class="col-form-label">Davčna številka:</label><br>
                            <input class="form-control" type="text" id="davcna_stevilka">
                        </div>
                    </div>
                    <div class="col-md-12 text-center pt-5">
                        <input id="submit" type="button" value="Dodaj stranko">
                    </div> 
                    <p id="info"></p>
                </fieldset>
            </form>
        </div>
    </div>
   
</body>

</html>