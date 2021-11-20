<?php

class Validation
{

    static function isValidSite(string &$nom,string &$lienSite, string &$logo, string &$fluxRSS, array &$vueErreur):bool{

        if(!isset($nom)||empty($nom)){
            $vueErreur[]="Le nom est manquant";
            return false;
        }

        if(!isset($lienSite)||empty($lienSite)){
            $vueErreur[]="Le lien est manquant";
            return false;
        }elseif(!filter_var($lienSite,FILTER_VALIDATE_URL)){
            $vueErreur[]="Le lien n'est pas dans le bon format";
            return false;
        }

        if(!isset($logo)||empty($logo)){
            $vueErreur[]="Le logo est manquant";
            return false;
        }

        if(!isset($fluxRSS)||empty($fluxRSS)){
            $vueErreur[]="Le fluxRSS est manquant";
            return false;
        }elseif(!filter_var($fluxRSS,FILTER_VALIDATE_URL)){
            $vueErreur[]="Le fluxRSS n'est pas dans le bon format";
            return false;
        }

        if ($nom != filter_var($nom, FILTER_SANITIZE_STRING) || $logo != filter_var($logo, FILTER_SANITIZE_STRING))
        {
            $vueErreur[]="testative d'injection de code";
            return false;
        }

        if ($lienSite != filter_var($lienSite, FILTER_SANITIZE_EMAIL) || $fluxRSS != filter_var($fluxRSS, FILTER_SANITIZE_EMAIL))
        {
            $vueErreur[]="testative d'injection de code";
            return false;
        }


        $nom=filter_var($nom,FILTER_SANITIZE_STRING);               //
        $lienSite=filter_var($lienSite,FILTER_SANITIZE_URL);        // Toujours utiles grâce aux 2 if du dessus ?
        $logo=filter_var($logo,FILTER_SANITIZE_STRING);             //
        $fluxRSS=filter_var($fluxRSS,FILTER_SANITIZE_URL);          //
        return true;

    }

    public static function isValidLogin(string &$login, string &$mdp):bool
    {
        if (!isset($login) || empty($login)) {
            $vueErreur[] = "Le login est manquant";
            return false;
        }

        if (!isset($mdp) || empty($mdp)) {
            $vueErreur[] = "Le mot de passe est manquant";
            return false;
        }

        if ($login != filter_var($login, FILTER_SANITIZE_STRING) || $mdp != filter_var($mdp, FILTER_SANITIZE_STRING)) {
            $vueErreur[] = "tentative d'injection de code";
            return false;
        }

        $login = filter_var($login, FILTER_SANITIZE_STRING);
        $mdp = filter_var($mdp, FILTER_SANITIZE_STRING);
        return true;
    }
}