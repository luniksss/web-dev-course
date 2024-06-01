<?php

function get_posts()
{
    global $connection;
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($connection, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $posts;
}

try {
    $connection = mysqli_connect('localhost', 'root', '', 'blog');
    if (mysqli_connect_errno()) {
        echo 'ОШибка подключения к базе данных (' . mysqli_connect_errno() . '): ' . mysqli_connect_error();
        exit();
    }
    $posts = get_posts();
} catch (Exception $e) {
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="/style/reset.css">
    <link rel="stylesheet" href="/style/fonts.css">
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>
    <header class="header">
        <div class="container wrapper">
            <img class="logo" src="/images/logo_below.svg" alt="logo">
            <div class="menu">
                <div hamburger>
                    <button id="hamb_menu"></button>
                </div>
                <nav class="navigation above">
                    <a class="navigation__item" href="#">Home</a>
                    <a class="navigation__item" href="#">Categories</a>
                    <a class="navigation__item" href="#">About</a>
                    <a class="navigation__item" href="#">Contact</a>
                </nav>
            </div>
        </div>
    </header>
    <div class="start">
        <div class="start__wrapper container">
            <h1 class="title">Let's do it together.</h1>
            <p class="subtitle">We travel the world in search of stories. Come along for the ride.</p>
            <a class="start__button" href="#">View Latest Posts</a>
        </div>
    </div>
    <div class="tags-menu container">
        <a href="#" class="tags-menu__link">Nature</a>
        <a href="#" class="tags-menu__link">Photography</a>
        <a href="#" class="tags-menu__link">Relaxation</a>
        <a href="#" class="tags-menu__link">Vacation</a>
        <a href="#" class="tags-menu__link">Travel</a>
        <a href="#" class="tags-menu__link">Adventure</a>
    </div>
    <div class="content">
        <div class="content__wrapper">
            <h1 class="border-title">Featured Posts</h1>
            <div class="content__featured wrapper">
                <?php
                foreach ($posts as $post) {
                    if ($post['featured'] == 1) {
                        include 'post_preview.php';
                    }
                }
                ?>
            </div>
        </div>
        <div class="content__wrapper container">
            <h1 class="border-title">Most Recent</h1>
            <div class="content__recent">
                <?php
                foreach ($posts as $recent_post) {
                    if ($recent_post['featured'] == 0) {
                        include 'recent_posts.php';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="mailing">
        <h1 class="border-title">Stay in Touch</h1>
        <form class="mailing-form container">
            <input type="email" id="email" class="mailing-form__email" placeholder="Enter your email address">
            <button type="submit" class="mailing-form__button">Submit</button>
        </form>
    </div>
    <footer class="footer">
        <div class="container wrapper">
            <img class="logo" src="/images/logo_below.svg" alt="logo">
            <nav class="navigation">
                <a class="navigation__item" href="#">Home</a>
                <a class="navigation__item" href="#">Categories</a>
                <a class="navigation__item" href="#">About</a>
                <a class="navigation__item" href="#">Contact</a>
            </nav>
        </div>
    </footer>
    <script src="/script/admin.js"></script>
</body>

</html>