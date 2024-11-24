<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: pagina_principal.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión y Registro</title>
    <link rel="stylesheet" href="activos/css/estilos.css">
    <link rel="icon" href="activos/imagenes/InnovaTech3.png" type="image/x-icon">
    <style>
        /* Estilos para el modal */
        .modal {
            display: none; /* Oculto por defecto */
            position: fixed; /* Fijo */
            z-index: 1; /* Sitúa por encima de otros elementos */
            left: 0;
            top: 0;
            width: 100%; /* Ancho completo */
            height: 100%; /* Altura completa */
            overflow: auto; /* Desplazamiento si es necesario */
            background-color: rgba(0, 0, 0, 0.6); /* Fondo oscuro con más opacidad */
        }
        .modal-content {
            background-color: #ffffff; /* Fondo blanco */
            margin: 10% auto; /* 10% desde la parte superior y centrado */
            padding: 30px;
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra sutil */
            width: 80%; /* Ancho */
            max-width: 600px; /* Ancho máximo */
        }
        .close {
            color: #ff0000; /* Color rojo */
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: #000000; /* Color negro al pasar el mouse */
            text-decoration: none;
            cursor: pointer;
        }
        button {
            background-color: #007bff; /* Color de fondo del botón */
            color: white; /* Color del texto del botón */
            padding: 10px 20px; /* Espaciado */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            cursor: pointer; /* Cambiar cursor al pasar */
            transition: background-color 0.3s; /* Transición suave */
            font-size: 16px; /* Tamaño de fuente */
        }
        button:hover {
            background-color: #0056b3; /* Color más oscuro al pasar el mouse */
        }
        h2 {
            margin-top: 0; /* Sin margen superior */
        }
    </style>
</head>
<body>

<main>
    <div class="contenedor__todo">
        <div class="caja__trasera">
            <div class="caja__trasera-login">
                <h3>¿Ya tienes cuenta?</h3>
                <p>Iniciar sesión para ingresar a la pagina</p>
                <button id="btn__iniciar-sesion">Iniciar Sesión</button>
            </div>
            <div class="caja__trasera-registro">
                <h3>¿Aún no tienes cuenta?</h3>
                <p>Registrate para que puedas iniciar sesión</p>
                <button id="btn__registro" onclick="openPrivacyModal()">Registrate</button>
            </div>
        </div>
        <div class="contenedor__inicio_de_sesion-registro">
            <!-- Formulario de inicio de sesión -->
            <form id="loginForm" action="php/inicio_de_sesion.php" method="POST" class="formulario__inicio_de_sesion" onsubmit="return validateLoginForm();">
                <h2>Iniciar Sesión</h2>
                <input type="text" placeholder="Correo Electronico" name="correo" id="loginCorreo">
                <input type="password" placeholder="Contraseña" name="contrasena" id="loginContrasena">
                <div id="loginError" style="color: red;"></div>
                <button type="submit">Entrar</button>
            </form>

            <!-- Formulario de registro -->
            <form id="registrationForm" action="php/registro_usuario.php" method="POST" class="formulario__registro" style="display: none;" onsubmit="return validateRegistrationForm();">
                <h2>Regístrate</h2>
                <input type="text" placeholder="Nombre(s)" name="nombres" id="regNombres">
                <input type="text" placeholder="Apellido Paterno" name="apellido_paterno" id="regApellidoPaterno">
                <input type="text" placeholder="Apellido Materno" name="apellido_materno" id="regApellidoMaterno">
                <input type="text" placeholder="Correo Electronico" name="correo" id="regCorreo">
                <input type="text" placeholder="Usuario" name="usuario" id="regUsuario">
                <input type="password" placeholder="Contraseña" name="contrasena" id="regContrasena">
                <input type="hidden" id="privacyAccepted" name="privacyAccepted" value="0">
                <div id="regError" style="color: red;"></div>
                <button type="submit" disabled>Registrarse</button> <!-- Deshabilitado por defecto -->
            </form>
        </div>
    </div>
</main>

<!-- Modal para Aviso de Privacidad -->
<div id="privacyModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closePrivacyModal()">&times;</span>
        <h2>Aviso de Privacidad</h2>
        <p>En cumplimiento con la Ley de Protección de Datos Personales en Posesión
             de los Particulares, le informamos que los datos personales recabados a 
             través del uso del sistema serán tratados de acuerdo con lo establecido 
             en este Aviso de Privacidad. 1. Responsable del Tratamiento de Datos Personales
              La empresa InnovaTech, es responsable del tratamiento de los datos personales 
              que recabamos de los usuarios del sistema. 2. Finalidad del Tratamiento de Datos 
              Los datos personales que recabamos serán utilizados con las siguientes finalidades: 
              Uso de logotipos: El sistema podrá mostrar logotipos y marcas comerciales de diversas 
              empresas, lo cual se realiza con fines promocionales o de identificación de marcas en el 
              contexto de la plataforma. Recopilación de información personal: Recabamos datos
               personales como nombre, correo electrónico, dirección IP y otros datos relevantes 
               para la correcta funcionalidad del sistema y la personalización de la experiencia 
               del usuario. Esta información será almacenada de manera segura. 3. Datos Personales 
               Recabados Los datos que podremos obtener de los usuarios incluyen, pero no se limitan a:
                Nombre completo Correo electrónico Dirección IP Datos de contacto Información 
                proporcionada al registrarse o interactuar con el sistema. 4. Uso de los Datos 
                Personales Los datos recabados serán utilizados exclusivamente para la prestación 
                de los servicios que ofrece el sistema, mejorar la experiencia del usuario y cumplir 
                con las obligaciones legales y contractuales de InnovaTech. La información personal 
                podrá ser compartida con terceros únicamente cuando sea necesario para cumplir con las 
                finalidades mencionadas. 5. Derechos de los Titulares de los Datos Usted podrá acceder, 
                rectificar, cancelar u oponerse al tratamiento de sus datos personales en cualquier
                 momento, en los términos establecidos por la Ley de Protección de Datos Personales.
                  Para ejercer estos derechos, puede enviar un correo electrónico ao comunicarse. 6.
                   Modificaciones al Aviso de Privacidad Nos reservamos el derecho de modificar 
                   este Aviso de Privacidad en cualquier momento, por lo que le recomendamos 
                   revisarlo periódicamente. 7. Aceptación de Términos Al hacer uso del sistema,
                    usted acepta expresamente el tratamiento de sus datos personales conforme a 
                    los términos establecidos en este Aviso de Privacidad.</p>
        <button onclick="acceptPrivacy()">Aceptar</button>
    </div>
</div>

<script src="activos/js/script.js"></script>
<script>
    // Función de validación para el formulario de inicio de sesión
    function validateLoginForm() {
        const email = document.getElementById('loginCorreo').value;
        const password = document.getElementById('loginContrasena').value;
        const errorDiv = document.getElementById('loginError');

        // Limpiar mensajes de error previos
        errorDiv.innerHTML = '';

        // Verificar si los campos están vacíos
        if (!email || !password) {
            errorDiv.innerHTML = 'Por favor, completa todos los campos.';
            return false; // Prevenir el envío del formulario
        }

        // Validar formato del correo electrónico
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            errorDiv.innerHTML = 'Por favor, introduce un correo electrónico válido.';
            return false; // Prevenir el envío del formulario
        }

        return true; // Permitir el envío del formulario si todo es válido
    }

    // Funciones para el modal de aviso de privacidad
    function openPrivacyModal() {
        document.getElementById('privacyModal').style.display = 'block';
    }

    function closePrivacyModal() {
        document.getElementById('privacyModal').style.display = 'none';
    }

    function acceptPrivacy() {
        closePrivacyModal();
        document.getElementById('privacyAccepted').value = "1"; // Marcar que se ha aceptado el aviso de privacidad
        document.querySelector("#registrationForm button[type='submit']").disabled = false; // Habilitar el botón de registro
        document.getElementById('registrationForm').style.display = 'block'; // Mostrar el formulario de registro
    }

    // Cerrar el modal si se hace clic fuera de él
    window.onclick = function(event) {
        const modal = document.getElementById('privacyModal');
        if (event.target == modal) {
            closePrivacyModal();
        }
    }

    // Función de validación para el formulario de registro
    function validateRegistrationForm() {
        const nombres = document.getElementById('regNombres').value;
        const apellidoPaterno = document.getElementById('regApellidoPaterno').value;
        const apellidoMaterno = document.getElementById('regApellidoMaterno').value;
        const correo = document.getElementById('regCorreo').value;
        const usuario = document.getElementById('regUsuario').value;
        const contrasena = document.getElementById('regContrasena').value;
        const errorDiv = document.getElementById('regError');

        // Limpiar mensajes de error previos
        errorDiv.innerHTML = '';

        // Verificar si todos los campos están completos
        if (!nombres || !apellidoPaterno || !apellidoMaterno || !correo || !usuario || !contrasena) {
            errorDiv.innerHTML = 'Por favor, completa todos los campos.';
            return false; // Prevenir el envío del formulario
        }

        // Validar formato del correo electrónico
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(correo)) {
            errorDiv.innerHTML = 'Por favor, introduce un correo electrónico válido.';
            return false; // Prevenir el envío del formulario
        }

        return true; // Permitir el envío del formulario si todo es válido
    }
</script>
</body>
</html>
