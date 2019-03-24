<?php
    require "includes/config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['titel'];?></title>

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

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a href="categorie.php">Все записи</a>
              <h3>Новейшее_в_блоге</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">
                    <?php
                    $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 6");
                    while($art = mysqli_fetch_assoc($articles)){
                        ?>
                        <article class="article">
                            <div class="article__image" style="background-image: url(static/images/<?php echo $art['img']; ?>);"></div>
                            <div class="article__info">
                                <a href="article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                                <div class="article__info__meta">
                                    <?php
                                    $art_cat = false;
                                    foreach( $category as $cat){
                                        if ($cat['id'] == $art['category_id']){
                                        $art_cat = $cat;
                                        break;}
                                    }
                                    ?>
                                    <small>Категория: <a href="categorie.php?id=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title_a']; ?></a></small>
                                </div>
                                <div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0,50, 'utf-8'); ?> ...</div>
                            </div>
                        </article>
                        <?php
                    }
                    ?>
                  </div>
              </div>
            </div>

            <div class="block">

              <!--<a href="categorie.php?id=<?php //echo $art['id']; ?>">Все записи</a>
              <h3><?php //if($art['category_id'] == $art_cat['id']){ echo $art_cat['title_a']; } ?></h3>-->

                <a href="categorie.php?id=4">Все записи</a>
                <h3>Морковки</h3>

              <div class="block__content">
                <div class="articles articles__horizontal">
                        <?php
                        $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `category_id` = 4 ORDER BY `id` DESC LIMIT 6");
                        while($art = mysqli_fetch_assoc($articles)){
                        ?>
                        <article class="article">
                            <div class="article__image" style="background-image: url(static/images/<?php echo $art['img']; ?>);"></div>
                            <div class="article__info">
                                <a href="article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                                <div class="article__info__meta">
                                    <?php
                                    $art_cat = false;
                                    foreach( $category as $cat){
                                        if ($cat['id'] == $art['category_id']){
                                            $art_cat = $cat;
                                            break;}
                                    }
                                    ?>
                                    <small>Категория: <a href="categorie.php?id=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title_a']; ?></a></small>
                                </div>
                                <div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0,50, 'utf-8'); ?> ...</div>
                            </div>
                        </article>
                        <?php
                    }
                    ?>
                </div>
              </div>
            </div>

            <div class="block">
              <a href="categorie.php?id=2">Все записи</a>
              <h3>Жиза</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">
                    <?php
                    $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `category_id` = 2 ORDER BY `id` DESC LIMIT 6");
                    while($art = mysqli_fetch_assoc($articles)){
                        ?>
                        <article class="article">
                            <div class="article__image" style="background-image: url(static/images/<?php echo $art['img']; ?>);"></div>
                            <div class="article__info">
                                <a href="article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                                <div class="article__info__meta">
                                    <?php
                                    $art_cat = false;
                                    foreach( $category as $cat){
                                        if ($cat['id'] == $art['category_id']){
                                            $art_cat = $cat;
                                            break;}
                                    }
                                    ?>
                                    <small>Категория: <a href="categorie.php?id=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title_a']; ?></a></small>
                                </div>
                                <div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0,50, 'utf-8'); ?> ...</div>
                            </div>
                        </article>
                        <?php
                    }
                    ?>
                </div>
              </div>
            </div>
          </section>
          <section class="content__right col-md-4"><?php include 'includes/sidebar.php' ; ?></section>
        </div>
      </div>
    </div>

      <?php
       include "includes/footer.php";
      ?>

  </div>


</body>
</html>