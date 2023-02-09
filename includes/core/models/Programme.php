<?php

    class Programme
    {
        private int $id;
        private string $libelle;
        private int $frequence;
        private ?Client $client;

        /**
         * @param int $id
         * @param string $libelle
         * @param int $frequence
         * @param Client|null $client
         */
        public function __construct(int $id, string $libelle, int $frequence, ?Client $client)
        {
            $this->id = $id;
            $this->libelle = $libelle;
            $this->frequence = $frequence;
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
         * @return int
         */
        public function getFrequence(): int
        {
            return $this->frequence;
        }

        /**
         * @param int $frequence
         */
        public function setFrequence(int $frequence): void
        {
            $this->frequence = $frequence;
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