const zone = document.querySelector('#drop_zone');

zone.addEventListener('dragenter',(e)=>{
    e.preventDefault();
    e.target.style.opacity='50%';
},false);

zone.addEventListener('dragleave',(e)=>{
    e.preventDefault();
    e.target.style.opacity='0%';
},false);

zone.addEventListener('dragover',(e)=>{
    e.preventDefault();
},false);

zone.addEventListener('drop',(ev)=>{

    ev.preventDefault();
    ev.target.style.opacity='0%';
  if (ev.dataTransfer.items) {

    // Se crea un file list vacio para pasarselo al input
    const fileList = new DataTransfer();

    // Se vacia si tiene algun archivo
    fileInput.files= null;

    // Recorre todos los archivos que se han dropeado
    [...ev.dataTransfer.items].forEach((item) => {
      
      if (item.kind === "file") {
        // Recoge el item como un archivo
        const file = item.getAsFile();
        // Los añade a la lista antes creada
        fileList.items.add(file);
      }
    });

    // Se sustituye el valor del input con los archvios dropeados
    fileInput.files = fileList.files;

  } else {

    [...ev.dataTransfer.files].forEach((file, i) => {
      console.log(`… caca[${i}].name = ${file.name}`);
    });

  }
},false);

