<div class="container-general">
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">  
                <div class="citas-disponibles-container">
                    <h6>CITAS DISPONIBLES: <span><?php echo @$_SESSION['creditos']; ?></span></h6><a href="<?php echo base_url(); ?>principal/comprar_creditos">COMPRAR</a>
                </div>
            </div>
        
            <div class="col-md-4 col-md-offset-4">
    
                <h4 class="citas-title">MI CUENTA</h4>
                <a href="<?php echo base_url(); ?>principal/editar_cuenta">Editar</a>
                <div class="">
                    <label>Nombre: </label><?php echo @$_SESSION['nombre'] . ' ' . @$_SESSION['ap_paterno'] . ' ' . @$_SESSION['ap_materno']; ?><br>
                    <label>Username: </label><?php echo @$_SESSION['username']; ?><br>
                    <label>Correo: </label> <?php echo @$_SESSION['correo']; ?><br>
                    <label>Convenio: </label><?php echo @$_SESSION['convenioID']; ?><br>
                    <label>Créditos: </label><?php echo @$_SESSION['creditos']; ?><br>
                </div>
    



                <a href="<?php echo base_url(); ?>principal/comprar_creditos">Comprar créditos</a>
            </div>
        </div>
    </div>
    
    
    
</div>