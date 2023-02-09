<?php

    class Contenir
    {
    private int $id;
    private ?Programme $programme;

        /**
         * @param int $id
         * @param Programme|null $programme
         */
        public function __construct(int $id, ?Programme $programme)
        {
            $this->id = $id;
            $this->programme = $programme;
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