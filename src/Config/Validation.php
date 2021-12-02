<?php

class Validation
{

    public static function isValidSite(string $nom, string $lienSite, string $logo, string $fluxRSS, array &$vueErreur): bool
    {
        if(!self::isValidString($nom,$vueErreur)){
            $vueErreur[] = "Chaine de caractères manquante: nom du site";
            return false;
        }

        if (!self::isValidURL($lienSite, $vueErreur)) {
            $vueErreur[] = "URL manquante: lien du site";
            return false;
        }

        if (!self::isValidURL($logo, $vueErreur)) {
            $vueErreur[] = "URL manquante: lien du logo";
            return false;
        }

        if (!self::isValidURL($fluxRSS, $vueErreur)) {
            $vueErreur[] = "URL manquante: lien du flux RSS";
            return false;
        }

        if ($nom != filter_var($nom, FILTER_SANITIZE_STRING) || $logo != filter_var($logo, FILTER_SANITIZE_URL)
            || $lienSite != filter_var($lienSite, FILTER_SANITIZE_URL) || $fluxRSS != filter_var($fluxRSS, FILTER_SANITIZE_URL)) {
            $vueErreur[] = "tentative d'injection de code";
            return false;
        }
        return true;
    }

    public static function isValidLogin($login, $mdp, &$vueErreur): bool
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
        return true;
    }

    public static function isValidString(string $string, array &$vueErreur): bool
    {
        if (empty($string)) {
            $vueErreur[] = "Le chaine de caractères est manquante ou vide";
            return false;
        }
        if ($string != filter_var($string, FILTER_SANITIZE_STRING)) {
            $vueErreur[] = "Tentative d'injection de code";
            return false;
        }
        return true;
    }

    public static function isValidURL(string $URL, array &$vueErreur): bool
    {
        if (empty($URL)) {
            $vueErreur[] = "L'URL est manquante ou vide";
            return false;
        }
        if ($URL != filter_var($URL, FILTER_SANITIZE_URL)) {
            $vueErreur[] = "Tentative d'injection de code";
            return false;
        }
        if (!filter_var($URL, FILTER_VALIDATE_URL)) {
            $vueErreur[] = "Le lien n'est pas dans le bon format";
            return false;
        }
        return true;
    }
}