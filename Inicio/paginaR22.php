<?php
include("conexion.php");

if (isset($_POST['Enviar'])) {
    
    if (
        strlen($_POST['name']) >= 1 &&
        isset($_POST['genero']) &&
        strlen($_POST['gmail']) >= 1 &&
        strlen($_POST['apellido']) >= 1 &&
        strlen($_POST['phone']) >= 1 &&
        strlen($_POST['id']) >= 1 &&
        strlen($_POST['departamento']) >= 1 &&
        strlen($_POST['eps']) >= 1 &&
        strlen($_POST['mensaje']) >= 1
    ) {
        $name = trim($_POST['name']);
        $genero = $_POST['genero'];
        $email = trim($_POST['gmail']);
        $apellido = trim($_POST['apellido']);
        $phone = trim($_POST['phone']);
        $id = trim($_POST['id']);
        $departamento = trim($_POST['departamento']);
        $eps = trim($_POST['eps']);
        $mensaje = trim($_POST['mensaje']);
        $fecha = date("d/m/y");

        $consulta = "INSERT INTO chequeo_gratuito(nombre,genero,gmail,apellido,telefono,identificacion,departamento,eps,mensaje,fecha)
                VALUES('$name','$genero','$gmail','$apellido','$phone','$id','$departamento','$eps','$mensaje','$fecha')";

        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            // Muestra SweetAlert si el registro es exitoso
            echo '<script>
                    Swal.fire({
                      icon: "success",
                      title: "¡Agendamiento de cita exitoso!",
                      text: "¡Felicidades ' . $name . '! Nuestras secretarias se estarán comunicando con usted para organizar las fechas.",
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = "pagina2.php";
                      }
                    });
                  </script>';
            exit();
        } else {
            // Muestra SweetAlert si ocurre un error
            echo '<script>
                    Swal.fire({
                      icon: "error",
                      title: "Error...",
                      text: "Ocurrió un error al registrar.",
                    });
                  </script>';
        }
    } else {
        // Muestra SweetAlert si hay campos vacíos
        echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Error...",
                  text: "Hay campos vacíos.",
                });
              </script>';
    }
}
?>
