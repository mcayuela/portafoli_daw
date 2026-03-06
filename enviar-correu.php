<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missatge Enviat - Marcel Cayuela Dolcet</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="fotos-portafoli/favicon-32.png" type="image/x-icon">
    <style>
        .main-resposta {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
            padding: 0 50px;
        }
        .main-resposta h1 {
            font-size: 2.5rem;
        }
        .main-resposta p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <header>
        <div class="contenidor-titol-logo">
            <img class="logo" src="" alt="">
            <h1 class="titol"><span class="text-vermell">./</span>MCD<span class="text-vermell">.sh</span></h1>
        </div>
        <nav>
            <ul class="menu-superior">
                <li><a class="li-menu-superior" href="index.html"><span class="text-vermell">01.</span>Inici</a></li>
                <li><a class="li-menu-superior" href="activitats.html"><span class="text-vermell">02.</span>Activitats</a></li>
                <li><a class="li-menu-superior" href="recursos.html"><span class="text-vermell">03.</span>Recursos</a></li>
                <li><a class="li-menu-superior" href="contacte.html"><span class="text-vermell">06.</span>Contacte</a></li>
                <li><a href="el-teu-cv.pdf" class="boto-cv" target="_blank">CV</a></li>
            </ul>
        </nav>
    </header>

    <main class="main-resposta">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = htmlspecialchars(stripslashes(trim($_POST['nom'])));
            $correu_visitant = htmlspecialchars(stripslashes(trim($_POST['correu'])));
            $missatge = htmlspecialchars(stripslashes(trim($_POST['missatge'])));

            $destinatari = "mcayueladolcet@gmail.com";
            $assumpte = "Nou missatge del Portafoli de: $nom";
            $contingut_correu = "Nom: $nom\n";
            $contingut_correu .= "Correu: $correu_visitant\n\n";
            $contingut_correu .= "Missatge:\n$missatge\n";
            
            // Capçaleres per millorar l'entrega
            $capcaleres = "From: noreply@portafoli.com\r\n";
            $capcaleres .= "Reply-To: $correu_visitant\r\n";
            $capcaleres .= "X-Mailer: PHP/" . phpversion();

            if (mail($destinatari, $assumpte, $contingut_correu, $capcaleres)) {
                echo "<h1>Gràcies<span class='text-vermell'>!</span></h1><p>El teu missatge ha estat enviat correctament.</p><a href='index.html' class='boto-cv'>Tornar a l'inici</a>";
            } else {
                echo "<h1>Error</h1><p>Hi ha hagut un problema a l'enviar el missatge. Si us plau, intenta-ho més tard.</p><a href='contacte.html' class='boto-cv'>Tornar a intentar-ho</a>";
            }
        } else {
            echo "<h1>Error</h1><p>Hi ha hagut un problema a l'enviar el missatge.</p><a href='contacte.html' class='boto-cv'>Tornar a intentar-ho</a>";
        }
        ?>
    </main>

    <footer>
        <p>&copy; <span class="text-vermell">2025</span> <span class="text-vermell">M</span>arcel <span class="text-vermell">C</span>ayuela <span class="text-vermell">D</span>olcet</p>
    </footer>
    <div class="spotlight" id="spotlight"></div>
    <script src="script.js"></script>
</body>
</html>