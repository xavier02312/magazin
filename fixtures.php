<?php
//Creation de fausse données en BDD

//Chargement de l'autoloader de composer
require_once 'vendor/autoload.php';


//Connection à la base de donnéés
require_once 'connexion.php';

// Création de l'instance de Faker
$faker = Faker\Factory::create('fr_FR');

//Désactive la Vérification des clés étrangère
$db->query('SET FOREIGN_KEY_CHECKS = 0');

//Vide la table "editeur"
$db->query('TRUNCATE editeur');

//Vide la table "magazine"
$db->query('TRUNCATE magazine');

//Active la vérification des clés étrangères
$db->query('SET FOREIGN_KEY_CHECKS = 1');


//Insertion des BDD dans les tables

for ($i = 0; $i < 20; $i++) {
    $query = $db->prepare('INSERT INTO editeur (name) VALUES (:name)');
    $query->bindValue(':name', $faker->lastName);
    $query->execute();    
}




//Insertion des données dans la table magazine

for ($i = 0; $i < 20; $i++) {
    $query = $db->prepare('INSERT INTO magazine (nom, description, prix, image, editeur_id) VALUES ( :nom, :description, :prix, :image, :editeur_id)');
    $query->bindValue(':nom', $faker->firstName);
    $query->bindValue(':description', $faker->city);
    $query->bindValue(':prix', $faker->randomFloat(2,1,2));
    $query->bindValue(':image','img01.jpg');
    $query->bindValue(':editeur_id', rand(1, 20), PDO::PARAM_INT);
    $query->execute();
}














?>