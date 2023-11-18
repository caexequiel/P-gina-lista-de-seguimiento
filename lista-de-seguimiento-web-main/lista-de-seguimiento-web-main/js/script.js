//--------Inicio de sesión-----------//
$(document).ready(function() {
    $("#login-form").submit(function(event) {
        event.preventDefault();
        let username = $("#username").val();
        let password = $("#password").val();

        //let username = document.getElementById(username);

        //alert("usuario: "+username+" Contraseña: "+password);
        
        $.ajax({
            type: "POST",
            url: "login.php",
            data: { 
                username: username,
                password: password 
            },
            success: function(response) {
                if (response === "correcto") {
                    //alert('la respuesta fue correcta');
                    $("#message").html("Inicio de sesión exitoso.");
                    window.location.href = "index.html";
                    
                } else {
                    $("#message").html("Usuario o contraseña incorrectos.");
                }
            }
        });


    });
});

//--------Registro-----------//
function validarFormulario() {

    var nombre = document.getElementById("nombre").value;
    var email = document.getElementById("email").value;
    var mensaje = document.getElementById("mensaje").value;

    if (mensaje.trim() === "") {
      alert("Por favor, ingrese un mensaje.");
      return false;
    }

    if (nombre.trim() === "") {
      alert("Por favor, ingrese su nombre.");
      return false;
    }

    if (email.trim() === "") {
      alert("Por favor, ingrese su dirección de correo electrónico.");
      return false;
    } 

    return true; // El formulario se enviará si todos los campos están completos.
  }