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

            
            <div class="col-sm-10 col-sm-offset-2">
              <h1>* NO DEJAR QUE SE AGREGUEN CITAS EN EL PASADO</h1>
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
                    <a id="pre" href="<?php echo base_url(). 'admin/calendario/' . ((int)$week-1) . '/' . $year; ?>"><<</a> <!--Previous week-->
                    <a id="next" href="<?php echo base_url(). 'admin/calendario/'.((int)$week+1) . '/' . $year; ?>">>></a> <!--Next week-->
                </div>
                
                <?php

                
                do { 

                  $cita_12 = 'libre';
                  $cita_14 = 'libre';
                  $cita_16 = 'libre';
                  $cita_18 = 'libre';

                  $cita_12_id = '';
                  $cita_14_id = '';
                  $cita_16_id = '';
                  $cita_18_id = '';

                  $cita_12_usuario = '';
                  $cita_14_usuario = '';
                  $cita_16_usuario = '';
                  $cita_18_usuario = '';
                  
                  $bloqueo_12 = '';
                  $bloqueo_14 = '';
                  $bloqueo_16 = '';
                  $bloqueo_18 = '';

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
                                  $cita_12_id = $cita->citaID;
                                  $cita_12_usuario = $cita->usuarioID;
                                  $cita_12 = 'ocupado';
                                endif;
                                if( $cita->hora == "14:00:00") :
                                  $cita_14_id = $cita->citaID;
                                  $cita_14_usuario = $cita->usuarioID;
                                  $cita_14 = 'ocupado';
                                endif;
                                if( $cita->hora == '16:00:00' ) :
                                  $cita_16_id = $cita->citaID;
                                  $cita_16_usuario = $cita->usuarioID;
                                  $cita_16 = 'ocupado';
                                endif;
                                if( $cita->hora == '18:00:00') :
                                  $cita_18_id = $cita->citaID;
                                  $cita_18_usuario = $cita->usuarioID;
                                  $cita_18 = 'ocupado';
                                endif;
                              endif;
                          endforeach;                            
                        ?>

                        <?php if( $cita_12_usuario == '10') : $bloqueo_12 = 'cita-bloqueada'; endif; ?>
                        <div id="<?php echo $fecha_current . '-12'; ?>" class="day-hour <?php echo $cita_12 . ' ' . $bloqueo_12; ?>">
                          <?php if( $cita_12 == 'ocupado' && $cita_12_usuario != '10' ) : ?>
                            <a href="<?php echo base_url(); ?>admin/cita/<?php echo $cita_12_id; ?>">12:00</a>
                          <?php else : ?>
                            12:00
                          <?php endif; ?>
                        </div>

                        <?php if( $cita_14_usuario == '10') : $bloqueo_14 = 'cita-bloqueada'; endif; ?>
                        <div id="<?php echo $fecha_current . '-14'; ?>" class="day-hour <?php echo $cita_14 . ' ' . $bloqueo_14; ?>">
                          <?php if( $cita_14 == 'ocupado' && $cita_14_usuario != '10') : ?>
                            <a href="<?php echo base_url(); ?>admin/cita/<?php echo $cita_14_id; ?>">14:00</a>
                          <?php else : ?>
                            14:00
                          <?php endif; ?>
                        </div>

                        <?php if( $cita_16_usuario == '10') : $bloqueo_16 = 'cita-bloqueada'; endif; ?>
                        <div id="<?php echo $fecha_current . '-16'; ?>" class="day-hour <?php echo $cita_16 . ' ' . $bloqueo_16; ?>">
                          <?php if( $cita_16 == 'ocupado' && $cita_16_usuario != '10') : ?>
                            <a href="<?php echo base_url(); ?>admin/cita/<?php echo $cita_16_id; ?>">16:00</a>
                          <?php else : ?>
                            16:00
                          <?php endif; ?>
                        </div>

                        <?php if( $cita_18_usuario == '10') : $bloqueo_18 = 'cita-bloqueada'; endif; ?>
                        <div id="<?php echo $fecha_current . '-18'; ?>" class="day-hour <?php echo $cita_18 . ' ' . $bloqueo_18; ?>">
                          <?php if( $cita_18 == 'ocupado' && $cita_18_usuario != '10') : ?>
                            <a href="<?php echo base_url(); ?>admin/cita/<?php echo $cita_18_id; ?>">18:00</a>
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


<div id="ventana-emergente">
  <div class="fondo-emergente"></div>
  <div class="contenedor-emergente-bloqueo">
    <span id="close-ventana-bloqueo">X</span>
    <label>Fecha: </label><span class="fecha-seleccionada">2017-03-24</span>
    <label>Hora: </label><span class="hora-seleccionada">12:00</span>
    <form action="<?php echo base_url(); ?>admin/desbloquear_cita" method="post">
      <input type="hidden" name="usuarioID" value="10">
      <input class="fecha-desbloqueo" type="hidden" name="fecha" value="">
      <input class="hora-desbloqueo" type="hidden" name="hora" value="">
      <input type="hidden" name="week" value="<?php echo $week; ?>">
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <button class="btn-cancelar-bloqueo">CANCELAR BLOQUEO</button>
    </form>
  </div>
  <div class="contenido-emergente">
    <span id="close-ventana-emergente">X</span>
    <span class="datos-fecha-seleccionada">
      <label>Fecha: </label><span class="fecha-seleccionada">2017-03-24</span>
      <label>Hora: </label><span class="hora-seleccionada">12:00</span>
    </span>


    <span id="btn-ver-usuarios" class="btn-ventana-emergente">Seleccionar usuario</span>
    <div id="contenedor-selecc-usuario">
      <h3>USUARIOS</h3>
      <div>
      
      <?php foreach($usuarios->result() as $usuario ) : ?>
          <form class="form-row-usuario" action="<?php echo base_url(); ?>admin/agendar_cita_admin" method="post">
            <input type="hidden" name="id" value="<?php echo $usuario->usuarioID; ?>">
            <input class="fecha-usuario" type="hidden" name="fecha" value="">
            <input class="hora-usuario" type="hidden" name="hora" value="">
            <input type="hidden" name="estado" value="futura">
            <input type="hidden" name="link" value="">
            <input type="hidden" name="week" value="<?php echo $week; ?>">
            <input type="hidden" name="year" value="<?php echo $year; ?>">
            <button class="btn-row-usuario"><?php echo $usuario->nombre . ' ' .  $usuario->ap_paterno . ' ' . $usuario->ap_materno; ?><br></button>

          </form>
      <?php endforeach; ?>
      </div>
    </div>

    <form class="form-bloquear-fecha" action="<?php echo base_url(); ?>admin/agendar_cita" method="post">
      <input type="hidden" name="id" value="10">
      <input id="fecha-bloqueo" type="hidden" name="fecha" value="">
      <input id="hora-bloqueo" type="hidden" name="hora" value="">
      <input type="hidden" name="estado" value="futura">
      <input type="hidden" name="link" value="">
      <input type="hidden" name="week" value="<?php echo $week; ?>">
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <button class="btn-ventana-emergente">Bloquear fecha</button>
    </form>

  </div>

 
</div>

<script>
    $('#btn-ver-usuarios').click(function(){
        $("#contenedor-selecc-usuario").css("display","block");
        $(".form-bloquear-fecha").css("display","none");
        $("#btn-ver-usuarios").css("display","none");
    });
    $('#close-ventana-emergente').click(function() {
      close_contenido_emergente();

    });
    $('#close-ventana-bloqueo').click(function() {
      close_contenido_emergente();
    });

    function close_contenido_emergente() {
      $('#contenedor-selecc-usuario').css("display","none");
      $(".form-bloquear-fecha").css("display","inline-block");
      $('#btn-ver-usuarios').css("display","inline-block");
      $('#ventana-emergente').css("display","none");
      $('.contenido-emergente').css('display','none');
      $('contenedor-emergente-bloqueo').css('display','none');
    }



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

        document.getElementById('fecha-bloqueo').value = ano + '-' + mes + '-' + dia;
        document.getElementById('hora-bloqueo').value = hora + ':00:00';
        $('input[type="hidden"][class="fecha-usuario"]').prop("value", ano + '-' + mes + '-' + dia );  
        $('input[type="hidden"][class="hora-usuario"]').prop("value", hora + ':00:00');

        if( display == 'none' ) {
            $("#historial-usuario").css("display","block");
            $("#btn-ver-historial").text("Ocultar historial");
        } else {
            $("#btn-ver-historial").text("Ver historial");
            $("#historial-usuario").css("display","none");
        }
    });
    $('.day-hour.ocupado.cita-bloqueada').click(function(){
        var fecha = (this.id).split('-');
        var ano = fecha[0];
        var mes = fecha[1];
        var dia = fecha[2];
        var hora = fecha[3];

        $("#ventana-emergente").css("display","block");
        $(".contenedor-emergente-bloqueo").css("display","block");
        $(".fecha-seleccionada").text(dia + '-' + mes + '-' + ano);
        $(".hora-seleccionada").text(hora);

        $('input[type="hidden"][class="fecha-desbloqueo"]').prop("value", ano + '-' + mes + '-' + dia );  
        $('input[type="hidden"][class="hora-desbloqueo"]').prop("value", hora + ':00:00');
    });
   

// Si se selecciona un div.day-hour-ocupado
    // Mostrar mensaje de cita ocupada
// Sino se selecciona un div.disponible 
    // Abrir cuadro con informacion de fecha y hora
    // Seleccionar usuario o bloquear fecha

</script>






<style>
.day-hour.ocupado {
    background-color:             #ccc;
    cursor:                       default;  
}
.day-hour.ocupado a {
  color:  #FFF;
  padding: 11px 27px;
}
.day-hour.ocupado a:hover {
  text-decoration: none;
}
.day-hour.ocupado.cita-bloqueada {
  background-color:               #878787;
}
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
.contenido-emergente, .contenedor-emergente-bloqueo {
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
#close-ventana-emergente, #close-ventana-bloqueo {
    position: relative;
    display: block;
    font-size: 24px;
    text-align: right;
    cursor: pointer;
}
.btn-ventana-emergente {
    position: relative;
    display: inline-block;
    width: 150px;
    background-color: #439aca;
    color: #FFF;
    text-align: center;
    font-size: 18px;
    border: none;
    height: 150px;
}
.btn-ventana-emergente:hover {
    background-color: #ccc;
}
.datos-fecha-seleccionada {
  position: relative;
  display: block;
}
.form-bloquear-fecha {
  position: relative;
  display: inline-block;
}
.btn-ventana-emergente #contenedor-slecc-usuario {
  position: relative;
  display: none;

}
#contenedor-selecc-usuario {
  display: none;
}
#contenedor-selecc-usuario  div{
  overflow-y: scroll;
  height: 200px;
  max-width: 500px;
  margin: auto;
}

.form-row-usuario {
  margin-bottom: 0px;
}
.btn-row-usuario {
  width: 100%;
  height: 40px;
  border: none;
}
.btn-row-usuario:hover {
  background-color:   #439aca;
}

</style>



























        </div>
       
    </div>
</div>
