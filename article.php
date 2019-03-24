
<?php
require "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Блог IT_Минималиста!</title>

    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="media/css/style.css">
</head>
<body>

<div id="wrapper">

    <?php include "includes/HEADER.php"?>

    <?php
        $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = ". (int)$_GET['id']);

        if ( mysqli_num_rows($article) <= 0 ) {
            ?>
            <div id="content">
                <div class="container">
                    <div class="row">
                        <section class="content__left col-md-8">
                            <div class="block">
                                <a></a>
                                <h3>Article not found</h3>
                                <div class="block__content">
                                    <div class="full-text"></div>
                                    Ну нету статьи
                                </div>
                            </div>
                        </section>
                        <section class="content__right col-md-4">
                            <?php include 'includes/sidebar.php' ; ?>
                        </section>
                    </div>
                </div>
            </div>
            <?php
        }
        else {
            $art = mysqli_fetch_assoc($article);
            mysqli_query($connection, "UPDATE `articles` SET `view` = `view` + 1 WHERE `id`=".(int)$art['id']);
            ?>
            <div id="content">
                <div class="container">
                    <div class="row">
                        <section class="content__left col-md-8">
                            <div class="block">
                                <a><?php echo $art['view'] ?> просмотров</a>
                                <h3><?php echo $art['title'] ?></h3>
                                <div class="block__content_1">
                                    <img class="block__image_1" src="static/images/<?php echo $art['img']; ?>"  style="max-width:25%; display : block; "  >
                                    <div class="full-text_1">
                                        <?php echo $art['text'] ?>
                                    </div>
                                </div>
                            </div>


                            <div class="block">
                                <a href="#comment-add-form">Добавить свой</a>
                                <h3>Комментарии к статье</h3>
                                <div class="block__content">
                                    <div class="articles articles__vertical"><?php

                                        $comments = mysqli_query($connection, "SELECT * FROM `comments`  WHERE `article_id` =" . (int)$art['id'] . " ORDER BY `id` DESC");
                                        while($comm = mysqli_fetch_assoc($comments)){
                                            ?>
                                            <article class="article">
                                                <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/<?php echo md5($comm['email']); ?>?s=125);"></div>
                                                <div class="article__info">
                                                    <a href="article.php?id=<?php echo $comm['article_id']; ?>"><?php echo $comm['author']; ?></a>
                                                    <div class="article__info__meta">
                                                    </div>
                                                    <div class="article__info__preview"><?php echo $comm['text']; ?> </div>
                                                </div>
                                            </article>
                                            <?php
                                        }
                                        ?></div>
                                </div>
                            </div>

                            <div class="block" id="comment-add-form">
                                <h3>Добавить комментарий</h3>
                                <div class="block__content">
                                    <form class="form" method="POST" action="article.php?id= <?php echo $art['id'];?>" #comment-add-form>
                                        <?php
                                        if( isset($_POST['do_post'])){
                                            $error = array();
                                            if ($_POST['name'] == ''){
                                                $error[] = 'Забыл Имя!';
                                            }
                                            if ($_POST['email'] == ''){
                                                $error[] = 'Забыл почту!';
                                            }
                                            if ($_POST['text'] == ''){
                                                $error[] = 'Забыл, что писал?';
                                            }

                                            if( empty($error)){
                                                mysqli_query($connection,"INSERT INTO `comments` (`author`, `email`, `text`, `article_id`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['text']."','".$art['id']."')");

                                                echo "Комментарий добавлен!";
                                            }else {
                                                echo $error[0];
                                            }
                                        }
                                        ?>
                                        <div class="form__group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form__control" required="" name="name" placeholder="Имя">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form__control" required="" name="email" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form__group">
                                            <textarea name="text" required="" class="form__control" placeholder="Текст комментария ..."></textarea>
                                        </div>
                                        <div class="form__group">
                                            <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>


                        <section class="content__right col-md-4">
                            <?php include 'includes/sidebar.php' ; ?>
                        </section>
                    </div>
                </div>
            </div>




            <?php
        }
    ?>



    <?php
    include "includes/footer.php";
    ?>
</div>

</body>
</html>