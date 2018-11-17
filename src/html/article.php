<?php
    require '../config.php';

    $idArticle = (int) $_GET["id"];

    $article = getArticle($database, $idArticle);
    $imgPath = $article["image"];

    function getArticle(PDO $connection, int $idArticle)
    {
        $stmt = $connection->prepare("SELECT * FROM articles WHERE id = :id");
        $stmt->bindParam(':id', $idArticle, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    function getComments(PDO $connection, $idArticle){
        $stmt = $connection->prepare("SELECT * FROM comments WHERE article = :id");
        $stmt->bindParam(':id', $idArticle, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    include 'header.php';
?>

<?php if($article){ ?>
    <div class="container">
        <div class="display">
            <h1 class="articleTitle">
                <?php echo $article["title"]; ?>
            </h1>
            <p>Auteur : <?php echo $article["author"]; ?></p>

            <img src="<?php echo '/'.$imgPath; ?>">
            <p class="artDescription"><?php echo $article["content"]; ?></p>

        </div>
        <?php if(isset($_SESSION["username"])){ ?>
        <div class="display">
        <?php $artComment = getComments($database, $idArticle);
            $c = 0;
            while( $c < count($artComment)){ ?>

            <div class="artComment">
                <p class="author"><?php echo $artComment[$c]["username"]; ?> :</p>
                <p><?php echo $artComment[$c]["content"];
                $c++; ?></p>
            </div>

            <?php } ?>
            <form action="../comment.php?id=<?= $idArticle?>" method="post" enctype="multipart/form-data">
                <textarea rows="3" name="content" id="content" placeholder="Commentaire..." class="form-control content"></textarea>
                <input type="submit" value="Valider" name="submit" class="btn btn-primary">
            </form>
        </div> <?php } ?>
    </div> <?php } else { redirection("https://www.youtube.com/watch?v=QtcL96CDJf8"); } ?>
</body>


