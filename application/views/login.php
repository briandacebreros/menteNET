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
                    <span class="switch-login selected">INGRESA</span>
                    <span class="switch-register">REG&Iacute;STRATE</span>
                </div>           

                <div id="formulario-login">
                    <form action="<?php echo base_url(); ?>principal/iniciar_sesion" method="post">
                        <input type="text" name="usuario" class="input-login" placeholder="Usuario">
                        <input type="password" name="contrasena" class="input-login" placeholder="Contraseña">
                        <button class="btn-login">
                        		Iniciar sesión
                        </button>
                    </form>
                </div>


                <div id="formulario-register">
                    <?php echo validation_errors(); ?>

                    <form action="<?php echo base_url(); ?>principal/alta_usuario" method="post">
                    
                    <input  class="input-login" placeholder="Usuario" type="text" name="username" value="<?php echo set_value('username'); ?>" size="12" />
                    <!--<span class="error-formulario"><?php if (form_error('username')) : echo 'Elige otro nombre de usuario'; endif; ?></span>-->

                    <input  class="input-login" placeholder="Nombre(s)" type="text" name="nombre" value="<?php echo set_value('nombre'); ?>" size="12" />
                    <input  class="input-login" placeholder="Apellido Paterno" type="text" name="ap_paterno" value="<?php echo set_value('ap_paterno'); ?>" size="25" />
                    <input  class="input-login" placeholder="Apellido Materno" type="text" name="ap_materno" value="<?php echo set_value('ap_materno'); ?>" size="25" />

                    <input class="input-login" placeholder="Contraseña" type="text" name="password" value="" size="50" />

                    <input class="input-login" placeholder="Confirmar contraseña" type="text" name="passconf" value="" size="50" />

                    <input class="input-login" placeholder="Correo electrónico" type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />


                    <input class="input-login" placeholder="Teléfono" type="text" name="telefono" value="<?php echo set_value('email'); ?>" size="50" />
                    <input class="input-login" placeholder="Teléfono" type="hidden" name="convenioID" value="" />

                    <div><input class="btn-login" type="submit" value="Submit" /></div>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    #formulario-register {
        display: none;
    }
</style>
<script>
    $('.switch-login').click(function(){
        $('#formulario-login').css('display','block');
        $('#formulario-register').css('display','none');
    });
    $('.switch-register').click(function(){
        $('#formulario-login').css('display','none');
        $('#formulario-register').css('display','block');
    });

</script>

