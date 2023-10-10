const form = document.querySelector('form');
const fileInput = document.querySelector('input[name="file"]');
const card_upload =document.querySelector('.card_upload');
const card_saving = document.querySelector('.card_saving');



async function Send(e) {
    e.preventDefault();

    
    card_upload.style.display='none';
    card_saving.style.display='flex';

    let Data=new FormData();

    for (const file of fileInput.files) {
        Data.append('files[]', file);
    }
    

        await fetch('/upload',{
            method: 'POST',
            body: Data
        }).then((res) => res.json())
        .then(data=>{
            
            card_saving.style.display='none';
            
            window.location.href=data['mensaje'];
        }).catch((error =>{
            card_saving.style.display='none';
            card_upload.style.display='flex';
        }))

    
}

form.addEventListener('submit',Send);





