<?php
    date_default_timezone_set('Europe/Zagreb');
 
    if (isset($_POST['ime_recepta'])) {
        $imerecepta = $_POST['ime_recepta'];
        $sastojci = $_POST['sastojci'];
        $proces = $_POST['proces'];
        $rating = $_POST['rating'];
        $autor = $_POST['autor'];
        $tezina = $_POST['tezina'];
        $vrsta = $_POST['vrsta'];
        $preporuka = $_POST['preporuka']; // 'yes' or 'no'
 
        $result = '';
        $result .= "<Root>\n";
        $result .= "<Recept>\n";
 
        // Ime Recepta
        $result .= '<ImeRecepta>' . $imerecepta . "</ImeRecepta>\n";
 
        // Sastojci
        $result .= '<Sastojci>' . $sastojci . "</Sastojci>\n";

        $result .= '<ProcesIzrade>' . $proces . "</ProcesIzrade>\n";
 
        // Autor
        $result .= '<Autor>' . $autor . "</Autor>\n";

        // Tezina
        $result .= '<Tezina>' . $tezina . "</Tezina>\n";

        // Vrsta
        $result .= '<Vrsta>' . $vrsta . "</Vrsta>\n";
 
        // Rating
        $result .= '<Rating>' . $rating . "</Rating>\n";
 
        // Preporuka
        $result .= '<Preporuka>' . $preporuka . "</Preporuka>\n";
 
        $result .= '</Recept>';
        $result .= '</Root>';
        
        /*$myfile = fopen("recept.xml", "a") or die("Unable to open file!");
        fwrite($myfile, "\n". $result);
        fclose($myfile);
        Koristio sam ovaj dio za append svakog nadolazeceg recepta u xml fajl*/

        // za zapis recepta s datumom 
        //$filename = 'recept' . date('Y_m_d_h_i_s') . '.xml';
        $filename = 'recept.xml';
        file_put_contents($filename, $result);
 
    }
?>
 
<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
    <title>Recepti</title>
</head>
<style>
body{
    background-color:lightsalmon;
};
</style>
<body>
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Početna</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="trenutacnirecept.php">Recept trenutačno spremljen u XML obliku</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://google.com">Google</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://stackoverflow.com">StackOverflow</a>
      </li>
    </ul>
  </div>
</nav>
 
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1 class="mb-5 text-center">Unesite recept</h1>
                <form action="aplikacija.php" method="POST">
                    <!-- ime recepta -->
                    <div class="form-group">
                        <label for="ime_recepta">Ime Recepta</label>
                        <input type="text" name="ime_recepta" class="form-control" id="ime_recepta">
                    </div>
                    <!-- autor recepta -->
                    <div class="form-group">
                        <label for="autor">Autor</label>
                        <input type="text" name="autor" class="form-control" id="autor">
                    </div>

                    <!-- tezina recepta-->
                    <label for="rating">Koliko je recept kompliciran za napraviti</label>
                    <select class="custom-select" name="tezina" id="tezina">
                        <option value="Lagano">Lagano</option>
                        <option value="NijeTesko">Nije teško</option>
                        <option value="Tesko">Teško</option>
                        <option value="JakoTesko">Jako Teško</option>
                        <option value="RadiGaTimOd5ProfesionalnihKuhara">Raditi će ga tim od 5 profesionalnih kuhara</option>
                    </select>

                    <!--koja vrsta jela je-->
                    <label for="rating">Koja vrsta jela je recept</label>
                    <select class="custom-select" name="vrsta" id="vrsta">
                        <option value="Prilog">Prilog</option>
                        <option value="Predjelo">Predjelo</option>
                        <option value="Glavno jelo">Glavno jelo</option>
                        <option value="Desert">Desert</option>
                        <option value="Pice">Piće</option>
                    </select>

                    <!-- Sastojci -->
                    <div class="form-group">
                        <label for="sastojci">Napišite sastojke i količinu</label>
                        <textarea class="form-control" name="sastojci" id="sastojci" rows="10"></textarea>
                    </div>

                    <!-- proces -->
                    <div class="form-group">
                        <label for="proces">Napišite proces izrade</label>
                        <textarea class="form-control" name="proces" id="proces" rows="10"></textarea>
                    </div>

                    <!-- rating recepta -->
                    <div class="form-group">
                        <label for="rating">Vaša ocjena za recept</label>
                        <input type="range" name="rating" class="custom-range" min="1" max="10" step="1" id="rating">
                    </div>
 
                    <label for="rating">Predlažete li ovaj recept nekome?</label>
                    <select class="custom-select" name="preporuka" id="preporuka">
                        <option value="Da">Da</option>
                        <option value="Ne">Ne</option>
                    </select>
 
                    <button type="submit" class="btn btn-secondary float-right mt-3">Spremi kao XML</button>
                </form>
 
            </div>
        </div>
        <div class="mb-5"></div>
    </div>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
 
</html>