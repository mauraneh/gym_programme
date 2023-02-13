<?php
    class Gymsession
    {
    private int $id;
    private string $libelle;
    private ?Contenir $contenir;
    private ?Composer $composer;
    private ?Session_jours $session_jours;

        /**
         * @param string $libelle
         * @param Contenir|null $contenir
         * @param Composer|null $composer
         * @param Session_jours|null $session_jours
         */
        public function __construct(string $libelle, ?Contenir $contenir, ?Composer $composer, ?Session_jours $session_jours)
        {
            $this->libelle = $libelle;
            $this->contenir = $contenir;
            $this->composer = $composer;
            $this->session_jours = $session_jours;
            $this->id= 0;
        }

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * @param int $id
         */
        public function setId(int $id): void
        {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getLibelle(): string
        {
            return $this->libelle;
        }

        /**
         * @param string $libelle
         */
        public function setLibelle(string $libelle): void
        {
            $this->libelle = $libelle;
        }

        /**
         * @return Contenir|null
         */
        public function getContenir(): ?Contenir
        {
            return $this->contenir;
        }

        /**
         * @param Contenir|null $contenir
         */
        public function setContenir(?Contenir $contenir): void
        {
            $this->contenir = $contenir;
        }

        /**
         * @return Composer|null
         */
        public function getComposer(): ?Composer
        {
            return $this->composer;
        }

        /**
         * @param Composer|null $composer
         */
        public function setComposer(?Composer $composer): void
        {
            $this->composer = $composer;
        }

        /**
         * @return Session_jours|null
         */
        public function getSessionJours(): ?Session_jours
        {
            return $this->session_jours;
        }

        /**
         * @param Session_jours|null $session_jours
         */
        public function setSessionJours(?Session_jours $session_jours): void
        {
            $this->session_jours = $session_jours;
        }


    }