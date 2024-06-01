<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="/style/reset.css">
    <link rel="stylesheet" href="/style/fonts.css">
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>
    <header class="admin-header">
        <div class="admin-header__wrapper new-container">
            <img class="admin-header__wrapper-logo" src="/images/admin-logo-inversed.svg" alt="logo">
            <div class="admin-header__account">
                <img src="/images/Avatar.svg" alt="account">
                <img class="log_out" src="/images/log-out.svg" alt="log_out">
            </div>
        </div>
    </header>
    <div class="admin-content">
        <form class="admin-form new-container">
            <div class="admin-form__header">
                <div class="admin-form__header-headline">
                    <h1 class="auth__title">New Post</h1>
                    <p class="admin-form__subtitle">Fill out the form bellow and publish your article</p>
                </div>
                <button class="action-button" type="submit">Publish</button>
            </div>
            <img class="admin-form__submit-check" src="/images/correct.svg" style="display: none;" id="correct_form" />
            <img class="admin-form__submit-check" src="/images/wrong.svg" style="display: none;" id="wrong_form" />
            <div class="admin-form__creation">
                <div class="admin-form__insert">
                    <h2 class="admin-form__title">Main Information</h2>
                    <div class="admin-form__input">
                        <div class="admin-form__input-data">
                            <div class="admin__input">
                                <label class="input-label" for="title">Title</label>
                                <input class="input-data required" type="text" id="title" name="title" maxlength="50">
                                <label class="input-error" for="title" style="display:none">Title is required</label>
                            </div>
                            <div class="admin__input">
                                <label class="input-label" for="subtitle">Short description</label>
                                <input class="input-data required" type="text" id="subtitle" name="subtitle" maxlength="50">
                                <label class="input-error" for="subtitle" style="display:none">Subitle is required</label>
                            </div>
                            <div class="admin__input">
                                <label class="input-label" for="author">Author name</label>
                                <input class="input-data required" type="text" name="author" id="author" maxlength="50">
                                <label class="input-error" for="author" style="display:none">Author name is required</label>
                            </div>
                            <div class="admin__input">
                                <label class="input-label">Author photo</label>
                                <input type='file' id="author_image" name="author_image" style="display:none">
                                <div class="admin__input-author">
                                    <img class="admin__avatar input-avatar" src="/images/avatar_photo_field.svg" alt="avatar" id="uploadAuthor">
                                    <p class="actions" id="upload">Upload</p>
                                    <div class="edit-photos" id="edit-author-photo">
                                        <div class="edit-photos__changes" id="avatar_upload">
                                            <img src="/images/camera.svg">
                                            <p class="actions">Upload New</p>
                                        </div>
                                        <div class="edit-photos__changes attention-color" id="avatar_remove">
                                            <img src="/images/basket.svg">
                                            <p class="actions">Remove</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="admin__input">
                                <label class="input-label" for="post_data">Publish Date</label>
                                <input class="input-data required" type="date" name="post_data" id="post_data"></p>
                                <label class="input-error" for="post_data" style="display:none">Publish Date is required</label>
                            </div>
                            <div class="admin__input">
                                <label class="input-label" for="featured">Featured or Recent? (1 or 0)</label>
                                <input class="input-data required" type="text" id="featured" name="featured" maxlength="50">
                            </div>
                            <div class="admin__input">
                                <label class="input-label">Hero Image</label>
                                <input type="file" name="image_url" id="image_url" style="display:none" accept="image/png, image/gif, image/jpeg"></p>
                                <div class="admin__input-post">
                                    <img src="/images/large_photo_field.svg" id="uploadLarge" class="input-post">
                                    <p class="actions" id="uploadPost"></p>
                                    <div class="edit-photos" id="edit-post-photo">
                                        <div class="edit-photos__changes" id="post_upload">
                                            <img src="/images/camera.svg">
                                            <p class="actions">Upload New</p>
                                        </div>
                                        <div class="edit-photos__changes attention-color" id="post_remove">
                                            <img src="/images/basket.svg">
                                            <p class="actions">Remove</p>
                                        </div>
                                    </div>
                                </div>
                                <label class="input-label__images" id="hero_post">Size up to 10mb. Format: png, jpeg, gif.</label>
                            </div>
                            <div class="admin__input">
                                <label class="input-label">Hero Image</label>
                                <input type="file" name="preview_image" id="preview_image" style="display:none" accept="image/png, image/gif, image/jpeg"></p>
                                <div class="admin__input-card">
                                    <img class="photo-field input-card" src="/images/photo_field.svg" id="uploadLittle">
                                    <p class="actions" id="uploadCard"></p>
                                    <div class="edit-photos" id="edit-card-photo">
                                        <div class="edit-photos__changes" id="card_upload">
                                            <img src="/images/camera.svg">
                                            <p class="actions">Upload New</p>
                                        </div>
                                        <div class="edit-photos__changes attention-color" id="card_remove">
                                            <img src="/images/basket.svg">
                                            <p class="actions">Remove</p>
                                        </div>
                                    </div>
                                </div>
                                <label class="input-label__images" id="hero_card">Size up to 5mb. Format: png, jpeg, gif.</label>
                            </div>
                        </div>
                        <div class="admin-form__input-preview">
                            <div class="post-preview">
                                <label class="post-preview__title" for="article_preview">Article Preview</label>
                                <div class="article-preview">
                                    <div class="preview-items">
                                        <div class="preview-header">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <h1 class="preview-title">New Post</h1>
                                        <p class="preview-subtitle">Please, enter any description</p>
                                        <div class="preview-photo">
                                            <img src="" id="post_preview" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-preview">
                                <label class="post-preview__title" for="card_preview">Post card preview</label>
                                <div class="card-preview content__recent">
                                    <div class="card">
                                        <div class="card-preview__photo">
                                            <img src="" class="card__photo" id="card_preview" style="display: none;">
                                        </div>
                                        <div class="card__info">
                                            <div class="card__info__headline">
                                                <h1 class="title">New Post</h1>
                                                <p class="subtitle">Please, enter any description</p>
                                            </div>
                                            <div class="card__info__author wrapper">
                                                <div class="card__info__author__data wrapper">
                                                    <div class="card-preview__author-photo">
                                                        <img class="card__info__author__data_photo" id="card_avatar">
                                                    </div>
                                                    <p class="card-preview__author-name">Enter author name</p>
                                                </div>
                                                <span class="card-preview__post-data">4/19/2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="admin-form__content">
                    <h2 class="admin-form__title">Content</h2>
                    <div class="admin-form__content-insert">
                        <label class="input-label" for="content">Post content (plain text)</label>
                        <textarea class="text-field__content" id="content" placeholder="Type anything you want ..." rows="6" cols="10"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="/script/admin.js"></script>
</body>

</html>