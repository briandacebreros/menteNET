<div class="login-container">
    <div class="container">
        <div class="row login-flex">
            <div class="col-md-3 col-md-offset-3 login-text">
                <h4>Ingresa a tu cuenta</h4>
                <p>¡Bienvenido a MENTENET! Al registrarte podrás comenzar a agendar tus citas, y recuerda que tu primera cita es gratis.</p>
                <img src="<?php echo base_url(); ?>assets/images/logo-white.svg" alt="">
            </div>
            <div class="col-md-5 login-form">
                <div class="switch-container">
                    <a href="<?php echo base_url(); ?>principal/login" class="switch-login selected">INGRESA</a>
                    <a href="<?php echo base_url(); ?>principal/signup" class="switch-register">REG&Iacute;STRATE</a>
                </div>           

                <form action="<?php echo base_url(); ?>principal/iniciar_sesion" method="post">
                    <input type="text" name="usuario" class="input-login" placeholder="Usuario">
                    <input type="password" name="contrasena" class="input-login" placeholder="Contraseña">
                    <button class="btn-login">
                    		Iniciar sesión
                    </button>
                </form>
                <?php echo @$_SESSION['error_login']; ?>


            </div>
        </div>
    </div>
</div>

