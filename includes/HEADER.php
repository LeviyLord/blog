

<header id="header">
    <div class="header__top">
        <div class="container">
            <div class="header__top__logo">
                <h1><?php echo $config['titel'];?></h1>
            </div>
            <nav class="header__top__menu">
                <ul>
                    <li><a href="/BLOG/">Главная</a></li>
                    <li><a href="pages/about.php">Обо мне</a></li>
                    <li><a href="<?php echo $config['vk_url']; ?>">Я Вконтакте</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <?php
        $categories = mysqli_query($connection, "SELECT * FROM `categories`");
        $category = array();
         while( $cat = mysqli_fetch_assoc($categories) ){
             $category[] = $cat;
         }
        ?>
    <div class="header__bottom">
        <div class="container">
            <nav>
                <ul>
                    <?php
                        foreach ($category as $cat){
                    ?>
                    <li><a href="categorie.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['title_a']; ?></a></li>
                    <?php
                        }
                    ?>

                </ul>
            </nav>
        </div>
    </div>
</header>