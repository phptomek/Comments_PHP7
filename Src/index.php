<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trening PHP7</title>
    <style>
        *{
            margin:0;
            padding:0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            font-family: Arial;
        }
        .form--content__wrapper{
            display: flex;
            flex-direction: column;
            width: 370px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        img{
            height: 60px;
            width: 60px;
        }
        input{
            height: 36px;
            font-size: 22px;
        }
        textarea{
            outline:none;
            height: 98px;
            font-size: 22px;
        }
        button{
            height: 22px;
        }
        .article--wrapper{
            position: absolute;
            top: 240px;
            left: 50%;
            transform: translateX(-50%);
        }
        article{
            width: 370px;
            height: 92px;
            background-color: #d3d3d3;
        }
    </style>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form--content__wrapper">
        <input type="text" name="title" id="title" placeholder="Title">
        <textarea name="content" id="content" cols="30" rows="10" placeholder="Description"></textarea>
        <input type="text" name="image" id="image" placeholder="Image Url">
        <button type="submit" name="send">Send</button>
    </div>
</form>
<div class="article--wrapper">
<?php include('db_connect.php');
$result = $mysqli->query("SELECT * FROM articles ORDER BY id");
while ( $article = mysqli_fetch_array($result) ) {
    echo '<article class="single-article">';
    echo '<h3>' . $article['title'] . '</h3>';
    echo '<div class="article-content">';
    echo '<p>' . $article['content'] . '</p>';
    echo '</div>';
    echo '<img src="' . $article['image'] . '" alt="">';
    echo '</article>';
}

if ( isset($_POST['send']) ) {
    $title = strip_tags($_POST['title']);
    $content = strip_tags($_POST['content']);
    $image = strip_tags($_POST['image']);
    $statement = $mysqli->prepare("INSERT articles (title,image,content) VALUES (?,?,?)");
    $statement->bind_param("sss",$title,$image,$content);
    $statement->execute();
    $statement->close();
    header("Location: index.php");
}
?>
</div>
</body>
</html>