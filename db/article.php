<?php
require_once 'pdo.php';



//permet de récupérer tous les articles
//@return array
function getArticles() {
    global $pdo;   
    $sql = "SELECT a.*, c.color, c.label FROM article as a join category as c on c.id = a.category_id";
    $stmt = $pdo->prepare($sql); 
   
    $stmt->execute();
    
    $articles = $stmt->fetchAll();
    return $articles;
}


// permet de récupérer un article
function getArticle($id) {
    global $pdo;   
    $sql = "SELECT a.*, c.color, c.label FROM article as a join category as c on c.id = a.category_id WHERE a.id = :id";
    $stmt = $pdo->prepare($sql); 
   
    $stmt->execute([
        ':id'=> $id,
    ]);
    
    $article = $stmt->fetch();
    return $article;
}

// permet de récupérer une catégorie
function getArticlesByCategory($categoryId) {
    global $pdo;   
    $sql = "SELECT * FROM article where category_id = :category_id";
    $stmt = $pdo->prepare($sql); 
   
    $stmt->execute([
        ':category_id'=> $categoryId,
    ]);
    
    $articles = $stmt->fetchAll();
    return $articles;
}

function createArticle($newArticle, $description,$auteur, $categoryId,$image): bool
{
    global $pdo;
    $sql = "INSERT INTO article
    (title, description,create_at, auteur, category_id,image)
    VALUES (:title, :description,NOW(), :auteur, :category_id,:image )";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ":title" => $newArticle,
        ":description" => $description,
        ":auteur" => $auteur,
        ":image" => $image,
        ":category_id" => $categoryId,
        
    ]);
    
}


