
let containerForm=document.querySelector('.formulario');
let addPhotoButton=document.querySelector('.addPhotoButton');
let filtro=document.querySelector('.filtro');

addPhotoButton.addEventListener('click',mostrarOcultarForm);


function mostrarOcultarForm() {
    containerForm.classList.toggle('active');
    if (containerForm.classList.contains('active')) {
        filtro.style.display="block";
    }
    
}
filtro.addEventListener('click',()=>{
    filtro.style.display="none";
    containerForm.classList.toggle('active');
});