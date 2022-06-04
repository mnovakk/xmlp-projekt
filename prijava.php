<?php
$error = false; //provjera unosa
if (isset($_POST['gumb_prijava'])){ //provjera jel gumb stisnut
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];

    //provjera jel korisnik postoji
    if(file_exists('korisnici/' . $korisnicko_ime . '.xml')){ //lokacija xml fajla
        $xml = new SimpleXMLElement('korisnici/' . $korisnicko_ime . '.xml', 0, true);
        //print_r($xml);
        if($lozinka == $xml->lozinka){
            //echo 'radi';
            session_start();
            $_SESSION['korisnicko_ime'] = $korisnicko_ime;
            header('Location: index.php'); //nakon uspjesnog logina idemo na index.php
            die;
        }
    } 
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prijava.css?<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <title>Prijava</title>
</head>
<body>
    <h1>Prijavi se</h1>

    <form method="post" action="">
        <label for="korisnicko_ime">Korisničko ime</label>
        <input type="text" name="korisnicko_ime" id="korisnicko_ime"/><br>
    
        <label for="lozinka">Lozinka</label>
        <input type="password" name="lozinka" id="lozinka"/><br>

        <?php
        if($error){
            echo '<p>Netočno korisničko ime ili lozinka</p>';
        }
        ?>
    
        <button type="submit" name="gumb_prijava">Prijava</button>
    </form>
    <div><a href="registracija.php">Kreiraj novi korisnički račun</a></div>
    
</body>
</html>