<?php

    class Releve_poids
    {
        private int $id;
        private DateTime $dateAjout;
        private float $valeur;
        private  ?Client $client;

        /**
         * @param int $id
         * @param DateTime $dateAjout
         * @param float $valeur
         * @param Client|null $client
         */
        public function __construct(DateTime $dateAjout = new DateTime('now'), float $valeur=0, ?Client $client= null)
        {

            $this->dateAjout = $dateAjout;
            $this->valeur = $valeur;
            $this->client = $client;
            $this->id = 0;
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
         * @return float
         */
        public function getValeur(): float
        {
            return $this->valeur;
        }

        /**
         * @param float $valeur
         */
        public function setValeur(float $valeur): void
        {
            $this->valeur = $valeur;
        }

        /**
         * @return DateTime
         */
        public function getDateAjout(): DateTime
        {
            return $this->dateAjout;
        }

        /**
         * @param DateTime $date
         */
        public function setDateAjout(DateTime $dateAjout): void
        {
            $this->dateAjout = $dateAjout;
        }

        /**
         * @return Client|null
         */
        public function getClient(): ?Client
        {
            return $this->client;
        }

        /**
         * @param Client|null $client
         */
        public function setClient(?Client $client): void
        {
            $this->client = $client;
        }


    }