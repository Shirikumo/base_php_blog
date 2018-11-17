<?php
    require '../config.php';

    $idArticle = (int) $_GET["id"];

    $article = getArticle($database, $idArticle);
    $imgPath = $article["image"];

    function getArticle(PDO $connection, int $idArticle): array
    {
        $stmt = $connection->prepare("SELECT * FROM articles WHERE id = :id");
        $stmt->bindParam(':id', $idArticle, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result == false) { redirection("https://www.youtube.com/watch?v=QtcL96CDJf8");
        exit; }
        return $result;
    }

    include 'header.php';
?>


    <div class="container">
        <div class="display">
            <h1 class="articleTitle">
                <?php echo $article["title"]; ?>
            </h1>
            <p>Auteur : <?php echo $article["author"]; ?></p>

            <img src="<?php echo '/'.$imgPath; ?>">
            <p><?php echo $article["content"]; ?></p>

        </div>
    </div>
</body>


