<?php

    class Genre
    {
        private int $id;
        private string $libelle_court, $libelle_long;

        /**
         * @param int $id
         * @param string $libelle_court
         * @param string $libelle_long
         */
        public function __construct(string $libelle_court, string $libelle_long)
        {
            $this->libelle_court = $libelle_court;
            $this->libelle_long = $libelle_long;
            $this->id = 0;
        }

        //------------------ GET SET --------------------

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
        public function getLibelleCourt(): string
        {
            return $this->libelle_court;
        }

        /**
         * @param string $libelle_court
         */
        public function setLibelleCourt(string $libelle_court): void
        {
            $this->libelle_court = $libelle_court;
        }

        /**
         * @return string
         */
        public function getLibelleLong(): string
        {
            return $this->libelle_long;
        }

        /**
         * @param string $libelle_long
         */
        public function setLibelleLong(string $libelle_long): void
        {
            $this->libelle_long = $libelle_long;
        }

    }