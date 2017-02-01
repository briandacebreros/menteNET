<div class="container-general">
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">  
                <div class="citas-disponibles-container">
                    <h6>CITAS DISPONIBLES: <span><?php echo @$_SESSION['creditos']; ?></span></h6><a href="">COMPRAR</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
    
                <h4 class="citas-title">CITAS PR&Oacute;XIMAS</h4>
                <div class="citas-proximas-container">
                <?php foreach( $citas->result() as $cita ) : ?>
                    <!-- TILE DE CADA CITA INDIVIDUAL -->
                    <div class="cita-tile">
                        <div class="cita-tile-fecha"><img src="<?php echo base_url(); ?>assets/images/event-details-icon-01.svg" alt=""><?php echo $cita->fecha; ?></div>
                        <div class="cita-tile-hora"><img src="<?php echo base_url(); ?>assets/images/event-details-icon-02.svg" alt=""><?php echo $cita->hora; ?></div>
                        <?php if ( $cita->link != null && $cita->link != "") : ?>
                            <a href="<?php echo $cita->link; ?>" class="ir-a-cita"><img src="<?php echo base_url(); ?>assets/images/ir-a-cita.svg" alt=""></a> <!-- Desplegar cuando haya link para enlazar video -->
                        <?php endif; ?>
                        <span class="cita-tile-menu accionador-menu"><img src="<?php echo base_url(); ?>assets/images/cita-menu.svg" alt=""></span>
                        <div class="cita-tile-menu-desplegado menu-desplegado"><a href="">VER</a><a href="">REAGENDAR</a></div>
                    </div>
                    <!-- end TILE CITA -->
                <?php endforeach; ?>
                </div>
                

                <?php if( @$_SESSION['creditos'] != 0) : ?>
                <div class="agregar-cita">
                    <a href="<?php echo base_url(); ?>principal/agendar"><img src="<?php echo base_url(); ?>assets/images/plus.svg" alt=""></a> AGENDAR CITA
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    
    
</div>