<?php

    function interpretation($imc){
        switch (true) {
            case $imc < 18.5:
                $interpretation= "Insuffisance ponderale (maigreur)";
                break;
            case $imc < 25:
                $interpretation= "Corpulence normale";
                break;
            case $imc < 30:
                $interpretation= "Surpoids";
                break;
            case $imc < 35:
                $interpretation= "Obésité modérée";
                break;
            case $imc < 40:
                $interpretation= "Obésité sévère";
                break;
            case $imc > 40:
                $interpretation= "Obésité morbide ou massive";
                break;
        }

        return $interpretation;
    }

    function imc($poids,$taille){
        $taille = $taille/100;
        $imc = $poids/($taille*$taille);

        return array($imc,interpretation($imc));
    }
?>