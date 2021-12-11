<?php

class Site
{
    private string $nom;
    private string $lien;
    private string $logo;
    private string $fluxRSS;

    /**
     * @param string $nom
     * @param string $lien
     * @param string $logo
     * @param string $fluxRSS
     */
    public function __construct(string $nom, string $lien, string $logo, string $fluxRSS)
    {
        $this->setNom($nom);
        $this->setLien($lien);
        $this->setLogo($logo);
        $this->setFluxRSS($fluxRSS);
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getLien(): string
    {
        return $this->lien;
    }

    /**
     * @param string $lien
     */
    public function setLien(string $lien): void
    {
        $this->lien = $lien;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getFluxRSS(): string
    {
        return $this->fluxRSS;
    }

    /**
     * @param string $fluxRSS
     */
    public function setFluxRSS(string $fluxRSS): void
    {
        $this->fluxRSS = $fluxRSS;
    }

    public function __toString(): string
    {
        return $this->getNom()." (lien: ".$this->getLien().") (flux: ".$this->getFluxRSS().")";
    }
}