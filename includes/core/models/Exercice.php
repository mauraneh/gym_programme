<?php

    class Exercice
    {
    private int $id;
    private string $nom_exo;
    private int $nbre_rep, $nbre_serie;
    private float $pause;

        /**
         * @param int $id
         * @param string $nom_exo
         * @param int $nbre_rep
         * @param float $poids
         */
        public function __construct(string $nom_exo, int $nbre_rep, int $nbre_serie, float $pause)
        {
            $this->nom_exo = $nom_exo;
            $this->nbre_rep = $nbre_rep;
            $this->nbre_serie=$nbre_serie;
            $this->pause = $pause;
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
        public function getNomExo(): string
        {
            return $this->nom_exo;
        }

        /**
         * @param string $nom_exo
         */
        public function setNomExo(string $nom_exo): void
        {
            $this->nom_exo = $nom_exo;
        }

        /**
         * @return int
         */
        public function getNbreRep(): int
        {
            return $this->nbre_rep;
        }

        /**
         * @param int $nbre_rep
         */
        public function setNbreRep(int $nbre_rep): void
        {
            $this->nbre_rep = $nbre_rep;
        }

        /**
         * @return float
         */
        public function getPAuse(): float
        {
            return $this->pause;
        }

        /**
         * @param float $Pause
         */
        public function setPause(float $pause): void
        {
            $this->pause = $pause;
        }

        /**
         * @return int
         */
        public function getNbreSerie(): int
        {
            return $this->nbre_serie;
        }

        /**
         * @param int $nbre_serie
         */
        public function setNbreSerie(int $nbre_serie): void
        {
            $this->nbre_serie = $nbre_serie;
        }

        public function __toString(): string
        {
            return $this->nom_exo;
        }


    }