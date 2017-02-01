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
            <h4 class="col-md-10 col-md-offset-2 title-big">CITA</h4>
            <!-- TITULOS -->
            <div class="col-md-10 col-md-offset-2">
               <?php foreach($cita->result() as $c ) : ?>
                <span><label>Nombre: </label><?php echo $c->nombre; ?></span><br>
                <span><label>Fecha:</label> <?php echo $c->fecha; ?></span><br>
                <span><label>Hora:</label> <?php echo $c->hora; ?></span><br>
                <?php if( $c->link == null || $c->link == '' ) : ?>
                    <span id="btn-editar-cita" class="btn-general">Agregar link</span>
                <?php else : ?>
                    <span><label>Link: </label><?php echo $c->link; ?></span><br>
                    <span id="btn-editar-cita" class="btn-general">Editar link</span>
                <?php endif; ?>
                
                
                <div id="form-editar-cita" style="display: none">
                    <form action="<?php echo base_url(); ?>admin/agregar_link_cita" method="post">
                        <input type="hidden" name="citaID" value="<?php echo $c->citaID; ?>">
                        <input name="link" type="text" value="<?php echo $c->link; ?>">
                        <br>
                        <button class="btn-general">
                            <?php if( $c->link == null || $c->link == '' ) : ?>Agregar <?php else : ?> Editar <?php endif; ?>
                        </button>
                    </form>
                </div>

                                


                <br>AGREGAR DOBLE CONFIRMACION PARA CANCELAR CITA
                
                    <form action="<?php echo base_url(); ?>admin/cancelar_cita" method="post">
                        <input type="hidden" name="citaID" value="<?php echo $c->citaID; ?>">
                        <input type="hidden" name="usuarioID" value="<?php echo $c->usuarioID; ?>">
                        <button class="btn-cancel">Eliminar</button>
                    </form>
                

                <?php endforeach; ?>
            </div>
            <!-- end TITULOS -->
        </div>
        
    </div>
</div>



<script>
    $('#btn-editar-cita').click(function(){
        var display = $("#form-editar-cita").css("display");
        if( display == 'none' ) {
            $("#form-editar-cita").css("display","block");
            $("#btn-editar-cita").css("display","none");
        } else {
            $("#btn-editar-cita").css("display","block");
            $("#form-editar-cita").css("display","none");
        }
    });
</script>