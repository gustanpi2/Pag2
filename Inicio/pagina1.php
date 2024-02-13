<?php
session_start();

// Verifica si el usuario ha iniciado sesión //
if (!isset($_SESSION['nombre'])) {
    header("Location: sesion.php");
    exit();
}

// Obtén la información del usuario desde la sesión //
$nombre = $_SESSION['nombre'];
$email = $_SESSION['email'];
$direccion = $_SESSION['direccion'];
$telefono = $_SESSION['telefono'];
$fecha = $_SESSION['fecha'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Usuario</title>
    <link rel="stylesheet" href="estilos1.css">
    <link rel="icon" type="image/png" sizes="16x16" href="images/G.png">
    <script src="https://kit.fontawesome.com/6dde98c905.js" crossorigin="anonymous"></script>

</head>
<body>
    
    <header>
        <h1>Hospital</h1>
    </header>

    <div class="segundo-header">

        <form method="post" action="pagina.php">
            <button type="submit" name="cerrar_sesion">Inicio</button>
        </form>

        <form method="post" action="pagina1.php">
            <button type="submit" name="cerrar_sesion">¿Quienes Somos?</button>
        </form>

        <form method="post" action="pagina2.php">
            <button type="submit" name="cerrar_sesion">Servicios</button>
        </form>

        <form method="post" action="pagina3.php">
            <button type="submit" name="cerrar_sesion">Doctores</button>
        </form>

        <form method="post" action="pagina4.php">
            <button type="submit" name="cerrar_sesion">Contactos</button>
        </form>

        <button id="btnUsuario" onclick="mostrarInformacionUsuario()">
            <i class="fas fa-user"></i> <!-- Icono de usuario -->
        </button>

    </div>

    <div class="imagen-container">
        <img src="images/Captura1.png" alt="Imagen" >
    </div>


    <div id="infoUsuario" class="info-usuario-container">
        <h3><i class="fas fa-user"></i> Información del Usuario</h3>
        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Dirección:</strong> <?php echo $direccion; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $telefono; ?></p>
        <p><strong>Fecha de Registro:</strong> <?php echo $fecha; ?></p>

        <form method="post" action="cerrar.php">
            <button type="submit" name="cerrar_sesion">
            <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesion 
            </button>
        </form>

    </div>

    <script>
        function mostrarInformacionUsuario() {
            var infoUsuario = document.getElementById('infoUsuario');
            infoUsuario.style.display = (infoUsuario.style.display === 'block') ? 'none' : 'block';
        }
    </script>

    <div class="contenedor">
        <div class="lado-izquierdo">
        <img src="images/Doctor.jpg" alt="Hospital Scene">
        </div>
        <div class="lado-derecho">
            <h1>BIENVENIDO A HOSPITAL</h1>
            <p>La mejor atención para su Buena salud</p>
            <ul>
                <li>Una pasión por la curación</li>
                <li>Todo nuestro mejor</li>
                <li>Un legado de excelencia</li>
                <li>Cuidado de 5 estrellas</li>
                <li>Cree en nosotros</li>
                <li>Siempre cuidando</li>
            </ul>
        </div>
    </div>

    <div class= "contactos">
        <h2>Contactos</h2>

        <div class="recuadros-container">

        <div class="boton-cuadro" id= "cuadro1" onclick="realizarAccion()">
            <h3>Emergencia</h3>
            <i class="fas fa-phone"></i> <!-- Aquí se asume que estás utilizando FontAwesome para iconos -->
            <p>Números telefónicos de emergencia</p>
            <p>(237) 681-812-255</p>
            <p>(237) 666-331-894</p>
        </div>

        <div class="boton-cuadro" id= "cuadro2" onclick="realizarOtraAccion1()">
            <h3>Ubicación</h3>
            <i class="fas fa-map-marker"></i> <!-- Icono de ubicación -->
            <p>Información sobre ubicaciones</p>
            <p>0123 Some place</p>
            <p>9876 Some country</p>
        </div>

        <div class="boton-cuadro" id= "cuadro3" onclick="realizarOtraAccion1()">
            <h3>Contacto</h3>
            <i class="far fa-envelope"></i> <!-- Icono de mensaje -->
            <p>Correos electrónicos de contacto</p>
            <p>*********gmail.com</p>
            <p>*********gmail.com</p>
        </div>

        <div class="boton-cuadro" id= "cuadro4" onclick="realizarOtraAccion()">
            <h3>Horarios</h3>
            <i class="far fa-clock"></i> <!-- Icono de reloj -->
            <p>Horarios de atención</p>
            <p>Mon-Sat 09:00-20:00</p>
            <p>Sunday Emergency only</p>
        </div>

        </div>
    </div>

    <script>
        function realizarOtraAccion1() {
            console.log("Botón clickeado"); 
            fetch('pagina4.php', {
                method: 'GET', 
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                window.location.href = 'pagina4.php';
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Contacto</h3>
                <ul>
                    <li>Dirección: Dirección del hospital</li>
                    <li>Teléfono: 123-456-7890</li>
                    <li>Email: info@hospital.com</li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Enlaces útiles</h3>
                <ul>
                    <li><a href="pagina.php">Inicio</a></li>
                    <li><a href="pagina1.php">¿Quiénes Somos?</a></li>
                    <li><a href="pagina2.php">Servicios</a></li>
                    <li><a href="cerrar.php">Doctores</a></li>
                    <li><a href="cerrar.php">Contactos</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Redes Sociales</h3>
                <ul>
                    <li><a href="https://www.facebook.com/">Facebook</a></li>
                    <li><a href="https://www.google.com/">Google</a></li>
                    <li><a href="https://www.instagram.com/">Instagram</a></li>
                    <li><a href="https://twitter.com/">Twitter</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-line"></div> <!-- Nueva línea -->
            <div class="opciones">
            <h2>Opciones predeterminadas</h2>
                <a href="pagina.php" class="icono-btn"><i class="fas fa-home"></i></a>
                <a href="https://www.facebook.com/" class="icono-btn"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.google.com/" class="icono-btn"><i class="fa-brands fa-google"></i></a>
                <a href="https://www.instagram.com/" class="icono-btn"><i class="fa-brands fa-instagram"></i></a>
                <a href="mailto:correo@example.com" class="icono-btn"><i class="fas fa-envelope"></i></a>
                <a href="https://twitter.com/" class="icono-btn"><i class="fa-brands fa-twitter"></i></a>
        </div>
    </footer>

</body>
</html>