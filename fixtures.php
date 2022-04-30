<?php
//Creation de la table en BDD

//Connection à la base de donnéés
require_once 'connexion.php';

//Désactive la Vérification des clés étrangère
$db->query('SET FOREIGN_KEY_CHECKS = 0');

//Vide la table "editeur"
$db->query('TRUNCATE editeur');

//Vide la table "magazine"
$db->query('TRUNCATE magazine');

//Active la vérification des clés étrangères
$db->query('SET FOREIGN_KEY_CHECKS = 1');


//Insertion des BDD dans les tables

//for ($i = 0; $i < 10; $i++) {
//    $query = $db->prepare('INSERT INTO editeur (name) VALUES (:name)');
//    $query->bindValue(':name', $faker->colorName);
//    $query->execute();
//}

//Insertion des données dans la table magazine

//for ($i = 0;$i < 50; $i++){
//    query = $db->prepare('INSERT INTO magazine')
//}











?>