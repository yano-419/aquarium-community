import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {

    const imageInput = document.getElementById('image');
    const preview = document.getElementById('image-preview');
    const placeholder = document.getElementById('upload-placeholder');
    const removeButton = document.getElementById('remove-image');

    if (imageInput && preview && placeholder) {

        imageInput.addEventListener('change', () => {

            if (imageInput.files.length) {

                const file = imageInput.files[0];

                preview.src = URL.createObjectURL(file);

                preview.classList.remove('hidden');

                placeholder.classList.add('hidden');

                removeButton.classList.remove('hidden');

            } else {

                preview.classList.add('hidden');

                placeholder.classList.remove('hidden');

            }

        });

    }
    if (removeButton) {

     removeButton.addEventListener('click', (e) => {

        e.preventDefault();

        imageInput.value = '';

        preview.removeAttribute('src');

        preview.classList.add('hidden');

        placeholder.classList.remove('hidden');

        removeButton.classList.add('hidden');

      });

    }

});