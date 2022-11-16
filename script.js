function passwordVerif(event){
    event.preventDefault()
    var email = document.getElementById("email").value
    var password = document.getElementById("password").value
    console.log("step1")
    if(email == "hello@gmail.com" ){
        console.log("step2")
        if( password == "stranger"){
        window.location.assign("code.html");
        }
    }
    else{
        console.log("Not working")
    }
}