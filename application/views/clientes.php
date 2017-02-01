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
        		<a href="<?php base_url(); ?>nuevo_cliente" class="col-md-offset-2 btn-login">Agregar cliente</a>
            <!-- TITULOS -->
            <div class="col-md-10 col-md-offset-2 header-table">
                <div class="col-md-3">
                    Nombre
                </div>
                <div class="col-md-3">
                    Apellidos
                </div>
                <div class="col-md-2">
                    Desde
                </div>
                <div class="col-md-2">
                    Citas
                </div>
                <div class="col-md-2" style="border-right:none;">
                    Próxima Cita
                </div>
            </div>
            <!-- end TITULOS -->
        </div>
        <div class="row">

            
            <?php 
                foreach($usuarios->result() as $usuario ) :
            ?>
                <a href="<?php base_url(); ?>cliente/<?php echo $usuario->usuarioID; ?>" class="col-md-10 col-md-offset-2 list-row">
                    <div class="col-md-3">
                        <?php echo $usuario->nombre; ?>
                    </div>
                    <div class="col-md-3">
                        <?php echo $usuario->ap_paterno . ' ' . $usuario->ap_materno; ?>
                    </div>
                    <div class="col-md-2">
                        <?php echo date('d-m-Y', strtotime($usuario->fecha_registro)); ?>
                    </div>
                    <div class="col-md-2">
                        <?php echo '0'; ?>
                    </div>
                    <div class="col-md-2">
                        <?php //echo $usuario->creditos; ?>
                        <?php echo '0'; ?>
                    </div>
                </a>
            <?php
                endforeach;
            ?>

        </div>
    </div>
</div>
