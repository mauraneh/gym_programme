<?php
require_once 'includes/core/models/Genre.php';
    class Client
    {
        private int $id;
        private string $nom, $prenom, $email, $mdp, $ville;
        private DateTime $dateNaissance;
        private float $poidsRef, $poidsVise, $taille;
        private string $tel;
        private ?Genre $genre;

        /**
         * @param int $id
         * @param string $nom
         * @param string $prenom
         * @param string $email
         * @param string $mdp
         * @param string $ville
         * @param DateTime $dateNaissance
         * @param float $poidsRef
         * @param float $poidsVise
         * @param float $taille
         * @param string $tel
         * @param Genre|null $genre
         */
        public function __construct(string $nom='', string $prenom='', string $email='', string $mdp='', string $ville='', ?DateTime $dateNaissance = new DateTime('now'), float $poidsRef=0, float $poidsVise=0, float $taille=0, string $tel='', ?Genre $genre = null)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
            $this->mdp = $mdp;
            $this->ville = $ville;
            if(is_null($dateNaissance)){
                $this->dateNaissance = new DateTime('now');
            }else{
                $this->dateNaissance = $dateNaissance;
            }
            $this->poidsRef = $poidsRef;
            $this->poidsVise = $poidsVise;
            $this->taille = $taille;
            $this->tel = $tel;
            $this->genre = $genre ?? new Genre('', '');
        }

        //----------------- GET SET ----------------------------
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
        public function getPrenom(): string
        {
            return $this->prenom;
        }

        /**
         * @param string $prenom
         */
        public function setPrenom(string $prenom): void
        {
            $this->prenom = $prenom;
        }

        /**
         * @return string
         */
        public function getEmail(): string
        {
            return $this->email;
        }

        /**
         * @param string $email
         */
        public function setEmail(string $email): void
        {
            $this->email = $email;
        }

        /**
         * @return string
         */
        public function getMdp(): string
        {
            return $this->mdp;
        }

        /**
         * @param string $mdp
         */
        public function setMdp(string $mdp): void
        {
            $this->mdp = $mdp;
        }

        /**
         * @return string
         */
        public function getVille(): string
        {
            return $this->ville;
        }

        /**
         * @param string $ville
         */
        public function setVille(string $ville): void
        {
            $this->ville = $ville;
        }

        /**
         * @return DateTime
         */
        public function getDateNaissance(): DateTime
        {
            return $this->dateNaissance;
        }

        /**
         * @param DateTime $dateNaissance
         */
        public function setDateNaissance(DateTime $dateNaissance): void
        {
            $this->dateNaissance = $dateNaissance;
        }

        /**
         * @return float
         */
        public function getPoidsRef(): float
        {
            return $this->poidsRef;
        }

        /**
         * @param float $poidsRef
         */
        public function setPoidsRef(float $poidsRef): void
        {
            $this->poidsRef = $poidsRef;
        }

        /**
         * @return float
         */
        public function getPoidsVise(): float
        {
            return $this->poidsVise;
        }

        /**
         * @param float $poidsVise
         */
        public function setPoidsVise(float $poidsVise): void
        {
            $this->poidsVise = $poidsVise;
        }

        /**
         * @return float
         */
        public function getTaille(): float
        {
            return $this->taille;
        }

        /**
         * @param float $taille
         */
        public function setTaille(float $taille): void
        {
            $this->taille = $taille;
        }

        /**
         * @return string
         */
        public function getTel(): string
        {
            return $this->tel;
        }

        /**
         * @param string $tel
         */
        public function setTel(string $tel): void
        {
            $this->tel = $tel;
        }

        /**
         * @return Genre|null
         */
        public function getGenre(): ?Genre
        {
            return $this->genre;
        }

        /**
         * @param Genre|null $genre
         */
        public function setGenre(?Genre $genre): void
        {
            $this->genre = $genre;
        }



    }