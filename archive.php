<?php
$title = "archive";


require_once 'db/article.php';
// Et voilà ! J'ai tous mes articles !
$articles = getArticles();



include "components/header.php";
?>

<h1>Archive</h1>
<div class="container">


    <div class="row g-5">
        <?php foreach ($articles as $article): ?>
            <div class="col-xl-4 col-lg-4 col-sm-6">

                <div class="card">
                    <img src=<?= $article['image'] ?> alt="..." >
                    <div class="card-body">
                        <h5 class="card-title"><?= $article['title'] ?></h5>

                        <p class="card-text"><?= substr($article['description'], 0, 30) . " ..."; ?></p>

                        <a href="article.php?id=<?php echo  $article["id"];?>" class="btn btn-primary">voir plus</a>

                       
                       
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include "components/footer.php"; ?>