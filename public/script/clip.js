const card_clip_input = document.querySelector('.card_clip input');
const copy_button = document.querySelector('.button_copy');
var URLactual = window.location;
card_clip_input.value=URLactual.href;

copy_button.addEventListener('click',()=>{
    navigator.clipboard.writeText(URLactual);
});

const min_image = document.querySelector('#min_image');

min_image.addEventListener('click', () => {
    max_image.classList.toggle('expandida');
});




