<div class="container-general">
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
    		<?php foreach( $cuenta->result() as $usuario ) : ?>
    			<button onclick="history.go(-1);">Back </button>
                <form action="<?php echo base_url(); ?>admin/eliminar_usuario" method="post">
	        		<input type="hidden" name="usuarioID" value="<?php echo $usuario->usuarioID; ?>">
	        		<button class="btn-delete">Eliminar usuario</button>
	        	</form>
        		<form action="<?php echo base_url(); ?>principal/actualizar_usuario" method="post">
                    <h4>Nombre de usuario: <?php echo $usuario->username; ?></h4><br>
                    <input type="hidden" name="usuarioID" value="<?php echo $usuario->usuarioID; ?>">
                    <input type="hidden" name="creditos" value="<?php echo $usuario->creditos; ?>" class="input-login">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $usuario->nombre; ?>" class="input-login" placeholder="Nombre(s)">
                    <label>Apellido Paterno</label>
                    <input type="text" name="ap_paterno" value="<?php echo $usuario->ap_paterno; ?>" class="input-login" placeholder="Apellido Paterno">
                    <label>Apellido Materno</label>
                    <input type="text" name="ap_materno" value="<?php echo $usuario->ap_materno; ?>" class="input-login" placeholder="Apellido Materno">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" value="<?php echo $usuario->telefono; ?>" class="input-login" placeholder="Teléfono">
                    <label>Convenio</label>
                    <input type="text" name="convenioID" value="<?php echo $usuario->convenioID; ?>" class="input-login" placeholder="Convenio">
                    
                               
                    <button class="btn-login">
                        Actualizar
                    </button>     
                </form>
    		<?php endforeach; ?>
            </div>
        </div>
    </div>
    
    
    
</div>




