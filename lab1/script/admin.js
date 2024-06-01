const filledField = document.querySelectorAll("input");
const postTitle = document.querySelector("#title");
const postSubtitle = document.querySelector("#subtitle");
const postAuthor = document.querySelector("#author");
const postDate = document.querySelector("#post_data");

const selectAuthor = document.querySelector(".input-avatar");
const selectPostPic = document.querySelector(".input-post");
const selectCardPic = document.querySelector(".input-card");
const inputAuthImage = document.querySelector("#author_image");
const inputPostImage = document.querySelector("#image_url");
const inputCardImage = document.querySelector("#preview_image");
const uploadPhoto = document.querySelector("#upload");
const changePhoto = document.querySelector("#edit-author-photo");
const uploadPostPhoto = document.querySelector("#uploadPost");
const changePostPhoto = document.querySelector("#edit-post-photo");
const editItemsPost = document.querySelector("#hero_post");
const uploadCardPhoto = document.querySelector("#uploadCard");
const changeCardPhoto = document.querySelector("#edit-card-photo");
const editItemsCard = document.querySelector("#hero_card");

const avatarRemove = document.querySelector('#avatar_remove');
const avatarUpload = document.querySelector('#avatar_upload');
const postPicRemove = document.querySelector('#post_remove');
const postPicUpload = document.querySelector('#post_upload');
const cardPicRemove = document.querySelector('#card_remove');
const cardPicUpload = document.querySelector('#card_upload');

const postTitleOut = document.querySelector(".preview-title");
const postcardTitleOut = document.querySelector(".title");
const postSubtitleOut = document.querySelector(".preview-subtitle");
const postcardSubtitleOut = document.querySelector(".subtitle");
const postcardAuthorOut = document.querySelector(".card-preview__author-name");
const postcardData = document.querySelector(".card-preview__post-data")

const hamburgerMenu = document.querySelector("#hamb_menu");
const navigationMenu = document.querySelector(".navigation");
let isClicked = true;

hamburgerMenu.addEventListener("click", (
    () => {
        if (isClicked) {
            navigationMenu.style.display = "flex";
            isClicked = false;
        } else {
            navigationMenu.style.display = "none";
            isClicked = true;
        }
    }));


filledField.forEach(function (el) {
    el.addEventListener("input", function () {
        if (el.value !== "") {
            el.classList.add("filled")
        } else {
            el.classList.remove("filled")
        }
    })
});

function inputData(input, output, defaultText) {
    input.addEventListener("input", function () {
        output.forEach(function (el) {
            if (input.value === "") {
                el.textContent = defaultText;
            } else {
                el.textContent = input.value;
            }
        })
    })
}

postDate.addEventListener("input", (
    () => {
        postcardData.textContent = new Date(postDate.value).toLocaleDateString("en");
    }
));

function selectFile(field, pic) {
    field.addEventListener("click", (
        () => {
            pic.click();
        }
    ))
}

let imageA = '';
let imageB = '';
let imageC = '';

inputAuthImage.addEventListener('change', function () {
    card_avatar.src = window.URL.createObjectURL(inputAuthImage.files[0]);
    uploadAuthor.src = window.URL.createObjectURL(inputAuthImage.files[0]);
    uploadPhoto.style.display = "none";
    changePhoto.style.display = "flex";
    if (this.files && this.files[0]) {
        let reader = new FileReader();
        reader.onload = function (event) {
            imageA = event.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    } else {
        isValid = false;
    }
})

inputPostImage.addEventListener('change', function () {
    post_preview.src = window.URL.createObjectURL(inputPostImage.files[0]);
    uploadLarge.src = window.URL.createObjectURL(inputPostImage.files[0]);
    post_preview.style.display = "flex";
    uploadPostPhoto.style.display = "none";
    editItemsPost.style.display = "none";
    changePostPhoto.style.display = "flex";
    if (this.files && this.files[0]) {
        let reader = new FileReader();
        reader.onload = function (event) {
            imageB = event.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    } else {
        isValid = false;
    }
})

inputCardImage.addEventListener('change', function () {
    card_preview.src = window.URL.createObjectURL(inputCardImage.files[0]);
    uploadLittle.src = window.URL.createObjectURL(inputCardImage.files[0]);
    card_preview.style.display = "flex";
    uploadCardPhoto.style.display = "none";
    editItemsCard.style.display = "none";
    changeCardPhoto.style.display = "flex";
    if (this.files && this.files[0]) {
        let reader = new FileReader();
        reader.onload = function (event) {
            imageC = event.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    } else {
        isValid = false;
    }
})

avatarRemove.addEventListener("click", (
    () => {
        const file = document.querySelector('#uploadAuthor');
        file.src = '/images/avatar_photo_field.svg';
        uploadPhoto.style.display = "flex";
        changePhoto.style.display = "none";
        card_avatar.setAttribute('src', '');
    }
))

postPicRemove.addEventListener("click", (
    () => {
        const file = document.querySelector('#uploadLarge');
        file.src = '/images/large_photo_field.svg';
        post_preview.setAttribute('src', '');
        post_preview.style.display = "none";
        editItemsPost.style.display = "flex";
        changePostPhoto.style.display = "none";
    }
))

cardPicRemove.addEventListener("click", (
    () => {
        const file = document.querySelector('#uploadLittle');
        file.src = '/images/photo_field.svg';
        card_preview.setAttribute('src', "");
        card_preview.style.display = "none";
        editItemsCard.style.display = "flex";
        changeCardPhoto.style.display = "none";
    }
))

inputData(postTitle, [postTitleOut, postcardTitleOut], "New post");
inputData(postSubtitle, [postSubtitleOut, postcardSubtitleOut], "Please, enter any description");
inputData(postAuthor, [postcardAuthorOut], "Enter author name");
selectFile(selectAuthor, inputAuthImage);
selectFile(avatarUpload, inputAuthImage);
selectFile(selectPostPic, inputPostImage);
selectFile(postPicUpload, inputPostImage);
selectFile(selectCardPic, inputCardImage);
selectFile(cardPicUpload, inputCardImage);

const form = document.querySelector('.admin-form');

form.addEventListener('submit', function (event) {
    event.preventDefault();
    let isValid = true;
    let textAreaInput = document.getElementById('content').value;
    form.querySelectorAll('input:not([type="file"])').forEach(input => {
        if (input.value.trim() === '') {
            input.classList.add('invalid-input');
            isValid = false;
        }
    });

    if (textAreaInput == "") {
        document.getElementById('content').style.border = '1px solid #E86961';
        isValid = false;
    } else {
        document.getElementById('content').style.border = '1px solid #eaeaea';
    }

    if (!isValid) {
        console.log('Please fill in all required fields.');
        document.getElementById('wrong_form').style.display = 'flex';
        return;
    }

    const formData = new FormData(form);
    const data = {};

    formData.forEach((value, key) => {
        data[key] = value;
    });

    data['post_data'] = Date.parse(data['post_data']) / 1000;
    data["author_image"] = imageA;
    data["image_url"] = imageB;
    data["preview_image"] = imageC;
    data["content"] = textAreaInput;
    const jsonData = JSON.stringify(data);
    console.log(jsonData);
    document.getElementById('wrong_form').style.display = 'none';
    document.getElementById('correct_form').style.display = 'flex';
    document.getElementById('content').style.border = '1px solid #eaeaea';
    form.querySelectorAll('input:not([type="file"])').forEach(input => {
        input.classList.remove('invalid-input');
    });

    fetch('http://localhost:8001/api.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json;charset=UTF-8' },
        body: jsonData
    })
        .then(response => response.json())
        .then(json => console.log(json))
        .catch(error => console.error('Произошла ошибка:', error));
});

// .... log_in ....//

