<?php

    class Ressource
    {
        private int $id;
        private string $nom, $contenu, $url;
        private ?Exercice $exercice;
        private ?Type_ressource $typeRessource;

        /**
         * @param int $id
         * @param string $nom
         * @param string $contenu
         * @param string $url
         * @param Exercice|null $exercice
         * @param Type_ressource|null $typeRessource
         */
        public function __construct(string $nom, string $contenu, string $url, ?Exercice $exercice = null, Type_ressource $typeRessource = null)
        {
            $this->nom = $nom;
            $this->contenu = $contenu;
            $this->url = $url;
            $this->exercice = $exercice;
            $this->typeRessource = $typeRessource;
            $this->id=0;
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
        public function getNom(): string
        {
            return $this->nom;
        }

        /**
         * @param string $nom
         */
        public function setNom(string $nom): void
        {
            $this->nom = $nom;
        }

        /**
         * @return string
         */
        public function getContenu(): string
        {
            return $this->contenu;
        }

        /**
         * @param string $contenu
         */
        public function setContenu(string $contenu): void
        {
            $this->contenu = $contenu;
        }

        /**
         * @return string
         */
        public function getUrl(): string
        {
            return $this->url;
        }

        /**
         * @param string $url
         */
        public function setUrl(string $url): void
        {
            $this->url = $url;
        }

        /**
         * @return Exercice
         */
        public function getExercice(): Exercice
        {
            return $this->exercice;
        }

        /**
         * @param Exercice $exercice
         */
        public function setExercice(Exercice $exercice): void
        {
            $this->exercice = $exercice;
        }

        /**
         * @return Type_ressource
         */
        public function getTypeRessource(): Type_ressource
        {
            return $this->typeRessource;
        }

        /**
         * @param Type_ressource $typeRessource
         */
        public function setTypeRessource(Type_ressource $typeRessource): void
        {
            $this->typeRessource = $typeRessource;
        }


    }