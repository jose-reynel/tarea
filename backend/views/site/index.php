<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Tarea</h1>
        <p class="lead">La idea es crear un sistema básico funcional de gestión de usuarios con registro, inicio de sesión y usuario administración.</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>2. Usuario y características</h2>

                <p>
1. Administrador - Administrador del sistema, usuario privilegiado que puede iniciar sesión en el sitio web, administrar usuarios, Editar toda la información del usuario, conceder y revocar la lectura de la información del usuario a los agentes.
2. Agente - Usuario restringido, que puede iniciar sesión en el sitio web con privilegios de conferencia sobre todos los usuarios información
3. Cliente - Usuario registrado, que sólo puede iniciar sesión y editar sus datos personales
4. Servidor - Una instancia en ejecución, acepta y da solicitudes
5. Cliente - Navegador Web, no se requiere soporte móvil ni de respuesta
</p>
            </div>
            <div class="col-lg-4">
                <h2>3. Perspectiva del producto</h2>

                <p>La aplicación web está diseñada para ejecutarse en el entorno de Amazon Web Services en un entorno EC2 Instancia con una pila LAMP (linux, apache o nginx, mysql & php).</p>

            </div>
            <div class="col-lg-4">
                <h2>4. Requisitos funcionales</h2>

                <p>4.1. Sistema de inicio de sesión
El sistema podrá autenticar y autorizar a los usuarios con sus respectivas funciones y permisos.
• Los usuarios tendrán su información básica asociada: nombre, correo electrónico, contraseña (cifrado Con bcrypt) y número de teléfono.
• Todos los usuarios tendrán acceso a actualizar su información personal.
• El sistema permitirá la función de inicio de sesión de Facebook.
</p>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h2>Registrador usuario</h2>

                <p>
• Un nuevo cliente será capaz de registrar una nueva cuenta con su información personal
Importar desde sus datos de Facebook
• El sistema debe validar los usuarios únicos
• Las nuevas cuentas tendrán que activarse antes de acceder al sitio
</p>
            </div>
            <div class="col-lg-6">
                <h2>Gestión de los usuarios</h2>

                <p>Habrá un módulo para las operaciones CRUD sobre los usuarios que están disponibles sólo para Administradores. Además, el módulo tiene la posibilidad de cambiar permisos para todos los usuarios. </p>

            </div>
        </div>

    </div>
</div>
