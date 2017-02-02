<div class="container-general">
    
    <div class="container">
        <div class="row">
            <h4 class="col-md-10 col-md-offset-2 title-big">CITA</h4>
            <!-- TITULOS -->
            <div class="col-md-10 col-md-offset-2">
               <?php foreach($cita->result() as $c ) : ?>
                <?php $correo_usuario = $c->correo; ?>
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
                        <input name="correo" type="hidden" value="<?php echo $c->correo; ?>">
                        <br>
                        <button class="btn-general">
                            <?php if( $c->link == null || $c->link == '' ) : ?>Agregar <?php else : ?> Editar <?php endif; ?>
                        </button>
                    </form>
                </div>

                
                <span id="btn-borrar-cita" class="btn-cancel">Cancelar cita</span>
                

                <?php endforeach; ?>
            </div>
            <!-- end TITULOS -->
        </div>
    </div>

</div>