const formulario = document.getElementById("login");

formulario.addEventListener("submit", function(event){
event.preventDefault();


const email = document.getElementById("email");
const pass = document.getElementById("password");
const alertt = document.getElementById("aviso");


if(email.value == null && pass.value == null){
 alertt.textContent = "Rellene todos los campos"
}
else{
    alertt.textContent = "";
}


})