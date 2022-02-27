function cenaPaspartuja() {
    const xhttp = new XMLHttpRequest();
    let idP = document.getElementById("paspartu").value;
    let dolzina = document.getElementById("dolzina").value;
    if (dolzina == "") dolzina = "0";
    let sirina = document.getElementById("sirina").value;
    if (sirina == "") sirina = "0";
    let velikost = parseInt(dolzina) * parseInt(sirina);
    xhttp.open("GET", "http://localhost/okviriv/backend/cenaPaspartuja.php?id=" + idP + "&velikost=" + velikost);
    xhttp.send();
    xhttp.onreadystatechange = (e) => {
        document.getElementById("paspartuCena").innerHTML = xhttp.responseText;
        cena();
    }
}

function cenaOkvirja() {
    const xhttp = new XMLHttpRequest();
    let idO = document.getElementById("okvir").value;
    let dolzina = parseInt(document.getElementById("dolzina").value);
    if (isNaN(dolzina)) dolzina = 0;
    let sirina = parseInt(document.getElementById("sirina").value);
    if (isNaN(sirina)) sirina = 0;
    xhttp.open("GET", "http://localhost/okviriv/backend/cenaOkvirja.php?id=" + idO + "&dolzina=" + dolzina + "&sirina=" + sirina);
    xhttp.send();
    xhttp.onreadystatechange = (e) => {
        document.getElementById("okvirCena").innerHTML = xhttp.responseText;
        cena();
    }
}

function cenaStekla() {
    const xhttp = new XMLHttpRequest();
    let idS = document.getElementById("steklo").value;
    let dolzina = document.getElementById("dolzina").value;
    if (dolzina == "") dolzina = "0";
    let sirina = document.getElementById("sirina").value;
    if (sirina == "") sirina = "0";
    let velikost = parseInt(dolzina) * parseInt(sirina);
    xhttp.open("GET", "http://localhost/okviriv/backend/cenaStekla.php?id=" + idS + "&velikost=" + velikost);
    xhttp.send();
    xhttp.onreadystatechange = (e) => {
        document.getElementById("stekloCena").innerHTML = xhttp.responseText;
        cena();
    }
}

function cena() {
    let okvir = document.getElementById("okvirCena").innerHTML;
    if (okvir == "") okvir = "0";
    let paspartu = document.getElementById("paspartuCena").innerHTML;
    if (paspartu == "") paspartu = "0";
    let steklo = document.getElementById("stekloCena").innerHTML;
    if (steklo == "") steklo = "0";

    let cena = document.getElementById("cena");
    let znesek = parseFloat(okvir) + parseFloat(paspartu) + parseFloat(steklo);
    cena.innerHTML = parseFloat(znesek).toFixed(2);
}

function mera() {
    cenaOkvirja();
    cenaPaspartuja();
    cenaStekla();
}

function znesek() {
    const xhttp = new XMLHttpRequest();
    let idNarocila = document.getElementById("id_narocila").value;
    let popust = parseFloat(document.getElementById("popust").value);
    xhttp.open("GET", "http://localhost/okviriv/backend/znesekNarocila.php?id=" + idNarocila);
    xhttp.send();
    xhttp.onreadystatechange = (e) => {
        let znesekbrezpopusta = parseFloat(xhttp.responseText);
        document.getElementById("koncniZnesek").value = parseFloat((znesekbrezpopusta * (100 - popust)) / 100).toFixed(2);
    }
}

function znesekSeznamNarocil(idNarocila, popust) {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://localhost/okviriv/backend/znesekNarocila.php?id=" + idNarocila);
    xhttp.send();
    xhttp.onreadystatechange = (e) => {
        let znesekbrezpopusta = parseFloat(xhttp.responseText);
        if (isNaN(znesekbrezpopusta)) {
            document.getElementById("koncniZnesek" + idNarocila).innerText = "0.00";
        } else {
            document.getElementById("koncniZnesek" + idNarocila).innerText = parseFloat((znesekbrezpopusta * (100 - popust)) / 100).toFixed(2);
        }
    }
}

function izbrisiPostavko(idPostavke) {
    const xhttp = new XMLHttpRequest();
    xhttp.open("DELETE", "http://localhost/okviriv/backend/brisanjeVrstice.php?id=" + idPostavke);
    xhttp.send();
    xhttp.onreadystatechange = (e) => {
        window.location.reload();
    }
}

$(document).ready(function() {
    $("#submit").click(function() {
        var datumSprejema = $("#datumSprejema").val();
        var rokIzdelave = $("#rokIzdelave").val();
        var popust = $("#popust").val();
        var stranka = $("#stranka").val();

        var podatki = {};
        podatki.datumSprejema = datumSprejema;
        podatki.rokIzdelave = rokIzdelave;
        podatki.popust = popust;
        podatki.stranka = stranka;
        var dataString = JSON.stringify(podatki);
        console.log(dataString);

        if (stranka == '') {
            $('#info').text('Prosim izpolnite vsa polja.').css('color', 'red');
        } else {
            $.ajax({
                type: "POST",
                url: "backend/narocilo.php",
                data: dataString,
                cache: false,
                success: function(result) {
                    window.location.href = "./narocanje.php?id=" + result;
                }
            });

        }

        return false;
    });
});