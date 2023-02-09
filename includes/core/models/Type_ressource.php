<?php

    class Type_ressource
    {
    private int $id;
    private string $libelle;

        /**
         * @param int $id
         * @param string $libelle
         */
        public function __construct(int $id, string $libelle)
        {
            $this->id = $id;
            $this->libelle = $libelle;
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


    }