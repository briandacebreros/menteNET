<!-- ESTE MENU ESTA EN estructura/header 


<div class="container-general">
    <div class="menu-admin">
        <a href="">CLIENTES</a>
        <a href="">CITAS</a>
        <a href="">CALENDARIO</a>
        <a href="">CONVENIOS</a>
        <a href="">PRECIOS</a>
    </div>
-->
    
    <div class="container">
        <div class="row">
        	<div class="col-md-10 col-md-offset-2">
            <button onclick="history.go(-1);">Back </button>
            <!--
        	<form action="<?php echo base_url(); ?>admin/alta_usuario" method="post">
                <input type="text" name="username" class="input-login" placeholder="Usuario">
                <input type="password" name="contrasena" class="input-login" placeholder="Contraseña">
                <input type="password" name="confirm_contrasena" class="input-login" placeholder="Confirmar contraseña">

                <input type="text" name="nombre" class="input-login" placeholder="Nombre(s)">
                <input type="text" name="ap_paterno" class="input-login" placeholder="Apellido Paterno">
                <input type="text" name="ap_materno" class="input-login" placeholder="Apellido Materno">
                <input type="email" name="correo" class="input-login" placeholder="Email">
                <input type="text" name="telefono" class="input-login" placeholder="Teléfono">

                    
                <label>Convenio</label>
                <select name="convenioID">
                    <option value="" selected></option>
                    <?php foreach($convenios->result() as $con ) : ?>
                        <?php echo "<option value='" . $con->convenioID  . "'>". $con->clave ."</option>"; ?>
                    <?php endforeach; ?>
                </select>
    

                <button class="btn-login">
                    Crear cuenta
                </button>     
            </form>
            -->
                    <?php echo validation_errors(); ?>
                    <form action="<?php echo base_url(); ?>admin/alta_usuario" method="post">
                    
                        <input  class="input-login" placeholder="Usuario" type="text" name="username" value="<?php echo set_value('username'); ?>" size="12" />
                        <!--<span class="error-formulario"><?php if (form_error('username')) : echo 'Elige otro nombre de usuario'; endif; ?></span>-->

                        <input  class="input-login" placeholder="Nombre(s)" type="text" name="nombre" value="<?php echo set_value('nombre'); ?>" size="12" />
                        <input  class="input-login" placeholder="Apellido Paterno" type="text" name="ap_paterno" value="<?php echo set_value('ap_paterno'); ?>" size="25" />
                        <input  class="input-login" placeholder="Apellido Materno" type="text" name="ap_materno" value="<?php echo set_value('ap_materno'); ?>" size="25" />

                        <input class="input-login" placeholder="Contraseña" type="text" name="password" value="" size="50" />

                        <input class="input-login" placeholder="Confirmar contraseña" type="text" name="passconf" value="" size="50" />

                        <input class="input-login" placeholder="Correo electrónico" type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />


                        <input class="input-login" placeholder="Teléfono" type="text" name="telefono" value="<?php echo set_value('telefono'); ?>" size="50" />
                        <label>Convenio</label>
                <select name="convenioID">
                    <option value="" selected></option>
                    <?php foreach($convenios->result() as $con ) : ?>
                        <?php echo "<option value='" . $con->convenioID  . "'>". $con->clave ."</option>"; ?>
                    <?php endforeach; ?>
                </select>

                        <div><input class="btn-login" type="submit" value="Registrar" /></div>

                    </form>

        	</div>
        </div>
    </div>
</div>