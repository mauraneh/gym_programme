<?php
    require_once 'includes/core/models/Exercice.php';
    class Composer
    {
        private int $id;
        private ?Exercice $exercice;

        /**
         * @param int $id
         * @param Exercice|null $exercice
         */
        public function __construct(int $id, ?Exercice $exercice)
        {
            $this->id = $id;
            $this->exercice = $exercice;
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
         * @return Exercice|null
         */
        public function getExercice(): ?Exercice
        {
            return $this->exercice;
        }

        /**
         * @param Exercice|null $exercice
         */
        public function setExercice(?Exercice $exercice): void
        {
            $this->exercice = $exercice;
        }


    }