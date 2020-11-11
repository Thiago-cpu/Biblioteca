let mostraralert = function(){
    $('.alert').addClass("show");
    $('.alert').removeClass("hide");
    $('.alert').addClass("showAlert");
    setTimeout(function(){
        $('.alert').removeClass("show");
        $('.alert').addClass("hide");
        setTimeout(()=>{
            document.getElementById('alert').style.display = "none"
        },1000)
    },5000);
}


