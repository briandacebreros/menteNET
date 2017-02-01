<div class="login-container">
    <div class="container">
        <div class="row login-flex">
            <div class="col-md-3 col-md-offset-3 login-text">
                <h4>Regístrate!</h4>
                <p>¡Bienvenido a MENTENET! Al registrarte podrás comenzar a agendar tus citas, y recuerda que tu primera cita es gratis.</p>
                <img src="<?php echo base_url(); ?>assets/images/logo-white.svg" alt="">
            </div>
            <div class="col-md-5 login-form">
                <div class="switch-container">
                    <a href="<?php echo base_url(); ?>principal/login" class="switch-login">INGRESA</a>
                    <a href="<?php echo base_url(); ?>principal/signup" class="switch-register selected">REG&Iacute;STRATE</a>
                </div>           

                <form action="<?php echo base_url(); ?>principal/alta_usuario" method="post">
                    <input type="hidden" name="convenioID" value="">
                    <input type="text" name="username" class="input-login" placeholder="Usuario">
                    <input type="password" name="contrasena" class="input-login" placeholder="Contraseña">
                    <input type="password" name="confirm_contrasena" class="input-login" placeholder="Confirmar contraseña">

                    <input type="text" name="nombre" class="input-login" placeholder="Nombre(s)">
                    <input type="text" name="ap_paterno" class="input-login" placeholder="Apellido Paterno">
                    <input type="text" name="ap_materno" class="input-login" placeholder="Apellido Materno">
                    <input type="email" name="correo" class="input-login" placeholder="Email">
                    <input type="text" name="telefono" class="input-login" placeholder="Teléfono">
                               
                    <button class="btn-login">
                        Crear cuenta
                    </button>     
                </form>

                <?php //echo @$_SESSION['error_username']; ?> <br>
                <?php //echo @$_SESSION['error_correo']; ?>


            </div>
        </div>
    </div>
</div>
