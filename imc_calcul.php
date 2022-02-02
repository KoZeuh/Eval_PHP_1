<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Calcul IMC</title>
    <link rel="stylesheet" href="CSS/style.css">

    <?php include 'functions.php'; ?>
</head>
<body>
    <div class="container">
        <div class="top">
            <ul>
                <a href="index.php" class="accueil">Accueil</a>
                <div class="imc">
                    <a href="#" class="elem_nav">IMC</a>
                    <div class="imc_dropdown">
                        <a href="imc_calcul.php">Calculer le sien</a>
                        <a href="imc_personnes.php">Afficher une liste</a>
                    </div>
                </div>
                <div class="imc">
                    <a href="#" class="elem_nav" id="drop">Ajout</a>
                    <div class="imc_dropdown" id="imc_drop">
                        <a href="ajout_personne.php">Personne</a>
                    </div>
                </div>
                
            </ul>

        </div>
        <div class="body_container">
            <article>
                <center><h1>Calcul de votre IMC</h1>
                <div class="content">
                    <form action="imc_calcul.php" method="post">
                        <label for="lst_poids">Poids:</label>
                        <select name="lst_poids" required>
                            <option value="">--Choisir une option--</option>
                            <?php
                                for ($i = 30; $i <= 140; $i++) {
                                    echo '<option value="'.$i.'">'.$i.' kg</option>';
                                }
                            ?>
                        </select><br><br>

                        <label for="lst_taille">Taille:</label>
                        <select name="lst_taille" required>
                            <option value="">--Choisir une option--</option>
                            <?php
                                for ($i = 125; $i <= 210; $i++) {
                                    echo '<option value="'.$i.'">'.$i.' cm</option>';
                                }
                            ?>
                        </select><br><br>

                        <input type="submit" value="Valider et calculer">
                    </form><br>

                    <?php
                        if (isset($_POST['lst_poids']) && isset($_POST['lst_taille'])){
                            $poids = $_POST['lst_poids'];
                            $taille = $_POST['lst_taille'];
                    
                            $result= imc($poids,$taille);
                    
                            $imc = round($result[0],2);
                            $interpretation = $result[1];
                    
                            echo "<center>Votre IMC est de $imc et vous êtes en $interpretation</center>";
                        }
                    ?>
                </div>
                </center>
            </article>
        </div>
        <div class="footer">
            <p>© <a href="https://github.com/KoZeuh">Kozeuh</a></p> 
        </div>
    </div>
</body>
</html>