let formulario = document.querySelector('#form');
let input= document.querySelector('input[name="file"]');
formulario.addEventListener('submit',sendForm);


function sendForm(e) {
    e.preventDefault();
    const formData=new FormData();

    formData.append('file',input.files[0]);
    formData.append('label',e.target.label.value);
    
    fetch('/upload',{
        method:'POST',
        body:formData
    })
    .then(res=>res.json())
    .then(data=>{
        console.log(data)
        window.location.reload();
    });
    
}