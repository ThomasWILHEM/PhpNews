<?php

class News
{
    private string $titre;
    private string $description;
    private string $lien;
    private string $date;
    /**
     * @var string Identifiant du site vers lequel la news est associé.
     */
    private string $idSite;

    /**
     * @param string $titre
     * @param string $description
     * @param string $lien
     * @param string $date
     * @param string $idSite
     */
    public function __construct(string $titre, string $description, string $lien, string $date, string $idSite)
    {
        $this->setTitre($titre);
        $this->setDescription($description);
        $this->setLien($lien);
        $this->setDate($date);
        $this->setIdSite($idSite);
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getIdSite(): string
    {
        return $this->idSite;
    }

    /**
     * @param string $idSite
     */
    public function setIdSite(string $idSite): void
    {
        $this->idSite = $idSite;
    }

    public function __toString(): string
    {
        return $this->getTitre() . " (" . $this->getDate() . ") (" . $this->getLien() . ")";
    }
}