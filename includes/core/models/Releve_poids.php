<?php

    class Releve_poids
    {
        private int $id;
        private float $valeur;
        private DateTime $date;
        private  ?Client $client;

        /**
         * @param int $id
         * @param float $valeur
         * @param DateTime $date
         * @param Client|null $client
         */
        public function __construct(int $id, float $valeur, DateTime $date, ?Client $client)
        {
            $this->id = $id;
            $this->valeur = $valeur;
            $this->date = $date;
            $this->client = $client;
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
        public function getDate(): DateTime
        {
            return $this->date;
        }

        /**
         * @param DateTime $date
         */
        public function setDate(DateTime $date): void
        {
            $this->date = $date;
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