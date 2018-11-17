<?php
require 'config.php';
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$database = dbConnect($db, $host, $db_user, $db_password);

processArticle($database, $target_file, $target_dir, $imageFileType);

function processArticle($database, $target_file, $target_dir, $imageFileType)
{
    if(isset($_POST["submit"])){
        if(isset($_POST["title"]) && isset($_POST["content"])){
            $title = htmlspecialchars($_POST["title"]);
            $content = htmlspecialchars($_POST["content"]);
            $author = htmlspecialchars($_SESSION["username"]);
            $check = checkImage($target_file, $imageFileType);
            if ($check == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                $target_file = uniqid().'.'.$imageFileType;
                $target = $target_dir.$target_file;
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target)) {
                    echo "The file ". $target_file. " has been uploaded.";

                    $exist = userExist($database, $author);

                    if($exist){
                        $isSent = createArticle($database, $title, $content, $author, $target);
                        if($isSent){
                            echo "YATAAA";
                            redirection("/html/home.php");
                        } else {
                            echo "TA MERE ELLE FONCTIONNE PAS";
                            redirection("/html/new_article.php");
                        }
                    } else {
                        echo "tabarnak de glaçon de couilles au pastis orange le sida de ta soeur";
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
}

function checkImage($target_file, $imageFileType)
{
    $uploadOk = 1;
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check == false) {
        echo "File is not an image - " . $check["mime"] . ".";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    return $uploadOk;
}

function createArticle(PDO $db, $title, $content, $author, $file)
{
    $stmt = $db->prepare("INSERT INTO articles (title, content, image, author) VALUES (:title, :content, :image, :author)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':image', $file);
    $stmt->execute();
    return $stmt;
}