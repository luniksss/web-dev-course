<a class="card-recent__link" title='<?= $recent_post['title'] ?>' href='/post.php?id=<?= $recent_post['id'] ?>'>
    <div class="card">
        <img src="http://localhost:8001/static/images/<?= $recent_post['preview_image'] ?>" alt="post_photo" class="card__photo_recent">
        <div class="card__info">
            <div class="card__info__headline">
                <h1 class="title"><?= $recent_post['title'] ?></h1>
                <p class="subtitle"><?= $recent_post['subtitle'] ?></p>
            </div>
            <div class="card__info__author wrapper">
                <div class="card__info__author__data wrapper">
                    <img class="card__info__author__data_photo" src="http://localhost:8001/static/images/<?= $recent_post['author_image'] ?>" alt="publisher_photo">
                    <p><?= $recent_post['author'] ?></p>
                </div>
                <span><?= date("m/d/Y", intval($recent_post['post_data'])) ?></span>
            </div>
        </div>
    </div>
</a>