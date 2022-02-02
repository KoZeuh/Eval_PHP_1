<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Exercices Evaluation</title>
    <link rel="stylesheet" href="CSS/style.css">

    <?php include 'bdd.php'; include 'functions.php'; ?>
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
                <div class="content">
                    <center><h1> Affichage des personnes selon un intervalle d'IMC choisi </h1>

                    <form action="imc_personnes.php" method="post">
                        <label for="txt_imc_min">IMC Minimum : </label>
                        <input type="text" name="txt_imc_min" required><br><br>

                        <label for="txt_imc_max">IMC Maximum : </label>
                        <input type="text" name="txt_imc_max" required><br><br>

                        <input type="submit" value="Chercher">
                    </form>
					
					<form action="imc_personnes.php" method="post">
                        <input type="submit" name ="reset" value="Réinitialiser les recherches">
                    </form></center><br><hr>

                    <?php
                        if (isset($_POST['reset'])){
                            unset($_POST);
                        }

                        if (isset($_POST['txt_imc_min']) && isset($_POST['txt_imc_max'])){
                            echo '<center><table>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>IMC</th>
                                <th>Interprétation OMS</th>
                            </tr>';
                            $imc_min = intval($_POST['txt_imc_min']);
                            $imc_max = intval($_POST['txt_imc_max']);

                            $requete = mysqli_query($db,"SELECT NomPers,PrenomPers,imc FROM personne WHERE imc BETWEEN '".$imc_min."' AND '".$imc_max."'");
                            $ligne;

                            while ($ligne = mysqli_fetch_assoc($requete)){
                                $prenom = $ligne['PrenomPers'];
                                $nom = $ligne['NomPers'];
                                $imc = $ligne['imc'];
                    
                                $interpretation = interpretation($imc);
                                $imc = round($imc,2);
                                echo "<tr><td>$prenom</td><td>$nom</td><td>$imc</td><td>$interpretation</td>";
                            }
                        }else {
                            echo '<center><table>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>IMC</th>
                            </tr>';

                            $requete = mysqli_query($db, "SELECT NomPers,PrenomPers,imc FROM personne ORDER BY PrenomPers,NomPers");
                            $ligne;

                            while ($ligne = mysqli_fetch_assoc($requete)){
                                $prenom = $ligne['PrenomPers'];
                                $nom = $ligne['NomPers'];
                                $imc = $ligne['imc'];

                                echo "<tr><td>$prenom</td><td>$nom</td><td>$imc</td>";
                            }
                        }

                        echo "</table></center>";
                    ?>
                </div>
            </article>
        </div>
        <div class="footer">
            <p>© <a href="https://github.com/KoZeuh">Kozeuh</a></p> 
        </div>
    </div>
</body>
</html>