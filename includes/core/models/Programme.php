<?php

    class Programme
    {
        private int $id;
        private string $libelle;
        private int $frequence;
        private string $description;
        private array $sessions;

        /**
         * @param string $libelle
         * @param int $frequence
         * @param string $description
         */
        public function __construct(string $libelle = '', int $frequence = 0, string $description = '')
        {
            $this->libelle = $libelle;
            $this->frequence = $frequence;
            $this->description = $description;
            $this->id = 0;
            $this->sessions = array();
        }

        /**
         * @return array
         */
        public function getSessions(): array
        {
            return $this->sessions;
        }

        /**
         * @param array $sessions
         */
        public function setSessions(array $sessions): void
        {
            $this->sessions = $sessions;
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
         * @return string
         */
        public function getDescription(): string
        {
            return $this->description;
        }

        /**
         * @param string $description
         */
        public function setDescription(string $description): void
        {
            $this->description = $description;
        }

    }