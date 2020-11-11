var mostrarimg = function(e, inp){

    let reader = new FileReader()
    
    reader.readAsDataURL(e.target.files[0])

    reader.onload = function(){
        let vista = document.getElementById(inp);

        vista.src = reader.result;
        
        vista.innerHTML = "";

    }
}

