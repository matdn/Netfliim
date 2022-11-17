function passwordVerif(event){
    event.preventDefault()
    var email = document.getElementById("email").value
    var password = document.getElementById("password").value
    if(email == "kasimir-admin" ){
        if( password == "qwerty"){
            console.log("work")
            window.location.assign("code.html");
        }
    }
    else{
        console.log("Not working")
    }
}

