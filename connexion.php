<?php
/**
 * Connexion à la base de données
 */
// Localisation de la base de donner 
const DB_HOST = 'localhost';

// Nom d'utilisateur
const DB_USER = 'root';

// Mot de Passe
const DB_PASS = '';

//Nom de la Base de Données
const DB_NAME = 'magazines';

//PHP Data Objects
$db = new PDO('mysql:host='.DB_HOST.';dbname='. DB_NAME, DB_USER, DB_PASS, [

    //Gestion d'erreurs
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    //Gestion du jeu de caractères

    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',

    //Choix des retours des résultats
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);