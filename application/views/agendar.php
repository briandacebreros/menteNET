<div class="header-title">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <h4>Agenda tu cita</h4>
                <p>Agenda tu cita seleccionando la fecha y horario que más te convenga.</p>
            </div>

        </div>
    </div>
</div>

<div class="agenda-container">
    <div class="container">
        <div class="col-sm-10 col-sm-offset-2">
            <?php
                $dt = new DateTime;
                if (isset($year) && isset($week) ) {
                    $dt->setISODate($year, $week );
                } else {
                    $dt->setISODate($dt->format('o'), $dt->format('W'));
                    
                }
                $year = $dt->format('o');
                $week = $dt->format('W');
                ?>

                <div class="contenedor-botones-calendario">
                    <a id="pre" href="<?php echo base_url(). 'principal/agendar/' . ((int)$week-1) . '/' . $year; ?>">ANTERIOR</a> <!--Previous week-->
                    <a id="next" href="<?php echo base_url(). 'principal/agendar/'.((int)$week+1) . '/' . $year; ?>">SIGUIENTE</a> <!--Next week-->
                </div>
                
                <?php

                
                do { 

                  $cita_12 = 'libre';
                  $cita_14 = 'libre';
                  $cita_16 = 'libre';
                  $cita_18 = 'libre';

                  $mi_cita_12 = '';
                  $mi_cita_14 = '';
                  $mi_cita_16 = '';
                  $mi_cita_18 = '';

                  $mi_cita_12_id = '';
                  $mi_cita_14_id = '';
                  $mi_cita_16_id = '';
                  $mi_cita_18_id = '';

                  $month = $dt->format('m');
                  $day = $dt->format('d');

                ?>
                  <div class="col-md-2 day-column">
                    <?php if ( $dt->format('l') != 'Saturday' && $dt->format('l') != 'Sunday' ) : ?>
                        <div class="day-tile">
                            <span class="day-month"><?php echo $dt->format('M'); ?></span>
                            <span class="day-number"><?php echo $dt->format('d'); ?></span>
                            <span class="day-name"><?php echo $dt->format('l'); ?></span>
                        </div>
                        <?php
                          $fecha_current = $year . '-' . $month . '-' . $day;

                          foreach( $citas->result() as $cita ) :
                              if( $cita->fecha == $fecha_current ) :
                                

                                if( $cita->hora == "12:00:00") :
                                  if( $cita->usuarioID == @$_SESSION['id'] ) : $mi_cita_12 = 'mi-cita'; $mi_cita_12_id = $cita->citaID; endif;
                                  $cita_12 = 'ocupado';
                                endif;
                                if( $cita->hora == "14:00:00") :
                                  if( $cita->usuarioID == @$_SESSION['id'] ) : $mi_cita_14 = 'mi-cita'; $mi_cita_14_id = $cita->citaID; endif;
                                  $cita_14 = 'ocupado';
                                endif;
                                if( $cita->hora == '16:00:00' ) :
                                  if( $cita->usuarioID == @$_SESSION['id'] ) : $mi_cita_16 = 'mi-cita'; $mi_cita_16_id = $cita->citaID; endif;
                                  $cita_16 = 'ocupado';
                                endif;
                                if( $cita->hora == '18:00:00') :
                                  if( $cita->usuarioID == @$_SESSION['id'] ) : $mi_cita_18 = 'mi-cita'; $mi_cita_18_id = $cita->citaID; endif;
                                  $cita_18 = 'ocupado';
                                endif;
                              endif;
                          endforeach;                            
                        ?>

                        <div id="<?php echo $fecha_current . '-12'; ?>" class="day-hour <?php echo $cita_12 . ' ' . $mi_cita_12; ?>">
                            <?php if( $mi_cita_12 != '' ) : ?>
                                <a href="<?php echo base_url(); ?>principal/mi_cita/<?php echo $mi_cita_12_id; ?>">12:00</a>
                            <?php else : ?>
                                12:00
                            <?php endif; ?>
                        </div>
                        <div id="<?php echo $fecha_current . '-14'; ?>" class="day-hour <?php echo $cita_14 . ' ' . $mi_cita_14; ?>">
                            <?php if( $mi_cita_14 != '' ) : ?>
                                <a href="<?php echo base_url(); ?>principal/mi_cita/<?php echo $mi_cita_14_id; ?>">14:00</a>
                            <?php else : ?>
                                14:00
                            <?php endif; ?>
                        </div>
                        <div id="<?php echo $fecha_current . '-16'; ?>" class="day-hour <?php echo $cita_16 . ' ' . $mi_cita_16; ?>">
                            <?php if( $mi_cita_16 != '' ) : ?>
                                <a href="<?php echo base_url(); ?>principal/mi_cita/<?php echo $mi_cita_16_id; ?>">16:00</a>
                            <?php else : ?>
                                16:00
                            <?php endif; ?>
                        </div>
                        <div id="<?php echo $fecha_current . '-18'; ?>" class="day-hour <?php echo $cita_18 . ' ' . $mi_cita_18; ?>">
                            <?php if( $mi_cita_18 != '' ) : ?>
                                <a href="<?php echo base_url(); ?>principal/mi_cita/<?php echo $mi_cita_18_id; ?>">18:00</a>
                            <?php else : ?>
                                18:00
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                  </div>
                <?php
                    //echo "<td>" . $dt->format('l') . "<br>" . $dt->format('d M') . "</td>\n";
                    $dt->modify('+1 day');

                } while ($week == $dt->format('W'));
                ?>
                   

            </div>
        </div>
        
    </div>
</div>



<div id="ventana-emergente">
    <div class="fondo-emergente"></div>
    <div class="contenido-emergente">
        <span id="close-ventana-emergente">X</span>
        <span class="datos-fecha-seleccionada">
            <label>Fecha: </label><span class="fecha-seleccionada">2017-03-24</span>
            <label>Hora: </label><span class="hora-seleccionada">12:00</span>
        </span>
        <form  action="<?php echo base_url(); ?>principal/agendar_cita" method="post">
            <input name="id" type="hidden" value="<?php echo @$_SESSION['id']; ?>">
            <input name="estado" type="hidden" value="<?php echo 'futura'; ?>">
            <input name="link" type="hidden" value="<?php echo ''; ?>">
            <input name="fecha" type="hidden" class="fecha-usuario">
            <input name="hora" type="hidden" class="hora-usuario">
            <input name="correo" type="hidden" value="<?php echo @$_SESSION['correo']; ?>">
            <button class="btn-login">
                Agendar Cita
            </button>     
        </form>
    </div>
 
</div>

<script>
    $('.day-hour.libre').click(function(){
        var fecha = (this.id).split('-');
        var ano = fecha[0];
        var mes = fecha[1];
        var dia = fecha[2];
        var hora = fecha[3];

        $("#ventana-emergente").css("display","block");
        $(".contenido-emergente").css("display","block");
        $(".fecha-seleccionada").text(dia + '-' + mes + '-' + ano);
        $(".hora-seleccionada").text(hora);

        $('input[type="hidden"][class="fecha-usuario"]').prop("value", ano + '-' + mes + '-' + dia );  
        $('input[type="hidden"][class="hora-usuario"]').prop("value", hora + ':00:00');
    });

    $('#close-ventana-emergente').click(function() {
      $("#ventana-emergente").css("display","none");
      $(".contenido-emergente-confirm").css("display","none");
    });

</script>
<style>
#ventana-emergente {
  display: none;
}
.fondo-emergente {
    position: fixed;
    top: 0;
    z-index: 10;
    width: 100%;
    height: 100%;
    background-color: #439aca;
    color: #FFF;
    opacity: 0.6;
}
.contenido-emergente {
    position: fixed;
    display: none;
    z-index: 11;
    background-color: #FFF;
    width: 100%;
    height: 50%;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    padding: 20px;
    text-align: center;
}
.mi-cita {
    background-color: pink !important;
    cursor: pointer !important;
}
.mi-cita a {
    color: #FFF;
    padding: 11px 27px;
    text-decoration: none;
}
#close-ventana-emergente {
    position: relative;
    display: block;
    font-size: 24px;
    text-align: right;
    cursor: pointer;
}

</style>