const formulario = document.getElementById("Registro");


formulario.addEventListener("submit", function(event){
    event.preventDefault();


    var email = document.getElementById("email");
    var user = document.getElementById("username");
    var pass = document.getElementById("password");
    var roltype = document.getElementById("role");
    var privateed = document.getElementById("private");
    var image =  document.getElementById("avatar");
    var name = document.getElementById("fullname");
    var dateb = document.getElementById("birthdate");
    var sexo = document.getElementById("gender");
    var error = document.getElementById("error");
    var erroru = document.getElementById("erroruser");
    var errorleft = document.getElementById("dataleft");

      
    
    var reader = new FileReader();


    reader.onloadend = function(){

        var base64String = reader.result.replace("data:", "").replace(/^.+,/, "");
        
        var dataObject = {
            correo: email.value,
            user: user.value,
            pass: pass.value, 
            rol: roltype.value,
            private: privateed.value,
            imagen: base64String, 
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
        
            $.ajax({
                method: "POST",
                url: "php/ABCUsuario.php",
                contentType: "application/json", 
                dataType:"json",
                data: jsonData,
                success:  function(response) {
                
                    alert("Registro correcto");
                    console.log(response);
                },
                error: function(error) {
                    alert(error);
                    console.error("Error en la solicitud AJAX:", error);
                }
            });

        }
    
       
    }

    reader.readAsDataURL(image.files[0]);



});




// function agregarDB(correo, usuario, contrasena,rol,imagen,nombre,fecha,sexo){

//   }