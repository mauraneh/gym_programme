<?php
    class Gymsession
    {
    private int $id;
    private string $libelle;
    private ?Jours $jours;
    private ?Programme $programme;
    private array $exercices;

        /**
         * @param string $libelle
         * @param Jours|null $jours
         * @param Programme|null $programme
         */
        public function __construct(string $libelle, ?Jours $jours = null, ?Programme $programme = null)
        {
            $this->libelle = $libelle;
            $this->jours = $jours;
            $this->programme = $programme;
            $this->id = 0;
            $this->exercices = array();
        }

        /**
         * @return array
         */
        public function getExercices(): array
        {
            return $this->exercices;
        }

        /**
         * @param array $exercices
         */
        public function setExercices(array $exercices): void
        {
            $this->exercices = $exercices;
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
         * @return Jours|null
         */
        public function getJours(): ?Jours
        {
            return $this->jours;
        }

        /**
         * @param Jours|null $jours
         */
        public function setJours(?Jours $jours): void
        {
            $this->jours = $jours;
        }

        /**
         * @return Programme|null
         */
        public function getProgramme(): ?Programme
        {
            return $this->programme;
        }

        /**
         * @param Programme|null $programme
         */
        public function setProgramme(?Programme $programme): void
        {
            $this->programme = $programme;
        }

    }