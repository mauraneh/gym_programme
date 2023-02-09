<?php

    class Exercice
    {
    private int $id;
    private string $nom_exo;
    private int $nbre_rep;
    private float $poids;

        /**
         * @param int $id
         * @param string $nom_exo
         * @param int $nbre_rep
         * @param float $poids
         */
        public function __construct(int $id, string $nom_exo, int $nbre_rep, float $poids)
        {
            $this->id = $id;
            $this->nom_exo = $nom_exo;
            $this->nbre_rep = $nbre_rep;
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


    }