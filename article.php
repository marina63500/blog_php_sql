<?php
$title = "article";
require_once "db/article.php";
require_once "db/comments.php";

// Si je n'ai pas d'id, je ne peux pas trouver mon article
// donc, je redirige l'utilisateur sur la page archive
if (!isset($_GET['id'])) {
  header('Location:/archive.php');
}

// Sinon, je recupère l'id
$id = $_GET['id'];

$article = getArticle($id);
$comments = getCommentsByArticle($id);


include "components/header.php";
?>

<div class="container">


  <h1> Article</h1>

  <section>
    <div>
      <h2><?= $article['title'] ?></h2>

      <img src=<?= $article['image'] ?> alt="...">

      <p><?= $article['description'] ?></p>

      <p><?= $article['create_at'] ?></p>
    </div>
  </section>

  <!-- Liste des commentaires -->
  <ul>
    <?php foreach ($comments as $comment): ?>
      <li>
        <p>Commentaire de : <?= $comment['first_name'] ?></p>
        <p><?= $comment['content'] ?></p>
      </li>
    <?php endforeach; ?>
  </ul>





  <form method='POST' class="comment" action="/actions/create-comment.php">

    <div class="mb-3">
      <label for="first_name" class="form-label">Entrer votre Nom </label>
      <input type="text" class="form-control" id="first_name" name="first_name">
    </div>

    <div class="mb-3">
      <label for="comment" class="form-label">Entrer votre commentaire</label>
      <textarea class="form-control" id="comment" name="content" rows="3"></textarea>
    </div>

    <div>
      <input type="hidden" name="articleId" value="<?= $article['id'] ?>">
    </div>
    <div class="btn-comment">
      <input type="submit" value="soumettre">
    </div>
  </form>
</div>


<?php include "components/footer.php"; ?>