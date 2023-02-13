<?php

    class Exercice
    {
    private int $id;
    private string $nom_exo;
    private int $nbre_rep, $nbre_serie;
    private float $poids;

        /**
         * @param int $id
         * @param string $nom_exo
         * @param int $nbre_rep
         * @param float $poids
         */
        public function __construct(string $nom_exo, int $nbre_rep, int $nbre_serie, float $poids)
        {
            $this->nom_exo = $nom_exo;
            $this->nbre_rep = $nbre_rep;
            $this->nbre_serie=$nbre_serie;
            $this->poids = $poids;
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
        public function getPoids(): float
        {
            return $this->poids;
        }

        /**
         * @param float $poids
         */
        public function setPoids(float $poids): void
        {
            $this->poids = $poids;
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


    }