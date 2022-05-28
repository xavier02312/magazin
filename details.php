<?php
// Connexion à la BDD
require_once 'connexion.php';

// Chargement des dépendances Composer
require_once 'vendor/autoload.php';

//Netoyage de la valeur reçue
/**
 * "id" correspond au nom de la variable dans l' URL
 */
$id = htmlspecialchars(strip_tags( $_GET['id']));
/**
 * Requête SQL
 */
$query = $db->prepare('SELECT magazine.*, editeur.* FROM magazine INNER JOIN editeur ON magazine.editeur_id = editeur.id WHERE magazine.id = :id');
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();

//Récupération d'un seul enregistrement
$article = $query->fetch();

//dump($article);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails.php</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<!---rapel de header--->
<?php require_once 'layouts/header.php'; ?>

<body>

    <main class="pt-5">
        <div class="contenaire">
            <article class="w-50 mx-auto py-5">
                <h1 class="h1 text-start text-lg-center"><?php echo $article['nom'] ?></h1>
                <div class="row mx-auto">
                   
                        <!---Colone contenant un Détail--->
                        <div class="col-12 col-lg-6 pb-5">
                            <!--"detail.php?id=" super glopale qui permet d'envoyer au detail-->
                            <article class="text-center">
                                <a href="detail.php?id=<?php echo $article['id']; ?>" title="<?php echo $article['nom'] ?>" class="text-dark text-decoration-none">
                                    <img src="images/<?php echo $article['image']; ?>" alt="<?php ?>bla.." class="w-100 rounded">
                                    <h1 class="pt-2"><?php echo $article['description']; ?></h1>
                                </a>
                                <p class="text-secondary">
                                    <!--prix du detail-->
                                    <?php echo $article['prix']; ?>
                                </p>
                                <P class="py-2">
                                    <!---Description de l'article--->
                                    <?php ?>
                                </P>
                                    <!---Bouton de retour à l'index--->
                                <div class="d-flex align-items-center">
                                    <a href="index.php<?php  ?>" title="titre" class="badge rounded-pill bg-primary text-decoration-none"> 
                                    PAGE MAGAZINES RETOUR
                                    </a>
                                </div>
                            </article>
                        </div>
                    <?php  ?>
                </div>
            </article>
        </div>
    </main>

    <?php require_once 'layouts/footer.php'; ?>

</body>

</html>