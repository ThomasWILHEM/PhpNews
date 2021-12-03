<?php

class Site
{
    private string $nom;
    private string $lienSite;
    private string $logo;
    private string $fluxRSS;

    /**
     * @param string $nom
     * @param string $lienSite
     * @param string $logo
     * @param string $fluxRSS
     */
    public function __construct(string $nom, string $lienSite, string $logo, string $fluxRSS)
    {
        $this->nom = $nom;
        $this->lienSite = $lienSite;
        $this->logo = $logo;
        $this->fluxRSS = $fluxRSS;
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
    public function getLienSite(): string
    {
        return $this->lienSite;
    }

    /**
     * @param string $lienSite
     */
    public function setLienSite(string $lienSite): void
    {
        $this->lienSite = $lienSite;
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

    /**
     * @return array
     */
    public function getNews(): array
    {
        return $this->news;
    }

    /**
     * @param array $news
     */
    public function setNews(array $news): void
    {
        $this->news = $news;
    }


}