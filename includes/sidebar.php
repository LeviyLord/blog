

<div class="block">
                        <h3>Мы_знаем</h3>
                        <div class="block__content">
                            <script type="text/javascript" src="//ra.revolvermaps.com/0/0/6.js?i=02op3nb0crr&amp;m=7&amp;s=320&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80" async="async"></script>
                        </div>
                    </div>

                    <div class="block">
                        <h3>Топ читаемых статей</h3>
                        <div class="block__content">
                            <div class="articles articles__vertical">
                                <?php
                                $articles = mysqli_query($connection, "SELECT * FROM `articles`  ORDER BY `view` DESC LIMIT 5");
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
                        <h3>Комментарии</h3>
                        <div class="block__content">
                            <div class="articles articles__vertical"><?php
                                $comments = mysqli_query($connection, "SELECT * FROM `comments`  ORDER BY `id` DESC LIMIT 5");
                                while($com = mysqli_fetch_assoc($comments)){
                                    ?>
                                    <article class="article">
                                        <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/<?php echo md5($com['email']); ?>?s=125);"></div>
                                        <div class="article__info">
                                            <a href="article.php?id=<?php echo $com['article_id']; ?>"><?php echo $com['author']; ?></a>
                                            <div class="article__info__meta">
                                            </div>
                                            <div class="article__info__preview"><?php echo mb_substr(strip_tags($com['text']), 0,50, 'utf-8'); ?> ...</div>
                                        </div>
                                    </article>
                                    <?php
                                }
                                ?></div>
                        </div>
                    </div>
