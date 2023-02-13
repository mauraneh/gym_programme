<?php
    require_once 'includes/core/models/Jours.php';
    class Session_jours
    {
    private ?Gymsession $session;
    private ?Jours $jours;

        /**
         * @param Gymsession|null $session
         * @param Jours|null $jours
         */
        public function __construct(?Gymsession $session, ?Jours $jours)
        {
            $this->session = $session;
            $this->jours = $jours;
        }

        /**
         * @return Gymsession|null
         */
        public function getSession(): ?Gymsession
        {
            return $this->session;
        }

        /**
         * @param Gymsession|null $session
         */
        public function setSession(?Gymsession $session): void
        {
            $this->session = $session;
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


    }