const formulario = document.getElementById("categoria");

formulario.addEventListener("submit", function(event){

    var Nombre = document.getElementById("name");
    var Descripcion = document.getElementById("description");


    var jsonObject = {
       Name: Nombre.value,
       Desc: Descripcion.value

    };

    var jsonData =  JSON.stringify(jsonObject);

    $.ajax({
        method: "POST",
        url: "php/ABCategoria.php",
        contentType: "application/json", 
        dataType:"json",
        data: jsonData,
        success:  function(response) {
        
            alert("Categoria creada");
            console.log(response);
        },
        error: function(error) {
           
            console.error("Error en la solicitud AJAX:", error);
        }
    });
});