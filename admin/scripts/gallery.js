const gallery_s_form = document.getElementById('gallery_s_form');
const gallery_picture_inp = document.getElementById('gallery_picture_inp');

// Handle form submission
gallery_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_image();
});

function add_image() {
    if (!gallery_picture_inp.files.length) {
        alert('error', 'Please select an image to upload.');
        return;
    }

    const data = new FormData();
    data.append('picture', gallery_picture_inp.files[0]);
    data.append('add_image', '');

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/gallery_crud.php", true);

    xhr.onload = function () {
        const myModal = document.getElementById('gallery-s');
        const modal = bootstrap.Modal.getInstance(myModal);
        if (modal) modal.hide();

        switch (this.responseText.trim()) {
            case 'inv_img':
                alert('error', 'Only JPG, PNG, and JPEG images are allowed!');
                break;
            case 'inv_size':
                alert('error', 'Image size should be less than 10MB!');
                break;
            case 'upload_failed':
                alert('error', 'Image upload failed. Try again later!');
                break;
            default:
                alert('success', 'New Gallery Image added!');
                gallery_picture_inp.value = '';
                get_gallery();
                break;
        }
    };

    xhr.send(data);
}

function get_gallery() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/gallery_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('gallery-data').innerHTML = this.responseText;
    };

    xhr.send('get_gallery=1');
}

function rem_image(val) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/gallery_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (this.responseText.trim() == '1') {
            alert('success', 'Gallery image removed');
            get_gallery();
        } else {
            alert('error', 'Failed to remove gallery image!');
        }
    };

    xhr.send('rem_image=' + encodeURIComponent(val));
}

// Load carousel on page load
window.onload = function () {
    get_gallery();
};
