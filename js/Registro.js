const formulario = document.getElementById("Registro");


formulario.addEventListener("submit", function(event){
    event.preventDefault();


    var email = document.getElementById("email");
    var user = document.getElementById("username");
    var pass = document.getElementById("password");
    var roltype = document.getElementById("role");
    var image = document.getElementById("avatar");
    var name = document.getElementById("fullname");
    var dateb = document.getElementById("birthdate");
    var sexo = document.getElementById("gender");
    var error = document.getElementById("error");
    var erroru = document.getElementById("erroruser");
    var errorleft = document.getElementById("dataleft");

   
      var dataObject = {
        correo: email.value,
        user: user.value,
        pass: pass.value, 
        rol: roltype.value,
        imagen:image.value, 
        nombre:name.value, 
        fecha:dateb.value, 
        genre:sexo.value
      };

      var jsonData =  JSON.stringify(dataObject);

var usernameRegex = new RegExp("[a-zA-Z0-9]{3,}");
var passwordRegex = new RegExp("(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}");

var okvalidator  = 0;

alert(jsonData);

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
   // agregarDB(email, user, pass,roltype,image,name,dateb,sexo);
   $.ajax({
    method: "POST",
    url: "php/ABCUsuario.php",
    contentType: "application/json", // Indicar que se está enviando JSON
    dataType:"json",
    data: jsonData,
    success:  function(response) {
        // Manejar la respuesta del servidor si es necesario
        alert("Registro correcto");
        console.log(response);
    },
    error: function(error) {
        // Manejar errores si es necesario
        console.error("Error en la solicitud AJAX:", error);
    }
});
 //   alert("Registrado con exito");
}




});




// function agregarDB(correo, usuario, contrasena,rol,imagen,nombre,fecha,sexo){

//   }