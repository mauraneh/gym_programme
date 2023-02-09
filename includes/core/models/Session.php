<?php

    class Session
    {
    private int $id;
    private string $libelle, $ordre;

        /**
         * @param int $id
         * @param string $libelle
         * @param string $ordre
         */
        public function __construct(int $id, string $libelle, string $ordre)
        {
            $this->id = $id;
            $this->libelle = $libelle;
            $this->ordre = $ordre;
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
         * @return string
         */
        public function getOrdre(): string
        {
            return $this->ordre;
        }

        /**
         * @param string $ordre
         */
        public function setOrdre(string $ordre): void
        {
            $this->ordre = $ordre;
        }


    }