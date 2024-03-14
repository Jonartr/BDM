const formulario = document.getElementById("Registro");


formulario.addEventListener("submit", function(event){
    event.preventDefault();


const email = document.getElementById("email");
const user = document.getElementById("username");
const pass = document.getElementById("password");
const roltype = document.getElementById("role");
const image = document.getElementById("avatar");
const name = document.getElementById("fullname");
const dateb = document.getElementById("birthdate");
const sexo = document.getElementById("gender");
const error = document.getElementById("error");
const erroru = document.getElementById("erroruser");
const errorleft = document.getElementById("dataleft");

var usernameRegex = new RegExp("[a-zA-Z0-9]{3,}");
var passwordRegex = new RegExp("(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}");

var okvalidator  = 0;

if(email.value != null && image.value != null && name.value != null && dateb.value != null ){
    okvalidator++;
}
else{
errorleft.textContent = "Rellene todos los campos";
}

if(usernameRegex.test(user.value) &&user.value != null){
   okvalidator++; 
}
else{
  erroru.textContent = "El usuario debe tener minimo 3 caracteres";
  user.style.border = "1px solid red" ;
}

if (passwordRegex.test(pass.value) && pass.value !=null){
    okvalidator++;
}
else{
    error.textContent = "La contraseña debe tener un mínimo de 8 caracteres,"
    + "una mayúscula, una minúscula, un número y un carácter especial"
    pass.style.border = "1px solid red" ;
}


if (okvalidator ==3){
    agregarDB(email, user, pass,roltype,image,name,dateb,sexo);
    alert("Registrado con exito");
}




});


async function agregarDB(correo, usuario, contrasena,rol,imagen,nombre,fecha,sexo){
    fetch('php/ABCUsuario.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ correo: correo ,user: usuario,pass: contrasena, 
      rol: rol, imagen:imagen, nombre:nombre, fecha:fecha, genre:sexo }),
    })
    .then(response => response.json())
    .then(data => {
      console.log(data);
    })
  }