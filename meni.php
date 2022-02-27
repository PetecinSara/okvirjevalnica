<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="domov.php"><img src="images/okviri-v-logo_3_white.png" class="w-25 ms-4" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php if($activeMeniItem=="DOMOV") echo 'active' ?>"href="domov.php">DOMOV
                  <span class="visually-hidden">(current)</span>
                </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($activeMeniItem=="NAROČANJE") echo 'active' ?>" href="narocanje.php">NAROČANJE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($activeMeniItem=="NAROČILA") echo 'active' ?>" href="seznamNarocil.php">NAROČILA</a>
                    </li>
                    <li class="nav-item dropdown">
                        <!-- dropdown-menu-end -->
                        <a class="nav-link dropdown-toggle <?php if($activeMeniItem=="ZALOGA") echo 'active' ?>"" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ZALOGA</a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="zalogaOkvirji.php">Okvirji</a>
                            <a class="dropdown-item" href="zalogaStekla.php">Stekla</a>
                            <a class="dropdown-item" href="zalogaPaspartuji.php">Paspartuji</a>
                            <a class="dropdown-item" href="zalogaPodokvirji.php">Podokvirji</a>
                            <a class="dropdown-item" href="zalogaDodajMaterial.php">Dodaj material</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>