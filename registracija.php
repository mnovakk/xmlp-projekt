<?php
$pogreske = array(); //sadrzi errore koji se mogu desiti

if (isset($_POST['gumb_prijava'])){ //provjera jel gumb stisnut
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $email = $_POST['email'];
    $lozinka = $_POST['lozinka'];
    $lozinka_potvrda = $_POST['lozinka_potvrda'];

    //uvjeti za errore
    if(file_exists('korisnici/' . $korisnicko_ime . '.xml')){ 
        $pogreske[] = 'Korisničko ime već postoji';
    }
    if($korisnicko_ime == ''){
        $pogreske[] = 'Korisničko ime ne smije biti prazno';
    }
    if($email == ''){
        $pogreske[] = 'Polje Email ne smije biti prazno';
    }
    if($lozinka == '' || $lozinka_potvrda == ''){
        $pogreske[] = 'Polje Lozinka ne smije biti prazno';
    }
    if($lozinka != $lozinka_potvrda){
        $pogreske[] = 'Lozinke moraju biti jednake';
    }
    if(count($pogreske) == 0){ //ako je array prazan znaci da nema pogreške i korisnik se moze registrirati
        $xml = new SimpleXMLElement('<korisnik></korisnik>');
        $xml->addChild('lozinka', $lozinka);
        $xml->addChild('email', $email);
        $xml->asXML('korisnici/'. $korisnicko_ime . '.xml'); //spremanje u XML fajl
        header('Location: prijava.php'); //salje korisnika na login kad se registrira
        die;
    }
    /*
    $xml = new SimpleXMLElement('<korisnik></korisnik>');
    $xml->addChild('lozinka', $lozinka);
    $xml->addChild('email', $email);
    $xml->asXML('korisnici/'. $korisnicko_ime . '.xml'); //spremanje u XML fajl
    header('Location: prijava.php'); //salje korisnika na login kad se registrira
    die;
    */
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registracija.css?<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <title>Registracija</title>
</head>
<body>
    <h1>Registracija</h1>

    <form method="post" action="" name="prijava">
        
        <label for="korisnicko_ime">Korisničko ime</label>
        <input type="text" name="korisnicko_ime" id="korisnicko_ime"/><br>
        <span id="porukaIme"></span>

        <label for="email">Email</label>
        <input type="text" name="email" id="email"/><br>
    
        <label for="lozinka">Lozinka</label>
        <input type="password" name="lozinka" id="lozinka"/><br>
        <span id="porukaLozinka"></span>

        <label for="lozinka_potvrda">Potvrda lozinke</label>
        <input type="password" name="lozinka_potvrda" id="lozinka_potvrda"/><br>
        <span id="porukaLozinka1"></span>

        <?php
        if(count($pogreske) > 0){
            echo '<ul>';
            foreach($pogreske as $greska){
                echo '<li>' . $greska . '</li>';
            }
            echo '</ul>';
        }
        ?>

        <button type="submit" name="gumb_prijava">Dovrši registraciju</button>

    </form>
    <div><a href="prijava.php">Natrag na prijavu</a></div>
    
</body>
</html>