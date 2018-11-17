<?php
    require '../config.php';

    $numPage = 0;

    if(!isset($_GET["page"]) || $_GET["page"] == 0){
        header("location:/html/home.php?page=1");
    } else {
        $numPage = (int) $_GET["page"];
    }

    $strWelcome = <<<'WELCOME'
    <h2>Bienvenue sur mon blog !</h2>
WELCOME;

    $offset = 5 * $numPage - 5;

    function getArticlesByFive(PDO $database, int $offset): array
    {
        $stmt = $database->prepare("SELECT id, title, image FROM articles LIMIT :offset , 5");
        $stmt->bindParam(':offset', $offset,PDO::PARAM_INT);
        $stmt->execute();
        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt;
    }

    function preventNextPage(PDO $database, $numPage)
    {
        $stmt = $database->query("SELECT COUNT(id) FROM articles");
        $stmt->execute();
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = (int) $stmt["COUNT(id)"];
        if($result <= (5 * $numPage) ){
            return false;
        } else {
            return true;
        }
    }

    include 'header.php';
?>

    <div class="container">
        <?php echo $strWelcome; ?>

        <div class="flexy-col">
        <?php
            $articles = getArticlesByFive($database, $offset);

            if(count($articles) != 0) {

                for($c=0; $c < count($articles); $c++) {

                    if(($c % 2) == 1){ ?>
                        <div class="flexy">
                            <img src="../<?= $articles[$c]['image'] ?>">
                            <div class="d-col">
                                <h1><?php echo $articles[$c]['title']; ?></h1>
                                <a href="/html/article.php?id=<?= $articles[$c]['id'] ?>" class="btn-custom">Voir</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="flexy">
                            <div class="d-col">
                                <h1><?php echo $articles[$c]['title']; ?></h1>
                                <a href="/html/article.php?id=<?= $articles[$c]['id'] ?>" class="btn-custom">Voir</a>
                            </div>
                        <img src="<?php echo '../'.$articles[$c]['image']; ?>">
                        </div>
             <?php  } } } else {
                redirection("https://www.youtube.com/watch?v=QtcL96CDJf8"); } ?>
        </div>
        <div class="flexy-arr">
            <?php if($_GET["page"] > 1) { ?>
            <a href="/html/home.php?page=<?php echo ($numPage-1); ?>" class="btn-custom">Précédent</a> <?php } ?>
            <?php $tmp = preventNextPage($database, $numPage);
            if($tmp) { ?>
            <a href="/html/home.php?page=<?php echo ($numPage+1); ?>" class="btn-custom">Suivant</a> <?php } ?>
        </div>
    </div
</body>