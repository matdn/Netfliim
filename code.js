function codeVerif(event){
    event.preventDefault()
    var code = document.getElementById("code").value
    console.log(code)
    if(code == "H3||0_STRANG&R" ){
        console.log("hellostranger")
        window.location.assign("files.html");
    }else{
        location.reload()
    }
   
}