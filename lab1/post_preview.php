<div class="card">
<a class="card-featured__link" title='<?= $post['title'] ?>' href='/post?id=<?= $post['id'] ?>'></a>
    <img src="http://localhost:8001/static/images/<?= $post['preview_image'] ?>" class="card__photo" alt="FromTopDown">
    <div class="card__info">
        <div class="card__info__headline">
            <h1 class="title"><?= $post['title'] ?></h1>
            <p class="subtitle"><?= $post['subtitle'] ?></p>
        </div>
        <div class="card__info__author wrapper">
            <div class="card__info__author__data wrapper">
                <img class="card__info__author__data_photo" src="http://localhost:8001/images/<?= $post['author_image'] ?>" alt="publisher_photo">
                <p><?= $post['author'] ?></p>
            </div>
            <span><?= date("F d, Y", intval($post['post_data'])) ?></span>
        </div>
    </div>
</div>