<?php
    require '../config.php';
    if(isset($_SESSION["username"])){
    include 'header.php';
?>

<div class="container">
    <h2>Ajouter un nouvel article</h2>
    <form action="../upload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" id="title" placeholder="Titre..." class="form-control">
        <textarea rows="10" name="content" id="content" placeholder="Contenu..." class="form-control content"></textarea>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Valider" name="submit" class="btn btn-primary">
    </form>
</div>
</body>
<?php } else {
        header("location:https://www.youtube.com/watch?v=QtcL96CDJf8");
    }