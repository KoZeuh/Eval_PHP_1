<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Ajout d'une personne</title>
    <link rel="stylesheet" href="CSS/style.css">

    <?php  include 'bdd.php' ?>
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
                <center><h1>Ajout d'une personne en base de donnée</h1>
                <div class="content">
                    <form action="ajout_personne.php" method="post">
                        <label for="txt_matricule">Matricule :</label>
                        <input type="text" name="txt_matricule" id="" required><br><br>

                        <label for="txt_nom">Nom :</label>
                        <input type="text" name="txt_nom" id="" required><br><br>

                        <label for="txt_nom">Prénom :</label>
                        <input type="text" name="txt_prenom" id="" required><br><br>

                        <label for="txt_nom">IMC :</label>
                        <input type="text" name="txt_imc" id="" required><br><br>

                        <input type="submit" value="Valider et ajouter">
                    </form><br>

                    <?php
                        if (isset($_POST['txt_matricule']) && isset($_POST['txt_nom']) && isset($_POST['txt_prenom']) && isset($_POST['txt_imc'])){
                            $matricule = $_POST['txt_matricule'];
                            $prenom = $_POST['txt_prenom'];
                            $nom = $_POST['txt_nom'];
                            $imc = doubleval($_POST['txt_imc']);

                            $requete = mysqli_query($db, "INSERT INTO personne(Matricule,NomPers,PrenomPers,imc) VALUES ('". $matricule ."','". $nom ."','". $prenom ."','". $imc ."')");

                            if ($requete){
                                echo '<center><p style="color:green">La personne a bien été ajouté ! </p></center>';
                            }else {
                                echo '<center><p style="color:red">Une erreur est survenu lors de l\'ajout ! </p></center>';
                            }
                        }
                    ?>
                </div></center>
            </article>
        </div>
        <div class="footer">
            <p>© <a href="https://github.com/KoZeuh">Kozeuh</a></p> 
        </div>
    </div>
</body>
</html>