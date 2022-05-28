<?php
// Connexion à la BDD
require_once 'connexion.php';

// Chargement des dépendances Composer
require_once 'vendor/autoload.php';

//Passe la requête SQL
$query = $db->query('SELECT magazine.*, editeur.* FROM magazine INNER JOIN editeur ON magazine.editeur_id = editeur.id');
$articles = $query->fetchAll();

//dump($articles);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Gestion de Magazines</title>
</head>

<body>
    <!---rapel de header--->
    <?php require_once 'layouts/header.php'; ?>

    <main class="py-5">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-success table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="col-1 table-active">id</th>
                            <th class="col-2 table-active">Nom</th>
                            <th class="col-1 table-active">Editeur</th>
                            <th class="col-1 table-active">Voir le Détail</th>
                            <th class="col-1 table-active">Mettre à Jour</th>
                            <th class="col-1 table-active">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!---Boucle pour remplir le tableau--->
                        <?php foreach ($articles as $article) : ?>
                            <tr>
                                <td>
                                    <?php echo $article['id']; ?>
                                </td>
                                <td>
                                    <?php echo $article['nom']; ?>
                                </td>
                                <td>
                                    <?php echo $article['name']; ?>
                                </td>

                                <td>
                                    <!---bouton voir le Détail--->
                                    <a href="details.php?id=<?php echo $article['id']; ?>" class="btn btn-warning" title="Voir le détail">
                                        Voir le Détail
                                    </a>
                                </td>
                                <td>
                                    <!---bouton Mettre à jour--->
                                    <a href="details.php?id=<?php echo $article['id']; ?>" class="btn btn-secondary" title="Mettre à Jour">
                                        Mettre à jour
                                    </a>
                                </td>
                                <td>
                                    <!---Bouton de supp--->
                                    <a href="#.php?id=<?php ?>" title="Delete" class="ps-2 btn btn-outline-danger btnDelete">
                                        Supprimer cet article</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
        <?php require_once 'layouts/footer.php'; ?>
</body>
        
</html>