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
        	<form action="<?php echo base_url(); ?>admin/alta_usuario" method="post">
\               <input type="text" name="username" class="input-login" placeholder="Usuario">
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


        	</div>
        </div>
    </div>
</div>