<?php

    function getConnexion()
    {
        //step 1: connexion
        $server = 'localhost';
        $port = '8889';
        $dbname = 'gym_project';
        $username = 'root';
        $password = 'root';

        //construction chain connexion : Data source name
        $dsn = "mysql:host=$server;port=$port;dbname=$dbname;charset=utf8";
        $retVal = null;
        try {
            $retVal = new PDO($dsn, $username, $password);
        } catch (PDOException $ex) {
            print('error: connexion impossible');
            die('bye'); //stop the script
        }
    return $retVal;
    }


