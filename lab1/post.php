<?php
    function findPostInDatabase(int $postId)
    {
        global $connection;
        $sql = "SELECT * FROM posts WHERE id = $postId";
        $result = $connection->query($sql);
        $result = $result->fetch_assoc();
        if ($postId == $result["id"])
        {
            return $result;
        } else {
            echo 'ID is not Found';
            exit();
        }
    }

    try{
        $connection = mysqli_connect('localhost', 'root', '', 'blog');
        if(mysqli_connect_errno())
        {
            echo 'ОШибка подключения к базе данных ('.mysqli_connect_errno().'): '.mysqli_connect_error();
            exit();
        }
        $post = findPostInDatabase($_GET['id']);
    } catch(Exception $e){
        echo $e;
    }
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $post["title"] ?></title>
    <link rel="stylesheet" href="/style/reset.css">
    <link rel="stylesheet" href="/style/fonts.css">
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>
    <header class="rel-header container wrapper">
        <img class="logo" src="/images/logo.svg" alt="logo">
        <nav class="navigation">
            <a class="navigation__item" href="#">Home</a>
            <a class="navigation__item" href="#">Categories</a>
            <a class="navigation__item" href="#">About</a>
            <a class="navigation__item" href="#">Contact</a>
        </nav>
    </header>
    <div class="headline container">
        <h1 class="title"><?= $post["title"] ?>(<?= $_GET['id']?>)</h1>
        <p class="subtitle"><?= $post['subtitle']?></p>
    </div>
    <img class="post-photo" src="http://localhost:8001/static/images/<?= $post['preview_image'] ?>" alt="main_image">
    <p class="text-post container"><?= $post['content'] ?></p>
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
</body>

</html>