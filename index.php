<?php 
session_start(); //pokretanje sesije korisnika

//provjera jel korisnik logiran
if(!file_exists('korisnici/' . $_SESSION['korisnicko_ime'] . '.xml')){
    header('Location: prijava.php'); //salje korisnika na login stranicu
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd3e76bd85.js" crossorigin="anonymous"></script>
    <title>XMLP projekt</title>
</head>
<body>
    <!-- ovo je kôd za navbar i hero sekciju -->
    <section class="header">
        <nav>
            <a href=""><img src="images/logo.svg"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa-solid fa-xmark" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="">Tečajevi</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">FAQ</a></li>
                    <li><a href="">O nama</a></li>
                    <li><a href="odjava.php" class="odjava-btn">Odjava</a></li>
                </ul>
            </div>
            <i class="fa-solid fa-bars" onclick="showMenu()"></i>
        </nav>

    <div class="text-box">
        <h2>Dobrodošli,</h2><h2 class="welcome"><?php echo $_SESSION['korisnicko_ime']; ?></h2>
        <h1>Nauči programirati</h1>
        <p>Uz naše tečajeve naučite temelje programiranja i postanite programer!</p>
        <a href="" class="hero-btn">Rezerviraj svoje mjesto</a>
    </div> 
      
    </section>
    
    <!-- ovo je kôd za sekciju tečajevi -->
    <section class="course">
        <h1>Naši tečajevi</h1>
        <p>Odaberi vještinu koju želiš naučiti</p>

        <div class="row">
            <div class="course-col">
                <?php
                $xml_podaci = simplexml_load_file('sadrzaj.xml') or die('Error: Object Creation failure'); //ucitavanje podataka u varijablu
                echo "<h3>" . $xml_podaci->tecaj[0]->ime . "</h3>";
                echo "<p>" . $xml_podaci->tecaj[0]->lokacija ."&nbsp;&nbsp;&nbsp;" . $xml_podaci->tecaj[0]->datum . "</p>";
                echo "<p>" . $xml_podaci->tecaj[0]->opis . "</p>";
                echo "<p>" . $xml_podaci->tecaj[0]->cijena . "</p>";
                ?>
                <a href="" class="course-btn">Prijavi se na tečaj</a>
            </div>
            <div class="course-col">
                <?php
                $xml_podaci = simplexml_load_file('sadrzaj.xml') or die('Error: Object Creation failure'); //ucitavanje podataka u varijablu
                echo "<h3>" . $xml_podaci->tecaj[1]->ime . "</h3>";
                echo "<p>" . $xml_podaci->tecaj[1]->lokacija ."&nbsp;&nbsp;&nbsp;" . $xml_podaci->tecaj[1]->datum . "</p>";
                echo "<p>" . $xml_podaci->tecaj[1]->opis . "</p>";
                echo "<p>" . $xml_podaci->tecaj[1]->cijena . "</p>";
                ?>
                <a href="" class="course-btn">Prijavi se na tečaj</a>
            </div>
            <div class="course-col">
                <?php
                $xml_podaci = simplexml_load_file('sadrzaj.xml') or die('Error: Object Creation failure'); //ucitavanje podataka u varijablu
                echo "<h3>" . $xml_podaci->tecaj[2]->ime . "</h3>";
                echo "<p>" . $xml_podaci->tecaj[2]->lokacija ."&nbsp;&nbsp;&nbsp;" . $xml_podaci->tecaj[2]->datum . "</p>";
                echo "<p>" . $xml_podaci->tecaj[2]->opis . "</p>";
                echo "<p>" . $xml_podaci->tecaj[2]->cijena . "</p>";
                ?>
                <a href="" class="course-btn">Prijavi se na tečaj</a>
            </div>
        </div>
    </section>

    <!-- ovo je kôd za footer sekciju -->
    <section class="footer">
        <p>&copy; Copyright 2022 mnp xmlp</p>
    </section>

    <!-- ovo je JS kôd za prikazivanje/skrivanje menija na manjim ekranima -->
    <script>
        var navLinks = document.getElementById("navLinks");

        function showMenu(){
            navLinks.style.right = "0";
        }

        function hideMenu(){
            navLinks.style.right = "-200px";
        }
    </script>

</body>
</html>