<?php
require_once 'includes/core/models/Genre.php';
require_once 'includes/core/models/User.php';
    class Client
    {
        private int $id;
        private string $nom, $prenom, $email, $ville;
        private DateTime $dateNaissance;
        private float $poidsRef, $poidsVise, $taille;
        private string $tel;
        private ?Genre $genre;
        private ?User $user;
        private ?Programme $programme;

        /**
         * @param string $nom
         * @param string $prenom
         * @param string $email
         * @param string $ville
         * @param DateTime|null $dateNaissance
         * @param float $poidsRef
         * @param float $poidsVise
         * @param float $taille
         * @param string $tel
         * @param Genre|null $genre
         * @param User|null $user
         * @param Programme|null $programme
         */
        public function __construct(string $nom='', string $prenom='', string $email='', string $ville='', ?DateTime $dateNaissance = new DateTime('now'), float $poidsRef=0, float $poidsVise=0, float $taille=0, string $tel='', ?Genre $genre = null, ?User $user = null, ?Programme $programme = null)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
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
            $this->user = $user ?? new User('', '');
            $this->programme = $programme ?? new Programme('', 0, '');
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

        /**
         * @return User|null
         */
        public function getUser(): ?User
        {
            return $this->user;
        }

        /**
         * @param User|null $user
         */
        public function setUser(?User $user): void
        {
            $this->user = $user;
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